<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Car</title>
</head>
<body>
    <h1>Used car dealership</h1>
<?php  
require_once "settings.php";
$dbcon = @mysqli_connect($host, $user, $pwd, $sql_db);
if ($dbcon) {
    $query = "SELECT * FROM cars WHERE make = 'Toyota
    '";
    $result = mysqli_query($dbcon, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        echo "<table border=\"1\">";
        echo "<tr>
                <th>Car ID</th>
                <th>Make</th>
                <th>Model</th>
                <th>Price</th>
                <th>Year of Manufacture</th>
              </tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['car_id'] . "</td>";
            echo "<td>" . $row['make'] . "</td>";
            echo "<td>" . $row['model'] . "</td>";
            echo "<td>" . $row['price'] . "</td>";
            echo "<td>" . $row['yom'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        mysqli_free_result($result);
    } else {
        echo "<p>There are no cars to display.</p>";
    }

    mysqli_close($dbcon);
} else {
    echo "<p>Unable to connect to the db.</p>";
}
?>
</body>
</html>