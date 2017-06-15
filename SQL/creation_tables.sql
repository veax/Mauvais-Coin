CREATE TABLE Annonces(
	idAnnonce INTEGER PRIMARY KEY,
    	titre VARCHAR(150),
	description VARCHAR(800),
	prix VARCHAR(50),
	dateAnnonce DATE,
	idCategorie INTEGER REFERENCES Categories(idCategorie),
	email VARCHAR(100) REFERENCES Utilisateurs(email) 
	);
CREATE TABLE Utilisateurs(
	email VARCHAR(100) PRIMARY KEY,
	telephone VARCHAR(50),
	codePostal VARCHAR(25) REFERENCES Ville(codePostal)
	);

CREATE TABLE Villes(
	codePostal VARCHAR(25) PRIMARY KEY,
	nomVille VARCHAR(100),
	idregion INTEGER REFERENCES Regions (idRegion)
	);

CREATE TABLE Categories(
	idCategorie INTEGER PRIMARY KEY,
	nomCategorie VARCHAR(100)
	);

CREATE TABLE Regions(
	idregion INTEGER PRIMARY KEY,
	nomRegion VARCHAR(100)
	);
