<html><body>
<h1>Dyuti</h1>
<h1><a href="blog.php">Blogs</a></h1>
</body>
</html>
<?php
$title=$_GET["title"];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wometechies";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM blog";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    if($row["title"]==$title){
    echo "<h1>" . $row["title"]. "</h1>";
    echo "<h3>By:" . $row["author"]. "</h3>";
    echo $row["content"];
}
  }
} else {
  echo "0 results";
}
$conn->close();


?>