<?PHP
//�������ڱ���Ա�Bulletin�����ݿ���ʲ���
//���ÿ���ֶζ�Ӧ���һ����Ա����
Class Bulletin
{
  public $Id;				// ��¼���
  public $Title;			// �������
  public $Content;			// ��������
  public $PostTime;			// ��������
  public $Poster;			// ������
  var $conn;

  function __construct() {
	// �������ݿ�
	$this->conn = mysqli_connect("localhost", "root", "", "2shou"); 
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

  // ��ӹ�����Ϣ
  function insert()  {
    $sql = "INSERT INTO Bulletin (Title, Content, PostTime, Poster) VALUES ('" . $this->Title . "','" . $this->Content . "','" . $this->PostTime . "','" . $this->Poster . "')";
	// ִ��SQL���
	$this->conn->query($sql);
  }

  // �޸Ĺ�����Ϣ
  function update($bid)  {
    $sql = "UPDATE Bulletin SET Title='" . $this->Title . "', Content='" . $this->Content . "', PostTime='" . $this->PostTime . "', Poster='" . $this->Poster . "' WHERE Id=" . $bid;
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