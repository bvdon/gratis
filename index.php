<?php
// bootstrap
require_once 'app/autoload/MyAutoload.php';
require_once 'app/init.php';






/*
There are 2 .htaccess files: /dot.htaccess and /app/dot.htaccess
    rename both to .htaccess

DATABASE:
create database gratis_dhenning;

USERS:
drop table users;

create table users (
    userId int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    userName varchar(16) NOT NULL,
    password varchar(16) NOT NULL
);

insert into users (userName, password) values ('dhenning','password');
insert into users (userName, password) values ('jfletcher','password');

VEHICLES:
drop table vehicles;

create table vehicles (
    autoId int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    make varchar(16) NOT NULL,
    model varchar(16) NOT NULL,
    year varchar(4) NOT NULL,
    miles varchar(4) NOT NULL,
    newused varchar(4) NOT NULL,
    price varchar(16) NOT NULL
);

insert into vehicles (make, model, year, miles, newused, price) values ('BMW', 'X1', '2013', '67k', 'Used', '$10,950');
insert into vehicles (make, model, year, miles, newused, price) values ('Nisssan', 'Altima', '2017', '34k', 'Used', '$15,750');
insert into vehicles (make, model, year, miles, newused, price) values ('Volkswagon', 'Jetta', '2017', '22k', 'Used', '$17,500');
insert into vehicles (make, model, year, miles, newused, price) values ('Nisssan', 'Murano', '2016', '65k', 'Used', '$14,750');
insert into vehicles (make, model, year, miles, newused, price) values ('Audi', 'Q7', '2018', '41k', 'Used', '$43,250');
insert into vehicles (make, model, year, miles, newused, price) values ('Mercedes-Benz', 'GLA', '2017', '42k', 'Used', '$29,500');
insert into vehicles (make, model, year, miles, newused, price) values ('Mercedes-Benz', 'SL-Class', '2007', '42k', 'Used', '$21,900');
insert into vehicles (make, model, year, miles, newused, price) values ('Mercedes-Benz', 'GLE', '2019', '0k', 'New', '$80,775');


*/
