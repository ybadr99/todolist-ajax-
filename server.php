<?php

require_once 'db.php';


if(isset($_POST['todo'])){

    $post = $_POST['todo'];
    $sql = "INSERT INTO `posts`(`post`) VALUES ('$post')";
    $result = mysqli_query($con,$sql);

}

if(isset($_POST['del'])){

    $id = $_POST['del'];
    // echo $id;
    // alert($id);
    $sql = "DELETE FROM `posts` WHERE `id` = '$id'";
    $result = mysqli_query($con,$sql);

}







$sql = "SELECT * FROM `posts` ";
$result = mysqli_query($con,$sql);


if(mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_assoc($result))
    {
?>    
    
    <tr>
        <th></th>
        <th><?php echo $row['id']; ?></th>
        <th><?php echo $row['post']; ?></th>
        <th><button class="btn btn-danger" onclick="del(<?php echo $row['id']; ?>)">Delete</button> <button class="btn btn-info" onclick="">Edit</button></th>
    </tr>
    
        
<?php
    }
} 



