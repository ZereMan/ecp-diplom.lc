<?php
session_start();
include 'includes/conn.php';

if (isset($_POST['register'])) {
    $voter_id = $_POST['voters_id'];
    $email = $_POST['email'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $filename = $_FILES['photo']['name'];

    if (!empty($filename)) {
        move_uploaded_file($_FILES['photo']['tmp_name'], 'uploads/' . $filename);
    } else {
        $filename = 'default.jpg'; // Егер фото жүктелмесе, әдепкі сурет пайдаланылады
    }

    $sql = "INSERT INTO voters (voters_id, email, firstname, lastname, password, photo) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $voter_id, $email, $firstname, $lastname, $password, $filename);
    if ($stmt->execute()) {
        $_SESSION['success'] = 'Тіркеу сәтті аяқталды!'; // Registration successful!
        header('location: index.html');
    } else {
        $_SESSION['error'] = 'Бірдеңе дұрыс болмады. Қайталап көріңіз.'; // Something went wrong. Please try again.
        header('location: register.php');
    }
    exit();
}
?>

<?php include 'includes/header.php'; ?>

<body class="hold-transition register-page">
<div class="register-box">
    <div class="register-logo">
        <b>ЭЦП арқылы дауыс беру жүйесінде тіркелу</b> <!-- Register on e-Vox -->
    </div>

    <div class="register-box-body">
        <p class="login-box-msg">Жаңа мүшелікке тіркелу</p> <!-- Register a new membership -->

        <form action="register.php" method="POST" enctype="multipart/form-data">
            <div class="form-group has-feedback">
                <input type="text" class="form-control" name="voters_id" placeholder="Дауыс берушінің нөмірі" required> <!-- Voter ID -->
            </div>
            <div class="form-group has-feedback">
                <input type="email" class="form-control" name="email" placeholder="Электрондық пошта" required> <!-- Email -->
            </div>
            <div class="form-group has-feedback">
                <input type="text" class="form-control" name="firstname" placeholder="Аты" required> <!-- First name -->
            </div>
            <div class="form-group has-feedback">
                <input type="text" class="form-control" name="lastname" placeholder="Тегі" required> <!-- Last name -->
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" name="password" placeholder="Құпия сөз" required> <!-- Password -->
            </div>
            <div class="form-group has-feedback">
                <input type="file" name="photo">
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <button type="submit" class="btn btn-primary btn-block btn-flat" name="register">Тіркелу</button> <!-- Register -->
                </div>
            </div>
        </form>
    </div>
    <?php
    if(isset($_SESSION['error'])){
        echo "<div class='callout callout-danger text-center mt20'><p>".$_SESSION['error']."</p></div>";
        unset($_SESSION['error']);
    }
    if(isset($_SESSION['success'])){
        echo "<div class='callout callout-success text-center mt20'><p>".$_SESSION['success']."</p></div>";
        unset($_SESSION['success']);
    }
    ?>
</div>

<?php include 'includes/scripts.php' ?>
</body>
</html>
