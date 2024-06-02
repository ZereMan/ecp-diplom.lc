<?php
include 'includes/session.php';

$return = 'home.php';
if(isset($_GET['return'])){
    $return = $_GET['return'];
}

if(isset($_POST['save'])){
    $title = $_POST['title'];

    $file = 'config.ini';
    $content = 'election_title = '.$title;

    file_put_contents($file, $content);

    $_SESSION['success'] = 'Сайлау атауы сәтті жаңартылды';

}
else{
    $_SESSION['error'] = "Алдымен конфигурация формасын толтырыңыз";
}

header('location: '.$return);

?>
