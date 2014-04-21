create database if not exists limbo_development;

use limbo_development;

create table if not exists items (
  id int auto_increment primary key,
  description text not null
);
