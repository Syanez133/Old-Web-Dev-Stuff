<?php
$servername = "localhost";
$username = "gyanez2014";
$password = "5m7UXQk2EQ";
$dbname = "gyanez2014";

// Create connection
$db = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
} 
?>

<?php
// Get the rows from the table
$selectStmt = 'SELECT * FROM `babynames`;';
?>
      <div id="Mile Stone 2" class="well">
        <h3>Mile Stone 2 <small>Retrieving the rows</small></h3>
        <pre><?php echo $selectStmt; ?></pre>
<?php
$result = $db->query($selectStmt);
if($result->num_rows > 0) {
    echo '        <div class="alert alert-success">' . PHP_EOL;
    while($row = $result->fetch_assoc()) {
        echo '          <p>Id: ' . $row["id"] . ' Name: ' . $row["name"] . ' Gender: ' . $row["gender"]. ' Votes: ' . $row["vote"] . '</p>' . PHP_EOL;
    }
    echo '        </div>' . PHP_EOL;
} else {
    echo '        <div class="alert alert-success">No Results</div>' . PHP_EOL;
}
$db->close();
?>
      </div>
<?php
require_once './php/db_connect.php';
?>