<?php

session_start();

if (isset($_SESSION['user'])) {
    header('Location: ./API_Public/');
} else {
    header('Location: ./API_Login/signUp.php');
}