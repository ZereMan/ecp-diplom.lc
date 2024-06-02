<?php
include 'includes/session.php';

$sql = "DELETE FROM votes";
if($conn->query($sql)){
    $_SESSION['success'] = "Дауыс беру нәтижелері сәтті қалпына келтірілді";
}
else{
    $_SESSION['error'] = "Қалпына келтіру барысында қате пайда болды";
}

header('location: votes.php');

?>
