<?php


    require("DBconnection.inc.php");



    // "SELECT m.mission_id,m.mission_initial_km,m.mission_final_km,a.Address_desc,b.Address_desc,mt.mission_type_desc
    // FROM `mission` m
    //     JOIN `address` a ON a.Address_code=m.mission_addressCodeSrc
    //     JOIN `address` b ON b.Address_code=m.mission_addressCodeDest
    //     JOIN `mission_type` mt ON mt.mission_type_code=m.mission_missionType
    // WHERE m.mission_ambulanceId=4
    // ORDER BY m.mission_id;"

    
    $query1="SELECT * FROM `ambulance` WHERE ambulance_description is not null;";
    $result1=mysqli_query($conn,$query1);

    
    function getAll($id,$m){
        require("DBconnection.inc.php");
            $query2="SELECT m.mission_id, 
                    m.mission_initial_km, 
                    m.mission_final_km, 
                    a.Address_desc as src, 
                    b.Address_desc as dest, 
                    mt.mission_type_desc FROM `mission` m 
                    JOIN `address` a ON a.Address_code=m.mission_addressCodeSrc 
                    JOIN `address` b ON b.Address_code=m.mission_addressCodeDest 
                    JOIN `mission_type` mt ON mt.mission_type_code=m.mission_missionType 
                    WHERE m.mission_ambulanceId=".$id." AND MONTH(m.mission_start_date)=".$m." ";
        $result2=mysqli_query($conn,$query2);
        // $data=array();
        // while($row=mysqli_fetch_assoc($result2)){
        //     $data[]=$row;
        // }
        // // echo json_encode($data);

        mysqli_close($conn);
        return $result2;
    }
    
?>