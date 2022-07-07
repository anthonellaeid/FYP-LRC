<?php session_start();
if(!isset($_SESSION["login"]))
	header("location:index.php");
?>
<html >
    <header>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="css/DataManagement.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
a:link, a:visited {
    color: black;
    padding: 10px 20px;
    text-align: center;
    display: inline-block;}
  a:hover, a:active {
    background-color: white;
    color: red;}
    
  ul{border-bottom:2px solid black;
      border-top:2px solid black;
      background-color:white;}
  .c1{margin:4%;
      width:auto;
  }
.cadre{
    border:2px solid darkgrey;
}
  #A{margin-top:7%;}
  h3{
    font-weight:bold;
  }
  hr:nth-child(even){ 
      border-top: 1px dashed red;

  }
  hr:nth-child(odd){ 
    border-top: 1px dashed red;

  }
  .tooltip {
  display: inline;
  position: relative;
}
.tooltip:hover:after{
  display: -webkit-flex;
  display: flex;
  -webkit-justify-content: center;
  justify-content: center;
  background: #444;
  border-radius: 8px;
  color: #fff;
  content: attr(title);
  margin: -82px auto 0;
  font-size: 16px;
  padding: 13px;
  width: 220px;
}
.tooltip:hover:before{
  border: solid;
  border-color: #444 transparent;
  border-width: 12px 6px 0 6px;
  content: "";
  left: 45%;
  bottom: 30px;
  position: absolute;
}
.new {
  border-top: 1px dotted red;
}

      </style>
</header>

<?php
include("DataManagement_Model.php");
/************************************************************************************************* 1.Ambulance Table**************************************************************************************************************/
$output='';
//create table head
$output.='<div class="table-responsive" id="A">
            <table class="table table-striped">
            <tr>
            <th width="10%">Id</th>
            <th width="25%">Plate Number</th>
            <th width="30%">Description</th>
            <th width="15%">Final_km</th>
			<th width="20%">Status</th>
            <th width="25%">#Patient<center><i class="fa fa-question-circle" data-toggle="tooltip" title="min-capacity=2; max-capacity=4"style="color:grey"></i></center></th>
            <th width="20%">Delete</th>
            </tr>';
//get total rows
$rows=mysqli_num_rows($result);
if($rows>0){
	//when no more data exist in db, add last empty row to add new data 

$output.='<tr>
        <td id="ambulance_id"></td>
        <td id="ambulance_plateNb" contenteditable placeholder="Palte Number"></td>
        <td id="ambulance_description" contenteditable></td>';
$output.=' <td id="ambulance_final_km" contenteditable></td>
        <td id="ambulanceStatus_desc" contenteditable><select id="selectAmbulance2"><option>--</option>';
        while($r=mysqli_fetch_array($RESstatus1)){ $output.= '<option value="'.$r['ambulanceStatus_code'].'">'.$r["ambulanceStatus_desc"].'</option>';}		
$output.= '</select></td>
        <td  ><input type="number" min="2" max="4"   id="Ambulance_max_patient_nbINS"</td>
        <td> <button type="button" name="btn_add" id="btn_addAmbulance" class="btn  btn-success">+</button></td>
        </tr>';    

while($row=mysqli_fetch_array($result)){//while there's data present in db then display them
    mysqli_data_seek($RESstatus1,0);

$output.='
<tr>
    <td id="'.$row['ambulance_id'].'">'.$row["ambulance_id"].'</td>
    <td class="ambulance_plateNb" data-id1="'.$row['ambulance_id'].'" contenteditable>'.$row["ambulance_plateNb"].'</td>
    <td class="ambulance_description" data-id2="'.$row['ambulance_id'].'" contenteditable>'.$row["ambulance_description"].'</td>';
    $rowk=mysqli_fetch_assoc($resultKm);
$output.='    <td class="ambulance_final_km" data-id3="'.$row['ambulance_id'].'" contenteditable>'.$row["ambulance_final_km"].'</td>
	<td  ><select id="selectAmbulance" data-id4="'.$row['ambulance_id'].'"> ';
  
	while($r=mysqli_fetch_array($RESstatus1)){ $output.= '<option value="'.$r['ambulanceStatus_code'].'"';
						
        if($r['ambulanceStatus_code']===$row['Ambulance_status_code']){	
						$output.= 'Selected';}
	$output.= '>'.$r["ambulanceStatus_desc"].'</option>';}
   $output.= '</select></td>
   <td  ><input type="number" min="2" max="4" value="'.$row["Ambulance_max_patient_nb"].'" class="Ambulance_max_patient_nb" data-id5="'.$row['ambulance_id'].'"</td>
   <td><Button type="button" name="delete_btn" data-id6="'.$row['ambulance_id'].'" class="btn btn-danger btn_delete btnDeleteAmbulance">X</button></td>
  
</tr>
    ';
}

}
else{// if  data base is empty then only put empty fields to add new data

$output.='
<tr>
<td id="ambulance_id"></td>
<td id="ambulance_plateNb" contenteditable></td>
<td id="ambulance_description" contenteditable></td>
<td id="ambulance_final_km" contenteditable></td>
<td id="ambulanceStatus_desc" contenteditable><select id="selectAmbulance2"><option>--</option>';
while($r=mysqli_fetch_array($RESstatus1)){ $output.= '<option value="'.$r['ambulanceStatus_code'].'">'.$r["ambulanceStatus_desc"].'</option>';}		
   $output.= '</select></td>
   <td  ><input type="number" min="2" max="4"   id="Ambulance_max_patient_nbINS"</td>
<td> <button type="button" name="btn_add" id="btn_addAmbulance" class="btn  btn-success">+</button></td>
</tr>';    
}
$output.='</table></div></div>';
echo $output;
echo "<hr class='New'>";

