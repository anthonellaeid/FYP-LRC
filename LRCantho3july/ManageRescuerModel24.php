<?php
   require("DBconnection.inc.php");

    function displayRescuer(){
        require("DBconnection.inc.php");
        $query="select * from rescuer;";
        $res=mysqli_query($conn,$query);       
        return $res;
    }
    
    function searchRescuer($resc){
        require("DBconnection.inc.php");
        $query ="SELECT * FROM `rescuer` WHERE `rescuer_nickname` like '%".$resc."%' or `rescuer_firstName` like '%".$resc."%' or `rescuer_lastName` like '%".$resc."%' or `rescuer_dateOfBirth` like '%".$resc."%' or `rescuer_phoneNb` like '%".$resc."%' or `rescuerDate_join` like '%".$resc."%' or `rescuerDate_left` like '%".$resc."%' or `rescuer_function` like '%".$resc."%' or `rescuer_gender` like '%".$resc."%';";
        $res=mysqli_query($conn,$query);
        return $res;
    }

    $query2="select rescuer_function_code,rescuer_function_desc from rescuer_function;";
    $result=mysqli_query($conn,$query2);

    $query3="SELECT * FROM `gender`";
    $gen=mysqli_query($conn,$query3);

    
    function updateRescuer($nickname,$firstname,$lastname,$dateofbirth,$phonenb,$datejoin,$dateleft,$function,$gender){
        require("DBconnection.inc.php");
        // $query="UPDATE `rescuer` SET `rescuer_firstName`='".$fname."',`rescuer_lastName`='".$lname."',`rescuer_dateOfBirth`='".$dateofbirth."',`rescuer_phoneNb`='".$phonenb."',`rescuerDate_join`='".$datejoin."',`rescuerDate_left`='".$dateleft."' WHERE `rescuer_nickname`= '".$nickname."'";
        $query="UPDATE `rescuer` 
                SET `rescuer_firstName`='".$firstname."',`rescuer_lastName`='".$lastname."',`rescuer_dateOfBirth`='".$dateofbirth."',`rescuer_phoneNb`='".$phonenb."',`rescuerDate_join`='".$datejoin."',`rescuerDate_left`='".$dateleft."',`rescuer_function`='".$function."',`rescuer_gender`='".$gender."'
                WHERE `rescuer_nickname`= '".$nickname."'";
        $res=mysqli_query($conn,$query);
        mysqli_close($conn);
        return $res;
    }
    function updateRescuer1($nickname,$firstname,$lastname,$dateofbirth,$phonenb,$datejoin,$function,$gender){
        require("DBconnection.inc.php");
        // $query="UPDATE `rescuer` SET `rescuer_firstName`='".$fname."',`rescuer_lastName`='".$lname."',`rescuer_dateOfBirth`='".$dateofbirth."',`rescuer_phoneNb`='".$phonenb."',`rescuerDate_join`='".$datejoin."',`rescuerDate_left`='".$dateleft."' WHERE `rescuer_nickname`= '".$nickname."'";
        $query="UPDATE `rescuer` 
                SET `rescuer_firstName`='".$firstname."',`rescuer_lastName`='".$lastname."',`rescuer_dateOfBirth`='".$dateofbirth."',`rescuer_phoneNb`='".$phonenb."',`rescuerDate_join`='".$datejoin."',`rescuerDate_left`=NULL,`rescuer_function`='".$function."',`rescuer_gender`='".$gender."'
                WHERE `rescuer_nickname`= '".$nickname."'";
        $res=mysqli_query($conn,$query);
        mysqli_close($conn);
        return $res;
    }

function addRescuer($nickname,$firstname,$lastname,$dateofbirth,$phonenb,$datejoin){
    require("DBconnection.inc.php");
    $query="INSERT INTO `rescuer`(`rescuer_nickname`, `rescuer_firstName`, `rescuer_lastName`, `rescuer_dateOfBirth`, `rescuer_phoneNb`, `rescuerDate_join`,
        `rescuer_function`) 
        VALUES ('".$nickname."','".$firstname."','".$lastname."','".$dateofbirth."','".$phonenb."','".$datejoin."',3)";
    $res=mysqli_query($conn,$query);
    mysqli_close($conn);
    return $res;
}
function deleteRescuer($nickname){
    require("DBconnection.inc.php");
    $query="DELETE FROM `rescuer` WHERE `rescuer_nickname`='".$nickname."'";
    $res=mysqli_query($conn,$query);
    mysqli_close($conn);
    return $res;
}

