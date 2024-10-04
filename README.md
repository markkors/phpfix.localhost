In dit project gebruikt je een stukje PHP code (rommel.php) waarin diverse zaken niet netje zijn gecodeerd. Kun jij de fouten verbeteren?
De database die je erbij kunt gebruiken kun je maken met behulp van het volgende SQL script:

-- Maak de database aan
CREATE DATABASE IF NOT EXISTS mijn_database;

-- Gebruik de database
USE mijn_database;

-- Maak de users tabel aan
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

-- Voeg enkele demogegevens toe
INSERT INTO users (username, password) VALUES 
('johndoe', 'password123'),
('janedoe', 'janesecurepass'),
('admin', 'adminpassword');
