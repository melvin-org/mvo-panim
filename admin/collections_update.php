<?php

$con = mysqli_connect("localhost", "admin", null, "pganim");

if(isset($_POST['update'])){
    $cid = $_POST['collection_id'];
    $collectionName = $_POST['collection_name'];
    $description = $_POST['description'];
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $updatedAt =  date('Y-m-d H:i:s');
    
    
    $queryUpdate="update collections set collection_name='$collectionName',description='$description' where collection_id='$cid'";
    $resultUpdate = mysqli_query($con, $queryUpdate);
    

    mysqli_close($con);

    header('location: collections.php');

}

?>