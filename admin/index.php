<?php
session_start();
if(isset($_SESSION['admin'])){
    header('location:home.php');
}
?>
<?php include 'includes/header.php'; ?>

<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <b>Электрондық цифрлық қолтаңба</b> <!-- Электронный цифровой подпись на казахском -->
    </div>

    <div class="login-box-body">
        <p class="login-box-msg">Сайлау басқару үшін жүйеге кіріңіз!</p> <!-- Log into your account to manage election переведено как "Сайлау басқару үшін жүйеге кіріңіз!" -->

        <form action="login.php" method="POST">
            <div class="form-group has-feedback">
                <input type="text" class="form-control login-input" name="username" placeholder="Пайдаланушы аты" required> <!-- Username переведено как "Пайдаланушы аты" -->
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control login-input" name="password" placeholder="Құпия сөз" required> <!-- Password переведено как "Құпия сөз" -->
            </div>
            <div class="row">
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat login-btn" name="login">Кіру</button> <!-- LogIn переведено как "Кіру" -->
                </div>
            </div>
        </form>
    </div>
    <?php
    if(isset($_SESSION['error'])){
        echo "
					<div class='callout callout-danger text-center mt20'>
						<p>".$_SESSION['error']."</p> 
					</div>
				";
        unset($_SESSION['error']);
    }
    ?>
</div>

<?php include 'includes/scripts.php' ?>
</body>
</html>
