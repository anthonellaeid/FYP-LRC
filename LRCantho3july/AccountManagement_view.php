<?php session_start();
if(!isset($_SESSION["login"]))
	header("location:index.php");
?>
<!DOCTYPE html>
<head>
    <title>Account Management</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/AccountManagement.css">

 <script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script> 

</head>
<style>
.search{
  border-bottom: 1px solid #ae1d34;
  margin-right:5px;
}
select{
  padding: 2px 6px;
  border-radius: 10%;
  background-color: #f1f1f1;
}

/***************************** */
/* Popup container - can be anything you want */
.popup {
        position: relative;
        display: inline-block;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        }


        /* The actual popup */
        .popup .popuptext {
        visibility: hidden;
        width: 150px;
        background-color: #f4f0f5;
        color: red;
        text-align: center;
        border-radius: 6px;
        padding: 8px 0;
        position: absolute;
        z-index: 1;
        top:10%;
        
        /* bottom: 125%;
        left: 70%;
        margin-left: -80px; */
        }


        /* Popup arrow */
        .popup .popuptext::after {
        content: "";
        position: absolute;
        /* top: 100%;
        left: 70%;
        margin-left: 14px; */
        /* margin-left: 5%;  */
        border-width: 5px;
        border-style: solid;
        border-color: transparent transparent transparent transparent;
        }


        /* Toggle this class - hide and show the popup */
         .popup .show {
        visibility: visible;
        -webkit-animation: fadeIn 1s;
        animation: fadeIn 1s;
        }


        /* Add animation (fade in the popup) */
        @-webkit-keyframes fadeIn {
            from {opacity: 0;} 
            to {opacity: 1;}
        }

         @keyframes fadeIn {
            from {opacity: 0;}
            to {opacity:1 ;}
        }  

  </style>
<body>
<!-- primar navbar -->
<ul class="nav fixed-bottom mr-auto mt-2 mt-lg-0 justify-content-center">
  <li style="color:red;"><img src="ico/Account.png" width="50px">Account Management</li>
   <li style="margin-top:4px;margin-left:5px;">  <a class="nav-link " href="settings.php">Settings </a>  </li>
   <li class="nav-item" style="margin-top:4px;"> <a class="nav-link " href="logout.php">Log out  </a>  </li>
</ul>
<!-- second navbar -->
<ul class="nav nav-pills nav-fill fixed-top">
   <li class="nav-item">
    <a class="nav-link " href="#admin">Administrator's Account</a>
   </li>
      <li class="nav-item">
    <a class="nav-link " href="AccountManagement_view.php">Rescuer's Account</a>
   </li>

</ul>
<!-- End of navigations-->

<br><br><br>


