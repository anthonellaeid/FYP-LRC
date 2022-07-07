<?php


    require("DBconnection.inc.php");


    // get hospitals   
    $query7="SELECT * FROM `address` WHERE Is_hospital=1";
    $result7=mysqli_query($conn,$query7);

    $data=array();
    while($row=mysqli_fetch_assoc($result7)){
        $data[]=$row;
    }
    echo json_encode($data);

?>