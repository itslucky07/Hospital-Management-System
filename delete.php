<?php 
@include('config.php');
session_start();
$user_id = $_GET['id'];


// DELETE user 
    
if (isset($user_id)) {
    mysqli_query($conn, "DELETE FROM user WHERE id = '$user_id'") or die('Query failed');
    header('location: Admin.php');
}

if (isset($_GET['doc_id'])) {
    $id=$_GET['doc_id'];
    mysqli_query($conn, "DELETE FROM dentist WHERE doc_id =$id") or die('Query failed');
    header('location: admin_header.php');
}

if (isset($_GET['doc_id']) && isset($_GET['sche_id'])) {
    $id=$_GET['doc_id'];
    $sche_id=$_GET['sche_id'];
    mysqli_query($conn, "DELETE FROM schedule WHERE d_id =$id AND schedule_id=$sche_id") or die('Query failed');
    header('location: admin_header.php');
}

if (isset($_GET['id']) && isset($_GET['msg_id'])) {
    $id=$_GET['id'];
    $msg_id=$_GET['msg_id'];
    mysqli_query($conn, "DELETE FROM messages WHERE user_id = $id AND msg_id = $msg_id") or die('Query failed');
    header('location: admin_header.php');
}

if (isset($_GET['app_id'])) {
    $id=$_GET['app_id'];
    mysqli_query($conn, "DELETE FROM appointment WHERE appoint_id = $id") or die('Query failed');
    header('location: admin_header.php');
}

?>