<div class="row" >
  <div class="popup" >
       <span class="popuptext" id="myPopup">
        <i class="fa fa-exclamation-triangle" aria-hidden="true"></i><b>&emsp;Please select Nickname</b></span>
  </div>

  <div class="column left" style="background-color:#f5e6e8; border:2px solid #ae1d34; margin-top:100px;">
 
  <h3 id="rescuers"><img src="ico/acc.jpg" alt="Rescuers" width="70px" border-round="5px">Register New Rescuers</h3>
      <hr>
    
    <form method="POST" action="AccountManagement_Control.php">

      <div class="col-12">
        <label>Select Nickname</label>&nbsp;
        <select id="SelectNickname" name="SelectNickname"> <option selected></option>
          <?php
            require_once("AccountManagement_Modal.php");
              if($ru=mysqli_num_rows($resUser1)>0){
              while($u=mysqli_fetch_assoc($resUser1)){
              echo "<option value='".$u["rescuer_nickname"]."'>".$u["rescuer_nickname"]."</option>";
              } 
            }
              else{

              }
              ?>
        </select>
       <br>
        <label class="visually-hidden" for="inlineFormInputGroupUsername"></label>
        <div class="input-group">
          <div class="input-group-text">Username</div>
          <input type="text" class="form-control rescuerUsername" name="usernameRescuer" required id="RegisterUsernameRescuer" >
        </div>

          <label class="visually-hidden" for="inlineFormInputGroupUsername"></label>

        <div class="input-group">
          <div class="input-group-text">Password</div>
          <input type="Password" placeholder="Must be 4-10 characters long."class="form-control" name="passwordRescuer" required  id="passwordRescuer" >
        </div>

          <br>
        <div class="col-12">
          <button style="float:right; background-color:#ae1d34;border-color:#ae1d34;" 
            name="addnewRescuer"  type="submit" onclick="submitButtonClick(event)" class="btn btn-primary">Submit</button>
        </div>

      </div>
    </form>

  </div>


                <!--RESCUERS ACCOUNT TABLE -->
  <div class="column right" >
    <h3>Rescuer's Account</h3>
    <button style="float:right; margin-left:1%;" class='btn btn-outline-dark btn-sm' 
              name="btnClear" onclick="Clear()" id="btnClear">Reset</button>
    <form method="POST" action="AccountManagement_view.php">

      <button style="float:right;" class='btn btn-outline-dark btn-sm' name="btnFilter" id="btnFilter">Go</button>
      <input type="text" required placeholder="Search nickname" class="search" style="float:right;" id="filter" name="filter"tabindex="0" />
      <br><br>
            

      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">Nickname</th>
            <th scope="col">Username</th>
            <th scope="col">Password</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <?php
            require("AccountManagement_Control.php");
            $Rescuers="SELECT `username`, `password`, `nickname`,`user_id` FROM `accounts` Where";
            if(isset($_POST["filter"]) && isset($_POST["btnFilter"])){

              echo "<script>console.log('".$_POST['filter']."'); </script>";
              $request=htmlspecialchars($_POST['filter']);
              $request=mysqli_real_escape_string($conn,$request);
              $Rescuers.=" lower(nickname) REGEXP '".strtolower($request)."' and";
                                                                          }
            $Rescuers .="`roles`=0 order by user_id DESC;";
            $RescuerRes=mysqli_query($conn,$Rescuers);

            while($rescuer=mysqli_fetch_assoc($RescuerRes)){
              echo "  </form>   <form method='POST' action='AccountManagement_view.php' > <tr>
                          <td   ><input value='".$rescuer['nickname']."' readonly name='Rescuernickname'></td>
                          <td   ><input value='".$rescuer['username']."' contenteditable name='Rescuerusername'></td>
                          <td  ><input value='".$rescuer['password']."' contenteditable name='Rescuerpassword'> </td>
                          <td>
                        <input type='hidden' name='updateRescuer' value='".$rescuer['user_id']."'>
                        <input type='submit' class='btn btn-outline-dark btn-sm'  value='Update Rescuer'></td>
      
      
                          <td>       <button style='float:right; background-color:#ae1d34;border-color:#ae1d34;'
                        id='DeleteIdRescuer' name='DeleteIdRescuer' value='".$rescuer['user_id']."' type='submit' 
                        class='btn btn-primary'>Delete</button>
                          </td>

                        </tr>
                      </form>  "; }
          ?>
        </tbody>
      </table>



      
  </div>
</div> 

<hr>

<!--//////////////////////////////////////////////////////////////////Administrator\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
<br><br><br>

<div class="row">
  <div class="column left" style="background-color:#f5e6e8; border:2px solid #ae1d34; margin-top:100px;">
    <h3><img src="ico/admin_icon.jfif" alt="Admin" width="70px" border-round="5px">Register New Administrator</h3>
    <hr>
    
    <form method="POST" action="AccountManagement_Control.php">

      <div class="col-12">
      <br>

        <label class="visually-hidden" for="inlineFormInputGroupUsername"></label>
        <div class="input-group ">
          <div class="input-group-text" >Username</div>
          <input type="text" name="username" required class="form-control user2" id="usernameAdmin" >
        </div>
    
        <label class="visually-hidden" for="inlineFormInputGroupUsername"></label>
        <div class="input-group pass2">
          <div class="input-group-text" >Password</div>
          <input type="Password" required placeholder="Must be 4-10 characters long." name="password" class="form-control pass2" id="passwordAdmin" >
        </div>
        <br>
        <div class="col-12">
          <button style="float:right; background-color:#ae1d34;border-color:#ae1d34; " id= "addnewAdmin" name="addnewAdmin" type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
   
      </div>
  </div>

            
  <div class="column right" >
    <h3 id="admin">Admin's Accounts</h3>
    <table class="table table-bordered" style="margin-top:55px;">
      <thead>
      <tr>
       <th scope="col">Username</th>
        <th scope="col">Password</th>
        <th scope="col"></th>
        <th scope="col"></th>

      </tr>
      </thead>
      <tbody>
        <?php
          while($ads=mysqli_fetch_assoc($AdminRes)){
            echo "<form method='POST' action='AccountManagement_Control.php'>

              <tr>
                    <td  data-id1='".$ads['user_id']."' ><input value='".$ads['username']."' contenteditable name='Adminusername' class='no-outline'></td>
                    <td  data-id2='".$ads['user_id']."'><input value='".$ads['password']."' contenteditable name='Adminpassword' class='no-outline'> </td>
                    <td>
                      <input type='hidden' name='updateAdmin' value='".$ads['user_id']."'>
                      <input type='submit' id='updateAdmin' class='btn btn-outline-dark btn-sm' name='update-admin' value='Update'></td>     
                   
                    <td>  <button style='float:right; background-color:#ae1d34;border-color:#ae1d34;' id='DeleteIdAdmins' 
                      name='DeleteIdAdmins' value='".$ads['user_id']."' type='submit' class='btn btn-primary'>Delete</button>
                    </td>
                  </tr>";    }
         ?>

      </tbody>
    </table>



      
  </div>
</div>
</form>
<br><br><br>


</body>
</html>
<script>

function Clear()
{
    window.location ="AccountManagement_view.php" ;
}

function submitButtonClick(event)
{
   

    var SelectNickname = document.getElementById("SelectNickname");
    var selectedText = SelectNickname.options[SelectNickname.selectedIndex].innerHTML;
    var passwordRescuer=document.getElementById("passwordRescuer").value;

    if(selectedText==""){
      // alert('Please Select Nickname'+selectedText);
      var popup = document.getElementById("myPopup");
      var pop=document.getElementById("myPopup").innerHTML="Please Select Nickname";
     popup.classList.toggle("show");
      event.preventDefault();
    }else{
    if(passwordRescuer.length<4 && passwordRescuer.length>0){

      // alert('Error Password Length is <4');
      event.preventDefault();
      var popuptext = document.getElementById("myPopup");
      var popups=document.getElementById("myPopup").innerHTML="Password<4";
       popuptext.classList.add("show");
     return false;

    }
  }
}
  </script>
