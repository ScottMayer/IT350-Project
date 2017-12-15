<?php
    session_start();
    $_SESSION['filename'] = $_POST['filename'];
    header("Location: generate_pdf.php");
?>