/************************************************************************************************* 2.Status Ambulance Table ******************************************************************************************************/
echo '<div >
<h3 id="S">Ambulance Status <img src="DataManagementModel/statusAmb/stat.jpg" width="50px"> </h3>
    <div class="row">
        <div class="col-md-0" style="margin-left:20px; float:right;" >     
            <input type="text" id="tags2" placeholder="Search"  data-role="tagsinput" />
        </div>
        <div class="col-md-2">
            <button type="button" name="search2" class="btn btn-sm  cadre" id="search2">Search</button>
            <button type="button" name="reset2" class="btn btn-sm  cadre" id="reset2">Reset</button>
        </div>
    </div>
';
$statusOutput = '   ';  
$statusOutput = '<span id="result2"></span>'; 
  
$statusOutput .= '  
     <div class="table-responsive">  
        <table   class="table table-striped">
               <tr>  
                    <th width="10%">Id</th>  
                    <th width="90%">Status</th>
					<th width="20%">Delete</th>   					
               </tr>';  
$RowStatus = mysqli_num_rows($ResStatus);
if($RowStatus > 0)  
{   
    $statusOutput .= '  
    <tr>  
         <td></td>  
         <td id="ambulanceStatus_descIns" contenteditable></td>  
         <td><button type="button" name="btn_add" id="btn_addStatus" class="btn  btn-success">+</button></td>  
    </tr>  
'; 
    while($RowStat = mysqli_fetch_array($ResStatus))  
     {  
          $statusOutput .= '  
               <tr>  
                    <td>'.$RowStat["ambulanceStatus_code"].'</td>  
                    <td class="ambulanceStatus_desc" data-id1="'.$RowStat["ambulanceStatus_code"].'" contenteditable>'.$RowStat["ambulanceStatus_desc"].'</td>   
                    <td><button type="button" name="delete_btn" data-id2="'.$RowStat["ambulanceStatus_code"].'" class="btn btn-danger btn_delete btn_deleteStatus">X</button></td>  
               </tr>  
          ';  
     }  
 
}  
else  
{  
     $statusOutput .= '
               <tr>  
                   <td></td>  
                   <td id="ambulanceStatus_descIns" contenteditable></td>  
                   <td><button type="button" name="btn_add" id="btn_addStatus" class="btn  btn-success">+</button></td>  
              </tr>';  
}  
$statusOutput .= '</table>  
     </div>';  
echo $statusOutput; 
echo "<hr>";
////////////////////////////////////////////////////////////////////////////////////////////////// End Of Status Ambulance Table \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

