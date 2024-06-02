<?php
include 'includes/session.php';

if(isset($_POST['edit'])){
    $id = $_POST['id'];
    $description = $_POST['description'];
    $max_vote = $_POST['max_vote'];

    $sql = "UPDATE positions SET description = '$description', max_vote = '$max_vote' WHERE id = '$id'";
    if($conn->query($sql)){
        $_SESSION['success'] = 'Позиция сәтті жаңартылды';
    }
    else{
        $_SESSION['error'] = $conn->error;
    }
}
else{
    $_SESSION['error'] = 'Алдымен өзгерту формасын толтырыңыз';
}

header('location: positions.php');

?>
