
CREATE TABLE [Korisnik]
( 
	[id_korisnik]        integer  NOT NULL ,
	[ime]                varchar(25)  NULL ,
	[prezime]            varchar(25)  NULL ,
	[email]              varchar(50)  NULL ,
	[sifra]              varchar(20)  NULL ,
	[isAdmin]            bit  NULL ,
	CONSTRAINT [XPKKorisnik] PRIMARY KEY  CLUSTERED ([id_korisnik] ASC)
)
go

CREATE TABLE [Kupac]
( 
	[id_korisnik]        integer  NOT NULL ,
	CONSTRAINT [XPKKupac] PRIMARY KEY  CLUSTERED ([id_korisnik] ASC),
	CONSTRAINT [_kupac] FOREIGN KEY ([id_korisnik]) REFERENCES [Korisnik]([id_korisnik])
		ON DELETE CASCADE
		ON UPDATE CASCADE
)
go

CREATE TABLE [Prodavac]
( 
	[id_korisnik]        integer  NOT NULL ,
	CONSTRAINT [XPKProdavac] PRIMARY KEY  CLUSTERED ([id_korisnik] ASC),
	CONSTRAINT [_prodavac] FOREIGN KEY ([id_korisnik]) REFERENCES [Korisnik]([id_korisnik])
		ON DELETE CASCADE
		ON UPDATE CASCADE
)
go

CREATE TABLE [Proizvod]
( 
	[id_proizvod]        integer  NOT NULL ,
	[naziv]              varchar(45)  NULL ,
	[kolicina]           integer  NULL ,
	[cena]               integer  NULL ,
	[id_prodavac]        integer  NOT NULL ,
	[opis]               varchar(200)  NULL ,
	CONSTRAINT [XPKProizvod] PRIMARY KEY  CLUSTERED ([id_proizvod] ASC),
	CONSTRAINT [proizvodjac] FOREIGN KEY ([id_prodavac]) REFERENCES [Prodavac]([id_korisnik])
		ON DELETE NO ACTION
		ON UPDATE NO ACTION
)
go

CREATE TABLE [Korpa]
( 
	[id_korisnik]        integer  NOT NULL ,
	[id_proizvod]        integer  NOT NULL ,
	[id_korpa]           integer  NOT NULL ,
	[cena]               integer  NULL ,
	[is_active]          bit  NULL ,
	[ime_proizvoda]      varchar(45)  NULL ,
	CONSTRAINT [XPKKorpa] PRIMARY KEY  CLUSTERED ([id_korpa] ASC),
	CONSTRAINT [vlasnik_korpe] FOREIGN KEY ([id_korisnik]) REFERENCES [Kupac]([id_korisnik])
		ON DELETE CASCADE,
	CONSTRAINT [proizvod_u_korpi] FOREIGN KEY ([id_proizvod]) REFERENCES [Proizvod]([id_proizvod])
		ON DELETE CASCADE
		ON UPDATE CASCADE
)
go

CREATE TABLE [IstorijaKupovine]
( 
	[id_istorija]        integer  NOT NULL ,
	[id_korisnik]        integer  NOT NULL ,
	[id_proizvod]        integer  NOT NULL ,
	[cena]               integer  NULL ,
	[datum]              datetime  NULL ,
	[ime_proizvoda]      varchar(45)  NULL ,
	CONSTRAINT [XPKIstorijaKupovine] PRIMARY KEY  CLUSTERED ([id_istorija] ASC),
	CONSTRAINT [vlasnik_istorije] FOREIGN KEY ([id_korisnik]) REFERENCES [Kupac]([id_korisnik])
		ON DELETE CASCADE
		ON UPDATE NO ACTION,
	CONSTRAINT [proizvod_istorija] FOREIGN KEY ([id_proizvod]) REFERENCES [Proizvod]([id_proizvod])
		ON DELETE NO ACTION
		ON UPDATE NO ACTION
)
go
