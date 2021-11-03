drop database if exists wad_t7;
create database wad_t7;
use wad_t7;

CREATE TABLE IF NOT EXISTS user (
  email varchar(50) NOT NULL,
  id_name varchar(50) NOT NULL,
  hashed_password varchar(256) NOT NULL,
  PRIMARY KEY (email)
);


INSERT INTO `user` (`id_name`, `email`, `hashed_password`) VALUES ('test', 'test@test.com', 'test');