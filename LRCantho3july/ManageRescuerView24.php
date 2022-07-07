<!--    View    -->
<HTML>
<HEAD>
    <META NAME="GENERATOR" Content="Microsoft Visual Studio">
    <TITLE>Rescuers</TITLE>
    <style type="text/css">
        *{
            font-family:sans-serif;
        }
        table {
            border: 1px solid white;
            height:100%;
            border-collapse:collapse;
            margin-left:10%;
        }
        th {
            width: 110px;
            height:100px;
            padding-top:20px;
            font-size:25px;
            background:#f2f2f2;
        }
        td{
            border: 1px solid #dddddd;
            text-align: center;
        }
        tr:nth-child(even){
            background-color: #dddddd;
        }
        input{
            width: 110px;
            /* margin-top:15%; */
            text-align: center;
        }
        .rescuersBackground{
            background-image: linear-gradient(rgba(0,0,0,0.2),rgba(0,0,0,0.1)),url(ttt.png);
            text-align:center;
        }
        h1{
            font-size:50px;
            margin-left:25%;
            margin-top:0.7%;
        }
        .btnadd{
            width:25%;
            height:15%;
            font-size:33px;
            background: linear-gradient(to right,black,red);
            border-radius:10px;
            border:0;
            margin-left:5%;
            outline:none;
            color:#fff;
            cursor:pointer;
            animation: mymove 2s infinite;
        }
        @keyframes mymove {
            from {
                background: linear-gradient(to right,black,red);
                font-size:33px;
            }
            to {
                background: linear-gradient(to right,red,black);
                font-size:48px;
                margin-left:15%;
            }
        }

        .btnupdate{
            /* width:8%; */
            background: linear-gradient(to right,red,#fff);
            height:20px;
            font-size:16px;
            font-weight:bold;
            border-radius:3px;
            border:0;
            outline:none;
            color:black;
            cursor:pointer;
            animation: mymove2 3s infinite;
        }
        @keyframes mymove2 {
            from {background: linear-gradient(to right,red,white);}
            to {background: linear-gradient(to right,white,red);}
        }
        .btninsert{
            height:20px;
            font-size:14px;
            border-radius:3px;
            background: linear-gradient(to right,black,red);
            border:0;
            outline:none;
            color:#fff;
            cursor:pointer;
            font-weight:bold;
        }
        .delete{
            height:20px;
            font-size:14px;
            border-radius:3px;
            background: red;
            border:0;
            outline:none;
            color:black;
            cursor:pointer;
            font-weight:bold;
        }
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
        /*
        Popup container - can be anything you want
        .popup {
        position: relative;
        display: inline-block;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        }

        /* The actual popup 
        .popup .popuptext {
        visibility: hidden;
        width: 160px;
        background-color: white;
        color: red;
        text-align: center;
        border-radius: 6px;
        padding: 8px 0;
        position: absolute;
        z-index: 1;
        bottom: 125%;
        left: 50%;
        margin-left: -80px;
        }

        /* Popup arrow 
        .popup .popuptext::after {
        content: "";
        position: absolute;
        top: 100%;
        left: 50%;
        margin-left: -5px;
        border-width: 5px;
        border-style: solid;
        border-color: white transparent transparent transparent;
        }

        /* Toggle this class - hide and show the popup 
        .popup .show {
        visibility: visible;
        -webkit-animation: fadeIn 1s;
        animation: fadeIn 1s;
        }

        /* Add animation (fade in the popup) 
        @-webkit-keyframes fadeIn {
        from {opacity: 0;} 
        to {opacity: 1;}
        }

        @keyframes fadeIn {
        from {opacity: 0;}
        to {opacity:1 ;}
        } */
        .settingsBtns{
            text-align:center;
            font-size: 18px;
            font-weight:bold;
            background: white;
            color:black;
            height:7%;
            width:20%;
            border:none;
            margin-left:10%;
            border-radius:4px;
            /* margin-left:25%;
            margin-top:-6px;
            margin-bottom:-6px; */
        }
        hr{
            height: 4px;
            background-color: black;
            border: none;
        }
        .logout{
            text-decoration:none;
        }
        
</style> 

    
</HEAD>
<body>
  
<!--backgroud image and title-->
<!-- <img src='imagelrc.jpg' alt='imageeeeeeee'/> -->

<div class='rescuersBackground'>
    <br/>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<h1>Manage Rescuers</h1><br/>
</div>
<hr>

    <button class="settingsBtns" onclick="window.location.href='DataManagement_index.php'">Manage Data</button>
    <button class="settingsBtns" onclick="window.location.href='AccountManagement_view.php'"> Manage Accounts</button>
    <button class="settingsBtns" onclick="window.location.href='Reports.php'"> Reports</button>

<hr>


<form action="ManageRescuerView24.php" method="POST" >
    <div align="middle">
        <input  type="text" id="searchBar" name="resc" placeholder="" value="Search..." maxlength="35" autocomplete="off" onMouseDown="active();" onBlur="inactive();"/><input type="submit" id="searchBtn" value="Go!" />
    </div>
</form>

<form action="ManageRescuerController24.php" method="POST">
    
    <table width="80%" id="mytable" bordercolor="#fff">
                <tr>
                    <th>Nickname</th>
                    <th>First name</th>
                    <th>Family name</th>
                    <th>Date of birth</th>
                    <th>Phone Number</th>
                    <th>Gender</th>
                    <th>Date of join</th>
                    <th>Date of left</th>
                    <th>Function</th>   <!--bel td bdna nhot drop down list fiya l 3 bas l fi 3atoul whde selected    -->                        
                    <th>Delete</th>
                    <th>Save changes</th>   <!-- update -->
                </tr>

                <?php
                    // first td     <td name='nickname-".$i."' id=".$s['rescuer_nickname']." >".$s['rescuer_nickname']."</td>
                    // $qres=mysqli_query($conn,"select rescuer_nickname, rescuer_lastName, rescuer_dateOfBirth, rescuer_phoneNb, rescuerDate_join, rescuerDate_left from rescuer;");
                    require("ManageRescuerModel24.php");
                    $i=0;
                    if(!empty($_POST["resc"])){
                        $resc = htmlspecialchars($_POST["resc"]);
                        $res=searchRescuer($resc);
                     }else{
                        $res=displayRescuer();
                    }
                    
                    while($s=mysqli_fetch_array($res)){
                        $i++;
                        echo "
                                    <tr>
                                        <td><input contenteditable='false' name='nickname-".$i."' id=".$s['rescuer_nickname']." value=".$s['rescuer_nickname']."> </td>
                                        <td><input contenteditable='true' name='fname-".$i."' id='fname-".$i."' value=".$s['rescuer_firstName']."></td>
                                        <td><input contenteditable='true' name='lname-".$i."' id='lname-".$i."'value=".$s['rescuer_lastName']."></td>
                                        <td><input type='date' name='dob-".$i."' min='1962-01-01' max='2004-12-31' id='birthDate-".$i."' value=".$s['rescuer_dateOfBirth']." ></td>  
                                        <td><input contenteditable='true' type='text' placeholder='########' pattern='^((7(0|1|8|6))|(03|3)|(81))[0-9]{6}$' name='phoneNb-".$i."' id='phoneNb-".$i."' value=".$s['rescuer_phoneNb']."></td> 
                                        <td>
                                            <select name='gender-".$i."'>";
                                            while($o=mysqli_fetch_array($gen)){
                                                echo "<option value='".$o['gender_code']."'";
                                                if($o['gender_code']==$s['rescuer_gender']){
                                                    echo"selected";};
                                                echo ">".$o['gender_desc']."</option>";
                                             }
                                             mysqli_data_seek( $gen, 0 );
                                             echo "</select>
                                        </td> 
                                        <td><input type='date' name='doj-".$i."' id='joinDate-".$i."' value=".$s['rescuerDate_join']." ></td> 
                                        <td><input contenteditable='true' type='date' name='dol-".$i."' id='leftDate-".$i."'  value=" .$s['rescuerDate_left']."></td> 
                                        <td>
                                            <select name='function-".$i."'>";
                                            while($o=mysqli_fetch_array($result)){
                                                echo "<option value='".$o['rescuer_function_code']."'";
                                                if($o['rescuer_function_code']==$s['rescuer_function']){
                                                    echo"selected";
                                                };
                                                echo ">".$o['rescuer_function_desc']."</option>";
                                            }
                                            mysqli_data_seek( $result, 0 );
                                            echo "</select>
                                        </td>
   
                                        <td><input class='btnupdate' type='submit' name='delete-".$i."' value='Delete'></td>
                                        <td><input class='btnupdate' type='submit' name='update-".$i."' value='Update'></td>
                                    </tr> ";
                                    // ."<td><input type='submit' value='Update' name='toupdateRescuer' /></td>
                                    
                            
                    }
                ?>
    </table>

    <br><br>

    <button id='addrescuerbtn' type="button" onclick='plusItem()' class='btnadd'>Add Rescuer</button><br><br>
    <!-- <input type="submit" name="submit" value="Submit" /> -->
    
</form>
<div>
    <p>Welcome Administrator ! 
        <a href="logout.php" > 
            <i style="font-size:24px" class="logout">Logout</i>
        </a>
    </p>
</div>

</body>
<script>
    function plusItem(){
        var mytable = document.getElementById('mytable');
        var newRow   = mytable.insertRow(-1); 

        var newCell0  = newRow.insertCell(0);
        var newElem0 = document.createElement( 'input' );
        newElem0.setAttribute("name", "nickname");
        newElem0.setAttribute("type", "text");
        newElem0.setAttribute("placeholder", "Nick name");
        newElem0.setAttribute("id", (document.getElementById('mytable').rows.length-1)+"-0");
        newCell0.appendChild(newElem0);

        var newCell1  = newRow.insertCell(1);
        var newElem1 = document.createElement( 'input' );
        newElem1.setAttribute("name", "firstname");
        newElem1.setAttribute("type", "text");
        newElem1.setAttribute("placeholder", "First name");
        newElem1.setAttribute("id", (document.getElementById('mytable').rows.length-1)+"-1");
        newCell1.appendChild(newElem1);

        var newCell2  = newRow.insertCell(2);
        var newElem2 = document.createElement( 'input' );
        newElem2.setAttribute("name", "lastname");
        newElem2.setAttribute("type", "text");
        newElem2.setAttribute("placeholder", "Family name");
        newElem2.setAttribute("id", (document.getElementById('mytable').rows.length-1)+"-2");
        newCell2.appendChild(newElem2);

        var newCell3  = newRow.insertCell(3);
        var newElem3 = document.createElement( 'input' );
        newElem3.setAttribute("name", "dateofbirth");
        newElem3.setAttribute("type", "date");
        newElem3.setAttribute("min", "1962-01-01");
        newElem3.setAttribute("max", "2004-12-31");
        newElem3.setAttribute("placeholder", "date");
        newElem3.setAttribute("id", (document.getElementById('mytable').rows.length-1)+"-3");
        newCell3.appendChild(newElem3);

        var newCell4  = newRow.insertCell(4);
        var newElem4 = document.createElement( 'input' );
        newElem4.setAttribute("name", "phonenb");
        newElem4.setAttribute("type", "text");
        newElem4.setAttribute("pattern", "^((7(0|1|8|6))|(03|3)|(81))[0-9]{6}$");
        newElem4.setAttribute("placeholder", "Phone number");
        newElem4.setAttribute("id", (document.getElementById('mytable').rows.length-1)+"-4");
        newCell4.appendChild(newElem4);

        var newCell5  = newRow.insertCell(5);
        var newElem5 = document.createElement( "select" );
            var option1 = document.createElement("OPTION");
            var option2 = document.createElement("OPTION");
            option1.innerHTML ="Female";  option1.value ="1";
            option2.innerHTML ="Male";    option2.value ="2";
            newElem5.options.add(option1);
            newElem5.options.add(option2);
        newElem5.setAttribute("name", "gender");
        newElem5.setAttribute("id", (document.getElementById('mytable').rows.length-1)+"-5");
        newCell5.appendChild(newElem5);

        var newCell6  = newRow.insertCell(6);
        var newElem6 = document.createElement( 'input' );
        newElem6.setAttribute("name", "datejoin");
        newElem6.setAttribute("type", "date");
        newElem6.setAttribute("id", (document.getElementById('mytable').rows.length-1)+"-6");
        newCell6.appendChild(newElem6);

        var newCell7  = newRow.insertCell(7);
        var newElem7 = document.createElement( 'input' );
        newElem7.setAttribute("name", "dateleft");
        newElem7.setAttribute("type", "date");
        newElem7.setAttribute("id", (document.getElementById('mytable').rows.length-1)+"-7");
        newCell7.appendChild(newElem7);

        /////////////////////////////////////////////////////   function
        var newCell8  = newRow.insertCell(8);
        var newElem8 = document.createElement( 'input' );
        newElem8.setAttribute("name", "rescuerFunction");
        newElem8.setAttribute("value", "EMT");
        newElem8.setAttribute("type", "text");
        newElem8.setAttribute("disabled", "");
        newElem8.setAttribute("id", (document.getElementById('mytable').rows.length-1)+"-8");
        newCell8.appendChild(newElem8);

        // var newCell7  = newRow.insertCell(7);
        // var newElem7 = document.createElement( "select" );
        //                                          var option1 = document.createElement("OPTION");
        //                                          var option2 = document.createElement("OPTION");
        //                                          var option3 = document.createElement("OPTION");
        //                                          option1.innerHTML ="EMT";     option1.value ="3";
        //                                          option2.innerHTML ="Leader";  option2.value ="2";
        //                                          option3.innerHTML ="Driver";  option3.value ="1";
        //                                          newElem7.options.add(option1);
        //                                          newElem7.options.add(option2);
        //                                          newElem7.options.add(option3);
        //                                          newElem7.setAttribute("id", (document.getElementById('mytable').rows.length-1)+"-7");
        //                                          newElem7.setAttribute("name", "rescuerFunction");
        //                                          newCell7.appendChild(newElem7);
        

        ////////////////////////////////////////////////////

        var newCell9  = newRow.insertCell(9);
        var newElem9 = document.createElement( 'input' );
        newElem9.setAttribute("name", "deletebutton");
        newElem9.setAttribute("value", "cancel");
        newElem9.setAttribute("type", "button");
        newElem9.setAttribute("class", "delete");
        // onclick
        newElem9.setAttribute("onclick", "deleteRow(this)");
        newElem9.setAttribute("id", (document.getElementById('mytable').rows.length-1)+"-9");
        newCell9.appendChild(newElem9);

        var newCell10  = newRow.insertCell(10);
        var newElem10 = document.createElement( 'input' );
        newElem10.setAttribute("name", "insertrescuer");
        newElem10.setAttribute("value", "Insert Rescuer");
        newElem10.setAttribute("type", "submit");
        newElem10.setAttribute("class", "btninsert");
        // onclick  insert new rescuer and location.reload();
        // newElem8..setAttribute("onclick", "reloadPage()"); mech mechye
        newElem10.setAttribute("id", (document.getElementById('mytable').rows.length-1)+"-10");
        newCell10.appendChild(newElem10);
        
        button1=document.getElementById('addrescuerbtn');
        button1.disabled = true;
    }
    
    function deleteRow(r) {     //mytable.deleteRow(document.getElementById('mytable').rows.length-1)
        var mytable = document.getElementById('mytable');
        var i = r.parentNode.parentNode.rowIndex;
        mytable.deleteRow(i);
        location.reload();
    }
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
</HTML>
