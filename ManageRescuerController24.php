<?php
//^((7(0|1|8|6))|(03|3))|(81)[0-9]{6}$

require("ManageRescuerModel24.php");  //    !!!!

if (isset($_POST["insertrescuer"])){
    require("insertSecurity.inc.php");
    // require("ManageRescuerModel.php");
    //insert 
   
    //$deletebutton=$_POST["deletebutton"];
    // $insertrescuer=$_POST["insertrescuer"];

    if( !empty($nickname) && !empty($firstname) && !empty($lastname) && !empty($dateofbirth) && !empty($phonenb) && !empty($datejoin)){
        $c=addRescuer($nickname,$firstname,$lastname,$dateofbirth,$phonenb,$datejoin,$gender);
        if($c>0){
            header('location:ManageRescuerView24.php');
        }
        else{
            header('location:ManageRescuerView24.php');
        }
        // require("ManageRescuerView.php");
    }
}
// require("ManageRescuerView.php");


// if (isset($_POST["update-1"])){     // 'update-".$i."'  in for loop $i variable
//     $nickname=$_POST["nickname-1"];
//     $firstname=$_POST["fname-1"];
//     // require("ManageRescuerModel.php");  // includes $nb number of rows
//     updateRescuer($nickname,$firstname);
//     echo $firstname."  updated";
//     // echo $nb;
// }
$res=displayRescuer();
$nb = mysqli_num_rows($res);
for ($x = 1; $x <= $nb; $x++) {
    if (isset($_POST["update-".$x])){
        require("updateSecurity.inc.php");
        
        if($dateleft != NULL ){
            $c=updateRescuer($nickname,$firstname,$lastname,$dateofbirth,$phonenb,$datejoin,$dateleft,$function,$gender);
            header('location:ManageRescuerView24.php');
            }
            // if ($c>0){
            // }
            else{              
                 $c=updateRescuer1($nickname,$firstname,$lastname,$dateofbirth,$phonenb,$datejoin,$function,$gender);
                header('location:ManageRescuerView24.php?case='.$gender);
            }
        // else{
        //     $c=updateRescuer2($nickname,$firstname,$lastname,$dateofbirth,$phonenb,$datejoin,$function);
        //     header('location:ManageRescuerView24.php');
        // }
    }
}
for ($x = 1; $x <= $nb; $x++) {
    if (isset($_POST["delete-".$x])){
        $nickname=$_POST["nickname-".$x];
        $c=deleteRescuer($nickname);
        header('location:ManageRescuerView24.php');
    }
}
// for ($x = 1; $x <= 27; $x++) {
//     if (isset($_POST["update-".$x])){
//         $nickname=$_POST["nickname-".$x];
//         $firstname=$_POST["firstname-".$x];
//         $lastname=$_POST["lastname-".$x];
//         $dateofbirth=$_POST["dateofbirth-".$x];
//         $phonenb=$_POST["phonenb-".$x];
//         $datejoin=$_POST["datejoin-".$x];
//         $dateleft=$_POST["dateleft-".$x];
//         $c=updateRescuer($nickname,$firstname,$lastname,$dateofbirth,$phonenb,$datejoin,$dateleft);
//         if ($c>0){
//             header('location:ManageRescuerView24.php?Case="Done"');
//         }
//         //echo $firstname."  updated   ".$lastname.".........".$dateofbirth."...........".$phonenb."............".$datejoin;
//     }
// }







//.
//.
//.
//.
//.
//.
//.
//.
//.
//.
//.
//.

// require("ManageRescuerModel.php");  //    !!!!

// if (isset($_POST["insertrescuer"])){

//     // require("ManageRescuerModel.php");
//     //insert
//     $nickname=$_POST["nickname"];
//     $firstname=$_POST["firstname"];
//     $lastname=$_POST["lastname"];
//     $dateofbirth=$_POST["dateofbirth"];
//     $phonenb=$_POST["phonenb"];
//     $datejoin=$_POST["datejoin"];
//     // $dateleft=$_POST["dateleft"]; //we dont need it when we are inserting

//     //$deletebutton=$_POST["deletebutton"];
//     // $insertrescuer=$_POST["insertrescuer"];

//     if( !empty($nickname) && !empty($firstname) && !empty($lastname) && !empty($dateofbirth) && !empty($phonenb) && !empty($datejoin)){
//         addRescuer($nickname,$firstname,$lastname,$dateofbirth,$phonenb,$datejoin);
//         // require("ManageRescuerView.php");
//     }
// }
// // require("ManageRescuerView.php");


// // if (isset($_POST["update-1"])){     // 'update-".$i."'  in for loop $i variable
// //     $nickname=$_POST["nickname-1"];
// //     $firstname=$_POST["fname-1"];
// //     // require("ManageRescuerModel.php");  // includes $nb number of rows
// //     updateRescuer($nickname,$firstname);
// //     echo $firstname."  updated";
// //     // echo $nb;
// // }

// for ($x = 1; $x <= $nb; $x++) {
//     if (isset($_POST["update-".$x])){
//         $nickname=$_POST["nickname-".$x];
//         $firstname=$_POST["fname-".$x];
//         $lastname=$_POST["lname-".$x];
//         $dateofbirth=$_POST["dob-".$x];
//         $phonenb=$_POST["phoneNb-".$x];
//         $datejoin=$_POST["doj-".$x];
//         $dateleft=$_POST["dol-".$x];
//         $function=$_POST["function-".$x];
//         updateRescuer($nickname,$firstname,$lastname,$phonenb,$function);
//         echo $firstname."  updated   ".$lastname.".........".$dateofbirth."...........".$phonenb."............".$datejoin."..........function ".$function;
//     }
// }

// // require("ManageRescuerView.php");

?>