INSERT INTO `psi`.`korisnik`
(`ime`,
`prezime`,
`email`,
`sifra`,
`isAdmin`)
VALUES
('Nemanja','Maksimovic','nemanja@admin.com','admin',true);

INSERT INTO `psi`.`korisnik`
(`ime`,
`prezime`,
`email`,
`sifra`,
`isAdmin`)
VALUES
('Petar','Kolic','petar@admin.com','admin',true);

INSERT INTO `psi`.`korisnik`
(`ime`,
`prezime`,
`email`,
`sifra`,
`isAdmin`)
VALUES
('Mina','Jankovic','mina@admin.com','admin',true);

INSERT INTO `psi`.`korisnik`
(`ime`,
`prezime`,
`email`,
`sifra`,
`isAdmin`)
VALUES
('Pera','Perica','pera@gmail.com','123',false);

INSERT INTO `psi`.`korisnik`
(`ime`,
`prezime`,
`email`,
`sifra`,
`isAdmin`)
VALUES
('Zika','Zikic','zika@gmail.com','123',false);

INSERT INTO `psi`.`korisnik`
(`ime`,
`prezime`,
`email`,
`sifra`,
`isAdmin`)
VALUES
('Dragan','Milovanovic','dragan@gmail.com','1234',false);

INSERT INTO `psi`.`korisnik`
(`ime`,
`prezime`,
`email`,
`sifra`,
`isAdmin`)
VALUES
('Milica','Radovanovic','milica@gmail.com','1234',false);

/*Kupci Pera i Zika*/

INSERT INTO `psi`.`kupac`
(`id_korisnik`)
VALUES
(4);

INSERT INTO `psi`.`kupac`
(`id_korisnik`)
VALUES
(5);

/*Prodavci Dragan i Milica*/

INSERT INTO `psi`.`prodavac`
(`id_korisnik`)
VALUES
(6);

INSERT INTO `psi`.`prodavac`
(`id_korisnik`)
VALUES
(7);