<?php
  session_start();
 //echo"<script> alert(".$_SESSION['rescuer_id'].")</script>";
 require_once("PcrDraftModel.php");

 if(isset($_GET['mission_id'])){$_SESSION['GetIdMission']=htmlspecialchars($_GET['mission_id']);
                                $_SESSION['GetIdMission']  = mysqli_real_escape_string($conn,$_SESSION['GetIdMission']);
     //echo"<script>alert('".$_SESSION['GetIdMission']."')</script>";
}

  if (!isset($_SESSION['User'])) {
      header("Location:LogIn.php");
  }?>
  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <!-- <link href="multiselect.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Mission</title>

    <style>
        *{
            font-family:sans-serif;
        }
        body{
            background-image: linear-gradient(rgba(0,0,0,0.8),rgba(0,0,0,0.8)),url(what.jpg);
            background-position: center;
            background-size: cover;
        }
        .container{
            width:480px;
            /* itsyBitsySpider */
            height:700px;
            /* itsyBitsySpider */
            margin: 2% auto;
            background: #fff;
            border-radius: 8px;
            position: relative;
            overflow:hidden;
        }
        .container table{
            
            width: 480px;
            
            position: absolute;
            top: 50px;
            left: 40px;
            transition:0.2s;
        }
        input{
            width:60%;
            padding: 10px 5px;
            margin: 5px 0;
            border: 0;
            border-bottom: 1px solid #999;
            outline: none;
            background: transparent;
        }
        ::placeholder{
            color: #777;
        }
        
        .btn-box{
            width:100%;
            margin-top: 30px;
            text-align:center;
        }
        
        button{
            width:110px;
            height:30px;
            /* margin:0 10px; */
            background: linear-gradient(to right,black,red);
            border-radius:10px;
            border:0;
            outline:none;
            color:#fff;
            cursor:pointer;
        }
        .nextbtn{
            width:110px;
            height:30px;
            /* margin:0 10px; */
            background: linear-gradient(to right,black,red);
            border-radius:10px;
            border:0;
            outline:none;
            color:#fff;
            cursor:pointer;
        }
                    /* itsyBitsySpider */
        .Cancelbtn{
            width:110px;
            height:30px;
            margin-right:50px; 
            background: white;
            color:black;
            border-radius:5px;
            border:1px solid black;
            outline:none;
            /* color:red; */
            float: right;
            cursor:pointer;
        }
        .Draftbtn{
            width:110px;
            height:2%;;
             margin-right:50px; 
            background: linear-gradient(to right,black,black);
            border-radius:10px;
            border:1px solid black;
            outline:none;
           float: right;
            cursor:pointer;
            padding-bottom:3%;
            text-align:center;
        }
            /* itsyBitsySpider */
        #form2{
            left:600px;
        }
        #form3{
            left:600px;
        }
        #form4{
            left:600px;
        }
        .step-row{
            width:480px;
            height:40px;
            margin:0 auto;
            display:flex;
            align-items:center;
            box-shadow:0 -1px 5px -1px #000;
            position:relative;
        }
        .step-col{
            width:120px;
            text-align:center;
            color:#333;
            position:relative;
        }
        #progress{
            position:absolute;
            height:100%;
            width:120px;
            background:linear-gradient(to right,#fff,red);
            transition:1s;
        }
        #progress::after{
            content:'';
            height:0;
            width:0;
            border-top: 20px solid transparent;
            border-bottom: 20px solid transparent;
            position: absolute;
            right: -20px;
            top: 0;
            border-left:20px solid red;
        }

        .divScroll {
                        /* itsyBitsySpider */
            height: 600px;   
                        /* itsyBitsySpider */       
            -ms-overflow-style: none; 
            scrollbar-width: none;
            overflow-y: scroll; 
        }
        .divScroll::-webkit-scrollbar {
            display: none; 
        }
        h4{
            text-align: center;
        }
        .locationradio{
            width:5%;
            margin: 0px;
        }
        label,select{
            margin-top:10px;
            margin-bottom:10px;
        }
        .ddl{
            padding-left=20px;
        }
        .patient2{
            padding-top:40px;
            display:none;
        }
        .btnpatient2{
            background:black;
            color: white;
            border-radius:0px;
            border:0;
        }
        textarea {
            width: 55%;
            /*margin-left:7%;   /**29.5% */
            border-radius: 4px;
            font-size: 16px;
            font-weight: bold;
            resize: none;
        }



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
        width: 400px;
        background-color: transparent;
        color: red;
        text-align: center;
        border-radius: 6px;
        padding: 8px 0;
        position: absolute;
        z-index: 1;
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
 
.Bitsy{
position:absolute;
bottom:0px;
text-align: center; 

}  
.Back{
            width:110px;
            height:30px;
            /* margin:0 10px; */
            background: transparent;
            border-radius:10px;
            border:1px solid white;
            outline:none;
            color:#ccc;
            cursor:pointer;
        }
hr { 
    border: 0; 
    border-top: 2px solid #ffcccc; 
    width: 400px;
}
   
    </style>
</head>

<body>
    <?php
        require_once("PcrDraftModel.php");
    ?>
    <!--  -->
