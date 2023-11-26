-- Table pour stocker les utilisateurs
CREATE TABLE user (
    id_user INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255)
);

-- Table pour stocker les sports
CREATE TABLE sport (
    id_sport INT AUTO_INCREMENT PRIMARY KEY,
    designation VARCHAR(255)
);

-- Table pour stocker les pratiques
CREATE TABLE pratique (
    id_pers INT,
    id_sport INT,
    niveau VARCHAR(255),
    PRIMARY KEY (id_pers, id_sport),
    FOREIGN KEY (id_pers) REFERENCES user(id_user) ON DELETE CASCADE,
    FOREIGN KEY (id_sport) REFERENCES sport(id_sport) ON DELETE CASCADE
);
