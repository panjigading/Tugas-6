<?php

require_once("shared.php");

$db = db_connect();
$stmt = mysqli_prepare($db, "INSERT INTO tugas_6(name, email) VALUES (?,?)");
mysqli_stmt_bind_param($stmt, "ss", $_POST["name"], $_POST["email"]);
mysqli_stmt_execute($stmt);

back_to_home();