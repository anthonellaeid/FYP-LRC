<?php
    

    require("ambulanceReportModel.php");


    
     $a=$_POST["ambulance_selection"];
    //  echo $a;
     $b=$_POST["month"];
    //  echo $b;

    $r=getAll($a,$b);
    // while($s=mysqli_fetch_array($r)){
    //     echo 'MISSION ID: '. $s['mission_id'].'<br>';
    //     echo 'MISSION TYPE: '. $s['mission_type_desc'].'<br>';
    //     echo 'SOURCE: '. $s['src'].'<br>';
    //     echo 'DESTINATION: '. $s['dest'].'<br>';
    //     echo  $s['mission_final_km']-$s['mission_initial_km'].' COVERED KM <br><hr>';
    // }
///////////////////////////////////////////////////////////////////////////

if($a!=null && $b!=null){
    

echo "



<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href='https://www.w3schools.com/w3css/4/w3.css'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Raleway'>
    <!-- <link href='multiselect.css' rel='stylesheet'> -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>

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
            border-radius:10px;
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
        }
        
        button{
            color:vlack;
            background:blue;
            font-weight:bold;
            font-size:20px;
            border-radius:5px;
            width:10%;
        }
    </style>
    
</head>



<body>
        <div>
            <div>
                
            <img class='rad' src='b694107542fc4521a5ce598fa6ddc5a9.png' alt='ambulance' width='400px' height='300px'>
                        
                    <span class='start'>
                        &emsp;&emsp;&emsp;&emsp;
                        Ambulance:  ".$a." 
                        
                        &emsp;&emsp;&emsp;&emsp;
                        Month: ".$b." 
                        
                        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                        <button type='button' onclick=window.location.href='AmbulanceReportView.php'>Back</button>

                    </span> 
                    
                
            </div>

            <div id='main'>

                
                    ";


                    while($s=mysqli_fetch_array($r)){
                        echo "<div class='test'> <b>MISSION ID: </b><span class='testtt'>". $s['mission_id']."</span><br><br>";
                        echo "<b>MISSION TYPE: </b>". $s['mission_type_desc']."<br>";
                        echo "<b>SOURCE: </b>". $s['src']."<br>";
                        echo "<b>DESTINATION: </b>". $s['dest']."<br>";
                        echo "<u>". ($s['mission_final_km']-$s['mission_initial_km'])."</u><b> COVERED KM </b><br></div>";
                    }

                    echo "
                

            </div>
            

        </div>
</body>



</html>

";
}else{
    header("Location:ambulanceReportView.php");
    echo "go back";

}
?>