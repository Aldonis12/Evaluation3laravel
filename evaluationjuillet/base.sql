\c evaluationjuillet projet

create table Admin(
  idAdmin Serial PRIMARY KEY,
  nom varchar(10),
  mdp varchar(10)
);
insert into Admin(nom, mdp) values ('admin','admin');

create table Employe(
    id SERIAL primary key,
    nom VARCHAR(50),
    email VARCHAR(50),
    mdp VARCHAR(50)
);
insert into Employe(nom, email, mdp) values ('emp1','user','user');

create table Genre(
  id Serial PRIMARY KEY,
  nom varchar(20)
);
insert into Genre (nom)
values ('Homme'),('Femme');

create  table Patient(
  id SERIAL primary key,
  nom VARCHAR(50),
  dtn date,
  idgenre integer references Genre(id),
  remboursement integer default 0,
  isDeleted integer default 0
);

create table TypesActe(
  id SERIAL PRIMARY KEY,
  nom VARCHAR(50),
  budget decimal(15,2),
  code VARCHAR(3),
  isDeleted integer default 0
);

create table TypesDepense(
  id SERIAL PRIMARY KEY,
  nom VARCHAR(50),
  budget decimal(15,2),
  code VARCHAR(3),
  isDeleted integer default 0
);

create table Facture(
  id SERIAL PRIMARY KEY,
  idPatient integer references Patient(id),
  dateFacture TIMESTAMP
);

create table PatientActe(
  id SERIAL PRIMARY KEY,
  idFacture integer references Facture(id),
  idActe integer references TypesActe(id),
  idPatient integer references Patient(id),
  prix decimal(15,2),
  dateheure TIMESTAMP
);

create table PrixDepense(
  id SERIAL PRIMARY KEY,
  idDepense integer references TypesDepense(id),
  prix decimal(15,2),
  inserted date
);

create table test(
  id SERIAL PRIMARY KEY,
  idDepense integer references TypesDepense(id),
  prix decimal(15,2),
  inserted date
);

create view statistique_recette as
SELECT pa.id,pa.idacte,pa.idfacture,pa.idpatient,pa.prix,acte.budget, f.dateFacture
FROM PatientActe pa
JOIN TypesActe acte ON pa.idacte = acte.id
JOIN Facture f ON pa.idFacture = f.id;

create view statistique_depense as
SELECT pd.*,td.budget
from Prixdepense pd
JOIN TypesDepense td ON pd.iddepense = td.id;


select * from statistique_recette where EXTRACT(MONTH from datefacture)=6 and EXTRACT(YEAR from datefacture)=2023 GROUP BY idacte,id,idfacture,idpatient,prix,budget,datefacture;