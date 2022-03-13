DROP TABLE certificare;
DROP TABLE zboruri;
DROP TABLE aeronave;
DROP TABLE angajati;

CREATE TABLE zboruri
(nrz INT(10),
de_la VARCHAR(100),
la VARCHAR(100),
distanta INT(10),
plecare TIMESTAMP DEFAULT '2020-01-01 10:10:10',
sosire TIMESTAMP DEFAULT '2020-01-01 10:10:10');

CREATE TABLE aeronave
(idav INT(10),
numeav VARCHAR(100),
gama_croaziera INT(10));

CREATE TABLE certificare 
(idan INT(10),
idav INT(10));

CREATE TABLE angajati
(idan INT(10),
numean VARCHAR(100),
functie VARCHAR(100),
salariu INT(10));

ALTER TABLE zboruri
ADD CONSTRAINT pk_zboruri_nrz PRIMARY KEY(nrz);

ALTER TABLE aeronave
ADD CONSTRAINT pk_aeronave_idav PRIMARY KEY(idav);

ALTER TABLE angajati
ADD CONSTRAINT pk_angajati_idan PRIMARY KEY(idan);

ALTER TABLE certificare
ADD CONSTRAINT fk_certificare_idan FOREIGN KEY(idan) REFERENCES angajati(idan);

ALTER TABLE certificare
ADD CONSTRAINT fk_certificare_idav FOREIGN KEY(idav) REFERENCES aeronave(idav);

ALTER TABLE zboruri
ADD (zi VARCHAR(2));

INSERT INTO zboruri
VALUES(1, 'New York', 'Los Angeles', 3086, '2020-01-06 16:32', '2020-01-06 20:10', 'Lu');
INSERT INTO zboruri
VALUES(2, 'London', 'Denver', 7542, '2020-01-07 19:35', '2020-01-07 23:59', 'Ma');
INSERT INTO zboruri
VALUES(3, 'Paris', 'London', 343, '2020-01-08 16:35', '2020-01-08 17:59', 'Me');
INSERT INTO zboruri
VALUES(4, 'San Francisco', 'New York', 3965, '2020-01-09 16:35', '2020-01-09 20:15', 'Jo');
INSERT INTO zboruri
VALUES(5, 'San Francisco', 'Los Angeles', 559, '2020-01-10 09:10', '2020-01-10 10:15', 'Vi');
INSERT INTO zboruri
VALUES(6, 'Tokyo', 'Paris', 6036, '2020-01-11 17:35', '2020-01-11 23:15', 'Sa');
INSERT INTO zboruri
VALUES(7, 'Cluj-Napoca', 'Hamburg', 1224, '2020-01-12 08:35', '2020-01-12 10:15', 'Du');
INSERT INTO zboruri
VALUES(8, 'Munchen', 'Madrid', 1724, '2020-01-13 08:00', '2020-01-13 10:15', 'Lu');
INSERT INTO aeronave
VALUES (1, 'BOEING 737-300', 5000);
INSERT INTO aeronave
VALUES (2, 'BOEING 737-800', 5420);
INSERT INTO aeronave
VALUES (3, 'ATR 42-500', 7000);
INSERT INTO aeronave
VALUES (4, 'BOEING 737-700', 6000);
INSERT INTO aeronave
VALUES (5, 'BOEING 745-340', 1000);
INSERT INTO aeronave
VALUES (6, 'BOEING 737-300', 4600);
INSERT INTO aeronave
VALUES (7, 'BOEING 745-300', 4200);
INSERT INTO angajati
VALUES (1, 'George Iulian', 'pilot', 8000);
INSERT INTO angajati
VALUES (2, 'Mihai Stefan', 'director', 11000);
INSERT INTO angajati
VALUES (3, 'Ioan Alexandru', 'pilot', 5000);
INSERT INTO angajati
VALUES (4, 'Elena Negru', 'pilot', 6000);
INSERT INTO certificare
VALUES (1, 2);
INSERT INTO certificare
VALUES (1, 4);
INSERT INTO certificare
VALUES (3, 4);
INSERT INTO certificare
VALUES (3, 5);
INSERT INTO certificare
VALUES (3, 3);
INSERT INTO certificare
VALUES (4, 1);
INSERT INTO certificare
VALUES (4, 2);
INSERT INTO certificare
VALUES (4, 3);


