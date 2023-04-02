<?php include "connectDb.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Web Lb 3, Риков, КІУКІ-19-7</title>
</head>
<body>

<p><strong> Запит о книгах зазначеного видавництва</strong></p>
<form action="booksByResource.php" method="get">
    <select name="publisher">
        <?php
            $sql = $dbh->query("SELECT DISTINCT publisher FROM $db.literature");
            foreach ($sql as $cell) {
                echo "<option> $cell[0] </option>";
            }
        ?>
    </select>
    <button>Результат пошуку</button>
</form>

<p><strong> Запит о книжках, журналах і газетах, опублікованих за вказаний часовий період (враховувати рік видання)</strong>
<form action="booksByTimePeriod.php" method="get">
    <label> Початкова дата:
        <input type="date" name="startDate">
    </label>
    <label> Кінцева дата:
        <input type="date" name="endDate">
    </label>
    <button>Результат пошуку</button>
</form>

<p><strong> Запит о книгах зазначеного автора</strong>
<form action="booksByAuthor.php" method="get">
    <select name="author">
        <?php
        $sql = $dbh->query("SELECT DISTINCT name FROM $db.author");
        foreach ($sql as $cell) {
            echo "<option> $cell[0] </option>";
        }
        ?>
    </select>
    <button>Результат пошуку</button>
</form>

</body>
</html>
