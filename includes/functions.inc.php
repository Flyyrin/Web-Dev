<?php

// Empty Input
function emptyInputSignup($userName, $userEmail, $userUserName, $userPassword, $userPassworRepeat) {
    $result;
    if (empty($userName) || empty($userEmail) || empty($userUserName) || empty($userPassword) || empty($userPassworRepeat)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

// Invalid user name
function invalidUserUserName($userUserName) {
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $userUserName)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

// Invalid Email
function invalidEmail($userEmail) {
    $result;
    if (!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}    

// Password match
function passwordMatch($userPassword, $userPassworRepeat) {
    $result;
    if ($userPassword !== $userPassworRepeat) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}    


// Username Taken
function userNameTaken($connectDataBase, $userUserName, $userEmail) {
   $sql = "SELECT * FROM users WHERE userUserName = ? OR userEmail = ?;";
   $stmt = mysqli_stmt_init($connectDataBase);
   if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../signup.php?error=stmtFailed");
   }
   
   mysqli_stmt_bind_param($stmt, "ss", $userUserName, $userEmail);
   mysqli_stmt_execute($stmt);

   $resultData = mysqli_stmt_get_result($stmt);

   if ($row = mysqli_fetch_assoc($resultData)) {
       return $row;
   }
   else {
       $result = false;
       return $result;
   }
   mysqli_stmt_close($stmt);
}    


// Create user
function createUser($connectDataBase, $userName, $userEmail, $userUserName, $userPassword) {
    $sql = "INSERT INTO users (userName, userEmail, userUserName, userPassword) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($connectDataBase);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
     header("location: ../signup.php?error=stmtFailed");
    }

    $hashedPassword = password_hash($userPassword, PASSWORD_DEFAULT);
    
    mysqli_stmt_bind_param($stmt, "ssss", $userName, $userEmail, $userUserName, $hashedPassword);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signup.php?error=none");
}
