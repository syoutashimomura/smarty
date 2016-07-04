syouta
shimo.9891

syouta_db

create table users (
    id int not null auto_increment primary key,
    name varchar(255),
    kana varchar(255),
    sex char(32),
    city char(32),
    email varchar(255),
    tel varchar(255),
    am char(10),
    pm char(10),
    naiyou text
);

insert into users (name,kana,sex,city,email,tel,am,pm,naiyou)
values (
        "下村","シモムラ","男性","宮城県","sst.9891@gmail.com","080-6030-2450","午前","午後","おはよう　ございます。"
        );

SHOW VARIABLES LIKE 'character_set_server';

create database users character set utf8;