<button onclick="location.href='index.php';" class='Back'>Go Back</button>
<!--  -->
    <div class="container">

    <form action="PcrDraftController.php" method="POST">

            <table id='form1'>
                <tr>
                    <td>
                        <div class='divScroll'>
                            <h3>New PCR </h3>

                            <label><strong> Mission type:</strong></label>
                            <select name='mission_type' id='mission_type' >
                                    <option style="display:none" value=""></option>
                                <?php 
                                    while($o=mysqli_fetch_array($result1)){
                                        echo "<option value='".$o['mission_type_code']."' ";
                                        $ResType=mysqli_num_rows($ResultGetSelectedTypeMission);
                                        if($ResType>0){
                                            while($ResType1=mysqli_fetch_assoc($ResultGetSelectedTypeMission)){             
                                                if($o['mission_type_code']==$ResType1['mission_type_code']){
                                                    echo ' selected';
                                                }
                                            }mysqli_data_seek( $ResultGetSelectedTypeMission, 0 );
                                        }
                                        echo ">".$o['mission_type_desc']."</option>";
                                    }
                                ?>
                            </select>
                            <br>

                            <label><strong>Medical Case:</strong></label>&emsp;
                            <select name='medical_case[]' id='medical_case' multiple='multiple' style="margin-top:25px;">
                                    <option style="display:none" value=""></option>
                                <?php 
                                    while($o=mysqli_fetch_array($result2)){
                                        echo "<option value='".$o['medicalCase_code']."'";
                                        // $ResMed=mysqli_num_rows($ResultGetMissionMedicalCase);
                                        // if($ResMed>0){
                                           while($ResMed1=mysqli_fetch_assoc($ResultGetMissionMedicalCase)){
                                            if($o['medicalCase_code']==$ResMed1['mission_MedicalCase_code']){
                                                echo "selected";
                                            }
                                           }if(mysqli_num_rows($ResultGetMissionMedicalCase)){mysqli_data_seek( $ResultGetMissionMedicalCase, 0 );}
                                          
                                        // }
                                        echo ">".$o['medicalCase_desc']."</option>";
                                        
                                          }
                                ?>
                            </select>
                            <button id='btnAddMedCase' type='button' style="font-weight:bold;background:black;border-radius:4px;width:150px;" onClick='addMedCaseManually()'>Add Med Case</button><br>
                            <br>
                            <form>
                                <textarea id='medcasetxt' name="medcasetxt" class="text1" rows="2" cols="30" maxlength="50" placeholder="Add medical case" style="display:none;"></textarea>
                                <button name='cnlAddMedCase' id='cnlAddMedCase' type='reset' onClick='cnlAddMedCaseManually()' style="display:none;font-weight:bold;color:red;background:#fff;border-radius:4px;margin-left:0px;">Cancel</button>
                            </form>
                            
                            <br>

                                          <hr>
                            <label><strong>Source Location : </strong></label>
                            <select name="sourcetype" id="sourcetype" onchange='fillSource()'>
                                <option style="display:none" value=""></option>
                                <option value="Hospital">Hospital</option>
                                <option value="Event">Event</option>
                                <option value="Other">Other</option>
                            </select>
                            <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                            <button id='btnAddSrc' type='button' style="font-weight:bold;background:black;border-radius:4px;" onClick='addSrcManually()'>Add source</button><br>
                            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                            <select name='source' id='source'></select>
                            &emsp;&emsp;&emsp;&emsp;&emsp;

                            <div id="srctxt"  style="display:none">
                                <select id='select_city1' name="select_city1" style="width:20%;height:20px;">
                                    <option style="display:none;" value="">City...</option>
                                    <?php 
                                        while($o=mysqli_fetch_array($result13)){
                                            echo "<option value='".$o['city_id']."'>".$o['city_name']."</option>";
                                        }
                                        mysqli_data_seek( $result13, 0 );
                                    ?>
                                </select>
                                <p><button name='cnlAddSrc' id='cnlAddSrc' type='button' onClick='cnlAddSrcManually()' style="font-weight:bold;color:red;background:#fff;border-radius:4px;margin-left:-90px;margin-top:40px;">Cancel</button></p>
                                <textarea id='srctxt'  name="srctxt" rows="4" cols="30" maxlength="50" placeholder="Add source location"></textarea>
                            </div>
                            <br>
                                        <hr>
                            <label><strong>Destination : </strong></label>&emsp;&emsp;
                            <select name="desttype" id="desttype" onchange='fillDestination()'>
                                    <option style="display:none" value=""></option>
                                    <option value="Hospital">Hospital</option>
                                    <option value="Event">Event</option>
                                    <option value="Other">Other</option>
                            </select>
                            <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                            <button id='btnAddDest' type='button' style="font-weight:bold;background:black;border-radius:4px;width:27%" onClick='addDestManually()'>Add destination</button><br>
                            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                            <select name='destination' id='destination'></select>
                            &emsp;&emsp;&emsp;&emsp;&emsp;

                            <div id="desttxt" style="display:none">
                                <select id='select_city2' name="select_city2" style="width:20%;height:20px;">
                                    <option style="display:none;" value="">City...</option>
                                    <?php 
                                        while($o=mysqli_fetch_array($result13)){
                                            echo "<option value='".$o['city_id']."'>".$o['city_name']."</option>";
                                        }
                                        mysqli_data_seek( $result13, 0 );
                                    ?>
                                </select>
                                <p><button name='cnlAddDest' id='cnlAddDest' type='button' onClick='cnlAddDestManually()' style="font-weight:bold;color:red;background:#fff;border-radius:4px;margin-left:-90px;margin-top:40px;">Cancel</button></p>
                                <textarea id='desttxt' name="desttxt" rows="4" cols="30" maxlength="50" placeholder="Add destination location"></textarea>
                            </div>
                            <br>
                            
                            <div class='btn-box'>
                                <button id='next1' name='next1' type='button' value="Next" class='nextbtn'>Next <i class='fa fa-arrow-right'></i></button>
                                <!-- <center><button style="background-color:black; color:white; ">Draft</button> </center> -->
                            </div>
                        
                        </div>
                    </td>
                </tr>
            </table>

            <table id='form2'>
                <tr>
                    <td>
                    <div class='divScroll'>
                        <h3>Patient infos</h3>
                        
                       
                        <label><strong>First name:</strong></label>
                        <input type='text' id='patient_firstname' name='patient_firstname' <?php $resPatient=mysqli_num_rows($ResultGetMissionPatient);
                        if($resPatient>0){
                           $resPatient1=mysqli_fetch_assoc($ResultGetMissionPatient); 
                                echo "value=".$resPatient1['patient_firstName'];}mysqli_data_seek( $ResultGetMissionPatient, 0 );
                        
                        ?>
                        placeholder='first name' ><br>

                        <label><strong>Last name:</strong></label>
                        <input type='text' id='patient_lastname' name='patient_lastname' <?php $resPatient=mysqli_num_rows($ResultGetMissionPatient);
                        if($resPatient>0){
                           $resPatient1=mysqli_fetch_assoc($ResultGetMissionPatient);
                        echo "value=".$resPatient1['patient_lastName'];}mysqli_data_seek( $ResultGetMissionPatient, 0 );
                        ?>
                        placeholder='last name' ><br>

                        <label><strong>Date of birth:</strong></label>
                        <input type='date' id='patient_dateofbirth' name='patient_dateofbirth'<?php 
                        $resPatient=mysqli_num_rows($ResultGetMissionPatient);
                        if($resPatient>0){
                           $resPatient1=mysqli_fetch_assoc($ResultGetMissionPatient); 
                        echo "value='".$resPatient1['patient_dateOfBirth']."'";}mysqli_data_seek( $ResultGetMissionPatient, 0 );
                        ?>
                         placeholder='last name' max=''><br>

                        <label><strong>Nationality:</strong></label>
                        <select name='patient_nationality' id='nat'>
                                <option style="display:none" value=""></option>
                                <?php 
                                    while($o=mysqli_fetch_array($result12)){
                                        mysqli_data_seek( $ResultGetMissionPatient, 0 );
                                        echo "<option value='".$o['nationality_code']."'";
                                        $resPatient=mysqli_num_rows($ResultGetMissionPatient);
                                        if($resPatient>0){
                                          $resPatient1=mysqli_fetch_assoc($ResultGetMissionPatient); 
                                        if($resPatient1['patient_nationality']==$o['nationality_code']){
                                            echo "selected";
                                        } }  
                                        echo ">".$o['nationality_desc']."</option>";
                                    }
                                    mysqli_data_seek( $result12, 0 );
                                ?>
                         </select>
                        <br>

                        <label><strong>Relative name:</strong></label>
                        <input type='text' name='patient_relativename' <?php  $resPatient=mysqli_num_rows($ResultGetMissionPatient);
                        if($resPatient>0){mysqli_data_seek( $ResultGetMissionPatient, 0 );mysqli_data_seek( $ResultGetMissionPatient, 0 );
                           $resPatient1=mysqli_fetch_assoc($ResultGetMissionPatient); 
                        echo "value='".$resPatient1['patient_relativeName']."'";}mysqli_data_seek( $ResultGetMissionPatient, 0 );
                        ?>
                        placeholder='relative name' ><br>
                        

                        <button type='button' id='displayPatient2btn' class='btnpatient2' onClick='displayPatient2()' style="margin-top:5%;font-weight:bold;">Patient 2</button>

                        <button type='button' id='cancelPatient2btn' class='btnpatient2' onClick='cancelPatient2()'style="margin-top:5%;font-weight:bold;margin-left:20%;color:red;background-color:white;display:none;">Cancel <i class="fa fa-arrow-down" aria-hidden="true"></i></button>
                        <!-- patient2 -->
                        <div id='idpatient2' class='patient2'>
                            <h3>Patient 2 infos</h3>
                            <label><strong>First name:</strong></label>
                            <input type='text' id='patient_firstname2' name='patient_firstname2' <?php
                            if($resPatient>1){
                                $i=1;
                                mysqli_data_seek( $ResultGetMissionPatient, $i++ );
                                $resPatient2=mysqli_fetch_assoc($ResultGetMissionPatient);
                                        echo "value='".$resPatient2['patient_firstName']."'";}

                            ?> placeholder='first name' ><br>

                            <label><strong>Last name:</strong></label>
                            <input type='text' id='patient_lastname2' name='patient_lastname2' <?php
                            if($resPatient>1){
                                $i=1;
                                mysqli_data_seek( $ResultGetMissionPatient, $i++ );
                                $resPatient2=mysqli_fetch_assoc($ResultGetMissionPatient);
                            echo "value=".$resPatient2['patient_lastName'];}
                            ?> placeholder='last name' ><br>

                            <label><strong>Date of birth:</strong></label>
                            <input type='date' id='patient_dateofbirth2' name='patient_dateofbirth2' <?php
                            if($resPatient>1){
                                $i=1;
                                mysqli_data_seek( $ResultGetMissionPatient, $i++ );
                                $resPatient2=mysqli_fetch_assoc($ResultGetMissionPatient);
                            echo "value='".$resPatient2['patient_dateOfBirth']."'";}
                            ?>
                             placeholder='last name' max=''><br>

                            <label><strong>Nationality:</strong></label>
                            <select id='patient_nationality2' name='patient_nationality2'>
                                    <option style="display:none" value=""></option>
                                    <?php 
                                        while($o=mysqli_fetch_array($result12)){
                                            echo "<option value='".$o['nationality_code']."'";
                                            
                                            if($resPatient>1){
                                                $i=1;
                                                mysqli_data_seek( $ResultGetMissionPatient, $i++ );
                                                $resPatient2=mysqli_fetch_assoc($ResultGetMissionPatient);
                                            if($resPatient2['patient_nationality']==$o['nationality_code']){
                                                echo "selected";
                                            }}
                                            echo">".$o['nationality_desc']."</option>";
                                        }
                                    ?>
                            </select>
                            <br>

                            <label><strong>Relative name:</strong></label>
                            <input type='text' id='patient_relativename2' name='patient_relativename2' <?php
                            if($resPatient>1){
                                $i=1;
                                mysqli_data_seek( $ResultGetMissionPatient, $i++ );
                                $resPatient2=mysqli_fetch_assoc($ResultGetMissionPatient); 
                                echo "value='".$resPatient2['patient_relativeName']."'";}?> placeholder='relative name' >
                        </div>
                        <!--  -->

                        <div class='btn-box'>
                            <button id='prev1' type='button'><i class='fa fa-arrow-left w3-margin-right'></i>Previous</button>
                            <button id='next2' type='button' class='nextbtn'>Next &nbsp&nbsp&nbsp<i class='fa fa-arrow-right'></i></button>
                        </div>
                    </div>
                    </td>
                </tr>
                    
            </table>

            <table id='form3'>
                <tr>
                    <td>
                        <h3>Supplies</h3>
                        <label><strong>The identifier of the taken CM kit</strong></label>&emsp;&emsp;&emsp;&emsp;
                        <select name='cm_kit' id='cm_kit'>
                                <option style="display:none" value=""></option>
                                <?php 
                                    while($o=mysqli_fetch_array($result10)){
                                        echo "<option value='".$o['cm_kit_id']."'";
                                        $ResCm=mysqli_num_rows($ResultGetMissionInfo);
                                        if($ResCm>0){
                                            while($ResCm1=mysqli_fetch_assoc($ResultGetMissionInfo)){
                                                if($o['cm_kit_id']==$ResCm1['cmKitId_mission'])
                                                echo "selected";
                                            }mysqli_data_seek( $ResultGetMissionInfo, 0 );
                                        }
                                        echo ">".$o['cm_kit_id']."</option>";
                                    }mysqli_data_seek( $ResultGetMissionInfo, 0 );
                                ?>
                         </select>
                        <br>
                                    <hr>
                        <label><strong>The identifier of the taken UHF radio kit</strong></label>&emsp;&emsp;&emsp;&emsp;
                        <select name='uhf_radio' id='uhf_radio'>
                                <option style="display:none" value=""></option>
                                <?php 
                                    while($o=mysqli_fetch_array($result11)){
                                        echo "<option value='".$o['uhf_radio_id']."'";
                                        $ResUHF=mysqli_num_rows($ResultGetMissionInfo);
                                        if($ResUHF>0){
                                            while($ResUHF1=mysqli_fetch_assoc($ResultGetMissionInfo)){
                                                if($o['uhf_radio_id']==$ResUHF1['UHFradioId_mission'])
                                                echo "selected";
                                            }mysqli_data_seek( $ResultGetMissionInfo, 0 );
                                        }mysqli_data_seek( $ResultGetMissionInfo, 0 );
                                        echo ">".$o['uhf_radio_id']."</option>";
                                    }
                                ?>
                         </select>
                         <hr>
                        
                        <label><strong>The pressure remaining in the E-tank of O2</strong></label><input type="number"id='etank' name='etank' <?php
                        $ResTank=mysqli_num_rows($ResultGetMissionInfo);
                        if($ResTank>0)
                        {
                            while($ResTank1=mysqli_fetch_assoc($ResultGetMissionInfo)){ echo "value='".$ResTank1['remaining_E_tank']."'";}
                        }mysqli_data_seek( $ResultGetMissionInfo, 0 );
                        ?> placeholder='E-tank'>
                                               
                        <br>
                        <label><strong>The pressure remaining in the D-tank of O2</strong></label><br><input type="number" id='dtank' name='dtank' <?php
                        $ResTankD=mysqli_num_rows($ResultGetMissionInfo);
                        if($ResTankD>0)
                        {
                            while($ResTankD1=mysqli_fetch_assoc($ResultGetMissionInfo)){ echo "value='".$ResTankD1['remaining_D_tank']."'";}
                        }mysqli_data_seek( $ResultGetMissionInfo, 0 );
                        ?>   placeholder='D-tank'>

                        <br>
                        <label><strong>The pressure remaining in the M-tank of O2</strong></label><br><input type="number" id='mtank' name='mtank' <?php
                        $ResTankM=mysqli_num_rows($ResultGetMissionInfo);
                        if($ResTankM>0)
                        {
                            while($ResTankM1=mysqli_fetch_assoc($ResultGetMissionInfo)){ echo "value='".$ResTankM1['remaining_M_tank']."'";}
                        }mysqli_data_seek( $ResultGetMissionInfo, 0 );
                        ?>   placeholder='M-tank'>
                    <div class="btn-box">
                        <button id='prev2' type='button'><i class='fa fa-arrow-left w3-margin-right'></i>Previous</button>
                        <button id='next3' type='button' class='nextbtn'>Next &nbsp&nbsp&nbsp<i class='fa fa-arrow-right'></i></button>
                    </div>
                    </td>
                </tr>
                    
            </table>

            <table id='form4'>
                
                <tr>
                    <td><div class='divScroll'>
                        <!-- <h3>View4</h3> -->
                        <?php $rMission=mysqli_fetch_assoc($ResultGetMissionInfo);  $startDate = date("c", strtotime($rMission['mission_start_date'])); echo "<script>console.log('".$startDate."');</script>";
                            list($Date)=explode('+', $startDate); $startDate = $Date;?>
                        <label ><strong>Date :</strong><input  value="<?php echo date('Y-m-d',strtotime($startDate));?>" id="currentDay" readonly name="currentDay"></label>&emsp;&emsp;&emsp;&emsp;&emsp;
                        <hr><label><strong><br>Start: <span ><input id='currentHour' name="currentHour" type='time' value="<?php echo date("H:i:s",strtotime($startDate));?>" min=""></span></strong></label>
                            <?php
                           // echo "<script>console.log('".date('Y-m-d',strtotime($startDate))." '+'".date('H:i:s',strtotime($startDate))."');</script>";
                                // $endDate = date("c", strtotime($rMission['mission_end_date']));
                                // list($Date)=explode('+', $endDate);
                                // $endDate = $Date;                        
                            ?>
                        <!-- <label><strong><br>End:<span id='EndTime'><input type='datetime-local' name="endDate" id="endDate" value="<?php echo date("Y-m-d\TH:i", strtotime($rMission['mission_end_date']));;?>" ></span></strong></label><br> -->
                       <hr> <br><label><strong>Shift: <span><input readonly value="<?php echo $rMission['mission_shift_code'];?>" id='shift' name="shift"></span></strong></label><br>
                        
                      <hr>  <label><strong>Ambulance:</strong></label><br>
                            <select name='ambulance' id='ambulance'>
                                    <option style="display:none" value=""></option><br>
                                <?php 
                                    while($o=mysqli_fetch_assoc($result3)){
                                        echo "<option value='".$o['ambulance_id']."'";
                                            $Resamb=mysqli_num_rows($ResultGetMissionAmbulance);
                                            if($Resamb>0){
                                                while($Resamb1=mysqli_fetch_assoc($ResultGetMissionAmbulance))
                                                if($o['ambulance_id']==$Resamb1['ambulance_id']){
                                                    echo "selected";
                                                }mysqli_data_seek( $ResultGetMissionAmbulance, 0 );
                                            }


                                        echo">".$o['ambulance_plateNb']." - ".$o['ambulance_description']."</option>";
                                    }
                                ?>
                            </select>
                            <br>
                            <hr>
                            <label><strong>Driver :</strong></label>
                            <select name='driver' id='driver'>
                                    <option style="display:none" value=""></option>
                                <?php 
                                    while($o=mysqli_fetch_array($result4)){
                                        echo "<option value='".$o['rescuer_id']."'";
                                        $Resrescuer=mysqli_num_rows($ResultGetMissionRescuersDriver);
                                        if($Resrescuer >0){
                                            while($Resrescuer1=mysqli_fetch_assoc($ResultGetMissionRescuersDriver)){
                                                if($Resrescuer1['rescuer_id']==$o['rescuer_id']){
                                                    echo "selected";
                                                }
                                            }mysqli_data_seek( $ResultGetMissionRescuersDriver, 0 );
                                        }
                                        echo">".$o['rescuer_firstName']." ".$o['rescuer_lastName']."</option>";
                                    }
                                ?>
                            </select>
                            <br>
                            
                            <label><strong>Leader :</strong></label>
                            <select name='leader' id='leader'>
                                    <option style="display:none" value=""></option>
                                <?php 
                                    while($o=mysqli_fetch_array($result5)){
                                        echo "<option value='".$o['rescuer_id']."'";
                                        $ResrescuerL=mysqli_num_rows($ResultGetMissionRescuersLeader);
                                        if($ResrescuerL >0){
                                            while($ResrescuerL1=mysqli_fetch_assoc($ResultGetMissionRescuersLeader)){
                                                if($ResrescuerL1['rescuer_id']==$o['rescuer_id']){
                                                    echo "selected";
                                                }
                                            }mysqli_data_seek( $ResultGetMissionRescuersLeader, 0 );
                                        }
                                        echo">".$o['rescuer_firstName']." ".$o['rescuer_lastName']."</option>";
                                    }
                                ?>
                            </select>
                            <br>
