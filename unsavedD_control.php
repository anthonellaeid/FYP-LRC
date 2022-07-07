<?php

 require("unsavedD_Model.php");
$orderBy = "mission_id";
$order = "desc";
if(!empty($_GET["orderby"])) {
    $orderBy = htmlspecialchars($_GET["orderby"]);
    $orderBy = mysqli_real_escape_string($conn,$orderBy);
}
if(!empty($_GET["order"])) {
    $order = htmlspecialchars($_GET["order"]);
    $order=mysqli_real_escape_string($conn,$order);
}
$MissionIDNextOrder="asc";
$Mission_typeNextOrder = "asc";
$shift_descNextOrder = "asc"; 
$statusNextOrder="desc";

if($orderBy == "mission_id" and $order == "asc") {
    $MissionIDNextOrder = "desc";
}
if($orderBy == "mission_type_desc" and $order == "asc") {
    $Mission_typeNextOrder = "desc";
}

if($orderBy == "shift_desc" and $order == "asc") {
    $shift_descNextOrder = "desc";
}
if($orderBy == "missionStatus_desc" and $order == "asc") {
    $statusNextOrder = "asc";
}
$result=sortTable1($order,$orderBy);
/*Complete Mission */
$ordersBy = "mission_id";
$orders = "desc";
if(!empty($_GET["ordersby"])) {
    $ordersBy = htmlspecialchars($_GET["ordersby"]);
    $ordersBy = mysqli_real_escape_string($conn,$ordersBy);
}
if(!empty($_GET["orders"])) {
    $orders = htmlspecialchars($_GET["orders"]);
    $orders=mysqli_real_escape_string($conn,$orders);
}
$MissionIDNextOrder2="asc";
$Mission_typeNextOrder2 = "asc";
$shift_descNextOrder2 = "asc"; 
$statusNextOrder2="desc";

if($ordersBy == "mission_id" and $orders == "asc") {
    $MissionIDNextOrder2 = "desc";
}
if($ordersBy == "mission_type_desc" and $orders == "asc") {
    $Mission_typeNextOrder2 = "desc";
}

if($ordersBy == "shift_desc" and $orders == "asc") {
    $shift_descNextOrder2 = "desc";
}
if($ordersBy == "missionStatus_desc" and $orders == "asc") {
    $statusNextOrder2 = "asc";
}
$result2=sortTabl($orders,$ordersBy);

/*Canceled Mission */
$orderByCanceled = "mission_id";
$orderCancel = "desc";
if(!empty($_GET["orderByCanceled"])) {
    $orderByCanceled = htmlspecialchars($_GET["orderByCanceled"]);
    $orderByCanceled = mysqli_real_escape_string($conn,$orderByCanceled);
}
if(!empty($_GET["orderCancel"])) {
    $orderCancel = htmlspecialchars($_GET["orderCancel"]);
    $orderCancel=mysqli_real_escape_string($conn,$orderCancel);
}
$MissionIDNextOrder3="asc";
$Mission_typeNextOrder3 = "asc";
$shift_descNextOrder3 = "asc"; 
$statusNextOrder3="desc";

if($orderByCanceled == "mission_id" and $orderCancel == "asc") {
    $MissionIDNextOrder3 = "desc";
}
if($orderByCanceled == "mission_type_desc" and $orderCancel == "asc") {
    $Mission_typeNextOrder3 = "desc";
}

if($orderByCanceled == "shift_desc" and $orderCancel == "asc") {
    $shift_descNextOrder3 = "desc";
}
if($orderByCanceled == "missionStatus_desc" and $orderCancel == "asc") {
    $statusNextOrder3 = "asc";
}
$resultCancel=sortCanceled($orderCancel,$orderByCanceled);


?>