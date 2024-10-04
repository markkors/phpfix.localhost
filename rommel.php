<?php

// Verbinding maken met de database
$conn = mysqli_connect("localhost", "mijn_database_user", "mijn_database_user", "mijn_database");

if (!$conn) {
    die("Fout: Kan geen verbinding maken met de database. " . mysqli_connect_error());
}


// Een nieuwe gebruiker toevoegen
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['action'] == 'toevoegen') {
    $gebruikersnaam = $_POST['username'];
    $wachtwoord = $_POST['password'];
    $sql = "INSERT INTO users (username, password) VALUES ('$gebruikersnaam', '$wachtwoord')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "Gebruiker toegevoegd.<br>";
    } else {
        echo "Fout bij het toevoegen van gebruiker: " . mysqli_error($conn) . "<br>";
    }
}

// Gebruiker verwijderen
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['action'] == 'verwijderen') {
    $id = $_POST['id'];
    $sql = "DELETE FROM users WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "Gebruiker verwijderd.<br>";
    } else {
        echo "Fout bij het verwijderen van gebruiker: " . mysqli_error($conn) . "<br>";
    }
}

// Alle gebruikers weergeven
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<h3>Gebruikerslijst</h3>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "ID: " . $row['id'] . " - Gebruikersnaam: " . $row['username'] . "<br>";
    }
} else {
    echo "Geen gebruikers gevonden.<br>";
}

// Databaseverbinding sluiten
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gebruikersbeheer</title>
</head>
<body>
<h2>Gebruiker toevoegen</h2>
<form method="POST" action="">
    <label for="username">Gebruikersnaam:</label><br>
    <input type="text" id="username" name="username" required><br>
    <label for="password">Wachtwoord:</label><br>
    <input type="password" id="password" name="password" required><br>
    <input type="hidden" name="action" value="toevoegen">
    <button type="submit">Toevoegen</button>
</form>

<h2>Gebruiker verwijderen</h2>
<form method="POST" action="">
    <label for="id">Gebruikers ID:</label><br>
    <input type="number" id="id" name="id" required><br>
    <input type="hidden" name="action" value="verwijderen">
    <button type="submit">Verwijderen</button>
</form>
</body>
</html>
