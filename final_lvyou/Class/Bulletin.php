<?PHP
include('config.php');
//�������ڱ���Ա�Bulletin�����ݿ���ʲ���
//���ÿ���ֶζ�Ӧ���һ����Ա����
Class Bulletin
{
  public $Id;				// ��¼���
  public $Title;			// �������
  public $Content;			// ��������
  public $PostTime;			// ��������
  public $Poster;
  public $Price;			// ������
  var $conn;
  
  function __construct() {
	// �������ݿ�
	$this->conn = mysqli_connect(SAE_MYSQL_HOST_M, SAE_MYSQL_USER, SAE_MYSQL_PASS, SAE_MYSQL_DB); 
	mysqli_query($this->conn, "SET NAMES gbk");
  }
		
  function __destruct() {
	// �ر�����
	mysqli_close($this->conn);
  }

  // ��ȡ������Ϣ
  function GetBulletinInfo($bid)  {
	//���ò�ѯ��SELECT���
 	$sql = "SELECT * FROM Bulletin WHERE Id='" . $bid . "'";
	// �򿪼�¼��
    $results = $this->conn->query($sql);
	// ��ȡ��������
	if($row = $results->fetch_row())  {
  	  $this->Id = $bid;
	  $this->Title = $row[1];
	  $this->Content = $row[2];
	  $this->PostTime = $row[3];
          $this->Poster = $row[4];
          $this->Price = $row[5];
	}
	else {
	  $this->Id=0;
	}
  }

  // ��ȡ���й�����Ϣ�����ؽ����
  function GetBulletinlist()  {
	//���ò�ѯ��SELECT���
	$sql = "SELECT * FROM Bulletin ORDER BY PostTime DESC";
    $results = $this->conn->query($sql);
    return $results;
  }

  // ��ȡ���й�����Ϣ�����ؽ����
  function GetRecentBulletinlist()  {
	//���ò�ѯ��SELECT���
	$sql = "SELECT * FROM Bulletin WHERE DateDiff(day, getdate(), Posttime)<=7";
    $results = $this->conn->query($sql);
    return $results;
  }
  
  function getbullist($n,$array,$money)
  {
	if(is_array($array))
	{
	//echo'1';
		if(count($array)<=4)
		{
		//echo'1';
			if($n==1)
			
			{//echo'1';
			$sql = "SELECT * FROM Bulletin WHERE Content like '%·��%$array[0]%��%' and not Price > '$money' ";
    $results = $this->conn->query($sql);
    return $results;
			}
			if($n==2)
			{
			//echo '2';
			$sql = "SELECT * FROM Bulletin WHERE Content like '%·��%$array[0]%��%' and Content like '%·��%$array[1]%��%' and not Price > '$money' ";
    $results = $this->conn->query($sql);
    return $results;
			}
			if($n==3)
			{
			$sql = "SELECT * FROM Bulletin WHERE Content like '%·��%$array[0]%��%' and Content like '%·��%$array[1]%��%' and Content like '%·��%$array[2]%��%' and not Price > '$money' ";
    $results = $this->conn->query($sql);
    return $results;
			}
			if($n==4)
			{
			$sql = "SELECT * FROM Bulletin WHERE Content like '%·��%$array[0]%��%' and Content like '%·��%$array[1]%��%' and Content like '%·��%$array[2]%��%' and Content like '%·��%$array[3]%��%' and not Price > '$money' ";
    $results = $this->conn->query($sql);
    return $results;
			}
		}
	}
  }

  // ��ӹ�����Ϣ
  function insert()  {
    $sql = "INSERT INTO Bulletin (Title, Content, PostTime, Poster,Price) VALUES ('" . $this->Title . "','" . $this->Content . "','" . $this->PostTime . "','" . $this->Poster . "','" . $this->Price . "')";
	// ִ��SQL���
	$this->conn->query($sql);
  }

  // �޸Ĺ�����Ϣ
  function update($bid)  {
    $sql = "UPDATE Bulletin SET Title='" . $this->Title . "', Content='" . $this->Content . "', PostTime='" . $this->PostTime . "', Poster='" . $this->Poster . "', Price='" . $this->Price . "' WHERE Id=" . $bid;
    // ִ��SQL���
	$this->conn->query($sql);
  }

  // ����ɾ��������Ϣ
  function delete($bid)  {
    $sql = "DELETE FROM Bulletin WHERE Id IN (" . $bid . ")";
    // ִ��SQL���
	$this->conn->query($sql);
  }
}
?>