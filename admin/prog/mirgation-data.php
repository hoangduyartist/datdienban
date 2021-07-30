<?php
$database1 = "huuphongplastic-live";
$conn = new mysqli("localhost", "root", "", $database1);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$database2 = "huuphongplastic-vn";
$conn2 = new mysqli("localhost", "root", "", $database2);
if ($conn2->connect_error) {
  die("Connection failed: " . $conn2->connect_error);
}

echo "-------------------Bảng 1";
$sql = "SELECT * FROM postcat where post_type='catproduct'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  echo "<pre>";
  while($row = $result->fetch_assoc()) {
    echo var_dump($row["post_type"]);
  }
  echo "</pre>";
}


echo "-------------------Bảng 2";
$sql2 = "SELECT * FROM postcat";
$result2 = $conn2->query($sql2);
if ($result2->num_rows > 0) {
  echo "<pre>";
  while($row2 = $result2->fetch_assoc()) {
    echo var_dump($row2["post_type"]);
  }
  echo "</pre>";
}

$conn->close();
$conn2->close();
?>
