-- SCHEMA DO BANCO
CREATE DATABASE agenda;

-- DROP TABLE IF EXISTS contatos;
CREATE TABLE contatos (
  id_contato INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
  nome       VARCHAR(50) NOT NULL,
  sobrenome  VARCHAR(50)     NULL,
  telefone   VARCHAR(30)     NULL,
  amigo      BOOLEAN     NOT NULL DEFAULT FALSE,
  familia    BOOLEAN     NOT NULL DEFAULT FALSE
);

INSERT INTO contatos (nome) VALUES ('Pedro');
INSERT INTO contatos (nome, sobrenome) VALUES ('Pedro', 'Silva');
INSERT INTO contatos (nome, amigo) VALUES ('Maria', TRUE);
INSERT INTO contatos (nome, sobrenome, familia) VALUES ('José', 'Guimarães', TRUE);

