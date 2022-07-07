<!--    View    -->
<HTML>
<HEAD>
    <META NAME="GENERATOR" Content="Microsoft Visual Studio">
    <TITLE>Rescuers</TITLE>
    <style type="text/css">
        table {
            border: 1px solid;
        }
        th {
            background-color: red;
        }
        td{
            text-align: center;
        }
    </style> 

    
</HEAD>
<body>
  
<!--backgroud image and title-->
<!-- <img src='imagelrc.jpg' alt='imageeeeeeee'/> -->
<form  action="Update.php" method="POST">
    <table  id="mytable" width="100%" >
                <tr>
                    <th>Nickname</th>
                    <th>First name</th>
                    <th>Family name</th>
                    <th>Date of birth</th>
                    <th>Phone Number</th>
                    <th>Date of join</th>
                    <th>Date of left</th>
                    <!-- <th>Function</th>   bel td bdna nhot drop down list fiya l 3 bas l fi 3atoul whde selected    -->      
                    <th>Save changes</th>   <!-- update -->
                    <th>Delete</th>
                </tr>

                <?php
                    require ('DBconnection.inc.php');
                    // $qres=mysqli_query($conn,"select rescuer_nickname, rescuer_lastName, rescuer_dateOfBirth, rescuer_phoneNb, rescuerDate_join, rescuerDate_left from rescuer;");
                    $qres=mysqli_query($conn,"select * from rescuer;");
                    $i=0;
                    while($s= mysqli_fetch_assoc($qres)){
                        $i++;
                        echo "
                                    <tr>
                                        <td id=".$s['rescuer_nickname']." >".$s['rescuer_nickname']."</td>
                                        <td><input contenteditable='true' value=".$s['rescuer_firstName']." name='fname-".$i."' id='fname-".$i."'></td>
                                        <td><input contenteditable='true' value=".$s['rescuer_lastName']." id='lname-".$i."'></td>
                                        <td><input type='date' name='trip-start' min='1962-01-01' max='2004-12-31' value=".$s['rescuer_dateOfBirth']." id='birthDate-".$i."' ></td>  
                                        <td><input contenteditable='true' type='number' value=".$s['rescuer_phoneNb']." id='phoneNb-".$i."' ></td> 
                                        <td><input type='date' name='trip-start' value=".$s['rescuerDate_join']." id='joinDate-".$i."' ></td> 
                                        <td><input contenteditable='true' type='date' value=" .$s['rescuerDate_left']." id='leftDate-".$i."' ></td> 

                                        <td><a class='btn btn-primary' href='ManageRescuer.php?todelete=".$s['rescuer_nickname']."'>Delete</a></td>

                                        <td><a class='btn btn-primary' href='ManageRescuer.php?toupdateRescuer=".$s['rescuer_nickname']."'>Update</a></td>
                                    </tr> ";
                                    // ."<td><input type='submit' value='Update' name='toupdateRescuer' /></td>
                                    
                            if (isset($_GET["todelete"])){
                                    require ('DBconnection.inc.php');
                                    $todelete=htmlspecialchars($_GET["todelete"]);
                                    $todelete=mysqli_real_escape_string($conn,$todelete);
                                    $res=mysqli_query($conn,'DELETE FROM `rescuer` WHERE `rescuer_nickname`="'.$s['rescuer_nickname'].'"');
                                    mysqli_close($conn);
                            }
                            //    echo "<tr><td>". $_POST['fname-'.$i]." </td></tr>";

                            // if (isset($_GET["todelete"])){
                            //         require ('DBconnection.inc.php');
                            //         $todelete=htmlspecialchars($_GET["todelete"]);
                            //         $todelete=mysqli_real_escape_string($conn,$todelete);
                            //         $res=mysqli_query($conn,'DELETE FROM `rescuer` WHERE `rescuer_nickname`="'.$s['rescuer_nickname'].'"');
                            //         mysqli_close($conn);
                            // }
                            
                            ///////////////////////////////////////////////
                            // document.getElementById('mytable').children[0].children[1].children[1].innerHTML;

                            //    if (isset($_GET["toupdateRescuer"])){
                            //         require ('DBconnection.inc.php');
                            //         $toupdateRescuer=htmlspecialchars($_GET["toupdateRescuer"]);
                            //         $toupdateRescuer=mysqli_real_escape_string($conn,$toupdateRescuer);
                            //         // $fname=$_POST("fname-".$i.);
                            //         // $query="UPDATE `rescuer` SET `rescuer_firstName`='' WHERE rescuer_nickname='driver1';"
                            //         $id= $s['rescuer_nickname'];
                            //         $v1=$_POST['fname'];   ///////////////////// Function name must be a string in   //////////////////////////
                            //         $res=mysqli_query($conn,"UPDATE `rescuer` SET `rescuer_firstName`=".$v1." WHERE rescuer_nickname='driver1';");
                                    
                            //         // UPDATE `rescuer` SET `rescuer_firstName`="nnn" WHERE `rescuer_nickname`= 'driver1';
                            //         //                                                               $_POST("fname-".$i)
                            //         mysqli_close($conn);
                            //     }

                            ///////////////////////////////////////////////
                            // document.getElementById('mytable').children[0].children[1].children[1].innerHTML;

                    }
                ?>
    </table>

    

    <br><br>
    <br><br>

    <!-- <button id='addrescuerbtn' type="button" onclick='plusItem()'>Add Rescuer</button> -->
    <input type="submit" name="submit" value="Submit" />
    
</form>

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
        newElem3.setAttribute("placeholder", "dateeeee");
        newElem3.setAttribute("id", (document.getElementById('mytable').rows.length-1)+"-3");
        newCell3.appendChild(newElem3);

        var newCell4  = newRow.insertCell(4);
        var newElem4 = document.createElement( 'input' );
        newElem4.setAttribute("name", "phonenb");
        newElem4.setAttribute("type", "number");
        newElem4.setAttribute("placeholder", "Phone number");
        newElem4.setAttribute("id", (document.getElementById('mytable').rows.length-1)+"-4");
        newCell4.appendChild(newElem4);

        var newCell5  = newRow.insertCell(5);
        var newElem5 = document.createElement( 'input' );
        newElem5.setAttribute("name", "datejoin");
        newElem5.setAttribute("type", "date");
        newElem5.setAttribute("id", (document.getElementById('mytable').rows.length-1)+"-5");
        newCell5.appendChild(newElem5);

        var newCell6  = newRow.insertCell(6);
        var newElem6 = document.createElement( 'input' );
        newElem6.setAttribute("name", "dateleft");
        newElem6.setAttribute("type", "date");
        newElem6.setAttribute("id", (document.getElementById('mytable').rows.length-1)+"-6");
        newCell6.appendChild(newElem6);

        var newCell7  = newRow.insertCell(7);
        var newElem7 = document.createElement( 'input' );
        newElem7.setAttribute("name", "deletebutton");
        newElem7.setAttribute("value", "delete");
        newElem7.setAttribute("type", "button");
        // onclick
        newElem7.setAttribute("id", (document.getElementById('mytable').rows.length-1)+"-7");
        newCell7.appendChild(newElem7);

        var newCell8  = newRow.insertCell(8);
        var newElem8 = document.createElement( 'input' );
        newElem8.setAttribute("name", "insertrescuer");
        newElem8.setAttribute("value", "Insert Rescuer");
        newElem8.setAttribute("type", "submit");
        // onclick  insert new rescuer
        newElem8.setAttribute("id", (document.getElementById('mytable').rows.length-1)+"-8");
        newCell8.appendChild(newElem8);
        
    }
</script>
</HTML>