<!-- ↓ //itsyBitsySpider Begin EMT update ↓ ----->  
<label><strong>EMT :   </strong></label>
                            <select name='emt' id='emt'>
                                    <option style="display:none" value=""></option>
                                <?php 
                                    while($o=mysqli_fetch_array($result6)){
                                        echo "<option value='".$o['rescuer_id']."'";
                                        $ResrescuerEMT=mysqli_num_rows($ResultGetMissionRescuersEMT);
                                        if($ResrescuerEMT >0){if($ResrescuerEMT>1){mysqli_data_seek( $ResultGetMissionRescuersEMT,1 );}
                                            $ResrescuerEMT1=mysqli_fetch_assoc($ResultGetMissionRescuersEMT);
                                                if($ResrescuerEMT1['rescuer_id']==$o['rescuer_id']){
                                                    echo "selected";
                                                }
                                                mysqli_data_seek( $ResultGetMissionRescuersEMT,0 );
                                        }
                                        echo">".$o['rescuer_firstName']." ".$o['rescuer_lastName']."</option>";
                                    }mysqli_data_seek( $result6, 0 );
                                ?>
                            </select>                             <button type="button" style="background:black;border-radius:4px;width:80px;margin-left:70px;" onclick="addEMT2()">+ EMT</button>

                            
                            <div id="divemt2" style="background-color:pink;display:none;">
                                    <label><strong>EMT :  </strong></label>&nbsp&nbsp
                                    <select name='emt2' id='emt2'>
                                            <option style="display:none" value=""></option>
                                        <?php 
                                            while($o=mysqli_fetch_array($result6)){
                                                echo "<option value='".$o['rescuer_id']."'";
                                                mysqli_data_seek( $ResultGetMissionRescuersEMT,0 );
                                                $ResrescuerEMT2=mysqli_num_rows($ResultGetMissionRescuersEMT);
                                                
                                        if($ResrescuerEMT2>1){mysqli_data_seek( $ResultGetMissionRescuersEMT, 2 );
                                            $ResrescuerEMT102=mysqli_fetch_assoc($ResultGetMissionRescuersEMT);
                                                if($ResrescuerEMT102['rescuer_id']==$o['rescuer_id']){
                                                    echo "selected";
                                                }
                                            }
                                        
                                                
                                                echo ">".$o['rescuer_firstName']." ".$o['rescuer_lastName']."</option>";
                                            }
                                            mysqli_data_seek( $result6, 0 );
                                        ?>
                                    </select>
                                    <button type="button" style="background:black;border-radius:4px;width:80px;margin-left:70px;display:inline;margin-top:5px;" onclick="addEMT3()">+ EMT</button>
                                    <button type="button" id="cancelEmt2" onclick="cnclEmt2()" style="font-weight:bold;color:red;background:#fff;border-radius:4px;margin-left:10px;margin-top:5px;width:85px;">cancel</button>
                            </div>
                            <div id="divemt3" style="background-color:lightblue;display:none;">
                                    <label><strong>EMT :   </strong></label>&nbsp
                                    <select name='emt3' id='emt3'>
                                            <option style="display:none" value=""></option>
                                        <?php 
                                            while($o=mysqli_fetch_array($result6)){
                                                echo "<option value='".$o['rescuer_id']."'";
                                                mysqli_data_seek( $ResultGetMissionRescuersEMT,0 );
                                                $ResrescuerEMT3=mysqli_num_rows($ResultGetMissionRescuersEMT);
                                        if($ResrescuerEMT3 >2){
                                            mysqli_data_seek( $ResultGetMissionRescuersEMT, 3);
                                            $ResrescuerEMT103=mysqli_fetch_assoc($ResultGetMissionRescuersEMT);
                                                if($ResrescuerEMT103['rescuer_id']==$o['rescuer_id']){
                                                    echo "selected";
                                                }
                                           
                                        }
                                                
                                                echo ">".$o['rescuer_firstName']." ".$o['rescuer_lastName']."</option>";
                                            }
                                            mysqli_data_seek( $result6, 0 );
                                        ?>
                                    </select>
                                    <button type="button" id="cancelEmt3" onclick="cnclEmt3()" style="font-weight:bold;color:red;background:#fff;border-radius:4px;margin-left:10px;margin-top:5px;width:85px;margin-left:34.5%;">cancel</button>
                            </div>
                            <br>
