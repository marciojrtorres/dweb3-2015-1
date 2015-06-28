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