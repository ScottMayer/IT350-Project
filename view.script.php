<?php
    session_start();
    $_SESSION['filename'] = $_POST['filename'];
    header("Location: viewchit.php");
?>
