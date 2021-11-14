drop database if exists wad_t7;
create database wad_t7;
use wad_t7;

CREATE TABLE IF NOT EXISTS user (
  email varchar(50) NOT NULL,
  id_name varchar(50) NOT NULL,
  hashed_password varchar(256) NOT NULL,
  PRIMARY KEY (email)
);


INSERT INTO `user` (`email`, `first_name`, `last_name`, `hashed_password`) VALUES ('jjtan.2020@scis.smu.edu.sg', 'Jun Jie', 'Tan', '$2y$10$TpC20LPtcjLYhiyMxrpdT.eBncXHtPoWPJFyVQLBosdTz9ng8nqu2')