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

    $author = $_GET['author'];
    $sqlSelect = $dbh->prepare(
        "SELECT DISTINCT l.id, l.name, l.isbn, l.publisher, l.year, l.quantity 
            FROM $db.LITERATURE as l
            INNER JOIN $db.BOOK_AUTHRS as ba on l.id = ba.fid_book
            INNER JOIN $db.AUTHOR as a on ba.fid_auth= a.id
            WHERE l.literate = \"Book\" and a.name = :author");
    $sqlSelect->bindParam(':author', $author);
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