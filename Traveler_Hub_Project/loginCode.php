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
            $queryString = "SELECT * FROM Profile WHERE User_ID='";
            $queryString .= $email . "'";
            $query = mysqli_query($connection, $queryString);
            $result = $query->fetch_all(MYSQLI_NUM);
            $_SESSION['firstname'] = $result[0][1];
            $_SESSION['lastname'] = $result[0][2];
            $_SESSION['age'] = $result[0][3];
            $_SESSION['gender'] = $result[0][4];
            $_SESSION['location'] = $result[0][5];
            $_SESSION['hotel'] = $result[0][6];
            $_SESSION['description'] = $result[0][7];
            $_SESSION['interests'] = $result[0][8];

        }
        else {
            $response = "invalid";
        }
    } else {
        $response = "invalid";
    }

    echo $response;

    mysqli_close($connection);



