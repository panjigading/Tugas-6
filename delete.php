<?php

require_once("shared.php");

$db = db_connect();
$stmt = mysqli_prepare($db, "DELETE FROM tugas_6 WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $_GET["id"]);
mysqli_stmt_execute($stmt);
back_to_home();
