-- Active: 1701864337706@@localhost@3306@note
CREATE TABLE users(
    id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(150) NOT NULL UNIQUE,
    password_hash CHAR(32) NOT NULL,
    username VARCHAR(70) NOT NULL UNIQUE
);

CREATE TABLE notes(
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_user INT NOT NULL,
    id_categ INT,
    title VARCHAR(255) NOT NULL,
    content TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_user) REFERENCES users(id),
    FOREIGN KEY (id_categ) REFERENCES categories(id)
);

CREATE TABLE folders(
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_user INT NOT NULL,
    name VARCHAR(255) NOT NULL,
    FOREIGN KEY (id_user) REFERENCES users(id)
);

CREATE TABLE categories(
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_user INT NOT NULL,
    name VARCHAR(255) NOT NULL,
    FOREIGN KEY (id_user) REFERENCES users(id)
);

CREATE TABLE note_folder(
    id_note INT NOT NULL,
    id_folder INT NOT NULL,
    FOREIGN KEY (id_note) REFERENCES notes(id),
    FOREIGN KEY (id_folder) REFERENCES folders(id)
);