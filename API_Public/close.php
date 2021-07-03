<?php

session_start();

session_destroy();

$_SESSION = [];

header('Location: ../API_Login/logIn.php');