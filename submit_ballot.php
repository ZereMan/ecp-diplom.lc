<?php
include 'includes/session.php';
include 'includes/slugify.php';
include 'config-email.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['vote'])) {
    if (count($_POST) == 1) {
        $_SESSION['error'][] = 'Кем дегенде бір үміткерге дауыс беріңіз'; // Please vote at least one candidate
    } else {
        $_SESSION['post'] = $_POST;
        $email = $_SESSION['voter_email'];  // Предполагается, что email уже сохранен в сессии
        $code = rand(100000, 999999);  // Генерация кода подтверждения
        $_SESSION['voter_code'] = $code;  // Сохранение кода в сессии для последующей проверки

        // Отправка кода на email пользователя
        $mail = new PHPMailer(true);
        try {
            // Настройки сервера
            $mail->isSMTP();                                            // Установка использования SMTP
            $mail->Host       = 'smtp.gmail.com';                       // SMTP сервер
            $mail->SMTPAuth   = true;                                   // Включение SMTP аутентификации
            $mail->Username   = 'zhumagazyevk@gmail.com';               // SMTP имя пользователя
            $mail->Password   = 'fadh rovc lyvu grvt';                  // SMTP пароль
            $mail->SMTPSecure = 'tls';                                  // Включить шифрование TLS
            $mail->Port       = 587;                                    // TCP порт для подключения

            // Получатели
            $mail->setFrom('zhumagazyevk@gmail.com', 'ECP-DIPLOM');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'Эцп'; // Your Confirmation Code
            $mail->Body = "Код: $code"; // Your confirmation code is: $code

            $mail->send();
            $_SESSION['success'] = 'Растау коды сіздің электрондық поштаңызға жіберілді. Кодты тексеріп, дауысыңызды растаңыз.'; // A confirmation code has been sent to your email. Please check to confirm your vote.
            header('location: confirm_vote.php');
            exit();
        } catch (Exception $e) {
            $_SESSION['error'][] = 'Пошта жіберу қатесі: ' . $mail->ErrorInfo; // Mailer Error:
        }
    }
} else {
    $_SESSION['error'][] = 'Алдымен үміткерлерді таңдаңыз'; // Select candidates to vote first
}

header('location: home.php');
?>