<!-- ↑  //itsyBitsySpider----- Last Edited EMT ↑ -->                                              <hr>
                            <label><strong>Initial mileage : </strong></label><input type="number" id="initial_mileage" name='initial_mileage' <?php
                            mysqli_data_seek( $ResultGetMissionInfo, 0 );
                            while($resMile=mysqli_fetch_assoc($ResultGetMissionInfo)){
                                echo "value='".$resMile['mission_initial_km']."' "; 
                                //  //itsyBitsySpiderMAX----->
                                while($getKM=mysqli_fetch_assoc($ResGetLastkm)){
                                    if(empty($resMile['mission_initial_km'])){
                                        if($getKM['ambulance_id']==$resMile['mission_ambulanceId']){
                                                echo "min='".$getKM['maxKM']."' ";
                                        } 
                                    }                                 //  //itsyBitsySpiderMAX-----> 
                                }
                            }mysqli_data_seek( $ResultGetMissionInfo, 0 );
                            ?> 
                                 placeholder='initial mileage'><br>
                            <label><strong>Final mileage :   </strong></label><input type="number" id='final_mileage' name='final_mileage' <?php
                            while($resMile=mysqli_fetch_assoc($ResultGetMissionInfo)){
                                echo "value='".$resMile['mission_final_km']."'";
                            }mysqli_data_seek( $ResultGetMissionInfo, 0 );
                            ?>
                            placeholder='final mileage' >
                            <br>
                            <!-- <button type="button" onclick="checkkkkkkkk()">bbbbb</button> -->
                            <div class="popup">
                                <span class="popuptext" id="myPopup"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i><b>&emsp;Initial km should be less than final km</b></span>
                            </div>

                        <div class="btn-box">
                            <button id='prev3' type='button'><i class='fa fa-arrow-left w3-margin-right'></i>Previous</button>
                            <button type='submit'  name="savebtn" id="savebtn" onclick="submitButtonClick(event)">Submit</button>
                        </div>                            
                        </div>                

                    </td>
                </tr>
            <!-- //itsyBitsySpider-----> 
          <div class="Bitsy">  <button class='Cancelbtn'style="background-color:black; color:white;  float:right; " formaction="CancelDraftControl.php" name="CancelMission" id="CancelMission">Cancel</button> 
            <!-- <center><button style="background-color:black; color:white;  " class='Cancelbtn' formaction="PCR_Draft_Control.php" name="DraftMission" id="DraftMission">Draft</button> </center> -->
            <!-- <center><input type='submit' style="text-align:center; color:white; padding-top:-30%; " class='Draftbtn' value='Draft'  name="DraftMission" id="DraftMission"> </center> -->
                                </div>
            <!--  //itsyBitsySpider -->                    
            </table>


        </form>
        <!-- </form> -->
        
        <div class="step-row">
            <div id="progress"></div>
            <div class="step-col"><small>Step1</small></div>
            <div class="step-col"><small>Step2</small></div>
            <div class="step-col"><small>Step3</small></div>
            <div class="step-col"><small>Step4</small></div>
        </div>

    </div>

  <script>
    // function checkkkkkkkk(){
    //     var i=document.getElementById("initial_mileage").value;
    //     var f=document.getElementById("final_mileage").value;
    //     if(i>f){
    //         alert(">>>>>>>>>>>");
    //     }
    // }
  </script>

  <script>
                    // check if empty


        function submitButtonClick(event) {
                var addsrc=document.getElementById('source').value; 
                var addDest=document.getElementById('destination').value; 
                var patientFn=document.getElementById('patient_firstname').value;
                var patientLn=document.getElementById('patient_lastname').value;
                var patientDOB=document.getElementById('patient_dateofbirth').value;
                var patientnat=document.getElementById('nat').value;
                var cmKit=document.getElementById('cm_kit').value;
                var radioUHF=document.getElementById('uhf_radio').value;
                var Etank=document.getElementById('etank').value;
                var dtank=document.getElementById('dtank').value;
                var mtank=document.getElementById('mtank').value;
                var ambulance=document.getElementById('ambulance').value;
                var driver=document.getElementById('driver').value;
                var leader=document.getElementById('leader').value;
                var EMT=document.getElementById('emt').value;
                var finalKM=document.getElementById('final_mileage').value;
                var StartKM=document.getElementById('initial_mileage').value;
                var mission_type=document.getElementById('mission_type').value;

                var EMT2=document.getElementById('emt2').value;
                var EMT3=document.getElementById('emt3').value;

                if(EMT!=<?php echo $_SESSION["rescuer_id"];?> && leader!=<?php echo $_SESSION["rescuer_id"];?> && driver!=<?php echo $_SESSION["rescuer_id"];?>){
                    event.preventDefault();
                    alert('As a creator please select your position as rescuer');
                }
            //Compare values of rescuers
                if(driver==leader )
                {event.preventDefault();
                    alert('Attention! \r\n 1.Each Rescuer Can Have One Function At a Time');
                } if (EMT!='' && (driver==EMT || leader==EMT )){
                    event.preventDefault();
                    alert('Attention! \r\n 2.Each Rescuer Can Have One Function At a Time');
                }
                 if (EMT2!='' && (driver==EMT2 || leader==EMT2 || EMT==EMT2 )){
                    event.preventDefault();
                    alert('Attention! \r\n 3.Each Rescuer Can Have One Function At a Time');
                }if(EMT3 !='' &&(driver==EMT3 || leader==EMT3 || EMT == EMT3 ||  EMT2==EMT3  )){
                    event.preventDefault();
                    alert('Attention! \r\n 4. Each Rescuer Can Have One Function At a Time');
                }

                var i=document.getElementById("initial_mileage").value;
                var f=document.getElementById("final_mileage").value;
                if(i>f){
                        event.preventDefault();
                        //other stuff you want to do instead...
                        var popup = document.getElementById("myPopup");
                        popup.classList.toggle("show");
                }

                if(mission_type==5){
                    
                     if(cmKit==''){event.preventDefault(); alert('Please Select CM_kit ');}
                    else if(radioUHF==''){event.preventDefault(); alert('Please Select UHf Radio');}
                    else if(Etank==''){event.preventDefault(); alert('Please Insert Etank remaining percentage');}
                    else if(dtank==''){event.preventDefault(); alert('Please Insert Dtank remaining percentage');}
                    else if(mtank==''){event.preventDefault(); alert('Please Insert Mtank remaining percentage');}
                    else if(driver==''){event.preventDefault(); alert('Please Select the driver.');}
                    else if(leader=='' && EMT==''){event.preventDefault(); alert('Please Select  Leader, EMT.');}
                    else if(addDest!='' || addsrc !=''){ if(ambulance=='' || StartKM=='' || finalKM==''){event.preventDefault();
                        alert('Please fill ambulance info   fields');
                    }}
                    else if(ambulance!='' || StartKM!='' || finalKM!=''){if(addDest=='' || addsrc ==''){
                        event.preventDefault();
                        alert('You forgot to insert source address, destination address');}}
                }
                else if(mission_type==4){
                    
                    var selectedValues="";
                    let selectElement = document.querySelector('#medical_case');
                    selectedValues = Array.from(selectElement.selectedOptions)
                                    .map(option => option.value); // make sure you know what '.map' does
                    console.log(selectedValues);

                    if(selectedValues==""){event.preventDefault();
                                            alert('PLEASE Select Medical Case Value');}
                    else 
                    if(patientFn=='' || patientLn=='' || patientDOB=='' || patientnat==''){
                        event.preventDefault(); alert('Please Fill Patients Information');}
                    else if(cmKit==''){event.preventDefault(); alert('Please Select CM_kit ');}
                    else if(radioUHF==''){event.preventDefault(); alert('Please Select UHf Radio');}
                    else if(Etank==''){event.preventDefault(); alert('Please Insert Etank remaining percentage');}
                    else if(dtank==''){event.preventDefault(); alert('Please Insert Dtank remaining percentage');}
                    else if(mtank==''){event.preventDefault(); alert('Please Insert Mtank remaining percentage');}
                    else if(driver==''){event.preventDefault();alert('Please Select the driver.');}
                    else if(leader==''){event.preventDefault(); alert('Please Select the driver.');}
                    else if(EMT=='')    {event.preventDefault(); alert('Please Select the driver.')};
                }

                else{
                    var selectedValues="";
                    let selectElement = document.querySelector('#medical_case');
                    selectedValues = Array.from(selectElement.selectedOptions)
                                    .map(option => option.value); // make sure you know what '.map' does
                    console.log(selectedValues);

                    if(selectedValues==""){event.preventDefault(); alert('PLEASE Select Medical Case Value');}  
                    else 
                    if(patientFn=='' || patientLn=='' || patientDOB=='' || patientnat==''){event.preventDefault(); alert('Please Fill Patients Information');}
                    else if(cmKit==''){event.preventDefault(); alert('Please Select CM_kit ');}
                    else if(radioUHF==''){event.preventDefault(); alert('Please Select UHf Radio');}
                    else if(Etank==''){event.preventDefault(); alert('Please Insert Etank remaining percentage');}
                    else if(dtank==''){event.preventDefault(); alert('Please Insert Dtank remaining percentage');}
                    else if(mtank==''){event.preventDefault(); alert('Please Insert Mtank remaining percentage');}
                    else if(driver==''){event.preventDefault(); alert('Please Select the driver.');}
                    else if(leader=='' && EMT==''){event.preventDefault(); alert('Please Select the Leader, EMT.');}
                    else if(addDest==''){event.preventDefault(); alert('Please Select Destination.');}
                    else if(addsrc==''){event.preventDefault(); alert('Please Select Source.');}
                    else if(ambulance==''){event.preventDefault(); alert('Please Select Ambulance');}
                    else if(finalKM==''){event.preventDefault(); alert('Please Enter final KM.');}
                    else if(StartKM==''){event.preventDefault(); alert('Please Enter Initial KM.');}

                }


        }

        console.log('Here:');
        console.log('HERE:',document.getElementById('currentHour').value);

