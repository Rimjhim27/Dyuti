<?php
session_start();
?>

<html>
<body>
<h1>Dyuti</h1>
<h1>Forums</h1>
<script>
function clickLoad(id){
    var title = id.innerHTML;
    window.location.href = "http://localhost/womentechies/specificques.php?title=" + title;
}
</script>
</body>
</html>

<?php
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
  // output data of each row <a href=\"blogcontent.php\">
  while($row = $result->fetch_assoc()) {
    echo "<h2 onclick=\"clickLoad(this)\">" . $row["ques"]. "</a></h2>";
    echo "Asked By: " . $row["asker"] ."&emsp;&emsp; On: ". $row["time"]. "<br><hr>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>

