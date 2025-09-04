CREATE DATABASE IF NOT EXISTS coffee_shop;
USE coffee_shop;

CREATE TABLE admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100),
    password VARCHAR(50)
);

INSERT INTO admin (email, password) VALUES ('admin@coffee.com', 'admin');

CREATE TABLE user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100),
    password VARCHAR(50)
);

INSERT INTO user (email, password) VALUES ('user@coffee.com', 'user123');

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    description TEXT,
    price DECIMAL(10,2),
    image VARCHAR(255)
);

CREATE TABLE cart (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    product_id INT,
    qty INT DEFAULT 1
);