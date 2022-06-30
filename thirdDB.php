<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<title>ЛБ1</title>
</head>
<h2>Вывод базы данных занятий преподавателя</h2>
<?php
include "connection.php";
$auditorium = $_GET['auditorium'];
$sqlSelect = $dbh->prepare("SELECT * from $db.lesson where $db.lesson.auditorium = :auditorium");
$sqlSelect->execute(array('auditorium' => $auditorium));
echo "<table border ='1'>";
echo "<tr><th>Аудитория</th><th>День</th><th>Номер</th><th>Ученик</th><th>Тип</th></tr>";
while($cell=$sqlSelect->fetch()){
    echo "<tr><td>$cell[3]</td><td>$cell[1]</td><td>$cell[2]</td><td>$cell[4]</td><td>$cell[5]</td></tr>";
}

echo "</table>";
?>