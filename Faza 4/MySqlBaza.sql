
CREATE TABLE Korisnik
( 
	id_korisnik        integer  NOT NULL AUTO_INCREMENT,
	ime                varchar(25)  NULL ,
	prezime            varchar(25)  NULL ,
	email              varchar(50)  NULL ,
	sifra              varchar(20)  NULL ,
	isAdmin            bit  NULL ,
	CONSTRAINT XPKKorisnik PRIMARY KEY  CLUSTERED (id_korisnik ASC)
)
;

CREATE TABLE Kupac
( 
	id_korisnik        integer  NOT NULL ,
	CONSTRAINT XPKKupac PRIMARY KEY  CLUSTERED (id_korisnik ASC),
	CONSTRAINT _kupac FOREIGN KEY (id_korisnik) REFERENCES Korisnik(id_korisnik)
		ON DELETE CASCADE
		ON UPDATE CASCADE
)
;

CREATE TABLE Prodavac
( 
	id_korisnik        integer  NOT NULL ,
	CONSTRAINT XPKProdavac PRIMARY KEY  CLUSTERED (id_korisnik ASC),
	CONSTRAINT _prodavac FOREIGN KEY (id_korisnik) REFERENCES Korisnik(id_korisnik)
		ON DELETE CASCADE
		ON UPDATE CASCADE
)
;

CREATE TABLE Proizvod
( 
	id_proizvod        integer  NOT NULL AUTO_INCREMENT,
	naziv              varchar(45)  NULL ,
	opis               varchar(200)  NULL ,
	kolicina           integer  NULL ,
	cena               integer  NULL ,
	id_prodavac        integer  NOT NULL ,
	CONSTRAINT XPKProizvod PRIMARY KEY  CLUSTERED (id_proizvod ASC),
	CONSTRAINT proizvodjac FOREIGN KEY (id_prodavac) REFERENCES Prodavac(id_korisnik)
		ON DELETE NO ACTION
		ON UPDATE NO ACTION
)
;

CREATE TABLE Korpa
( 
	id_korpa           integer  NOT NULL AUTO_INCREMENT,
	id_korisnik        integer  NOT NULL ,
	id_proizvod        integer  NOT NULL ,
	ime_proizvoda      varchar(45)  NULL ,
	cena               integer  NULL ,
	is_active          bit  NULL ,
	CONSTRAINT XPKKorpa PRIMARY KEY  CLUSTERED (id_korpa ASC),
	CONSTRAINT vlasnik_korpe FOREIGN KEY (id_korisnik) REFERENCES Kupac(id_korisnik)
		ON DELETE CASCADE,
	CONSTRAINT proizvod_u_korpi FOREIGN KEY (id_proizvod) REFERENCES Proizvod(id_proizvod)
		ON DELETE CASCADE
		ON UPDATE CASCADE
)
;

CREATE TABLE IstorijaKupovine
( 
	id_istorija        integer  NOT NULL AUTO_INCREMENT,
	id_korisnik        integer  NOT NULL ,
	id_proizvod        integer  NOT NULL ,
	ime_proizvoda      varchar(45)  NULL ,
	cena               integer  NULL ,
	datum              date  NULL ,
	CONSTRAINT XPKIstorijaKupovine PRIMARY KEY  CLUSTERED (id_istorija ASC),
	CONSTRAINT vlasnik_istorije FOREIGN KEY (id_korisnik) REFERENCES Kupac(id_korisnik)
		ON DELETE CASCADE
		ON UPDATE NO ACTION,
	CONSTRAINT proizvod_istorija FOREIGN KEY (id_proizvod) REFERENCES Proizvod(id_proizvod)
		ON DELETE NO ACTION
		ON UPDATE NO ACTION
)
;
