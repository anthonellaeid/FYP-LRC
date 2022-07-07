<?php


    require("DBconnection.inc.php");


    // get event locations
    $query8="SELECT * FROM `address` WHERE Is_event=1";
    $result8=mysqli_query($conn,$query8);

    $data=array();
    while($row=mysqli_fetch_assoc($result8)){
        $data[]=$row;
    }
    echo json_encode($data);

?>