// 3.Address Table 

echo'  <h3 id="Ad">Address<img src="DataManagementModel/Address/location.jpg " width="50px" style="margin-left:20px;"></h3>
        <div class="form-group">
          <div class="row">
            <div class="col-md-10  " ><label>Select option</label>    
                <select id="SelectColumnAddress">
                <option>  </option> 					
                <option value="Address_desc">Address</option>
                <option value="Is_hospital">Hospital</option>
                <option value="Is_event">Event</option>
                <option value="city_name">City</option>     
                </select>    
              <input type="text" id="tagsAddress" placeholder="Search" class="form-control" data-role="tagsinput" />
            </div>
            <div class="col-md-3.5">
                <button type="button" name="search" class="btn btn-sm  cadre" id="searchAddress">Search</button>
                <button type="button" name="reset" class="btn btn-sm  cadre" id="resetAddress">Reset</button>  </div>
            </div>
        </div>

    <div class="table-responsive" id="div3">
		
		
            <table class="table table-striped">
            <tr>
            <th width="10%">Id</th>
            <th width="30%">Address</th>
            <th width="20%" data-toggle="tooltip" title="Yes : 1 <br> No:0" >Is Hospital   <i class="fa fa-question-circle" data-toggle="tooltip" title="0 : No; 1 : Yes"style="color:grey"></i>
            </th>
            <th width="20%">Is Event <i class="fa fa-question-circle" data-toggle="tooltip" title="0=No; 1=Yes"style="color:grey"></i></th>
               <th width="20%">City </th>
            <th width="20%">Delete</th>