document.getElementById('currentHour').onchange=function(){
 var val=document.getElementById('currentHour').value;
 console.log(val);
 
  var req1 = new XMLHttpRequest();
        var method1 = "GET";
        var url1 = "Draft_shiftControl.php?time="+val;
        var asynchronous1 = true;

        req1.open(method1,url1,asynchronous1);
        req1.send();

        req1.onreadystatechange = function(){
            if(req1.readyState == 4 && req1.status == 200){
                // converting json to array
                // var data = JSON.parse(this.responseText);
                // console.log(data);
                document.getElementById('shift').value=req1.responseText;
                document.getElementById('shift').textContent=req1.responseText;
                console.log(req1.responseText);
            }
        }

 
 }
  </script>


    <script src="multiselect.min.js"></script>
    <script>
        function addSrcManually(){
            document.getElementById("srctxt").style.display="flex";
            document.getElementById("btnAddSrc").style.display="none";
            document.getElementById("source").style.display="none";
            document.getElementById("sourcetype").value = "";//////
            document.getElementById("sourcetype").style.display="none";//////
            document.getElementById("source").value = "";//////
        }
        function addDestManually(){
            document.getElementById("desttxt").style.display="flex";
            document.getElementById("btnAddDest").style.display="none";
            document.getElementById("destination").style.display="none";
            document.getElementById("desttype").value = "";//////
            document.getElementById("desttype").style.display="none";//////
            document.getElementById("destination").value = "";//////
        }
        function cnlAddDestManually(){
            const msg =document.getElementById("desttxt");////////////////////?????
            console.log("destination text "+msg.value+" is canceled");////////////?????
            document.getElementById("desttxt").value="";//////?????????????????????????????????????????????????????????????????????????????????????????
            document.getElementById("select_city2").value = "";//////
            document.getElementById("desttype").style.display="inline";//////
            document.getElementById("desttxt").style.display="none";
            var styles = {
                "display": "flex",
                "margin-left": "240px",
                "margin-top": "-36px", 
                "text-align" : "center",
            };
            var obj = document.getElementById("btnAddDest");
            Object.assign(obj.style, styles);
            
            var styles1 = {
                "display": "flex",
                "margin-left": "140px",
                "margin-top": "-36px", 
                "align-items" : "center",
            };
            Object.assign(document.getElementById("destination").style, styles1);
        }
        function cnlAddSrcManually(){
            const msg =document.getElementById("srctxt");////////////////////?????
            console.log("source text "+msg.value+" is canceled");////////////?????
            document.getElementById("srctxt").value="";//////?????????????????????????????????????????????????????????????????????????????????????????
            document.getElementById("select_city1").value = "";//////
            document.getElementById("sourcetype").style.display="inline";//////
            document.getElementById("srctxt").style.display="none";
            var styles = {
                "display": "flex",
                "margin-left": "240px",
                "margin-top": "-36px", 
                "align-items" : "center",
            };
            var obj = document.getElementById("btnAddSrc");
            Object.assign(obj.style, styles);


            var styles1 = {
                "display": "flex",
                "margin-left": "140px",
                "margin-top": "-36px", 
                "align-items" : "center",
            };
            Object.assign(document.getElementById("source").style, styles1);
            
        }

        // add medical case manually
        function addMedCaseManually(){
            document.getElementById("medcasetxt").style.display="inline";
            document.getElementById("cnlAddMedCase").style.display="inline";
            document.getElementById("btnAddMedCase").style.display="none";
        }
        // cancel adding medical case manually
        function cnlAddMedCaseManually(){
            document.getElementById("medcasetxt").style.display="none";
            document.getElementById("cnlAddMedCase").style.display="none";
            document.getElementById("btnAddMedCase").style.display="inline";
            // and the textarea should be empty
            const textarea = document.querySelector('.text1');
            if (textarea.value=="") {
                console.log(' med case text is empty');
            }else{
                console.log(' med case text is NOT EMPTY');
            }

        }

