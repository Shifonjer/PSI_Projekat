<?php namespace App\Controllers;

// #Autori: Mina Jankovic, Petar Kolic
// Kontroler koji obradjuje funkcionalnosti dostupne adminu

use App\Models\KorisnikModel;
use App\Models\ProizvodModel;

class Admin extends BaseController
{
    
        //Funkcija koja sluzi za prikaz stranice. 
        //Kao parametri prosledjuje se ime stranice kao i podaci koji su potrebni u samoj stranici.
        // @param String $page, array $data
        // @return void
        protected function showPage($page, $data = []){
            $data['kontroler'] = 'Admin';
            echo view('Sablon/adminHeader');
            echo view($page, $data);
            echo view('Sablon/footer');
        }
        
        //Funkcija koja dohvata sve korisnike iz baze i prosledjuje ih showPage funkciji.
        //@return void
        protected function vratiKorisnike() {
            $korisnikModel = new KorisnikModel();
            $korisnici = $korisnikModel->findAll();
            $this->showPage('korisnici',['korisnici'=>$korisnici]);
        }
        
        //Funkcija koja vraca sve proizvode iz baze.
        // @return void
        protected function vratiProizvode() {
            $proizvodModel = new ProizvodModel();
            $proizvodi = $proizvodModel->findAll();
            return $proizvodi;
        }

        //Index funkcija koja samo poziva showPage funkciju.
        // @return void
        public function index()
	{  
            $this->showPage('index');
	}
        
        //Prikaz kataloga sa svim postojecim proizvodima u bazi.
        // @return showPage
        public function katalog() {
            $proizvodi = $this->vratiProizvode();
            $this->showPage('katalog',['proizvodi'=>$proizvodi, 'kupi'=>false]);
        }
        
        //Prikaz stranice na kojoj se menja kolicina proizvoda.
        // @return void
        public function dodavanje() {
            $proizvodi = $this->vratiProizvode();
            $this->showPage('dodavanje',['proizvodi'=>$proizvodi]);
        }
        
        //Funkcija koja se poziva prilikom izmene kolicine izabranog proizvoda.
        //Podaci se menjaju u bazi i stranica se ponovo prikazuje sa osvezenim podacima.
        // @return void
        public function promeni() {
            $proizvodModel = new ProizvodModel();
            $proizvodModel->updateKolicina($this->request->getVar('id'), $this->request->getVar('kolicina'));
            $this->dodavanje();
        }
        
        //Funkcija koja prikazuje stranicu radnje 
        //koja takodje menja izabranu lokaciju na mapi u zavisnosti od izabrane lokacije.
        //@param String $location
        // @return void
        public function radnje($location = "") {
            $data = [];
            if($location == "" || $location == "1"){
                $location = $this->getRadnja_1();
            }else if($location == "2"){
                $location = $this->getRadnja_2();
            }else{
                $location = $this->getRadnja_3();
            }
            $data['radnja'] = $location;
            $this->showPage('radnje',$data);
        }
        
        //Prikaz about stranice.
        // @return void
        public function about(){
            $this->showPage('about');
        }
        
        //Funkcija za prikaz stranice korisnici.
        // @return void
        public function korisnici() {
            
            $this->vratiKorisnike();
        }

        //Funkcija koja sluzi za brisanje korisnika iz baze.
        // @param int $id
        // @return void
        public function obrisi($id) {
            $korisnikModel = new KorisnikModel();
            $korisnikModel->where('id_korisnik',$id)->delete();
            $this->vratiKorisnike();
        }
        
        //Funkcija koja sluzi za postavljanje korisnika za admina.
        // @param int $id
        // @return void
        public function postaviAdmina($id) {
            $korisnikModel = new KorisnikModel();
            $korisnikModel->updateStatus($id, true);
            $this->vratiKorisnike();
        }
        
        //Funkcija koja sluzi za uklanjanje admina.
        // @param int $id
        // @return void
        public function ukloniAdmina($id) {
            $korisnikModel = new KorisnikModel();
            $korisnikModel->updateStatus($id, false);
            $this->vratiKorisnike();
        }
}

