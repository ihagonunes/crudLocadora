<?php
if(isset($_GET['id'])){
    include "conn.php";
    $id = $_GET['id'];
    $sql = "DELETE FROM filme WHERE codigo = $id";
    $result = mysqli_query($conn,$sql);

    if($result){
        header("Location: index.php");
        exit();
    }

}
?>