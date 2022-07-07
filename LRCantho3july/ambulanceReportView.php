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

    <title>Ambulance Report</title>

    <style>
        body{
            background-color: black;
            color:white;
            font-size:20px;
            font-family:cursive;
        }
        .start{
            padding-top:-100px; /*???????????????????????????????????????/*/
            /* background-color:red; */
            border-radius:5px;
            /* width:75%;/*???????????????????????????????????????/
            height:20%;/*???????????????????????????????????????/ */
            margin-left:7%;
        }
        .rad{
            border-bottom-right-radius:15px;
        }
        .selection{
            margin-left:1%;
        }
        select{
            border-radius:8px;
        }
        .test{
            background-color:white;
            color:black;
            margin-left:25%;
            margin-top:10%;
            padding-left:10%;
            padding-top:2%;
            padding-bottom:2%;
            border-radius:30px;
            width:50%;
            /* font-family:cursive; */
        }
        .testtt{
            color:red;
        }
        .img2{
            border-top-right-radius:15px;
            border-top-left-radius:15px;
            margin-left:30%;
            margin-top:2%;
            display:none;
        }
        button{
            margin-left:50%;
            width:35%;
            padding-top:2%;
            padding-bottom:2%;
            color:black;
            background:white;
            font-weight:bold;
            font-size:30px;
            border-radius:30px;
            border:solid;
            border-color:red;
            border-width:7px;
        }
    </style>
    
</head>



<body>
    <?php
        require("ambulanceReportModel.php");
    ?>
    <div>
        <form action="ambulanceReportController.php" method="POST">
            <img class="rad" src="360_F_122488937_dg4JELO2FlpSlWbaF6QLppvf3ILxYpK2.jpg" alt="ambulance">
                
            <span class="start">
                &emsp;&emsp;&emsp;&emsp;
                Ambulance: 
                <span class="selection">
                    <select name="ambulance_selection" id="ambulance_selection">
                        <option style="display:none" value=""></option>
                        <?php 
                            while($o=mysqli_fetch_array($result1)){
                                echo "<option value='".$o['ambulance_id']."'>".$o['ambulance_description']."</option>";
                            }
                        ?>
                    </select>
                </span>
                &emsp;&emsp;&emsp;&emsp;
                Month:
                <span class="selection">
                    <select name="month" id="month">
                        <option value=""></option>
                        <option value="1">January</option>
                        <option value="2">February</option>
                        <option value="3">March</option>
                        <option value="4">April</option>
                        <option value="5">May</option>
                        <option value="6">June</option>
                        <option value="7">July</option>
                        <option value="8">August</option>
                        <option value="9">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                </span>
                &emsp;&emsp;&emsp;&emsp;
            </span> 
            <p>
                <button type="submit" onclick="getReports()">Go</button>
            </p>
        </form>
    </div>

    <div id="main">

    </div>
    
    <!-- <img id="img2" class="img2" src="istockphoto-915293840-612x612.jpg" alt="ambulance"> -->
</body>



<script>
    function getReports(){


            var ambulanceValue = document.getElementById("ambulance_selection").value;
            var monthValue = document.getElementById("month").value;
            // alert("ambulance: "+ambulanceValue+" "+"month "+monthValue);
            if(monthValue!="" && ambulanceValue!=""){
                
            
                var req = new XMLHttpRequest();
                var method = "GET";
                var url = "ambulanceReportController.php";
                var asynchronous = true;

                req.open(method,url,asynchronous);
                req.send();

                req.onreadystatechange = function(){
                    console.log("fffffffffff");
                    if(this.readyState == 4 && this.status == 200){
                        console.log("laaaaaaa");
                        // converting json to array
                        var data = JSON.parse(this.responseText);
                        console.log(data);
                        for(var a=0 ; a<data.length; a++ ){
                            var mission_id = data[a].mission_id;
                            var mission_type_desc = data[a].mission_type_desc;
                            var src = data[a].src;
                            var dest = data[a].dest;
                            var km = data[a].mission_final_km - data[a].mission_initial_km;

                            // console.log(data[a].mission_final_km+" - " +data[a].mission_initial_km +" = "+km);

                            // create a div for each report
                             
                                // create a new div element
                                const newDiv = document.createElement("div");
                                
                                // add the content node to the newly created div
                                const missionId = document.createElement("p"); 
                                missionId.innerText="MISSION ID: " +mission_id+"\n\nTYPE: "+mission_type_desc+"\n\nSOURCE: "+src+"\n\nDESTINATION: "+dest+"\n\n"+km+" COVERED KM";

                                // missionId.setAttribute("class", "testtt");
                                newDiv.appendChild(missionId);
                                

                                
                                // div styling
                                newDiv.setAttribute("class", "test");
                                // add the newly created element and its content into the DOM
                                document.getElementById("main").appendChild(newDiv);

                        }
                    }
                }
                
            document.getElementById("img2").style.display="inline";
            }
    }

</script>

</html>