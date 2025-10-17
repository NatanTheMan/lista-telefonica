<?php

session_start();

if (!isset($_SESSION['phone_book'])) {
    $_SESSION['phone_book'] = [];
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.html');
    exit();
}

$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL, FILTER_SANITIZE_EMAIL);
$phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_NUMBER_INT);

$errors = [];

if ($name === '') {
    $errors[] = 'Nome é obrigatório.';
}
if ($email === '') {
    $errors[] = 'E-mail é obrigatório.';
}
if ($phone === 0) {
    $errors[] = 'Telefone é obrigatório.';
}

if (count($errors) > 0) {
    echo '<h1>Bad Request</h1>';
    foreach ($errors as $e) {
        echo "<li>$e</li>";
    }
} else {
    array_push($_SESSION['phone_book'], ['name' => $name, 'email' => $email, 'phone' => $phone]);

    echo "<h1>Lista telefônica</h1><ul>";
    foreach ($_SESSION['phone_book'] as $i) {
        [$name, $email, $phone] = $i;
        echo "<li>" . $i['name'] . "</li>";
        echo "<li>" . $i['email'] . "</li>";
        echo "<li>" . $i['phone'] . "</li>";
        echo '<br>';
    }
    echo '</ul>';
}