</script>
<?php $resultSource=mysqli_num_rows($ResultGetMissionSrcAddress);
if($resultSource>0){ $Src=mysqli_fetch_assoc($ResultGetMissionSrcAddress);
                        if($Src['Is_hospital']==1){
                            echo "<script>    var sourceListsrc = document.getElementById('sourcetype').value='Hospital';
                            </script>";
                        } else
                            if($Src['Is_event']=='1'){
                                echo "<script>    var sourceListsrc = document.getElementById('sourcetype').value='Event';
                                </script>";                        }
                            else
                            if($Src['Is_hospital']==0 && $Src['Is_event']==0){
                                echo "<script>    var sourceListsrc = document.getElementById('sourcetype').value='Other';
                                </script>";
                            }
                         
                        
                        ?>
<script>
// function fillSource(){
    var sourceListsrc = document.getElementById("source");
    var selectedValuesrc = document.getElementById("sourcetype").value;
    // alert(selectedValue);

    if(selectedValuesrc=='Hospital'){
        sourceListsrc.options.length=0;
        // call ajax
        var req1 = new XMLHttpRequest();
        var method1 = "GET";
        var url1 = "PcrHospitals.php";
        var asynchronous1 = true;

        req1.open(method1,url1,asynchronous1);
        req1.send();

        req1.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                // converting json to array
                var data = JSON.parse(this.responseText);
                console.log(data);

                for(var a=0 ; a<data.length; a++ ){
                    var hospital_name = data[a].Address_desc;

                    var optsrc=document.createElement('option');
                    optsrc.text=hospital_name;
                    optsrc.value=data[a].Address_code;
                    if(optsrc.value==<?php echo $Src['Address_code'];?>){
                        optsrc.setAttribute("selected",true);
                    }


                    sourceListsrc.add(optsrc);

                    console.log("hospital_name: "+hospital_name);
                }
            }
        }
    }
    if(selectedValuesrc=='Event'){
        sourceListsrc.options.length=0;
        // call ajax
        var req1 = new XMLHttpRequest();
        var method1 = "GET";
        var url1 = "PcrEvents.php";
        var asynchronous1 = true;

        req1.open(method1,url1,asynchronous1);
        req1.send();

        req1.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                // converting json to array
                var data = JSON.parse(this.responseText);
                console.log(data);
                for(var a=0 ; a<data.length; a++ ){
                    var name = data[a].Address_desc;

                    var optsrc=document.createElement('option');
                    optsrc.text=name;
                    optsrc.value=data[a].Address_code;

                    sourceListsrc.add(optsrc);

                    console.log("location name: "+name);
                }
            }
        }
    }
    if(selectedValuesrc=='Other'){
        sourceListsrc.options.length=0;
        // call ajax
        var req1 = new XMLHttpRequest();
        var method1 = "GET";
        var url1 = "PcrOtherLocations.php";
        var asynchronous1 = true;

        req1.open(method1,url1,asynchronous1);
        req1.send();

        req1.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                // converting json to array
                var data = JSON.parse(this.responseText);
                console.log(data);
                for(var a=0 ; a<data.length; a++ ){
                    var name = data[a].Address_desc;

                    var optsrc=document.createElement('option');
                    optsrc.text=name;
                    optsrc.value=data[a].Address_code;
                    if(optsrc.value==<?php echo $Src['Address_code'];?>){
                        optsrc.setAttribute("selected",true);
                    }
                    sourceListsrc.add(optsrc);

                    console.log("adress: "+name);
                }
            }
        }
    }


