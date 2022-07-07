<?php


    require("DBconnection.inc.php");


    // get shifts   
    $queryShift="SELECT * FROM `shift`";
    $resultShift=mysqli_query($conn,$queryShift);

    $data=array();
    while($row=mysqli_fetch_assoc($resultShift)){
        $data[]=$row;
    }
    echo json_encode($data);

?>