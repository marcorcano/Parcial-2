-- Crea la base de datos
CREATE DATABASE Ingenieria;

-- Selecciona la base de datos
USE Ingenieria;

-- Crea una tabla de usuarios
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL
);
