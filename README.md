# gratis
Basic MVC with PHP, MariaDB.

RUN THIS SQL on your local db:

------------------

create database gratis;

create table users (
  userName varchar(16) NOT NULL,
  password varchar(16) NOT NULL
);

insert into users (userName, password) values ('dhenning','password');

insert into users (userName, password) values ('jfletcher','password');

---------------------
