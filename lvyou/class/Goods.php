<?PHP
//本类用于保存对表Goods的数据库访问操作
//表的每个字段对应类的一个成员变量
class Scenic  {
  public $ScenicId;				// 记录编号
  public $ScenicName;			// 商品名称
  public $ScenicDetail;			// 商品说明
  public $ImageURL;				//  图片链接地址
  public $Price;				//  转让价格
  public $StartTime;			// 开始时间
  public $Priority;				// 卖家用户名
  public $ClickTimes;		    // 点击次数
  var $conn;

  function __construct() {
	// 连接数据库
	$this->conn = mysqli_connect("localhost", "root", "1", "2shou"); 
	mysqli_query($this->conn, "SET NAMES gbk");
  }
		
  function __destruct() {
	// 关闭连接
	mysqli_close($this->conn);
  }

  // 获取商品信息
  function GetScenicInfo($id)  {
	// 设置查询的SELECT语句
 	$sql = "SELECT * FROM Scenic WHERE ScenicId='" . $id ."'";
	//打开记录集
	$results = $this->conn->query($sql);
	// 读取个人数据
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

  // 根据查询条件获取所有商品信息，返回结果集
  function GetSceniclist()  {
	// 设置查询的SELECT语句
	$sql = "SELECT * FROM Scenic";
	//打开记录集
	$results = $this->conn->query($sql);
	return $results;
  }

  // 获取前n名最新添加的商品

  // 获取前n名最受关注的商品
  function GetTopnMaxClick($n)  {
	// 设置查询的SELECT语句
	$sql = "SELECT * FROM Scenic ORDER BY ClickTimes DESC LIMIT 0," . $n;
	//打开记录集
	$results = $this->conn->query($sql);
	return $results;
  }

  // 判断指定商品分类是否存在

  // 添加信息
  function insert()  {
    $sql = "INSERT INTO Scenic (ScenicName, ScenicDetail, ImageUrl, Price, StartTime, Priority, ClickTimes) VALUES ('" . $this->ScenicName . "','" . $this->ScenicDetail . "','" . $this->ImageUrl . "','" . $this->Price . "','" . $this->StartTime . "','" . $this->Priority . "',0)";
	//执行SQL语句
	$this->conn->query($sql);
  }

  function update($id)  {
    $sql = "UPDATE Scenic SET ScenicName='" . $this->ScenicName . "',  ScenicDetail='" . $this->ScenicDetail . "', Price='" . $this->Price . "',  Priority='" . $this->Priority . "' WHERE ScenicId=" . $id;
	//执行SQL语句
	$this->conn->query($sql);
  }

  function Add_ClickTimes($id)  {
    $sql = "UPDATE Scenic SET ClickTimes=ClickTimes+1 WHERE ScenicId=" . $id;
	$this->conn->query($sql);
  }
  

  // 批量删除信息
  function delete($id) {
	$sql = "DELETE FROM Scenic WHERE ScenicId IN (" . $id . ")";
	$this->conn->query($sql);
  }
}
?>