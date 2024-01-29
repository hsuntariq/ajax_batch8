<?php
$connection = mysqli_connect("localhost", "root", "", "ajax_batch8") or die();

$name = $_POST['name'];
$email = $_POST['email'];
$age = $_POST['age'];
$insert = "INSERT INTO student (name,email,age) VALUES ('{$name}','{$email}',$age)";
$result = mysqli_query($connection, $insert);
if ($result) {
    echo 1;
} else {
    echo 0;
}

?>