<?php
include 'includes/session.php';

if(isset($_POST['upload'])){
    $id = $_POST['id'];
    $filename = $_FILES['photo']['name'];
    if(!empty($filename)){
        move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$filename);
    }

    $sql = "UPDATE candidates SET photo = '$filename' WHERE id = '$id'";
    if($conn->query($sql)){
        $_SESSION['success'] = 'Фото сәтті жаңартылды';
    }
    else{
        $_SESSION['error'] = $conn->error;
    }

}
else{
    $_SESSION['error'] = 'Алдымен фотосуретті жаңарту үшін кандидатты таңдаңыз';
}

header('location: candidates.php');
?>