// }
<?php } ?>
</script><script>
function fillDestination(){
    var sourceList = document.getElementById("destination");

    var selectedValue = document.getElementById("desttype").value;
    // alert(selectedValue);

    if(selectedValue=='Hospital'){
        sourceList.options.length=0;
        // call ajax
        var req = new XMLHttpRequest();
        var method = "GET";
        var url = "PcrDraftHospitals.php";
        var asynchronous = true;

        req.open(method,url,asynchronous);
        req.send();

        req.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                // converting json to array
                var data = JSON.parse(this.responseText);
                console.log(data);
                for(var a=0 ; a<data.length; a++ ){
                    var hospital_name = data[a].Address_desc;

                    var opt=document.createElement('option');
                    opt.text=hospital_name;
                    opt.value=data[a].Address_code;
                    sourceList.add(opt);

                    console.log("hospital_name: "+hospital_name);
                }
            }
        }
    }
    if(selectedValue=='Event'){
        sourceList.options.length=0;
        // call ajax
        var req = new XMLHttpRequest();
        var method = "GET";
        var url = "PcrDraftEvents.php";
        var asynchronous = true;

        req.open(method,url,asynchronous);
        req.send();

        req.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                // converting json to array
                var data = JSON.parse(this.responseText);
                console.log(data);
                for(var a=0 ; a<data.length; a++ ){
                    var name = data[a].Address_desc;

                    var opt=document.createElement('option');
                    opt.text=name;
                    opt.value=data[a].Address_code;
                    sourceList.add(opt);

                    console.log("location name: "+name);
                }
            }
        }
    }
    if(selectedValue=='Other'){
        sourceList.options.length=0;
        // call ajax
        var req = new XMLHttpRequest();
        var method = "GET";
        var url = "PcrDraftOtherLocations.php";
        var asynchronous = true;

        req.open(method,url,asynchronous);
        req.send();

        req.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                // converting json to array
                var data = JSON.parse(this.responseText);
                console.log(data);
                for(var a=0 ; a<data.length; a++ ){
                    var name = data[a].Address_desc;

                    var opt=document.createElement('option');
                    opt.text=name;
                    opt.value=data[a].Address_code;
                    sourceList.add(opt);

                    console.log("adress: "+name);
                }
            }
        }
    }


}

</script>
<?php 
$ResultDest=mysqli_num_rows($ResultGetMissionDestAddress);
if($ResultDest>0){echo "console.log('Success');";

$Dest=mysqli_fetch_assoc($ResultGetMissionDestAddress);

if($Dest['Is_hospital']==1){
    echo "<script>    var selected = document.getElementById('desttype').value='Hospital';
    </script>";
} else
    if($Dest['Is_event']==1){
        echo "<script>    var selected = document.getElementById('desttype').value='Event';
        </script>";                        }
    else
    if($Dest['Is_hospital']==0 && $Dest['Is_event']==0){
        echo "<script>    var selected = document.getElementById('desttype').value='Other';
        </script>";
    }


?>
<script>

// function fillDestination(){
    var sourceList = document.getElementById("destination");

    var selectedValue = document.getElementById("desttype").value;
    // alert(selectedValue);

    if(selectedValue=='Hospital'){
        sourceList.options.length=0;
        // call ajax
        var req = new XMLHttpRequest();
        var method = "GET";
        var url = "PcrDraftHospitals.php";
        var asynchronous = true;

        req.open(method,url,asynchronous);
        req.send();

        req.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                // converting json to array
                var data = JSON.parse(this.responseText);
                console.log(data);
                for(var a=0 ; a<data.length; a++ ){
                    var hospital_name = data[a].Address_desc;

                    var opt=document.createElement('option');
                    opt.text=hospital_name;
                    opt.value=data[a].Address_code;
                    if(opt.value==<?php echo $Dest['Address_code'];?>){
                        opt.setAttribute("selected",true);
                    }
                    sourceList.add(opt);

                    console.log("hospital_name: "+hospital_name);
                }
            }
        }
    }
    if(selectedValue=='Event'){
        sourceList.options.length=0;
        // call ajax
        var req = new XMLHttpRequest();
        var method = "GET";
        var url = "PcrDraftEvents.php";
        var asynchronous = true;

        req.open(method,url,asynchronous);
        req.send();

        req.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                // converting json to array
                var data = JSON.parse(this.responseText);
                console.log(data);
                for(var a=0 ; a<data.length; a++ ){
                    var name = data[a].Address_desc;

                    var opt=document.createElement('option');
                    opt.text=name;
                    opt.value=data[a].Address_code;
                    if(opt.value==<?php echo $Dest['Address_code'];?>){
                        opt.setAttribute("selected",true);
                    }
                    sourceList.add(opt);

                    console.log("location name: "+name);
                }
            }
        }
    }
    if(selectedValue=='Other'){
        sourceList.options.length=0;
        // call ajax
        var req = new XMLHttpRequest();
        var method = "GET";
        var url = "PcrDraftOtherLocations.php";
        var asynchronous = true;

        req.open(method,url,asynchronous);
        req.send();

        req.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                // converting json to array
                var data = JSON.parse(this.responseText);
                console.log(data);
                for(var a=0 ; a<data.length; a++ ){
                    var name = data[a].Address_desc;

                    var opt=document.createElement('option');
                    opt.text=name;
                    opt.value=data[a].Address_code;
                    if(opt.value==<?php echo $Dest['Address_code'];?>){
                        opt.setAttribute("selected",true);
                    }
                    sourceList.add(opt);

                    console.log("adress: "+name);
                }
            }
        }
    }
 <?php }?>   
