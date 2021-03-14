<html><body>
<h1>Dyuti</h1>
<h1><a href="forum.php">Forum</a></h1>
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

$sql = "SELECT * FROM forumq";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    if($row["ques"]==$title){
    echo "<h1>" . $row["ques"]. "</h1>";
    echo "Asked By: " . $row["asker"] ."&emsp;&emsp; On: ". $row["time"]. "<br><hr>";
}
  }
} else {
  echo "0 results";
}

$sql2="SELECT * FROM forumans";

$result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {
  // output data of each row
  while($row = $result2->fetch_assoc()) {
    if($row["ques"]==$title){
    echo $row["answer"]."<br>";

}
  }
} else {
  echo "0 results";
}

$conn->close();


?>