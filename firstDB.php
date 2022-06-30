<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<title>ЛБ1</title>
</head>
<h2>Вывод базы данных занятий группы</h2>

<?php
include "connection.php";
$groups = $_GET['groups'];

$sqlSelect = $dbh->prepare("SELECT * from $db.groups inner join $db.lesson_groups on $db.groups.ID_Groups = $db.lesson_groups.FID_Groups inner join $db.lesson on $db.lesson_groups.FID_Lesson2=$db.lesson.ID_Lesson where $db.groups.title = :groups");
$sqlSelect->execute(array('groups' => $groups));

//$sqlSelect->bindParam(1, $groups, PDO::PARAM_STR, 10);
//$sqlSelect->execute();


echo "<table border ='1'>";
echo "<tr><th>Группа</th><th>День</th><th>Номер</th><th>Аудитория</th><th>Ученик</th><th>Тип</th></tr>";
while($cell=$sqlSelect->fetch()){
    echo "<tr><td>$cell[1]</td><td>$cell[5]</td><td>$cell[6]</td><td>$cell[7]</td><td>$cell[8]</td><td>$cell[9]</td></tr>";
}
echo "</table>";
?>