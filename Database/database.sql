/*Creazione Database */
create database Zanichelli;
use Zanichelli;

/*Creazione tabella utenti */
create table Users (
  id  int(11) auto_increment primary key,
  FirstName varchar(20) not null,
  LastName varchar(20) not null,
  Age INT not null
);

/*Inserimento utenti */
insert into Users (FirstName,LastName,Age)
values ("Mario","Rossi","32");

insert into Users (FirstName,LastName,Age)
values ("Luca","Bianchi","22");

insert into Users (FirstName,LastName,Age)
values ("Sofia","Rossi","28");
