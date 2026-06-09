CREATE DATABASE IF NOT EXISTS luku_db;
USE luku_db;

CREATE TABLE IF NOT EXISTS token_purchases (
    id INT AUTO_INCREMENT PRIMARY KEY,
    meter_number VARCHAR(20) NOT NULL,
    amount DOUBLE NOT NULL,
    mobile_network VARCHAR(20) NOT NULL,
    phone_number VARCHAR(15) NOT NULL,
    generated_token VARCHAR(30) NOT NULL,
    purchase_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);