<?php


    require("DBconnection.inc.php");


    // get other locations
    $query9="SELECT * FROM `address` WHERE Is_event!=1 and Is_hospital!=1";
    $result9=mysqli_query($conn,$query9);

    $data=array();
    while($row=mysqli_fetch_assoc($result9)){
        $data[]=$row;
    }
    echo json_encode($data);

?>