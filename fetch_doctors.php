<?php
$con = mysqli_connect("localhost", "root", "", "myhmsdb");

if (isset($_GET['city'])) {
    $city = $_GET['city'];
    $query = "SELECT * FROM doctb WHERE city='$city'";
    $result = mysqli_query($con, $query);
    
    $doctors = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $doctors[] = $row;
    }
    
    echo json_encode($doctors);
}
?>
