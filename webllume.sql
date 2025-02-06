CREATE DATABASE webllume CHARACTER SET utf8 COLLATE utf8_general_ci;
USE webllume;

CREATE TABLE UserPrivileges (
  id INT NOT NULL AUTO_INCREMENT,
  nom VARCHAR(45) NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE user (
  id INT NOT NULL AUTO_INCREMENT,
  nom VARCHAR(50) NOT NULL,
  prenom VARCHAR(50) NOT NULL,
  email VARCHAR(70) NOT NULL UNIQUE,
  mot_de_passe VARCHAR(100) NOT NULL,
  biographie MEDIUMTEXT,
  photo_profil VARCHAR(100),
  user_privileges_id INT NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (user_privileges_id) REFERENCES UserPrivileges(id)
);

CREATE TABLE categorie (
  id INT NOT NULL AUTO_INCREMENT,
  nom_categorie VARCHAR(100) NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE projet (
  id INT NOT NULL AUTO_INCREMENT,
  titre VARCHAR(150) NOT NULL,
  description MEDIUMTEXT NOT NULL,
  annee_creation INT NOT NULL,
  lien_site VARCHAR(100) NOT NULL,
  image VARCHAR(150) NOT NULL,
  user_id INT NOT NULL,
  categorie_id INT NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (user_id) REFERENCES user(id),
  FOREIGN KEY (categorie_id) REFERENCES categorie(id)
);

SHOW TABLES;

SELECT * FROM categorie;

INSERT INTO categorie (nom_categorie) VALUES
('Vitrine'),
('Page d’atterrissage'),
('Transactionnel'),
('Boutique en ligne'),
('Application web'),
('Blogue');
-- La plateforme aura uniquement les 7 catégories pour les projets de développement web.

INSERT INTO UserPrivileges (nom) VALUES
('Admin'),
('Editor'),
('Viewer');

SELECT * FROM UserPrivileges;
-- utilisateur test
INSERT INTO user (nom, prenom, email, mot_de_passe, biographie, user_privileges_id)
VALUES
('Bravo', 'Patricia', 'pbravo.art@gmail.com', '123', 'Web designer & web front end developer in training', '1');

INSERT INTO categorie (nom_categorie) VALUES
('Portfolio');

SELECT * FROM user;
INSERT INTO projet (titre, description, annee_creation, lien_site, image, user_id, categorie_id) VALUES
('Portfolio', 'Projets réalisés pendant mon programme de développement web', '2025', 'www.lien', 'image.jpg', '2', '7');

SELECT * FROM projet;
SELECT * FROM user;

INSERT INTO projet (titre, description, annee_creation, lien_site, image, user_id, categorie_id) VALUES
('Club de Voyage', 'Projet réalisé pendant mon cours de WordPress', '2025', 'https://patrihow.github.io/club-de-voyage/', 'image.jpg', '2', '6'),  
('Sokoban', 'Projet réalisé pendant mon cours de JavaScript', '2025', 'www.lien', 'image.jpg', '2', '5'),  
('Stampee', 'Projet réalisé pendant mon cours de UX/UI', '2025', 'www.lien', 'image.jpg', '2', '4');  

UPDATE projet
SET image = CASE
    WHEN titre = 'Portfolio' THEN 'assets/uploads/img-1.jpg'
    WHEN titre = 'Club de Voyage' THEN 'assets/uploads/img-2.jpg'
    WHEN titre = 'Sokoban' THEN 'assets/uploads/img-3.jpg'
    WHEN titre = 'Stampee' THEN 'assets/uploads/img-4.jpg'
END
WHERE titre IN ('Portfolio', 'Club de Voyage', 'Sokoban', 'Stampee');

SELECT * FROM projet WHERE titre IN ('Portfolio', 'Club de Voyage', 'Sokoban', 'Stampee');

UPDATE projet
SET image = 'assets/uploads/pexels-pixabay-38519.jpg'
WHERE titre = 'Webllume';

-- Fin de la création de la base de données et de ses catégories.
