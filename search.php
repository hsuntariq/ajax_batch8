<?php
$connection = mysqli_connect("localhost", "root", "", "ajax_batch8") or die();

$search = $_POST['search'];
$select = "SELECT * FROM student WHERE name LIKE '{$search}%'";
$result = mysqli_query($connection, $select);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "
        <tr>
        <td>{$row['id']}</td>
            
       
        <td>{$row['name']}</td>
       
        <td>{$row['email']}</td>
        
        <td>{$row['age']}</td>
         </tr>
        ";
    }
}
?>