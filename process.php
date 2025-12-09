<?php
$nameError = "";
$emailError = "";
$passwordError = "";
$confirmError = "";
$successMessage = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];

    if ($name === "") {
        $nameError = "Name is required.";
    }

    if ($email === "" || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = "Enter a valid email.";
    }

    if (strlen($password) < 6) {
        $passwordError = "Password must be 6 characters or more.";
    }

    if ($password !== $confirmPassword) {
        $confirmError = "Passwords do not match.";
    }

    if ($nameError === "" && $emailError === "" && $passwordError === "" && $confirmError === "") {
        $file = "users.json";

        if (!file_exists($file)) {
            file_put_contents($file, "[]");
        }

        $data = file_get_contents($file);
        $users = json_decode($data, true);

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $users[] = [
            "name" => $name,
            "email" => $email,
            "password" => $hashedPassword
        ];

        file_put_contents($file, json_encode($users, JSON_PRETTY_PRINT));

        $successMessage = "Registration Successful!";
    }

    echo $successMessage;
    echo $nameError;
    echo $emailError;
    echo $passwordError;
    echo $confirmError;
}
?>
