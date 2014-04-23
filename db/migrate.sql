create database if not exists limbo_development;

use limbo_development;

create table if not exists items (
  id          int      auto_increment primary key,
  name        text     not null,
  description text     not null,
  created_at  datetime not null default current_timestamp,
  updated_at  datetime,
  location    text     not null,
  email       text,
  status      set('lost', 'found'),
  claimed     boolean  default false
);

create table if not exists users (
  id       int  auto_increment primary key,
  email    text not null,
  password text not null,
  level    int  not null default 2
);
