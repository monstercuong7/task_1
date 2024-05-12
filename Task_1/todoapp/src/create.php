<?php
$title = $_POST['title'];
$user_id = $_POST['session_id'];

include 'database.php';

$result = mysqli_query($conn, "SELECT MAX(task_id) AS max_task_id FROM user_task WHERE user_id = '$user_id'");
$row = mysqli_fetch_assoc($result);
$max_task_id = $row['max_task_id'];


$new_task_id = $max_task_id + 1;


$sql = "INSERT INTO user_task(task_id, user_id, task) VALUES ('$new_task_id', '$user_id', '$title')";



$result = mysqli_query($conn, $sql);

if ($result) {
    header('location: ./index.php');
}
