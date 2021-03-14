<html>
<body>
<h1>Dyuti</h1>
<h1>Blogs</h1>
<script>
function clickLoad(id){
    var title = id.innerHTML;
    window.location.href = "http://localhost/womentechies/blogcontent.php?title=" + title;
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

$sql = "SELECT * FROM blog";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row <a href=\"blogcontent.php\">
  while($row = $result->fetch_assoc()) {
    echo "<h2 onclick=\"clickLoad(this)\">" . $row["title"]. "</a></h2>";
    echo "<h4>By:" . $row["author"]. "</h4>" . $row["preview"]. "<br><hr>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>
