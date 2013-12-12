<?PHP
//�������ڱ���Ա�Goods�����ݿ���ʲ���
//���ÿ���ֶζ�Ӧ���һ����Ա����
class Scenic  {
  public $ScenicId;				// ��¼���
  public $ScenicName;			// ��Ʒ����
  public $ScenicDetail;			// ��Ʒ˵��
  public $ImageURL;				//  ͼƬ���ӵ�ַ
  public $Price;				//  ת�ü۸�
  public $StartTime;			// ��ʼʱ��
  public $Priority;				// �����û���
  public $ClickTimes;		    // �������
  var $conn;

  function __construct() {
	// �������ݿ�
	$this->conn = mysqli_connect("localhost", "root", "1", "2shou"); 
	mysqli_query($this->conn, "SET NAMES gbk");
  }
		
  function __destruct() {
	// �ر�����
	mysqli_close($this->conn);
  }

  // ��ȡ��Ʒ��Ϣ
  function GetScenicInfo($id)  {
	// ���ò�ѯ��SELECT���
 	$sql = "SELECT * FROM Scenic WHERE ScenicId='" . $id ."'";
	//�򿪼�¼��
	$results = $this->conn->query($sql);
	// ��ȡ��������
	if($row = $results->fetch_row()) {
	  $this->ScenicId = $ScenicId;
          $this->ScenicName = $row[1];
	  $this->ScenicDetail = $row[2];
	  $this->ImageURL = $row[3];
	  $this->Price = $row[4];
	  $this->StartTime = $row[5];
	  $this->Priority = $row[6];
	  $this->ClickTimes = $row[7];
	}
	else  {
	  $GoodsId=0;
	}
  }

  // ���ݲ�ѯ������ȡ������Ʒ��Ϣ�����ؽ����
  function GetSceniclist()  {
	// ���ò�ѯ��SELECT���
	$sql = "SELECT * FROM Scenic";
	//�򿪼�¼��
	$results = $this->conn->query($sql);
	return $results;
  }

  // ��ȡǰn��������ӵ���Ʒ

  // ��ȡǰn�����ܹ�ע����Ʒ
  function GetTopnMaxClick($n)  {
	// ���ò�ѯ��SELECT���
	$sql = "SELECT * FROM Scenic ORDER BY ClickTimes DESC LIMIT 0," . $n;
	//�򿪼�¼��
	$results = $this->conn->query($sql);
	return $results;
  }

  // �ж�ָ����Ʒ�����Ƿ����

  // �����Ϣ
  function insert()  {
    $sql = "INSERT INTO Scenic (ScenicName, ScenicDetail, ImageUrl, Price, StartTime, Priority, ClickTimes) VALUES ('" . $this->ScenicName . "','" . $this->ScenicDetail . "','" . $this->ImageUrl . "','" . $this->Price . "','" . $this->StartTime . "','" . $this->Priority . "',0)";
	//ִ��SQL���
	$this->conn->query($sql);
  }

  function update($id)  {
    $sql = "UPDATE Scenic SET ScenicName='" . $this->ScenicName . "',  ScenicDetail='" . $this->ScenicDetail . "', Price='" . $this->Price . "',  Priority='" . $this->Priority . "' WHERE ScenicId=" . $id;
	//ִ��SQL���
	$this->conn->query($sql);
  }

  function Add_ClickTimes($id)  {
    $sql = "UPDATE Scenic SET ClickTimes=ClickTimes+1 WHERE ScenicId=" . $id;
	$this->conn->query($sql);
  }
  

  // ����ɾ����Ϣ
  function delete($id) {
	$sql = "DELETE FROM Scenic WHERE ScenicId IN (" . $id . ")";
	$this->conn->query($sql);
  }
}
?>