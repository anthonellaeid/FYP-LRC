<?php
$conn=mysqli_connect('localhost','root','','lrc') or die('Cant connect');


if(isset($_GET['time'])){
    $t=date($_GET['time']);
    // echo "timeee=".$t."**********";
    // $sql="SELECT `id`, DATE_FORMAT(`time`, '%H:%i') as start_time, DATE_FORMAT(`EndTime`, '%H:%i')as EndTime FROM `timee`";
    $sql="SELECT `shift_code`, `shift_desc`, DATE_FORMAT(`shift_start_hour`, '%H:%i') as start_time, DATE_FORMAT(`shift_end_hour`, '%H:%i')as EndTime FROM `shift`";
    $res=mysqli_query($conn,$sql);

    while($res1=mysqli_fetch_array($res)){
        
        if($res1['start_time']<$t && $t<$res1['EndTime']){
            echo  $res1['shift_code'];
            exit();
        }  else {
            $res1=mysqli_fetch_array($res);
            echo $res1['shift_code'];
        }    
        
}
}
?>