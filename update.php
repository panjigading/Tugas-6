<?php

require_once("shared.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $db = db_connect();
    $stmt = mysqli_prepare($db, "UPDATE tugas_6 SET name = ?, email = ? WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "ssi", $_POST["name"], $_POST["email"], $_POST["id"]);
    mysqli_stmt_execute($stmt);
    back_to_home();
}

$db = db_connect();
$stmt = mysqli_prepare($db, "SELECT id, name, email FROM tugas_6 WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $_GET["id"]);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($result)

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple CRUD</title>
    <style>
        body {
            padding: 1rem;
            margin: 0 auto;
            max-width: 100ch;
            font-family: sans-serif;
        }
        form {
            display: grid;
            grid-template-columns: fit-content(15ch) 1fr;
            margin-bottom: 2rem;
            gap: .5rem 2rem;
        }
        table {
            border: 1px solid black;
            border-collapse: collapse;
            width: 100%;
        }
        thead {
            background-color: whitesmoke;
        }
        th, td, input {
            padding: .5rem 1rem;
        }
        input {
            font: inherit;
            padding: .2rem 1rem;
        }
        input[type=submit] {
            grid-column: 2;
            width: fit-content;
        }
    </style>
</head>
<body>
    <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?= $row["id"]; ?>">
        <label for="name">Nama</label>
        <input type="text" name="name" id="name" required value="<?= $row["name"]; ?>">
        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" required value="<?= $row["email"]; ?>">
        <input type="submit" value="Ubah">
    </form>
</body>
</html>