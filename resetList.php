<?php

if (isset($_SESSION['phone_book'])) {
    echo 'reset';
    unset($_SESSION['phone_book']);
} else {
    echo 'notfound';
}
