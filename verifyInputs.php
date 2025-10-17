<?php

function verifyInputs(string $name, string $email, string $phone): array
{
    $errors = [];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'E-mail inválido.';
    } else {
        foreach ($_SESSION['phone_book'] as $i) {
            if ($email === $i['email']) {
                echo  'E-mail já cadastrado<br>';
                echo  '<a href="index.html">Voltar</a>';
                exit();
            }
        }
    }

    if ($name === '') {
        $errors[] = 'Nome é obrigatório.';
    }

    if ($phone === '') {
        $errors[] = 'Telefone é obrigatório.';
    } elseif (strlen($phone) < 11) {
        $errors[] = 'Número de telefone inválido.';
    }

    return $errors;
}
