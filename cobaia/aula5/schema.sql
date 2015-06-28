CREATE DATABASE etecwitter;
USE etecwitter;

CREATE TABLE usuario (
  id_usuario INTEGER     NOT NULL PRIMARY KEY AUTO_INCREMENT,
  email      VARCHAR(25) NOT NULL,
  senha      VARCHAR(32) NOT NULL,
  nome       VARCHAR(20) NOT NULL
);

CREATE TABLE micropost (
  id_micropost INTEGER      NOT NULL PRIMARY KEY AUTO_INCREMENT,
  id_usuario   INTEGER      NOT NULL REFERENCES usuario (id_usuario),
  texto        VARCHAR(128) NOT NULL,
);