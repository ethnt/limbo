create database if not exists limbo_development;

use limbo_development;

create table if not exists items (
  id          int      auto_increment primary key,
  name        text     not null,
  description text     not null default current_timestamp,
  timestamp   datetime not null,
  location    text     not null,
  email       text,
  status      set('lost', 'found'),
  claimed     boolean
);

create table if not exists users (
  id       int  auto_increment primary key,
  email    text not null,
  password text not null,
  level    int  not null default 2
);
