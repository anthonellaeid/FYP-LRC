<?php
    require("DBconnection.inc.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SearchBar</title>
    <style>
        #searchBar{
            border: 1px solid #000000;
            border-right: none;
            font-size: 16px;
            padding: 10px;
            outline: none;
            width:250px;
            -webkit-border-top-left-radius:10px;
            -webkit-border-bottom-left-radius:10px;
            -moz-border-radius-topleft:10px;
            -moz-border-radius-bottomleft:10px;
            border-top-left-radius:10px;
            border-bottom-left-radius:10px;
        }
        #searchBtn{
            border:1px solid #000000;
            font-size:16px;
            padding: 10px;
            background: #FF0000;
            font-weight: bold;
            cursor: pointer;
            outline: none;
            -webkit-border-top-right-radius:10px;
            -webkit-border-bottom-right-radius:10px;
            -moz-border-radius-topright:10px;
            -moz-border-radius-bottomright:10px;
            border-top-right-radius:10px;
            border-bottom-right-radius:10px;
        }
        #searchBtn:hover{
            background:#1111;
        }
    
    </style>
    <script>
         function active(){
             var searchBar = document.getElementById('searchBar');
             if(searchBar.value == 'Search...'){
                 searchBar.value = ''
                 searchBar.placeholder = 'Search...'
             }
         }
         function inactive(){
             var searchBar = document.getElementById('searchBar');
             if(searchBar.value == ''){
                 searchBar.value = 'Search...'
                 searchBar.placeholder = ''
             }
         }
    </script>
</head>
<body>
    <form action="search.php" method="POST">
        <input type="text" id="searchBar" name="resc" placeholder="" value="Search..." maxlength="35" autocomplete="off" onMouseDown="active();" onBlur="inactive();"/><input type="submit" id="searchBtn" value="Go!" />
    </form>
    <table> 
        <tr>
            <th>Nickname</th>
            <th>First name</th>
            <th>Family name</th>
            <th>Date of birth</th>
            <th>Phone Number</th>
            <th>Date of join</th>
            <th>Date of left</th>
            <th>Function</th>   <!--bel td bdna nhot drop down list fiya l 3 bas l fi 3atoul whde selected    -->     
            <th>Gender</th>
            <th>Delete</th> 
            <th>Save changes</th>   <!-- update -->
        </tr>
        <?php
        $i=0;
        if(!empty($_POST["resc"])){
            $resc = $_POST["resc"];
            $query="SELECT * FROM `rescuer` WHERE `rescuer_nickname` like '%".$resc."%' or `rescuer_firstName` like '%".$resc."%' or `rescuer_lastName` like '%".$resc."%' or `rescuer_dateOfBirth` like '%".$resc."%' or `rescuer_phoneNb` like '%".$resc."%' or `rescuerDate_join` like '%".$resc."%' or `rescuerDate_left` like '%".$resc."%' or `rescuer_function` like '%".$resc."%' or `rescuer_gender` like '%".$resc."%';";
            $res=mysqli_query($conn,$query);    
            $nb = mysqli_num_rows($res); 
            while($row=mysqli_fetch_array($res)){ 
                $nickName=$row['rescuer_nickname'];
                $fName=$row['rescuer_firstName'];
                $lName=$row['rescuer_lastName'];
                $dob=$row['rescuer_dateOfBirth'];
                $phoneNb=$row['rescuer_phoneNb'];
                $datejoin=$row['rescuerDate_join'];
                $dateleft=$row['rescuerDate_left'];
                $func=$row['rescuer_function'];
                $gender=$row['rescuer_gender'];
                $i++;
                echo "
                    <tr>
                        <td><input contenteditable='false' name='nickname-".$i."' id=".$row['rescuer_nickname']." value=".$row['rescuer_nickname']."><hr></td>
                        <td><input contenteditable='true' name='fname-".$i."' id='fname-".$i."' value=".$row['rescuer_firstName']."><hr></td>
                        <td><input contenteditable='true' name='lname-".$i."' id='lname-".$i."'value=".$row['rescuer_lastName']."><hr></td>
                        <td><input type='date' name='dob-".$i."' min='1962-01-01' max='2004-12-31' id='birthDate-".$i."' value=".$row['rescuer_dateOfBirth']." ><hr></td>
                        <td><input contenteditable='true' type='number' name='phoneNb-".$i."' id='phoneNb-".$i."' value=".$row['rescuer_phoneNb']."><hr></td> 
                        <td><input type='date' name='doj-".$i."' id='joinDate-".$i."' value=".$row['rescuerDate_join']." ><hr></td>
                        <td><input contenteditable='true' type='date' name='dol-".$i."' id='leftDate-".$i."'  value=" .$row['rescuerDate_left']."><hr></td> 
                        <td>
                            <
                        </td>
                        <td></td>
                        <td><input class='btnupdate' type='submit' name='delete-".$i."' value='Delete'><hr></td>
                        <td><input class='btnupdate' type='submit' name='update-".$i."' value='Update'><hr></td>
                    </tr>
                    ";


            }
        }
        ?>
    </table>
</body>
</html>