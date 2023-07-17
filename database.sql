/**
* Author: Eric Neves
*/

create database if not exists shop;

use shop;

create table if not exists users (
	id int unsigned not null auto_increment,
  username varchar(255) not null,
  email varchar(255) not null,
  passwd varchar(255) not null,
  avatar varchar(255) not null,
  primary key (id),
  unique key(email)
);

insert into users (username, email, passwd, avatar) values 
("Eric Neves", "ericneves@email.com", "$2y$10$fxNfc7Q6AR5jfbtgXTeNiO8w6Kgxm664Mws.Qm0inhS8iJZoSvTPm", "https://avatars.githubusercontent.com/u/32256029?v=4");

create table if not exists products (
	id int unsigned not null auto_increment,
  name varchar(255) not null,
  price decimal(10,2) not null,
  image text not null,
  primary key (id)
);

insert into products (name, price, image) values 
("Drone", 86.32, "https://images.pexels.com/photos/1034812/pexels-photo-1034812.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"),
("Cam", 423, "https://images.unsplash.com/photo-1526170375885-4d8ecf77b99f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80"),
("Bike", 1324.65, "https://images.unsplash.com/photo-1485965120184-e220f721d03e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8YmlrZXxlbnwwfHwwfHx8MA%3D%3D&auto=format&fit=crop&w=500&q=60"),
("Peroni", 23, "https://images.unsplash.com/photo-1610478920392-95888b4a0bb2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjQ3fHxwcm9kdWN0fGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60"),
("Headset Sony", 323, "https://images.unsplash.com/photo-1577174881658-0f30ed549adc?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTczfHxwcm9kdWN0fGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60"),
("Doritos", 12, "https://images.unsplash.com/photo-1600952841320-db92ec4047ca?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTY3fHxwcm9kdWN0fGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60"),
("Smartphone", 4365, "https://images.unsplash.com/photo-1571380401583-72ca84994796?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=764&q=80"),
("Schoolbag", 127, "https://images.unsplash.com/photo-1491637639811-60e2756cc1c7?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=728&q=80"),
("Apple Watch", 8434.46, "https://images.unsplash.com/photo-1546868871-7041f2a55e12?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=764&q=80"),
("PS2", 450, "https://images.unsplash.com/photo-1625645758520-69e4db363b8d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTB8fHBzNHxlbnwwfHwwfHx8MA%3D%3D&auto=format&fit=crop&w=500&q=60");