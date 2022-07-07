<?php
    // $conn = mysqli_connect("localhost", "root", "", "lrc")or die('error');
require("DBconnection.inc.php");
function sortTable1($order,$orderBy){
    require("DBconnection.inc.php");
    $Todayz=date("Y-m-d");
    $sql = "SELECT * from today where missionStatus_code=1 and Iscreator=1	 ORDER BY " . $orderBy . " " . $order;
	$result = mysqli_query($conn,$sql);
    mysqli_close($conn);
if($result){ 
return $result;}}
/** */
function sortTabl($orders,$ordersBy){
    require("DBconnection.inc.php");
    $Todayz=date("Y-m-d");
    $sql = "SELECT * from today where missionStatus_code=2	and Iscreator=1 and mission_start_date='".$Todayz."' ORDER BY " . $ordersBy . " " . $orders;
	$result2 = mysqli_query($conn,$sql);
    mysqli_close($conn);
return $result2;}

function sortCanceled($orderCancel,$orderByCanceled){
    require("DBconnection.inc.php");
    $Todayz=date("Y-m-d");
    $sqlCancel = "SELECT * from today where missionStatus_code=3 and Iscreator=1 and mission_start_date='".$Todayz."' ORDER BY " . $orderByCanceled . " " . $orderCancel;
	$resultCancel = mysqli_query($conn,$sqlCancel);
    mysqli_close($conn);
    return $resultCancel;
}

    ?>
