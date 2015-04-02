<?php
/**
 * Created by PhpStorm.
 * User: alberto
 * Date: 3/5/15
 * Time: 8:38 PM
 */

    session_start();

    if(!isset($_SESSION['user'])) {
    header("Location: loginPage.html");
}

    session_destroy(); // Destroying All Sessions
    header("Location: loginPage.html"); // Redirecting To Home Page
