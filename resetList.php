<?php

session_start();

if (isset($_SESSION['phone_book'])) {
    unset($_SESSION['phone_book']);
}
header('Location: index.html');
exit();
