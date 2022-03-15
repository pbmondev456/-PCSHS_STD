<?php
session_start();
$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = "root1234"; /* Password */
$dbname = "std_table"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}
?>
<!-- //PDO -->
<?php
    $servername = "localhost";
    $username = "root";
    $password = "root1234";
    $dbname = "std_table";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connected successfully";
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>