/* corrct query
UPDATE `rescuer` SET `rescuer_firstName`='Rita',`rescuer_lastName`='Morcos',`rescuer_dateOfBirth`='2001-01-11',`rescuer_phoneNb`='78990363',`rescuerDate_join`='2022-02-22',`rescuerDate_left`=null WHERE `rescuer_nickname`='driver1';
*/


// update firtname  ZABTA
// function updateRescuer($nickname,$fname){
//     require("DBconnection.inc.php");
//     $query="UPDATE `rescuer` SET `rescuer_firstName`='".$fname."' WHERE `rescuer_nickname`= '".$nickname."'";
//     $res=mysqli_query($conn,$query);
//     mysqli_close($conn);
//     return $res;
// }

//     require("DBconnection.inc.php");

//     // get rescuers
//     $query="select * from rescuer;";
//     $res=mysqli_query($conn,$query);
//     // $s = mysqli_fetch_assoc($res);
//     $nb = mysqli_num_rows($res);    // number of rescuers
//     mysqli_close($conn);
//     // return $n;



// function updateRescuer($nickname,$fname,$lname,$phonenb,$function){
//     require("DBconnection.inc.php");
//     // $query="UPDATE `rescuer` SET `rescuer_firstName`='".$fname."',`rescuer_lastName`='".$lname."',`rescuer_dateOfBirth`='".$dateofbirth."',`rescuer_phoneNb`='".$phonenb."',`rescuerDate_join`='".$datejoin."',`rescuerDate_left`='".$dateleft."' WHERE `rescuer_nickname`= '".$nickname."'";
//     $query="UPDATE `rescuer` 
//             SET `rescuer_firstName`='".$fname."',`rescuer_lastName`='".$lname."',`rescuer_phoneNb`='".$phonenb."',`rescuer_function`='".$function."'
//             WHERE `rescuer_nickname`= '".$nickname."'";
//     $res=mysqli_query($conn,$query);
//     mysqli_close($conn);
//     return $res;
// }
// /* corrct query
// UPDATE `rescuer` SET `rescuer_firstName`='Rita',`rescuer_lastName`='Morcos',`rescuer_dateOfBirth`='2001-01-11',`rescuer_phoneNb`='78990363',`rescuerDate_join`='2022-02-22',`rescuerDate_left`=null WHERE `rescuer_nickname`='driver1';
// */

// // update firtname  ZABTA
// // function updateRescuer($nickname,$fname){
// //     require("DBconnection.inc.php");
// //     $query="UPDATE `rescuer` SET `rescuer_firstName`='".$fname."' WHERE `rescuer_nickname`= '".$nickname."'";
// //     $res=mysqli_query($conn,$query);
// //     mysqli_close($conn);
// //     return $res;
// // }


// function addRescuer($nickname,$firstname,$lastname,$dateofbirth,$phonenb,$datejoin){
//     require("DBconnection.inc.php");
//     $query="INSERT INTO `rescuer`(`rescuer_nickname`, `rescuer_firstName`, `rescuer_lastName`, `rescuer_dateOfBirth`, `rescuer_phoneNb`, `rescuerDate_join`,
//         `rescuer_function`) 
//         VALUES ('".$nickname."','".$firstname."','".$lastname."','".$dateofbirth."','".$phonenb."','".$datejoin."',3)";
//     $res=mysqli_query($conn,$query);
//     mysqli_close($conn);
//     return $res;
// }
// // function addRescuer($nickname,$firstname,$lastname,$dateofbirth,$phonenb,$datejoin){
// //     require("DBconnection.inc.php");
// //     $query="INSERT INTO `rescuer`(`rescuer_nickname`, `rescuer_firstName`, `rescuer_lastName`, `rescuer_dateOfBirth`, `rescuer_phoneNb`, `rescuerDate_join`,
// //         `rescuer_function`) 
// //         VALUES ('".$nickname."','".$firstname."','".$lastname."','".$dateofbirth."','".$phonenb."','".$datejoin."',3)";
// //     $res=mysqli_query($conn,$query);
// //     mysqli_close($conn);
// // }

?>