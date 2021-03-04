<?php

if (isset($_POST["submit"])) {
    $userName = $_POST["userName"];
    $userEmail = $_POST["userEmail"];
    $userUserName = $_POST["userUserName"];
    $userPassword = $_POST["userPassword"];
    $userPassworRepeat = $_POST["userPassworRepeat"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';


    // Empty Input
    if (emptyInputSignup($userName, $userEmail, $userUserName, $userPassword, $userPassworRepeat) !== false) {
        header("location: ../signup.php?error=emptyInput");
        exit();
    }

    // Invalid User name
    if (invalidUserUserName($userUserName) !== false) {
        header("location: ../signup.php?error=invalidUserUserName");
        exit();
    }

    // Invalid Email
    if (invalidEmail($userEmail) !== false) {
        header("location: ../signup.php?error=invalidUserEmail");
        exit();
    }

    // Repeat password
    if (passwordMatch($userPassword, $userPassworRepeat) !== false) {
        header("location: ../signup.php?error=passwordNoMatch");
        exit();
    }

    // Username Taken
    if (userNameTaken($connectDataBase, $userUserName, $userEmail) !== false) {
        header("location: ../signup.php?error=userUserNameTaken");
        exit();
    }

    createUser($connectDataBase, $userName, $userEmail, $userUserName, $userPassword);




}
else {
    header("location: ../signup.php");
    exit();        

}