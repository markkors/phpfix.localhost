<?php
/* @var $usertable string */
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oplossing-2</title>
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
        <?=$usertable ?>
    </section>

    <section>
        <h2>Gebruiker toevoegen
        </h2>
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
