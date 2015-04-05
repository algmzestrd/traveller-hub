<?php

    session_start();


    $server = "mysql.cs.iastate.edu:3306";
    $serverUser = "u30914";
    $serverPassword = "AfzMyGF4c7";
    $serverDatabase = "db30914";

    $email = $_POST['inputEmail'];
    $password = $_POST['inputPassword'];

    $connection = mysqli_connect($server, $serverUser, $serverPassword, $serverDatabase);

    $email = mysqli_real_escape_string($connection, $email);

    $queryString = "SELECT User_ID, password FROM User WHERE User_ID";
    $queryString .= "=" . "'" . $email . "'";

    $query = mysqli_query($connection, $queryString);

    $rows = mysqli_num_rows($query);

    if ($rows == 1) {
        $result = $query->fetch_all(MYSQLI_NUM);
        $hash = $result[0][1];

        if(password_verify($password, $hash)) {
            $response = "success";
            $_SESSION['user'] = $email;
            $_SESSION['firstname'] = "";
        }
        else {
            $response = "invalid";
        }
    } else {
        $response = "invalid";
    }

    echo $response;

    mysqli_close($connection);



