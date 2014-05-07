-- create database if not exists limbo_development;

-- use limbo_development;

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
  username text not null,
  password text not null,
  level    int  not null default 2
);

-- seeding

insert into users (
  email,
  username,
  password
) values (
  'ron.coleman@marist.edu',
  'admin',
  '578706f55984da8fbddf942c9e0c2591d6a4b237'
);

insert into items (
  name,
  description,
  location,
  status
) values (
  'MacBook Pro',
  'A late 2013 15" MacBook Pro.',
  'Hancock 004',
  'lost'
);

insert into items (
  name,
  description,
  location,
  status
) values (
  'Dignity',
  'Lost my dignity when I had to write PHP from scratch without a framework.',
  'Hancock 1012',
  'lost'
);

insert into items (
  name,
  description,
  location,
  status
) values (
  'Water bottle',
  'A blue Nalegene water bottle.',
  'Sheahan Hall',
  'lost'
);

insert into items (
  name,
  description,
  location,
  status
) values (
  'Wallet',
  'A wallet with Monopoly money.',
  'Hancock 201',
  'found'
);

insert into items (
  name,
  description,
  location,
  status
) values (
  'Backpack',
  'A black Herschel backpack.',
  'Hancock 402',
  'found'
);

insert into items (
  name,
  description,
  location,
  status
) values (
  'Pencil',
  'A yellow pencil.',
  'Dyson 104',
  'found'
);
