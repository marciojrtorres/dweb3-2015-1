-- comentário:
-- database schema

-- para criar o banco
CREATE DATABASE agenda;
USE agenda;
-- obs: comandos SQL em maiúsculo, nomes específicos minúsculo

CREATE TABLE contatos (
  id_contato INTEGER     NOT NULL PRIMARY KEY AUTO_INCREMENT,
  nome       VARCHAR(25) NOT NULL,
  telefone   VARCHAR(20)     NULL
);

INSERT INTO contatos (nome) VALUES ('Maria');
INSERT INTO contatos (nome, telefone) VALUES ('João', '66992277');
INSERT INTO contatos (nome, telefone) VALUES ('Fulano', '32124567');

-- genero: m ou f   grupo: 0 familia 1 amigos 2 conhecidos
ALTER TABLE contatos ADD COLUMN (
  genero  CHAR(1),
  grupo   TINYINT(1)
);

INSERT INTO contatos (nome, telefone, genero, grupo)
VALUES ('Exemplo', '88220033', 'm', 2);

-- nunca um delete sem where
DELETE FROM contatos WHERE id_contato = 1;
