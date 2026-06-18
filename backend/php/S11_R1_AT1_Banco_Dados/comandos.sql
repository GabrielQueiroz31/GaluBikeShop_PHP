CREATE DATABASE empresa;

CREATE TABLE funcionarios (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    cargo VARCHAR(100) NOT NULL,
    salario DECIMAL(10,2) NOT NULL,
    ativo BOOLEAN DEFAULT TRUE
);

INSERT INTO funcionarios (nome, cargo, salario, ativo)
VALUES 
('Gabriel Gomes', 'Desenvolvedor Junior', 2500.00, TRUE),
('Ana Souza', 'Analista de Sistemas', 3200.00, TRUE);

SELECT * FROM funcionarios;

UPDATE funcionarios
SET salario = 2800.00
WHERE id = 1;

SELECT * FROM funcionarios;