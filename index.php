<?php

require_once("shared.php");

$db = db_connect();
$result = mysqli_query($db, "SELECT id, name, email from tugas_6");

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
        th, td {
            border: 1px solid black;
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
    <form action="insert.php" method="post">
        <label for="name">Nama</label>
        <input type="text" name="name" id="name" required>
        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" required>
        <input type="submit" value="Tambah">
    </form>
    <table>
        <thead>
            <th>Nama</th>
            <th>Email</th>
            <th>Aksi</th>
        </thead>
        <tbody>
            <?php 
            while($row = mysqli_fetch_assoc($result)){
                echo("<tr>");
                echo("<td>" . $row["name"] . "</td>");
                echo("<td>" . $row["email"] . "</td>");
                echo("<td><a href=\"update.php?id=" . $row["id"] . "\">Edit</a>");
                echo(" - ");
                echo("<a href=\"delete.php?id=" . $row["id"] . "\">Delete</a></td>");
                echo("</tr>");
            }
            ?>
        </tbody>
    </table>
</body>
</html>