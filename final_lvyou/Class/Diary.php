<?PHP
include('config.php');
//�������ڱ���Ա�Bulletin�����ݿ���ʲ���
//���ÿ���ֶζ�Ӧ���һ����Ա����
Class Diary
{
  public $Id;				// ��¼���
  public $Title;			// �������
  public $Content;			// ��������
  public $PostTime;			// ��������
  public $Poster;			// ������
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
 	$sql = "SELECT * FROM Diary WHERE Id='" . $bid . "'";
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
	$sql = "SELECT * FROM Diary ORDER BY PostTime DESC";
    $results = $this->conn->query($sql);
    return $results;
  }

  // ��ȡ���й�����Ϣ�����ؽ����
  function GetRecentBulletinlist()  {
	//���ò�ѯ��SELECT���
	$sql = "SELECT * FROM Diary WHERE DateDiff(day, getdate(), Posttime)<=7";
    $results = $this->conn->query($sql);
    return $results;
  }

  // ��ӹ�����Ϣ
  function insert()  {
    $sql = "INSERT INTO Diary (Title, Content, PostTime, Poster) VALUES ('" . $this->Title . "','" . $this->Content . "','" . $this->PostTime . "','" . $this->Poster . "')";
	// ִ��SQL���
	$this->conn->query($sql);
  }

  // �޸Ĺ�����Ϣ
  function update($bid)  {
    $sql = "UPDATE Diary SET Title='" . $this->Title . "', Content='" . $this->Content . "', PostTime='" . $this->PostTime . "', Poster='" . $this->Poster . "' WHERE Id=" . $bid;
    // ִ��SQL���
	$this->conn->query($sql);
  }

  // ����ɾ��������Ϣ
  function delete($bid)  {
    $sql = "DELETE FROM Diary WHERE Id IN (" . $bid . ")";
    // ִ��SQL���
	$this->conn->query($sql);
  }
}
?>