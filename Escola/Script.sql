CREATE DATABASE escola;

USE escola;

CREATE TABLE cadastro (

id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
nome VARCHAR(100) NOT NULL,
nascimento DATE NOT NULL,
anocurso INTEGER NOT NULL,
materia VARCHAR(50) NOT NULL

);
