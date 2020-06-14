<?php
$regId ="kostkita-4";

// INCLUDE YOUR FCM FILE
include_once 'fcm.php';    

$notification = array();
$arrNotification= array();			
$arrData = array();											
$arrNotification["body"] ="Berhasil dong.";
$arrNotification["title"] = "Notifikasi";
$arrNotification["sound"] = "default";
$arrNotification["type"] = 1;

$fcm = new FCM();
$result = $fcm->send_notification($regId, $arrNotification,"Android");
?>