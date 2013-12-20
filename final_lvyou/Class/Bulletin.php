<?PHP
include('config.php');
//本类用于保存对表Bulletin的数据库访问操作
//表的每个字段对应类的一个成员变量
Class Bulletin
{
  public $Id;				// 记录编号
  public $Title;			// 公告标题
  public $Content;			// 公告内容
  public $PostTime;			// 发布日期
  public $Poster;
  public $Price;			// 发布人
  var $conn;
  
  function __construct() {
	// 连接数据库
	$this->conn = mysqli_connect(SAE_MYSQL_HOST_M, SAE_MYSQL_USER, SAE_MYSQL_PASS, SAE_MYSQL_DB); 
	mysqli_query($this->conn, "SET NAMES gbk");
  }
		
  function __destruct() {
	// 关闭连接
	mysqli_close($this->conn);
  }

  // 获取公告信息
  function GetBulletinInfo($bid)  {
	//设置查询的SELECT语句
 	$sql = "SELECT * FROM Bulletin WHERE Id='" . $bid . "'";
	// 打开记录集
    $results = $this->conn->query($sql);
	// 读取公告数据
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

  // 获取所有公告信息，返回结果集
  function GetBulletinlist()  {
	//设置查询的SELECT语句
	$sql = "SELECT * FROM Bulletin ORDER BY PostTime DESC";
    $results = $this->conn->query($sql);
    return $results;
  }

  // 获取所有公告信息，返回结果集
  function GetRecentBulletinlist()  {
	//设置查询的SELECT语句
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
			$sql = "SELECT * FROM Bulletin WHERE Content like '%路线%$array[0]%。%' and not Price > '$money' ";
    $results = $this->conn->query($sql);
    return $results;
			}
			if($n==2)
			{
			//echo '2';
			$sql = "SELECT * FROM Bulletin WHERE Content like '%路线%$array[0]%。%' and Content like '%路线%$array[1]%。%' and not Price > '$money' ";
    $results = $this->conn->query($sql);
    return $results;
			}
			if($n==3)
			{
			$sql = "SELECT * FROM Bulletin WHERE Content like '%路线%$array[0]%。%' and Content like '%路线%$array[1]%。%' and Content like '%路线%$array[2]%。%' and not Price > '$money' ";
    $results = $this->conn->query($sql);
    return $results;
			}
			if($n==4)
			{
			$sql = "SELECT * FROM Bulletin WHERE Content like '%路线%$array[0]%。%' and Content like '%路线%$array[1]%。%' and Content like '%路线%$array[2]%。%' and Content like '%路线%$array[3]%。%' and not Price > '$money' ";
    $results = $this->conn->query($sql);
    return $results;
			}
		}
	}
  }

  // 添加公告信息
  function insert()  {
    $sql = "INSERT INTO Bulletin (Title, Content, PostTime, Poster,Price) VALUES ('" . $this->Title . "','" . $this->Content . "','" . $this->PostTime . "','" . $this->Poster . "','" . $this->Price . "')";
	// 执行SQL语句
	$this->conn->query($sql);
  }

  // 修改公告信息
  function update($bid)  {
    $sql = "UPDATE Bulletin SET Title='" . $this->Title . "', Content='" . $this->Content . "', PostTime='" . $this->PostTime . "', Poster='" . $this->Poster . "', Price='" . $this->Price . "' WHERE Id=" . $bid;
    // 执行SQL语句
	$this->conn->query($sql);
  }

  // 批量删除公告信息
  function delete($bid)  {
    $sql = "DELETE FROM Bulletin WHERE Id IN (" . $bid . ")";
    // 执行SQL语句
	$this->conn->query($sql);
  }
}
?>