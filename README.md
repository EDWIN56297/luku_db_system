# luku_db_system   @kadefue @kadefue@yahoo.co.uk
a system developed by EDWIN HARUNA with reg no 14325077/T.24
# Mzumbe University Prepaid Electricity Token Purchase System

## Academic Context
* **Institution:** Mzumbe University
* **Faculty:** Faculty of Science and Technology (FST)
* **Department:** Computing Science Studies
* **Course:** CSS 221: Introduction to Web Programming
* **Course Instructor:** Bertha Msuliche Lebalwa, MSc
* **Lab Evaluator / Assessor:** Mr. Kadefue

---

## Project Overview
The **Mzumbe Prepaid Electricity Token Purchase System** is an asynchronous dynamic web application that simulates a mobile-network payment gateway for purchasing prepaid LUKU electricity tokens. 

The implementation strictly demonstrates the **Separation of Concerns (SoC)** principle across client-side architecture and secure database persistence stacks as prescribed in the CSS 221 lecture modules.

---

## Architectural Compliance Matrix

### 1. Structure (XHTML 1.0 Strict) — *Lecture 2*
The interface structure inside `index.php` adheres to the strict syntactical standards of XML parsing rules:
* All element tags and operational attributes are written explicitly in lowercase.
* Elements are well-formed and tightly bound with required closing tokens.
* Safe input parameter transport is managed strictly via the HTTP `POST` action method.

### 2. Presentation (CSS Box Model & Campus Palette) — *Lecture 2*
Visual design configurations inside `style.css` validate deep technical comprehension of the **CSS Box Model** layout system (Padding padding cushions, margins, borders, and width boundaries).
* Brand identity integration uses the official institution color codes: **Mzumbe Green** (`rgb(0, 102, 51)`) and **Mzumbe Gold** (`#FFCC00`).

### 3. Client Behavior (jQuery Asynchronous AJAX Validation) — *Lecture 3 & 5*
The application replaces traditional request-response latency with fluid real-time data flows via `app.js`:
* **Event Interception:** Captures input form submissions and stops immediate target reloading actions using `event.preventDefault()`.
* **Client Validation:** Enforces strict constraint checks (===) regarding input presence, type validation, and exact length constraints.
* **Asynchronous Communication:** Employs the jQuery library to compile element serializations and execute asynchronous background requests (`$.post`) to receive server state payloads.

### 4. Back-End Server Scripting & Database Security (PHP PDO) — *Lecture 4*
The script engine inside `process.php` handles backend processes securely:
* **SQL Injection Mitigation:** Abandons insecure relational query commands (`mysqli`). Database operations utilize the **PHP Data Objects (PDO) API** executing real server-side **Prepared Statements** with question mark (?) parameter mappings.
* **XSS Armor:** Input data objects pass through strict escaping validations (`htmlspecialchars`) before output rendering hooks occur.
* **Omission of Auto-Increment Fields:** The schema handles automatic increments for transactional unique IDs (`id`), meaning form requests isolate internal sequencing values from manual customer manipulation.

---

## Installation & Deployment Guide

### Database Setup (via phpMyAdmin)
1. Create a relational storage container directory called: `luku_db`.
2. Open the database container's **SQL window**, paste the structural table parameters below, and click **Go**:

```sql
CREATE TABLE IF NOT EXISTS token_purchases (
    id INT AUTO_INCREMENT PRIMARY KEY,
    meter_number VARCHAR(20) NOT NULL,
    amount DOUBLE NOT NULL,
    mobile_network VARCHAR(20) NOT NULL,
    phone_number VARCHAR(15) NOT NULL,
    generated_token VARCHAR(30) NOT NULL,
    purchase_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
