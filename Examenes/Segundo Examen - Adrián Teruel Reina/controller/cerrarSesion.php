<?php
    session_start();
    $_SESSION["inicioS"] = "";
    
    header("Location: ../index.php");