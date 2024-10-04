**Uitleg project**
In dit project gebruikt je een stukje PHP code (_rommel.php_) waarin diverse zaken niet netje zijn gecodeerd. Kun jij de fouten verbeteren?
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

**Oplossingen**
Deze kunt je vinden vanaf de hoofdfolder in de submappen _oplossing-x_. Hierbij is x het nummer van de oplossing. De oplossingen zijn als volgt:

**Oplossing 1:**

In deze folder vind je de code waarbij de _dbcontext_ class is toegevoegd. In deze class de diverse CRUD methods toegevoegd om een user toe te voegen, te verwijderen, te updaten en op te halen.
In deze class is gedacht aan het gebruik van prepared statements om SQL injection te voorkomen. Daarnaast wordt de input gevalideerd en gesanitized om XSS aanvallen te voorkomen.
Naast de _dbcontext_ class is een eenvoudige class _user_ toegevoegd om de data van een user te kunnen opslaan en ophalen.

De classes zelf zijn in deze oplossing apart gezet (in een subfolder) van de rootfolder van het project. Dit is gedaan om de code overzichtelijk te houden en de classes makkelijk te kunnen hergebruiken in andere projecten.

Vanuit _index.php_ wordt de _dbcontext_ class aangeroepen en worden de diverse CRUD methods getest.


**Oplossing 2:**

In deze oplossing gaan we meer kijken naar een zg. MVC-structuur. Hierbij worden de verschillende functionaliteiten nog meer gesplitst in aparte classes. Zo is er een _controller_ class die de input van de gebruiker afhandelt en doorstuurt naar de _model_ class. De _model_ class handelt de data af en stuurt deze weer terug naar de _controller_ class. De _controller_ class zorgt er vervolgens voor dat de data op de juiste manier wordt weergegeven aan de gebruiker.
Deze structuur ziet er als volgt uit:

index.php

├── controllers  
│   └── UserController.php  
├── models  
│   └── User.php  
├── views  
│   └── user_management.php  
├── config  
│   └──dbcontext.php



In deze oplossing is de _dbcontext_ class geplaatst in een aparte folder _config_. De _user_ class is geplaatst in de folder _models_. De _user_management.php_ is nieuw en geplaatst in de folder _views_.
Ook de _UserController_ class is nieuw en geplaatst in de folder _controllers_.

Vanuit _index.php_ wordt de _UserController_ class aangeroepen en worden de diverse CRUD methods getest.

De verschillende classes zijn in folders geplaatst, met de autoloader functie wordt ervoor gezorgd dat de classes automatisch worden ingeladen. Dit zorgt voor een overzichtelijke structuur en maakt het makkelijk om classes te hergebruiken in andere projecten.



