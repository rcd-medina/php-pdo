
CREATE DATABASE curso_pdo;

USE curso_pdo;

CREATE TABLE users (
    id          INTEGER UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name        VARCHAR(50) NOT NULL,
    email       VARCHAR(50) UNIQUE KEY NOT NULL,
    password    VARCHAR(255) NULL,
    create_at   TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP
)


USE curso_pdo;
CREATE TABLE posts (
    id          INTEGER UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title       VARCHAR(50) NOT NULL,
    user        INTEGER NOT NULL,
    description TEXT NULL,
    create_at   TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP
)

INSERT INTO users (name, email, password) VALUES ('Fernando', 'fernando@hotmail.com', 123);


