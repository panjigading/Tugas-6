<?php

function db_connect()
{
    return mysqli_connect("localhost", "root", "gg", "pemweb");
}

function back_to_home()
{
    header('Location: index.php');
    die();
}