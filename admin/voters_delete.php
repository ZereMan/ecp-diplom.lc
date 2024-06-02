<?php
include 'includes/session.php';

if(isset($_POST['delete'])){
    $id = $_POST['id'];
    $sql = "DELETE FROM voters WHERE id = '$id'";
    if($conn->query($sql)){
        $_SESSION['success'] = 'Сайлаушы сәтті жойылды';
    }
    else{
        $_SESSION['error'] = $conn->error;
    }
}
else{
    $_SESSION['error'] = 'Алдымен жою үшін элементті таңдаңыз';
}

header('location: voters.php');
?>
