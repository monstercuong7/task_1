<?php

$task_id = $_GET['task_id'];
$user_id = $_GET['user_id'];

include 'database.php';

$sql = "DELETE FROM user_task WHERE task_id='$task_id' AND user_id='$user_id'";

$result = mysqli_query($conn, $sql);
if ($result) {
    header('location: ./index.php');
}
