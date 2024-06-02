<?php
include 'includes/session.php';
include 'includes/slugify.php';

if (isset($_POST['confirm'])) {
    $userCode = $_POST['code'];
    if ($userCode == $_SESSION['voter_code']) {
        // Код верный, записываем голоса в базу данных
        $sql_array = array();
        $error = false;
        foreach ($_SESSION['post'] as $position => $candidates) {
            if ($position !== 'vote') {
                $position_id_query = $conn->query("SELECT id, max_vote FROM positions WHERE description LIKE '%" . slugify($position) . "%'");
                $pos_data = $position_id_query->fetch_assoc();
                $pos_id = $pos_data['id'];
                $max_vote = $pos_data['max_vote'];

                if (is_array($candidates)) {
                    if (count($candidates) > $max_vote) {
                        $error = true;
                        $_SESSION['error'][] = 'You can only choose ' . $max_vote . ' candidates for ' . $position;
                    } else {
                        foreach ($candidates as $candidate_id) {
                            $sql_array[] = "INSERT INTO votes (voters_id, candidate_id, position_id) VALUES ('" . $_SESSION['voter_id'] . "', '$candidate_id', '$pos_id')";
                        }
                    }
                } else {
                    $sql_array[] = "INSERT INTO votes (voters_id, candidate_id, position_id) VALUES ('" . $_SESSION['voter_id'] . "', '$candidates', '$pos_id')";
                }
            }
        }

        if (!$error) {
            foreach ($sql_array as $sql) {
                $conn->query($sql);
            }
            $_SESSION['success'] = 'Сіздің дауысыңыз сәтті жазылды.';
            unset($_SESSION['post'], $_SESSION['voter_code']);  // очистка сессии
            header('location: home.php');
            exit();
        } else {
            header('location: confirm_vote.php');
            exit();
        }
    } else {
        $_SESSION['error'][] = 'Invalid confirmation code.';
        header('location: confirm_vote.php');
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Vote</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background-color: white;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 300px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 2px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-top: 8px;
            margin-bottom: 16px;
            display: inline-block;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #45a049;
        }

        .error, .success {
            color: #ff0000;
            text-align: center;
        }

        .success {
            color: #008000;
        }
    </style>
</head>
<body>
<div class="form-container">
    <h2>Дауыс беруді растаңыз</h2> <!-- Confirm Your Vote переведено как "Дауыс беруді растаңыз" -->
    <?php if (isset($_SESSION['error'])): ?>
        <div class="error"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
    <?php endif; ?>
    <?php if (isset($_SESSION['success'])): ?>
        <div class="success"><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></div>
    <?php endif; ?>
    <form action="" method="post">
        <div class="form-group">
            <label for="code">Электрондық растау кодын енгізіңіз:</label> <!-- Enter your confirmation code переведено как "Электрондық растау кодын енгізіңіз" -->
            <input type="text" id="code" name="code" required>
        </div>
        <button type="submit" name="confirm">Дауыс беруді растаңыз</button> <!-- Confirm Vote переведено как "Дауыс беруді растаңыз" -->
    </form>
</div>
</body>
</html>
