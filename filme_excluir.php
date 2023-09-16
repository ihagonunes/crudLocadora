<?php
if(isset($_GET['id'])){
    include "conn.php";
    $air_id = $_GET['id'];
    $air_sql = "DELETE FROM filme WHERE codigo = $air_id";
    $air_result = mysqli_query($air_conn,$air_sql);

    if($air_result){
        header("Location: index.php");
        exit();
    }

}
?>