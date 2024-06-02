<?php
session_start();
include 'includes/conn.php';

if(isset($_POST['login'])){
    $voter_id = $_POST['voter_id'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM voters WHERE voters_id = ? AND email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $voter_id, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows < 1){
        $_SESSION['error'] = 'Осы ID және Email үйлесімімен пайдаланушы табылмады. Қайтадан көріңіз!';
        header('location: login-page.php');
        exit();
    }
    else{
        $row = $result->fetch_assoc();
        if(password_verify($password, $row['password'])){
            $_SESSION['voter'] = $row['id'];
            $_SESSION['voter_id'] = $row['id'];
            $_SESSION['voter_email'] = $email;
            header('location: home.php');
            exit();
        }
        else{
            $_SESSION['error'] = 'Қате құпиясөз. Қайтадан көріңіз!';
            header('location: home.php');
            exit();
        }
    }
}
else{
    $_SESSION['error'] = 'Жалғастыру үшін Сайлаушы ID, Email және Құпиясөзді енгізіңіз!';
    header('location: login-page.php');
    exit();
}
?>