</tr>

          <span id="result3"></span>
          <div id="live_data3">';
  $outputAddress='';

         $rowAddress=mysqli_num_rows($ResAddress);
			if($rowAddress>0){

              $outputAddress.='
                    <tr>
                    <td id="Address_code"></td>
                    <td id="Address_desc" contenteditable></td>
                    <td  ><input type="number" min="0" max="1" id="Is_hospital"></td>
                    <td ><input type="number" min="0" max="1" id="Is_event"></td>
                    <td id="city_id" contenteditable><select id="selectAddress2"><option>--</option>';
while($ra=mysqli_fetch_array($ResCity1)){ $outputAddress.= '<option value="'.$ra['city_id'].'">'.$ra["city_name"].'</option>';}		
   $outputAddress.= '</select></td>
<td> <button type="button" name="btn_addAddress" id="btn_addAddress" class="btn btn btn-success">+</button></td>
</tr>'; 
mysqli_data_seek($ResCity1,0);
                    while($rowAddress= mysqli_fetch_assoc($ResAddress)){
                    
                        $outputAddress.= '<tr>
    <td id="'.$rowAddress['Address_code'].'">'.$rowAddress["Address_code"].'</td>
    <td class="Address_desc" data-id1="'.$rowAddress['Address_code'].'" contenteditable>'.$rowAddress["Address_desc"].'</td>
    <td  ><input type="number" min="0" max="1" value="'.$rowAddress["Is_hospital"].'" class="Is_hospital" data-id2="'.$rowAddress['Address_code'].'"</td>
    <td  ><input type="number" max="1" min="0" class="Is_event" data-id3="'.$rowAddress['Address_code'].'" value="'.$rowAddress["Is_event"].'"></td>
	<td  data-id4="'.$rowAddress['Address_code'].'" ><select id="selectAddress" data-id4="'.$rowAddress['Address_code'].'"> ';
	while($ra=mysqli_fetch_assoc($ResCity1)){ $outputAddress.= '<option value="'.$ra['city_id'].'"';
						if($ra['city_id']==$rowAddress['Address_city']){	
						$outputAddress.= 'Selected';}
	$outputAddress.= '>'.$ra["city_name"].'</option>';}
     
	mysqli_data_seek($ResCity1,0);
   $outputAddress.= '   </select>
   </td><td><Button type="button" name="delete_btn" data-id5="'.$rowAddress['Address_code'].'" class="btn btn-danger btn_delete btnDeleteAddress">X</button></td>
  
</tr>';}

   
}else  
{  
     $outputAddress .= '
     <tr>
     <td id="Address_code"></td>
     <td id="Address_desc" contenteditable></td>
     <td  ><input type="number" min="0" max="1" id="Is_hospital"></td>
     <td ><input type="number" min="0" max="1" id="Is_event"></td>
     <td id="city_id" contenteditable><select id="selectAddress2"><option>--</option>';
     while($ra=mysqli_fetch_array($ResCity1)){ $outputAddress.= '<option value="'.$ra['city_id'].'">'.$ra["city_name"].'</option>';}		
        $outputAddress.= '</select></td>
     <td> <button type="button" name="btn_addAddress" id="btn_addAddress" class="btn btn btn-success">+</button></td>
     </tr>'; 
}  
$outputAddress .= '</table>  
     </div>';  
echo $outputAddress; 
echo "<hr>";
////////////////////////////////////////////////////////////End Of Address Table/////////////////////////////////////////////////////////////////////////
//  4.City Table -->
echo "<h3 id='S'>City <img src='DataManagementModel/City/city.jpg ' width='50px'> </h3>
<div class='row'>
<div class='col-md-0' style='margin-left:20px; float:right;' >     
<input type='text' id='tagsCity' placeholder='Search'  data-role='tagsinput' />
</div>
<div class='col-md-2'>
 <button type='button' name='searchCity' class='btn btn-sm  cadre' id='searchCity'>Search</button>
 <button type='button' name='resetCity' class='btn btn-sm  cadre' id='resetCity'>Reset</button>
</div>
</div>

 <span id='result4'></span> 
 

  
     <div class='table-responsive'>  
        <table   class='table table-striped' id='City'>
               <tr>  
                    <th width='10%'>Id</th>  
                    <th width='90%'>City</th>
					<th width='20%'>Delete</th>   					
               </tr> 
               ";
	
$CityOutput='';	
$Rowcity = mysqli_num_rows($ResCity);
if($Rowcity > 0)  
{  
    $CityOutput .= '  
    <tr>  
         <td></td>  
         <td id="city_nameIns" contenteditable></td>  
         <td><button type="button" name="btn_add" id="btn_addCity" class="btn btn btn-success">+</button></td>  
    </tr>  
';
    
    while($RowCity = mysqli_fetch_array($ResCity))  
     {  
          $CityOutput .= '  
               <tr>  
                    <td>'.$RowCity["city_id"].'</td>  
                    <td class="city_name" data-id1="'.$RowCity["city_id"].'" contenteditable>'.$RowCity["city_name"].'</td>   
                    <td><button type="button" name="delete_btn" data-id2="'.$RowCity["city_id"].'" class="btn btn btn-danger btn_delete btn_deleteCity">X</button></td>  
               </tr>  
          ';  
     }  
   
}  
else  
{  
     $CityOutput .= '
               <tr>  
                   <td></td>  
                   <td id="city_nameIns" contenteditable></td>  
                   <td><button type="button" name="btn_add" id="btn_addCity" class="btn btn btn-success">+</button></td>  
              </tr>';  
}  
$CityOutput .= '</table>  
     </div>';  
echo $CityOutput; 
echo "<hr>";
/*----------------------------------------------------------------------------------------------------------------------*/
//  5. Medical Case Table
echo '
        <h3 id="S">Medical Case <img src="DataManagementModel/Medical/Med.png " width="50px"> </h3>

            <div class="row">
                <div class="col-md-0" style="margin-left:20px; float:right;" >     
                <input type="text" id="tagsMedical" placeholder="Search"  data-role="tagsinput" />
                </div>
                <div class="col-md-2">
                <button type="button" name="searchMedical" class="btn btn-sm  cadre" id="searchMedical">Search</button>
                <button type="button" name="resetMedical" class="btn btn-sm  cadre" id="resetMedical">Reset</button>
                </div>
            </div>
         <span id="result5"></span>
';
$MedicalOutput = '';		 

$MedicalOutput .= '  
     <div class="table-responsive">  
        <table   class="table table-striped" id="M">
               <tr>  
                    <th width="10%">Id</th>  
                    <th width="90%">Medical Case</th>
					<th width="20%">Delete</th>   					
               </tr>';  				
$Rowmed = mysqli_num_rows($ResMedical);
if($Rowmed > 0)  
{       $MedicalOutput .= '  
    <tr>  
         <td></td>  
         <td id="medicalCase_descIns" contenteditable></td>  
         <td><button type="button" name="btn_add" id="btn_addMedcialCase" class="btn btn btn-success">+</button></td>  
    </tr>  
'; 
 while($RowMedical = mysqli_fetch_array($ResMedical))  
     {  
          $MedicalOutput .= '  
               <tr>  
                    <td>'.$RowMedical["medicalCase_code"].'</td>  
                    <td class="medicalCase_desc" data-id1="'.$RowMedical["medicalCase_code"].'" contenteditable>'.$RowMedical["medicalCase_desc"].'</td>   
                    <td><button type="button" name="delete_btn" data-id2="'.$RowMedical["medicalCase_code"].'" class="btn btn btn-danger btn_delete btn_deleteMedicalCase">X</button></td>  
               </tr>  
          ';  
     }  
 
}  
else  
{  
     $MedicalOutput .= '
               <tr>  
                   <td></td>  
                   <td id="medicalCase_descIns" contenteditable></td>  
                   <td><button type="button" name="btn_add" id="btn_addMedcialCase" class="btn btn btn-success">+</button></td>  
              </tr>';  
}  
$MedicalOutput .= '</table>  
     </div>';  
echo $MedicalOutput; 
echo "<hr>";
/*----------------------------------------------------------------------------------------------------------------------*/
//  6.CM KIT Table -->
echo '<h3 id="S">CM-Kit <img src="DataManagementModel/CM/kit.jpg " width="50px"> </h3>
 
<div class="row">
<div class="col-md-0" style="margin-left:20px; float:right;" >     
<input type="text" id="tagsCM" placeholder="Search"  data-role="tagsinput" />
</div>
<div class="col-md-2">
 <button type="button" name="searchCM" class="btn btn-sm  cadre" id="searchCM">Search</button>
 <button type="button" name="resetCM" class="btn btn-sm  cadre" id="resetCM">Reset</button>
</div>
</div>

 <span id="result6"></span> ';

$CMkitOutput = ''; 
$CMkitOutput .= '  
     <div class="table-responsive">  
        <table   class="table table-striped" id="C">
               <tr>  
                    <th width="10%">Id</th>  
                    <th width="90%">#CM KIT</th>
					<th width="20%">Delete</th>   					
               </tr>';  				
$Rowcm = mysqli_num_rows($ResCMkit);
if($Rowcm > 0)  
{  
    $CMkitOutput .= '  
    <tr>  
         <td></td>  
         <td id="cm_kit_descIns" contenteditable></td>  
         <td><button type="button" name="btn_add" id="btn_addCMKit" class="btn btn btn-success">+</button></td>  
    </tr>  
';
    while($RowCM = mysqli_fetch_array($ResCMkit))  
     {    		
          $CMkitOutput .= '  
               <tr>  
					<td>'.$RowCM["cm_kit_id"].'</td>  
                    <td class="cm_kit_desc" data-id1="'.$RowCM["cm_kit_id"].'" contenteditable>'.$RowCM["cm_kit_desc"].'</td>   
                    <td><button type="button" name="delete_btn" data-id2="'.$RowCM["cm_kit_id"].'" class="btn btn btn-danger btn_delete btn_deleteCMkit">X</button></td>  
               </tr>  
          ';  
     }  
  
}  
else  
{  
     $CMkitOutput .= '
               <tr>  
                   <td></td>  
                   <td id="cm_kit_descIns" contenteditable></td>  
                   <td><button type="button" name="btn_add" id="btn_addCMKit" class="btn btn btn-success">+</button></td>  
              </tr>';  
}  
$CMkitOutput .= '</table>  
     </div>';  
echo $CMkitOutput; 
echo "<hr>";
/*----------------------------------------------------------------------------------------------------------------------*/
//  7.UHF Radio Table -->

echo'<h3 id="S">UHF - Radio <img src="DataManagementModel/UHF/UHF.jpg " width="50px"> </h3>
 
<div class="row">
<div class="col-md-0" style="margin-left:20px; float:right;" >     
<input type="text" id="tagsUHF" placeholder="Search"  data-role="tagsinput" />
</div>
<div class="col-md-2">
 <button type="button" name="searchUHF" class="btn btn-sm  cadre" id="searchUHF">Search</button>
 <button type="button" name="resetUHF" class="btn btn-sm  cadre" id="resetUHF">Reset</button>
</div>
</div>

         <span id="result7"></span>  
 
  
     <div class="table-responsive">  
        <table   class="table table-striped" id="U">
               <tr>  
                    <th width="10%">Id</th>  
                    <th width="90%">#UHF Radio</th>
					<th width="20%">Delete</th>   					
               </tr>';

 $UHFOutput = ''; 
$Rowuhf = mysqli_num_rows($ResUHF);
if($Rowuhf > 0)  
{   
    $UHFOutput .= '  
    <tr>  
         <td></td>  
         <td id="uhf_radio_descIns" contenteditable></td>  
         <td><button type="button" name="btn_add" id="btn_addUHF" class="btn btn btn-success">+</button></td>  
    </tr>  
';
    
    while($RowUHF = mysqli_fetch_array($ResUHF))  
     {  
          $UHFOutput .= '  
               <tr>  
					<td>'.$RowUHF["uhf_radio_id"].'</td>  
                    <td class="uhf_radio_desc" data-id1="'.$RowUHF["uhf_radio_id"].'" contenteditable>'.$RowUHF["uhf_radio_desc"].'</td>   
                    <td><button type="button" name="delete_btn" data-id2="'.$RowUHF["uhf_radio_id"].'" class="btn btn btn-danger btn_delete btn_deleteUHF">X</button></td>  
               </tr>  
          ';  
     }  
  
}  
else  
{  
     $UHFOutput .= '
               <tr>  
                   <td></td>  
                   <td id="uhf_radio_descIns" contenteditable></td>  
                   <td><button type="button" name="btn_add" id="btn_addUHF" class="btn btn btn-success">+</button></td>  
              </tr>';  
}  
$UHFOutput .= '</table>  
     </div>';  
echo $UHFOutput; 
echo "<hr>";

/*---------------------------------------------------------------------------------------------------------------------------------*/
// 8.Shift Table -->
 
echo '<h3 id="SH">Shift<img src="DataManagementModel/Shift/Shift2.png " width="50px" style="margin-left:20px;"></h3>
    
        <div class="row">
            <div class="col-md-0" style="margin-left:20px; float:right;" >     
            <input type="text" id="tagsShift" placeholder="Search"  data-role="tagsinput" />
            </div>
        <div class="col-md-2">
            <button type="button" name="searchShift" class="btn btn-sm  cadre" id="searchShift">Search</button>
            <button type="button" name="resetShift" class="btn btn-sm  cadre" id="resetShift">Reset</button>
        </div>
        </div>

<div class="table-responsive" id="div3">

        <table class="table table-striped" id="SH">
        <tr>
        <th width="10%">Code</th>
        <th width="30%">Description </th>
        <th width="30%">Start Hour <i class="fa fa-question-circle" data-toggle="tooltip" title="Total Shifts must be equal to 24hrs"style="color:grey"></i></th>
        <th width="20%">End Hour <i class="fa fa-question-circle" data-toggle="tooltip" title="Total Shifts must be equal to 24hrs"style="color:grey"></i></th>
        <th width="20%">Delete</th>
</tr>
    <span id="result8"></span>
      <div id="live_data8"></div>';
  $outputShift='';

   $rowshift=mysqli_num_rows($ResShift);
    if($rowshift>0){
//        $outputShift.='
//                     <tr>
//                     <td id="shift_codeIns" class="shift_code" contenteditable></td>
//                     <td id="shift_descIns" contenteditable></td>
//                     <td><input type="time" id="shift_start_hourIns"></td>
//                     <td><input type="time" id="shift_end_hourIns"></td>

// <td> <button type="button" name="btn_addshift" id="btn_addShift" class="btn btn btn-success">+</button></td>
//                     </tr>'; 

       while($rowShift= mysqli_fetch_assoc($ResShift)){
                         
        $outputShift.= '<tr>
                        <td id="'.$rowShift['shift_code'].'" >'.$rowShift["shift_code"].'</td>
                        <td class="shift_desc" data-id1="'.$rowShift['shift_code'].'" contenteditable>'.$rowShift["shift_desc"].'</td>
                        <td  ><input type="time" value="'.$rowShift["shift_start_hour"].'" name="appt" class="shift_start_hour" data-id2="'.$rowShift['shift_code'].'"></td>
                        <td  ><input type="time" value="'.$rowShift["shift_end_hour"].'" class="shift_end_hour" data-id3="'.$rowShift['shift_code'].'" ></td>

</td><td><Button type="button" name="delete_btn" data-id4="'.$rowShift['shift_code'].'" class="btn btn-danger btn_delete btnDeleteShift">X</button></td>

                        </tr>';}

                }else{  
        $outputShift .= '
                        <tr>
                        <td id="shift_codeIns" class="shift_code" contenteditable></td>
                        <td id="shift_descIns" contenteditable></td>
                        <td id="shift_start_hour" contenteditable></td>
                        <td id="shift_end_hour" contenteditable></td>

 <td> <button type="button" name="btn_addAddress" id="btn_addShift" class="btn btn btn-success">+</button></td>
                        </tr>'; 
}  
$outputShift .= '</table>  
                </div><hr>';  
echo $outputShift; 
echo "<hr>";

?>












<script>
     $(document).ready(function(){

        $('#search').click(function(){
  var query = $('#tags').val();
  var columnName=$('#SelectColumn').val();
  if(query== ''|| columnName==''){
      alert("Search bar is empty or Option not selected  ");
  }else{
  fetch_data(query,columnName);}
 }); 
 /********************** */


 $('#reset').click(function(){
   $('#tags').tagsinput('removeAll');;
  fetch_data();
 });

function fetch_data(query,columnName){
          $.ajax({
              url:"DataManagement_View.php",
              method:"Post",
              data:{query:query,columnName:columnName},
   dataType:"text",
              success: function(data){
                    console.log("query:"+query);
                    console.log("Column:"+columnName);
                    console.log("text"+$('#total_records').text());
                  $('#live_data1').html(data);//insert data into dom: div live_data
              }
          })

      }
      $('#search2').click(function(){
  var query2 = $('#tags2').val();
  if(query2== ''){
      alert("Search bar is empty ");
  }else{
  fetch_data2(query2);}
 }); 
 $('#reset2').click(function(){
   $('#tags2').tagsinput('removeAll');;
  fetch_data2();
 });

 function fetch_data2(query2){
          $.ajax({
              url:"DataManagement_View.php",
              method:"Post",
              data:{query2:query2},
                dataType:"text",
              success: function(data){
                    console.log("query:"+query2);
                    console.log("text"+$('#total_records').text());
                  $('#live_data1').html(data);//insert data into dom: div live_data
              }
          })

      }


 /*********************************************Address**Search***************************************************** */

 $('#searchAddress').click(function(){
  var queryAddress = $('#tagsAddress').val().toLowerCase();
  var columnNameaddress=$('#SelectColumnAddress').val();

  if(queryAddress== '' || columnNameaddress==''){
      alert("Search bar is empty or Option not selected ");
  }else{
  fetch_dataAddress(queryAddress,columnNameaddress);}
 }); 
 $('#resetAddress').click(function(){
   $('#tagsAddress').tagsinput('removeAll');;
   fetch_dataAddress();
 });

 function fetch_dataAddress(queryAddress,columnNameaddress){
          $.ajax({
              url:"DataManagement_View.php",
              method:"Post",
              data:{queryAddress:queryAddress,columnNameaddress:columnNameaddress},
                dataType:"text",
              success: function(data){
                    console.log("queryAddress:"+queryAddress);
                    console.log("Column:"+columnNameaddress);
                    console.log("text"+$('#total_records').text());
                  $('#live_data1').html(data);
              }
          })

      }


 /*********************************************City**Search***************************************************** */
 $('#searchCity').click(function(){
  var queryCity = $('#tagsCity').val().toLowerCase();
  if(queryCity== ''){
      alert("Search bar is empty ");
  }else{
  fetch_dataCity(queryCity);}
 }); 

 $('#resetCity').click(function(){
   $('#tagsCity').tagsinput('removeAll');;
  fetch_dataCity();
 });

 function fetch_dataCity(queryCity){
          $.ajax({
              url:"DataManagement_View.php",
              method:"Post",
              data:{queryCity:queryCity},
                dataType:"text",
              success: function(data){
                    console.log("queryCity:"+queryCity);
                    console.log("text"+$('#total_records').text());
                  $('#live_data1').html(data);//insert data into dom: div live_data
              }
          })

      }
 /*********************************************Medical*Case*Search***************************************************** */
 $('#searchMedical').click(function(){
  var queryMedical = $('#tagsMedical').val().toLowerCase();
  if(queryMedical== ''){
      alert("Search bar is empty ");
  }else{
    fetch_dataMedical(queryMedical);}
 }); 

 $('#resetMedical').click(function(){
   $('#tagsMedical').tagsinput('removeAll');;
   fetch_dataMedical();
 });

 function fetch_dataMedical(queryMedical){
          $.ajax({
              url:"DataManagement_View.php",
              method:"Post",
              data:{queryMedical:queryMedical},
                dataType:"text",
              success: function(data){
                    console.log("queryMedical:"+queryMedical);
                    console.log("text"+$('#total_records').text());
                  $('#live_data1').html(data);//insert data into dom: div live_data
              }
          })

      }
       /*********************************************CM*KIt*Search***************************************************** */
       $('#searchCM').click(function(){
  var queryCM = $('#tagsCM').val().toLowerCase();
  if(queryCM== ''){
      alert("Search bar is empty ");
  }else{
    fetch_dataCM(queryCM);}
 }); 

 $('#resetCM').click(function(){
   $('#tagsCM').tagsinput('removeAll');;
   fetch_dataCM();
 });

 function fetch_dataCM(queryCM){
          $.ajax({
              url:"DataManagement_View.php",
              method:"Post",
              data:{queryCM:queryCM},
                dataType:"text",
              success: function(data){
                    console.log("queryCM:"+queryCM);
                    console.log("text"+$('#total_records').text());
                  $('#live_data1').html(data);//insert data into dom: div live_data
              }
          })

      }

      /*********************************************UHF Radio*Search***************************************************** */
      $('#searchUHF').click(function(){
  var queryUHF = $('#tagsUHF').val().toLowerCase();
  if(queryUHF== ''){
      alert("Search bar is empty ");
  }else{
    fetch_dataUHF(queryUHF);}
 }); 

 $('#resetUHF').click(function(){
   $('#tagsUHF').tagsinput('removeAll');;
   fetch_dataUHF();
 });

 function fetch_dataUHF(queryUHF){
          $.ajax({
              url:"DataManagement_View.php",
              method:"Post",
              data:{queryUHF:queryUHF},
                dataType:"text",
              success: function(data){
                    console.log("queryUHF:"+queryUHF);
                    console.log("text"+$('#total_records').text());
                  $('#live_data1').html(data);//insert data into dom: div live_data
              }
          })

      }
      /*********************************************SHIFT*Search***************************************************** */
      $('#searchShift').click(function(){
  var queryShift = $('#tagsShift').val().toLowerCase();
  if(queryShift== ''){
      alert("Search bar is empty ");
  }else{
    fetch_dataShift(queryShift);}
 }); 

 $('#resetShift').click(function(){
   $('#tagsShift').tagsinput('removeAll');;
   fetch_dataShift();
 });

 function fetch_dataShift(queryShift){
          $.ajax({
              url:"DataManagement_View.php",
              method:"Post",
              data:{queryShift:queryShift},
                dataType:"text",
              success: function(data){
                    console.log("queryShift:"+queryShift);
                    console.log("text"+$('#total_records').text());
                  $('#live_data1').html(data);//insert data into dom: div live_data
              }
          })

      }

/********************************************************THE END */
});
</script>