<?php
include "classes/dbcontext.php";
$db = new dbcontext();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['action'] == 'toevoegen') {
    // sanitize input
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    // add user to database
    $db->addUser($username, $password);
    // post redirect get pattern (in geval van een repost niet nogmaals de gebruiker toevoegen)
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}


if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['action'] == 'verwijderen') {
    // sanitize input
    $id = htmlspecialchars($_POST['id']);
    $db->deleteUser($id);
    // post redirect get pattern (in geval van een repost niet nogmaals de gebruiker toevoegen)
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}


if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['action'] == 'wijzigen') {
    // sanitize input
    $id = htmlspecialchars($_POST['id']);
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $db->editUser($id, $username, $password);
    // post redirect get pattern (in geval van een repost niet nogmaals de gebruiker toevoegen)
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// haal de actuele gebruikers op
$usertable = $db->getUsersTable();


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Oplossing-1</title>
    <style>
        main {
            display: flex;
            flex-wrap: wrap;
        }

        main > section {
            margin: 10px;
            padding: 10px;
            border: 1px solid black;
            flex: 1;
        }

        td {
            border: 1px solid black;
        }
    </style>
</head>
<body>

<main>

    <section>
        <h2>Gebruikers</h2>
        <?= $usertable ?>
    </section>

    <section><h2>Gebruiker toevoegen</h2>
        <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
            <label for="username">Gebruikersnaam:</label><br>
            <input type="text" id="username" name="username" required><br>
            <label for="password">Wachtwoord:</label><br>
            <input type="password" id="password" name="password" required><br>
            <input type="hidden" name="action" value="toevoegen">
            <button type="submit">Toevoegen</button>
        </form>
    </section>


    <section>
        <h2>Gebruiker verwijderen</h2>
        <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
            <label for="id">Gebruikers ID:</label><br>
            <input type="number" id="id" name="id" required><br>
            <input type="hidden" name="action" value="verwijderen">
            <button type="submit">Verwijderen</button>
        </form>
    </section>

    <section>
        <h2>Gebruiker wijzigen</h2>
        <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
            <label for="id">Gebruikers ID:</label><br>
            <input type="number" id="id" name="id" required><br>
            <label for="username">Gebruikersnaam:</label><br>
            <input type="text" id="username" name="username" required><br>
            <label for="password">Wachtwoord:</label><br>
            <input type="password" id="password" name="password" required><br>
            <input type="hidden" name="action" value="wijzigen">
            <button type="submit">Wijzigen</button>
        </form>
    </section>

</main>


</body>
</html>



