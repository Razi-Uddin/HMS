<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        h2 {
            color: #342ac1;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #342ac1;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <?php
    include('func.php');
    include('newfunc.php');
    $con = mysqli_connect("localhost", "root", "", "myhmsdb");

    if(isset($_GET['search_submit']) && isset($_GET['search_input'])) {
        $search_input = $_GET['search_input'];
        $query = "SELECT * FROM doctb WHERE username LIKE '%$search_input%' OR city LIKE '%$search_input%' OR spec LIKE '%$search_input%'";
        $result = mysqli_query($con, $query);
        
        if(mysqli_num_rows($result) > 0) {
            echo "<h2>Search Results</h2>";
            echo "<table>";
            echo "<tr><th>Doctor Name</th><th>Specialist</th><th>Email</th><th>City</th><th>Consultancy Fees</th></tr>";
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>".$row['username']."</td>";
                echo "<td>".$row['spec']."</td>";
                echo "<td>".$row['email']."</td>";
                echo "<td>".$row['city']."</td>";
                echo "<td>".$row['docFees']."</td>";

                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No doctors found matching your search criteria.</p>";
        }
    } else {
        echo "<p>No search criteria provided.</p>";
    }
    ?>
</body>
</html>
