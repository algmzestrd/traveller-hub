<?php

    session_start();


    $server = "mysql.cs.iastate.edu:3306";
    $serverUser = "u30914";
    $serverPassword = "AfzMyGF4c7";
    $serverDatabase = "db30914";
    $connection = mysqli_connect($server, $serverUser, $serverPassword, $serverDatabase);
    $object = new DateTime("now");
    $date = $object->format("m-d-Y");

    $email = $_POST['inputEmail'];
    $password = $_POST['inputPassword'];

    $passwordLength = strlen($password);

    $connection = mysqli_connect($server, $serverUser, $serverPassword, $serverDatabase);

    $email = mysqli_real_escape_string($connection, $email);
    $password = password_hash($password, PASSWORD_BCRYPT);

    $queryString = "INSERT INTO User (User_ID , password, register_date) VALUES (";
    $queryString .= "'" . $email . "'" . ", " . "'" . $password . "'" . ", " . "'" . $date . "')";

    $query = mysqli_query($connection, $queryString);

/*    $queryString = "INSERT INTO Profile (User_ID) VALUES(" . "'" . $email . "')";

    $query = mysqli_query($connection, $queryString);*/

    if(!$query) {
    $error = "Email is already registered.";
}
    else {
    $error = "Registration successful!";
}
    mysqli_close($connection);


    echo $error;





