<?php
  require_once("AccountManagement_Modal.php");
//////////////////////Admin\\\\\\\\\\
	include('DBconnection.inc.php');
      if(isset($_POST["addnewAdmin"])){
        $usernameAdmin=htmlspecialchars($_POST['username']);
        $usernameAdmin=mysqli_real_escape_string($conn,$usernameAdmin);
        $passwordAdmin=htmlspecialchars($_POST['password']);
        $passwordAdmin=mysqli_real_escape_string($conn,$passwordAdmin);
    if($usernameAdmin==""){ header('location:AccountManagement_view.php?Error=Error  Admin Username is Empty!');return false;}
    if($passwordAdmin==""){
      header('location:AccountManagement_view.php?Error=Error  Admin password is Empty!'); return false;}
      if(strlen($passwordAdmin)<4){
        header('location:AccountManagement_view.php?Error=Error  Password <4!');
        return false;
      }

      $resAd=insertAdmin($usernameAdmin,$passwordAdmin);

    if($resAd){
        echo"success";
        header('location:AccountManagement_view.php');

    }
    else{
        echo"Error";
    }
      }
//****Delete Admin */
      if(isset($_POST["DeleteIdAdmins"])){
        $idAdmin=htmlspecialchars($_POST["DeleteIdAdmins"]);
        $idAdmin=mysqli_real_escape_string($conn,$idAdmin);
      $delete=deleteAdmin($idAdmin);
        if($delete){
            echo "Delete successesfully";
            header('location:AccountManagement_view.php');
  
        }
        else{
            echo"Error";
 
        }
      }
//****Update Admin */
      if(isset($_POST["updateAdmin"])){
            $userID=htmlspecialchars($_POST["updateAdmin"]);
            $userID=mysqli_real_escape_string($conn,$userID);
            $AdminUser=htmlspecialchars($_POST["Adminusername"]);
            $AdminUser=mysqli_real_escape_string($conn,$AdminUser);
            $Adminpssd=htmlspecialchars($_POST["Adminpassword"]);
            $Adminpssd=mysqli_real_escape_string($conn,$Adminpssd);
            if(strlen($Adminpssd)<4){
              header('location:AccountManagement_view.php?Error=Error  Password <4!');
              return false;
            }
             $updateAdmin=updateAdmin($AdminUser,$Adminpssd,$userID);
            if($updateAdmin){
                //echo "Successful Update :";
                header("location:AccountManagement_view.php");
            }
            else{
                echo "Error";
            }
      }

//////////////////////Rescuer \\\\\\\\\\

// ................Rescuer Insert ................
if(isset($_POST["addnewRescuer"])){
    $usernameRescuer=htmlspecialchars($_POST['usernameRescuer']);
    $usernameRescuer=mysqli_real_escape_string($conn,$usernameRescuer);
    $passwordRescuer=htmlspecialchars($_POST['passwordRescuer']);
    $passwordRescuer=mysqli_real_escape_string($conn,$passwordRescuer);

$rescuer_nickname= filter_input(INPUT_POST, 'SelectNickname', FILTER_SANITIZE_STRING);

$rescuer_nickname=htmlspecialchars($_POST['SelectNickname']);
$rescuer_nickname=mysqli_real_escape_string($conn,$rescuer_nickname);

if($rescuer_nickname==""){
  header('location:AccountManagement_view.php?Error=Error Nickname not selected!');echo "password is empty"; return false;}

if($usernameRescuer==""){
  header('location:AccountManagement_view.php?Error=Error Rescuer username is Empty!');

   return false;}
if($passwordRescuer==""){
  header('location:AccountManagement_view.php?Error=Error Rescuer password is Empty!'); 
  return false;}
  if(strlen($passwordRescuer)<4){
    header('location:AccountManagement_view.php?Error=Error  Password <4!');
    return false;
  }
$resInsertRescuer=insertRescuer($usernameRescuer,$passwordRescuer,$rescuer_nickname);
if($resInsertRescuer){
    echo"successfully inserted";
   header('location:AccountManagement_view.php');

}
else{
    echo"Error";
}
}
// ................Rescuer Update ................

if(isset($_POST["updateRescuer"])){
    $userIDResc=htmlspecialchars($_POST["updateRescuer"]);
    $userIDResc=mysqli_real_escape_string($conn,$userIDResc);
    $RescuerUser=htmlspecialchars($_POST["Rescuerusername"]);
    $RescuerUser=mysqli_real_escape_string($conn,$RescuerUser);
     $Rescuerpssd=htmlspecialchars($_POST["Rescuerpassword"]);
     $Rescuerpssd=mysqli_real_escape_string($conn,$Rescuerpssd);
     if(strlen($Rescuerpssd)<4){
      // header('location:AccountManagement_view.php?Error=Error Password <4!');
      echo "<script>alert('Error rescuer password is less than 4,Failed to update');</script>";
      return false;
    }
     $updateRescuer=updateRescuer($RescuerUser,$Rescuerpssd,$userIDResc);
    if($updateRescuer){
        echo "<script>console.log('Updated');</script>";
    }
    else{
        echo "<script>console.log('Error')</script>";
    }
}

// ................Rescuer Delete ................
if(isset($_POST["DeleteIdRescuer"])){
    $idRescuer=htmlspecialchars($_POST["DeleteIdRescuer"]);
    $idRescuer=mysqli_real_escape_string($conn,$idRescuer);
  $deleteRescuer=deleteRescuer($idRescuer);
    if($deleteRescuer){
        //echo "Delete successesfully";
      //  header('location:AccountManagement_view.php');

    }
    else{
        echo"<script>console.log('Error')</script>";

    }
  }

    ?>