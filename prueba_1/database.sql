CREATE DATABASE Prueba1DB;

USE Prueba1DB;

CREATE TABLE Category (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    createdAt DATETIME DEFAULT CURRENT_TIMESTAMP,
    updatedAt DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);



CREATE TABLE Product (
    id INT AUTO_INCREMENT PRIMARY KEY,
    code VARCHAR(50) UNIQUE NOT NULL,
    name VARCHAR(255) NOT NULL,
    category_id INT,
    price FLOAT,
    createdAt DATETIME DEFAULT CURRENT_TIMESTAMP,
    updatedAt DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES Category(id)
);

-- Insertar datos en la tabla Category
INSERT INTO Category (name) VALUES 
    ('Electrónicos'),
    ('Ropa'),
    ('Hogar');

-- Insertar datos en la tabla Product
INSERT INTO Product (code, name, category_id, price) VALUES 
    ('PROD001', 'Televisor LED 50 pulgadas', 1, 699.99),
    ('PROD002', 'Camiseta manga corta', 2, 19.99),
    ('PROD003', 'Sofá de cuero', 3, 899.99);
