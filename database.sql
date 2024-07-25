CREATE DATABASE school;

USE school;

CREATE TABLE students (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  birth_date DATE,
  cpf CHAR(11)
);

CREATE TABLE classes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  description VARCHAR(100),
  year_at INT,
  vacancies INT
);

CREATE TABLE enrollment (
  id INT AUTO_INCREMENT PRIMARY KEY,
  id_student INT,
  id_classe INT,
  registration_date DATE,
  FOREIGN KEY (cpf_student) REFERENCES students(cpf),
  FOREIGN KEY (id_classe) REFERENCES classes(id)
);