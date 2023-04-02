<!DOCTYPE html>
<html>
<head>
    <style>
        th {
            background-color: blue;
            color: white;
        }
    </style>
</head>
<body>

<?php
    include "connectDb.php";

    $test = $_GET['startDate'];
    $startDate = $_GET['startDate'] != '' ? $_GET['startDate'] : '1900-01-01';
    $endDate = $_GET['endDate'] != '' ? $_GET['endDate'] : date('Y-m-d');;
//    echo "<p>$startDate</p>";
//    echo "<p>$endDate</p>";
    $sqlSelect = $dbh->prepare(
            "SELECT DISTINCT l.id, l.name, l.isbn, l.publisher, l.year, l.quantity, l.dat
            FROM $db.LITERATURE as l
            WHERE l.dat >= :startDate AND l.dat <= :endDate");
    $sqlSelect->execute(array('startDate' => $startDate, 'endDate' => $endDate));

    echo "<table border ='1'>";
    echo "<tr><th>ID</th><th>Name</th><th>ISBN</th><th>Publisher</th><th>Year</th><th>Count</th><th>Dat</th></tr>";
    while ($cell = $sqlSelect->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        foreach ($cell as $data) {
            echo "<td>$data</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
?>

</body>
</html>