<?php

    session_start();
    session_destroy(); //Destruimos la sesion para cerrarla

    header("Location: ../index.php");