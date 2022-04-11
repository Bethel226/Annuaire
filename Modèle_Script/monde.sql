/*==============================================================*/
/* Nom de SGBD :  MySQL 5.0                                     */
/* Date de cr�ation :  21/03/2022 16:19:13                      */
/*==============================================================*/


drop table if exists Apprenants;

drop table if exists Tuteur;

/*==============================================================*/
/* Table : Apprenants                                           */
/*==============================================================*/
create table Apprenants
(
   idApprenants         int NOT NULL AUTO_INCREMENT,
   idTuteur             int not null,
   nom                  varchar(254),
   prenom               varchar(254),
   telephone            int,
   adresse              varchar(254),
   genre                varchar(254),
   email                varchar(254),
   primary key (idApprenants)
);

/*==============================================================*/
/* Table : Tuteur                                               */
/*==============================================================*/
create table Tuteur
(
   idTuteur             int NOT NULL AUTO_INCREMENT,
   nom                  varchar(254),
   prenom               varchar(254),
   genre                varchar(254),
   profession           varchar(254),
   telephone            int,
   adresse              varchar(254),
   email                varchar(254),
   primary key (idTuteur)
);

alter table Apprenants add constraint FK_association1 foreign key (idTuteur)
      references Tuteur (idTuteur) on delete restrict on update restrict;

