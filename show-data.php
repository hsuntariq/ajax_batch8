<?php
$connection = mysqli_connect("localhost", "root", "", "ajax_batch8") or die();
$select = "SELECT * FROM student";
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