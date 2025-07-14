CREATE TABLE final_project_membre (
    id_membre INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    date_naissance DATE,
    genre ENUM('Homme', 'Femme', 'Autre'),
    email VARCHAR(150) UNIQUE NOT NULL,
    ville VARCHAR(100),
    mdp VARCHAR(255) NOT NULL,
    image_profil VARCHAR(255)
);

CREATE TABLE final_project_categorie_objet (
    id_categorie INT AUTO_INCREMENT PRIMARY KEY,
    nom_categorie VARCHAR(100) NOT NULL
);

CREATE TABLE final_project_objet (
    id_objet INT AUTO_INCREMENT PRIMARY KEY,
    nom_objet VARCHAR(100) NOT NULL,
    id_categorie INT,
    id_membre INT,
    FOREIGN KEY (id_categorie) REFERENCES final_project_categorie_objet(id_categorie),
    FOREIGN KEY (id_membre) REFERENCES final_project_membre(id_membre)
);

CREATE TABLE final_project_images_objet (
    id_image INT AUTO_INCREMENT PRIMARY KEY,
    id_objet INT NOT NULL,
    nom_image VARCHAR(255) NOT NULL,
    FOREIGN KEY (id_objet) REFERENCES final_project_objet(id_objet)
);

CREATE TABLE final_project_emprunt (
    id_emprunt INT AUTO_INCREMENT PRIMARY KEY,
    id_objet INT NOT NULL,
    id_membre INT NOT NULL,
    date_emprunt DATE NOT NULL,
    date_retour DATE,
    FOREIGN KEY (id_objet) REFERENCES final_project_objet(id_objet),
    FOREIGN KEY (id_membre) REFERENCES final_project_membre(id_membre)
);

INSERT INTO final_project_membre (id_membre, nom, date_naissance, genre, email, ville, mdp, image_profil) VALUES
(1, 'Membre1', '1991-01-01', 'Homme', 'membre1@mail.com', 'Ville1', 'mdp1', 'profil1.jpg'),
(2, 'Membre2', '1992-01-01', 'Homme', 'membre2@mail.com', 'Ville2', 'mdp2', 'profil2.jpg'),
(3, 'Membre3', '1993-01-01', 'Homme', 'membre3@mail.com', 'Ville3', 'mdp3', 'profil3.jpg'),
(4, 'Membre4', '1994-01-01', 'Homme', 'membre4@mail.com', 'Ville4', 'mdp4', 'profil4.jpg');

INSERT INTO final_project_categorie_objet (id_categorie, nom_categorie) VALUES
(1, 'esthetique'),
(2, 'bricolage'),
(3, 'mecanique'),
(4, 'cuisine');

INSERT INTO final_project_objet (id_objet, nom_objet, id_categorie, id_membre) VALUES
(1, 'Objet_1', 2, 1),
(2, 'Objet_2', 3, 1),
(3, 'Objet_3', 4, 1),
(4, 'Objet_4', 1, 1),
(5, 'Objet_5', 2, 1),
(6, 'Objet_6', 3, 1),
(7, 'Objet_7', 2, 1),
(8, 'Objet_8', 4, 1),
(9, 'Objet_9', 3, 1),
(10, 'Objet_10', 3, 1),
(11, 'Objet_11', 4, 2),
(12, 'Objet_12', 2, 2),
(13, 'Objet_13', 4, 2),
(14, 'Objet_14', 2, 2),
(15, 'Objet_15', 3, 2),
(16, 'Objet_16', 4, 2),
(17, 'Objet_17', 3, 2),
(18, 'Objet_18', 3, 2),
(19, 'Objet_19', 3, 2),
(20, 'Objet_20', 2, 2),
(21, 'Objet_21', 3, 3),
(22, 'Objet_22', 2, 3),
(23, 'Objet_23', 2, 3),
(24, 'Objet_24', 1, 3),
(25, 'Objet_25', 3, 3),
(26, 'Objet_26', 2, 3),
(27, 'Objet_27', 3, 3),
(28, 'Objet_28', 4, 3),
(29, 'Objet_29', 3, 3),
(30, 'Objet_30', 1, 3),
(31, 'Objet_31', 3, 4),
(32, 'Objet_32', 1, 4),
(33, 'Objet_33', 2, 4),
(34, 'Objet_34', 2, 4),
(35, 'Objet_35', 4, 4),
(36, 'Objet_36', 1, 4),
(37, 'Objet_37', 1, 4),
(38, 'Objet_38', 2, 4),
(39, 'Objet_39', 4, 4),
(40, 'Objet_40', 1, 4);

INSERT INTO final_project_emprunt (id_emprunt, id_objet, id_membre, date_emprunt, date_retour) VALUES
(1, 40, 3, '2025-07-03', '2025-07-13'),
(2, 13, 3, '2025-07-10', '2025-07-15'),
(3, 15, 1, '2025-07-08', '2025-07-13'),
(4, 22, 2, '2025-07-06', '2025-07-21'),
(5, 14, 2, '2025-07-07', '2025-07-18'),
(6, 37, 1, '2025-07-08', '2025-07-21'),
(7, 12, 1, '2025-07-01', '2025-07-15'),
(8, 32, 4, '2025-07-03', '2025-07-08'),
(9, 37, 1, '2025-07-07', '2025-07-16'),
(10, 4, 4, '2025-07-01', '2025-07-08');
