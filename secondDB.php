<!DOCTYPE HTML>
<html>

<head>
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>ЛБ1</title>
</head>
<h2>Вывод базы данных занятий преподавателя</h2>
<?php
include "connection.php";
$teachers = $_GET['teachers'];
$sqlSelect = $dbh->prepare("SELECT * from $db.teacher inner join $db.lesson_teacher on $db.teacher.ID_teacher = $db.lesson_teacher.FID_teacher inner join $db.lesson on $db.lesson_teacher.FID_Lesson1=$db.lesson.ID_Lesson where $db.teacher.name = :teachers");
$sqlSelect->execute(array('teachers' => $teachers));
echo "<table border ='1'>";
echo "<tr><th>Учитель</th><th>День</th><th>Номер</th><th>Аудитория</th><th>Ученик</th><th>Тип</th></tr>";
while ($cell = $sqlSelect->fetch()) {
  echo "<tr><td>$cell[1]</td><td>$cell[5]</td><td>$cell[6]</td><td>$cell[7]</td><td>$cell[8]</td><td>$cell[9]</td></tr>";
}
echo "</table>";
?>