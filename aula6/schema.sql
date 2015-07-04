CREATE DATABASE etecwitter;
USE etecwitter;

-- tabela para os usuários
CREATE TABLE usuarios (
  id_usuario INTEGER     NOT NULL PRIMARY KEY AUTO_INCREMENT,
  email      VARCHAR(30) NOT NULL UNIQUE,
  senha      VARCHAR(32) NOT NULL,
  nome       VARCHAR(30) NOT NULL
);

-- as senhas serão digeridas com MD5 (algoritmo de criptografia)
INSERT INTO usuarios (email, senha, nome) 
VALUES ('teste@exemplo.com', md5('teste'), 'Teste Exemplo');

CREATE TABLE posts (
  id_post    INTEGER      NOT NULL PRIMARY KEY AUTO_INCREMENT,
  id_usuario INTEGER      NOT NULL,
  texto      VARCHAR(128) NOT NULL,
  instante   TIMESTAMP    NOT NULL,
  foto       VARCHAR(37) 
);

INSERT INTO posts (id_usuario, texto, instante)
VALUES (1, 'UM TEXTO DE TESTE', NOW());

INSERT INTO posts (id_usuario, texto, instante)
VALUES (2, 'TEXTO DO USUARIO 2', NOW());



