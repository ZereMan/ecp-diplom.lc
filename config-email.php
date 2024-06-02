<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "plugins/PHPMailer-6.9.1/src/Exception.php";
require "plugins/PHPMailer-6.9.1/src/PHPMailer.php";
require "plugins/PHPMailer-6.9.1/src/SMTP.php";

$mail = new PHPMailer(true);

try {
    // Сервер параметрлері
    $mail->isSMTP();                                            // SMTP қолдану орнатуы
    $mail->Host       = 'smtp.gmail.com';                       // SMTP сервері
    $mail->SMTPAuth   = true;                                   // SMTP аутентификациясын қосу
    $mail->Username   = 'zhumagazyevk@gmail.com';               // SMTP пайдаланушы аты
    $mail->Password   = 'fadh rovc lyvu grvt';                  // SMTP құпиясөзі
    $mail->SMTPSecure = 'tls';                                  // TLS шифрлауын қосу
    $mail->Port       = 587;                                    // Қосылу үшін TCP порты

    // Қабылдаушылар
    $mail->setFrom('zhumagazyevk@gmail.com', 'ECP-DIPLOM');
    // Контент
    $mail->isHTML(true);
    $mail->Subject = 'Міне тақырып';
    $mail->Body    = 'Бұл HTML хабарламаның негізгі бөлігі <b>қалың қаріппен!</b>';
    $mail->AltBody = 'Бұл HTML емес пошта клиенттеріне арналған хабарламаның қарапайым мәтін бөлігі';

    $mail->send();
    echo 'Хабарлама жіберілді';
} catch (Exception $e) {
    echo "Хабарлама жіберілмеді. Пошта қатесі: {$mail->ErrorInfo}";
}
?>