</script>
<script>
    function fillSource(){
            var sourceList = document.getElementById("source");

            var selectedValue = document.getElementById("sourcetype").value;
            // alert(selectedValue);

            if(selectedValue=='Hospital'){
                sourceList.options.length=0;
                // call ajax
                var req = new XMLHttpRequest();
                var method = "GET";
                var url = "PcrHospitals.php";
                var asynchronous = true;

                req.open(method,url,asynchronous);
                req.send();

                req.onreadystatechange = function(){
                    if(this.readyState == 4 && this.status == 200){
                        // converting json to array
                        var data = JSON.parse(this.responseText);
                        console.log(data);
                        for(var a=0 ; a<data.length; a++ ){
                            var hospital_name = data[a].Address_desc;

                            var opt=document.createElement('option');
                            opt.text=hospital_name;
                            opt.value=data[a].Address_code;
                            sourceList.add(opt);

                            console.log("hospital_name: "+hospital_name);
                        }
                    }
                }
            }
            if(selectedValue=='Event'){
                sourceList.options.length=0;
                // call ajax
                var req = new XMLHttpRequest();
                var method = "GET";
                var url = "PcrEvents.php";
                var asynchronous = true;

                req.open(method,url,asynchronous);
                req.send();

                req.onreadystatechange = function(){
                    if(this.readyState == 4 && this.status == 200){
                        // converting json to array
                        var data = JSON.parse(this.responseText);
                        console.log(data);
                        for(var a=0 ; a<data.length; a++ ){
                            var name = data[a].Address_desc;

                            var opt=document.createElement('option');
                            opt.text=name;
                            opt.value=data[a].Address_code;
                            sourceList.add(opt);

                            console.log("location name: "+name);
                        }
                    }
                }
            }
            if(selectedValue=='Other'){
                sourceList.options.length=0;
                // call ajax
                var req = new XMLHttpRequest();
                var method = "GET";
                var url = "PcrOtherLocations.php";
                var asynchronous = true;

                req.open(method,url,asynchronous);
                req.send();

                req.onreadystatechange = function(){
                    if(this.readyState == 4 && this.status == 200){
                        // converting json to array
                        var data = JSON.parse(this.responseText);
                        console.log(data);
                        for(var a=0 ; a<data.length; a++ ){
                            var name = data[a].Address_desc;

                            var opt=document.createElement('option');
                            opt.text=name;
                            opt.value=data[a].Address_code;
                            sourceList.add(opt);

                            console.log("adress: "+name);
                        }
                    }
                }
            }


        }

  //itsyBitsySpider----->
  document.getElementById("mission_type").onchange = function(){
   var val=document.getElementById("mission_type").value;
        if(val==4){
            console.log('YESSSSSSSSSS');
            document.getElementById("sourcetype").hidden="true";
            document.getElementById("sourcetype").value="";
            document.getElementById("source").hidden="true";
            document.getElementById("source").value="";
            document.getElementById("desttype").hidden="true";
            document.getElementById("desttype").value="";
            document.getElementById("destination").hidden="true";
            document.getElementById("destination").value="";
            document.getElementById("ambulance").hidden="true";
            document.getElementById("ambulance").value="";
            document.getElementById("initial_mileage").hidden="true";
            document.getElementById("initial_mileage").value="";
            document.getElementById("final_mileage").hidden="true";
            document.getElementById("final_mileage").value="";
            document.getElementById("btnAddSrc").hidden="true";
            document.getElementById("btnAddDest").hidden="true";


        }
    }
    // console.log('Here:');
    // console.log('HERE:',document.getElementById('StartTime').value);

    // //Shift Control
    // document.getElementById('StartTime').onchange=function(){
    //     var initialtime=document.getElementById('StartTime').value;
    //     console.log('HERE:'+document.getElementById('StartTime').value);

    // }

;
</script>
    <script>

        function displayPatient2(){
            document.getElementById("idpatient2").style.display="inline"; // display patient2 infos
            document.getElementById("cancelPatient2btn").style.display="inline";
            document.getElementById("displayPatient2btn").style.display="none";
        }
        function cancelPatient2(){
            document.getElementById("displayPatient2btn").style.display="inline";
            document.getElementById("cancelPatient2btn").style.display="none";
            document.getElementById("idpatient2").style.display="none";
            //clear all input fields of patient 2
            document.getElementById("patient_firstname2").value = "";
            document.getElementById("patient_lastname2").value = "";
            document.getElementById("patient_dateofbirth2").value = "";
            document.getElementById("patient_nationality2").value = "";
            document.getElementById("patient_relativename2").value = "";
        }
        
    </script>

    <script>
        // var today = new Date();
        // var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
        // document.getElementById("currentTime").innerHTML = time;
        // console.log(time);

        // var array=time.split(":");
        // // console.log(array[0]);
        // var h=array[0];
        // if(h>=6 && h<18){   // ajax to bring hours from db?
        //     document.getElementById("shift").innerHTML = 'EDJ';
        // }  
        // else{
        //     document.getElementById("shift").innerHTML = 'EDN';
        // }                      
    </script>

    <script>
        var form1=document.getElementById('form1');
        var form2=document.getElementById('form2');
        var form3=document.getElementById('form3');
        var form4=document.getElementById('form4');

        var next1=document.getElementById('next1');
        var next2=document.getElementById('next2');
        var next3=document.getElementById('next3');

        var prev1=document.getElementById('prev1');
        var prev2=document.getElementById('prev2');
        var prev3=document.getElementById('prev3');

        var progress=document.getElementById('progress');


        next1.onclick=function(){
             //itsyBitsySpider
            var missionType=document.getElementById('mission_type');
            var missionTypeText=missionType.options[missionType.selectedIndex].innerHTML;
            var selectedValue=missionTypeText.value;
            if(missionTypeText==""){
                alert('Please Select mission Type'+missionTypeText);
            }else{ //itsyBitsySpider
                form1.style.left='-450px';
                form2.style.left='40px';
                progress.style.width='240px';
            }            
        }
        prev1.onclick=function(){
            form1.style.left='40px';
            form2.style.left='-450px';
            progress.style.width='120px';
        }

        next2.onclick=function(){
            form2.style.left='-450px';
            form3.style.left='40px';
            progress.style.width='360px';
        }
        prev2.onclick=function(){
            form2.style.left='40px';
            form3.style.left='-450px';
            progress.style.width='240px';
        }

        next3.onclick=function(){
            form3.style.left='-450px';
            form4.style.left='40px';
            progress.style.width='480px';
        }
        prev3.onclick=function(){
            form3.style.left='40px';
            form4.style.left='-450px';
            progress.style.width='360px';
        }


    </script>


   <!--  ↓  //itsyBitsySpider ↓ -----> 
       <script>
        function addEMT2(){
            document.getElementById('divemt2').style.display="flex";
        }
        function addEMT3(){
            document.getElementById('divemt3').style.display="flex";
        }
        function cnclEmt2(){
            document.getElementById('divemt2').style.display="none";
            console.log("emt2 before cancel "+document.getElementById('emt2').value);
            document.getElementById('emt2').value="";
            console.log("emt2 after cancel "+document.getElementById('emt2').value);
        }
        function cnclEmt3(){
            document.getElementById('divemt3').style.display="none";
            console.log("emt3 before cancel "+document.getElementById('emt3').value);
            document.getElementById('emt3').value="";
            console.log("emt3 after cancel "+document.getElementById('emt3').value);
        }
    </script>  
    <!--  ↑ //itsyBitsySpider   ↑----->


</body>

</html>
