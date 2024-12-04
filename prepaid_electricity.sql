CREATE DATABASE prepaid_electricity;

USE prepaid_electricity;

CREATE TABLE users (
  user_id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  address VARCHAR(255) NOT NULL,
  contact_number VARCHAR(20) NOT NULL,
  email VARCHAR(255) NOT NULL,
  proof_of_identity BLOB,
  account_number VARCHAR(20) NOT NULL,
  username VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  otp VARCHAR(6)
);

CREATE TABLE meters (
  meter_id INT PRIMARY KEY AUTO_INCREMENT,
  meter_number VARCHAR(20) NOT NULL,
  meter_type VARCHAR(10) NOT NULL,
  user_id INT NOT NULL,
  FOREIGN KEY (user_id) REFERENCES users(user_id)
);

CREATE TABLE consumption_data (
  consumption_id INT PRIMARY KEY AUTO_INCREMENT,
  meter_id INT NOT NULL,
  consumption_date DATE NOT NULL,
  consumption_time TIME NOT NULL,
  units_consumed DECIMAL(10, 2) NOT NULL,
  balance DECIMAL(10, 2) NOT NULL,
  FOREIGN KEY (meter_id) REFERENCES meters(meter_id)
);

CREATE TABLE recharge_history (
  recharge_id INT PRIMARY KEY AUTO_INCREMENT,
  meter_id INT NOT NULL,
  recharge_date DATE NOT NULL,
  recharge_time TIME NOT NULL,
  amount_recharged DECIMAL(10, 2) NOT NULL,
  recharge_code VARCHAR(20),
  FOREIGN KEY (meter_id) REFERENCES meters(meter_id)
);

CREATE TABLE billing_and_payment (
  billing_id INT PRIMARY KEY AUTO_INCREMENT,
  meter_id INT NOT NULL,
  billing_date DATE NOT NULL,
  billing_time TIME NOT NULL,
  amount_billed DECIMAL(10, 2) NOT NULL,
  payment_status VARCHAR(10) NOT NULL,
  payment_method VARCHAR(20) NOT NULL,
  FOREIGN KEY (meter_id) REFERENCES meters(meter_id)
);

CREATE TABLE system_logs (
  log_id INT PRIMARY KEY AUTO_INCREMENT,
  log_date DATE NOT NULL,
  log_time TIME NOT NULL,
  log_message TEXT NOT NULL
);
