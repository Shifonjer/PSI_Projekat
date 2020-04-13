( 
	[id_proizvod]        integer  NOT NULL ,
	[naziv]              char(18)  NULL ,
	[kolicina]           char(18)  NULL ,
	[cena]               integer  NULL ,
	[id_prodavac]        integer  NOT NULL ,
	CONSTRAINT [XPKProizvod] PRIMARY KEY  CLUSTERED ([id_proizvod] ASC)
)
go


ALTER TABLE [IstorijaKupovine]
	ADD CONSTRAINT [vlasnik_istorije] FOREIGN KEY ([id_korisnik]) REFERENCES [Kupac]([id_korisnik])
		ON DELETE CASCADE
		ON UPDATE NO ACTION
go

ALTER TABLE [IstorijaKupovine]
	ADD CONSTRAINT [proizvod_istorija] FOREIGN KEY ([id_proizvod]) REFERENCES [Proizvod]([id_proizvod])
		ON DELETE NO ACTION
		ON UPDATE NO ACTION
go


ALTER TABLE [Korpa]
	ADD CONSTRAINT [vlasnik_korpe] FOREIGN KEY ([id_korisnik]) REFERENCES [Kupac]([id_korisnik])
		ON DELETE CASCADE
go

ALTER TABLE [Korpa]
	ADD CONSTRAINT [proizvod_u_korpi] FOREIGN KEY ([id_proizvod]) REFERENCES [Proizvod]([id_proizvod])
		ON DELETE CASCADE
		ON UPDATE CASCADE
go


ALTER TABLE [Kupac]
	ADD CONSTRAINT [_kupac] FOREIGN KEY ([id_korisnik]) REFERENCES [Korisnik]([id_korisnik])
		ON DELETE CASCADE
		ON UPDATE CASCADE
go


ALTER TABLE [Prodavac]
	ADD CONSTRAINT [_prodavac] FOREIGN KEY ([id_korisnik]) REFERENCES [Korisnik]([id_korisnik])
		ON DELETE CASCADE
		ON UPDATE CASCADE
go


ALTER TABLE [Proizvod]
	ADD CONSTRAINT [proizvodjac] FOREIGN KEY ([id_prodavac]) REFERENCES [Prodavac]([id_korisnik])
		ON DELETE NO ACTION
		ON UPDATE NO ACTION
go
