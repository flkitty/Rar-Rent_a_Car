<?php
$servername = "localhost";
$username = "root";
$password = ""; // or your password
$dbname = "rar"; // replace with your DB name if different

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM cars";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Browse Cars</title>
    <link rel="stylesheet" type="text/css" href="CSS/browse-cars.css">
</head>
<body>

<h1>Browse Available Cars</h1>

<table class="car-table">
    <tr>
        <th>Make</th>
        <th>Model</th>
        <th>Year</th>
        <th>Color</th>
        <th>Price Per Day</th>
        <th>Availability</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["make"] . "</td>
                    <td>" . $row["model"] . "</td>
                    <td>" . $row["year"] . "</td>
                    <td>" . $row["color"] . "</td>
                    <td>$" . $row["price_per_day"] . "</td>
                    <td>" . $row["availability"] . "</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='6'>No cars found.</td></tr>";
    }
    $conn->close();
    ?>
</table>

</body>
</html>