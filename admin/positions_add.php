<?php
include 'includes/session.php';

if(isset($_POST['add'])){
    $description = $_POST['description'];
    $max_vote = $_POST['max_vote'];

    // Проверяем, есть ли уже данные в таблице positions
    $sql = "SELECT * FROM positions ORDER BY priority DESC LIMIT 1";
    $query = $conn->query($sql);
    $row = $query->fetch_assoc();

    // Устанавливаем priority. Если данных нет, начинаем с 1
    $priority = $row ? $row['priority'] + 1 : 1;

    // Используем подготовленное выражение для вставки данных
    $sql = "INSERT INTO positions (description, max_vote, priority) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("sii", $description, $max_vote, $priority);
        if($stmt->execute()){
            $_SESSION['success'] = 'Позиция сәтті қосылды';
        } else {
            $_SESSION['error'] = $conn->error;
        }
        $stmt->close();
    } else {
        $_SESSION['error'] = $conn->error;
    }
} else {
    $_SESSION['error'] = 'Алдымен қосу формасын толтырыңыз';
}

header('location: positions.php');
?>
