
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

    $publisher = $_GET['publisher'];
    $sqlSelect = $dbh->prepare(
        "SELECT DISTINCT l.id, l.name, l.isbn, l.publisher, l.year, l.quantity 
            FROM $db.LITERATURE as l
            WHERE l.literate = \"Book\" and l.publisher = :publisher");
    $sqlSelect->bindParam(':publisher', $publisher);
    $sqlSelect->execute();

    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Name</th><th>ISBN</th><th>Publisher</th><th>Year</th><th>Count</th></tr>";
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