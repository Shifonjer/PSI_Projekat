<?php namespace App\Controllers;

// #Autori: Mina Jankovic, Petar Kolic
// Kontroler koji obradjuje funkcionalnosti dostupne prodavcu

use App\Models\KorisnikModel;
use App\Models\ProizvodModel;

class Prodavac extends BaseController
{
        //Funkcija koja sluzi za prikaz stranice. 
        //Kao parametri prosledjuje se ime stranice kao i podaci koji su potrebni u samoj stranici.
        // @param String $page, array $data
        // @return void
        protected function showPage($page, $data = []){
            $data['kontroler'] = 'Prodavac';
            echo view('Sablon/prodavacHeader');
            echo view($page, $data);
            echo view('Sablon/footer');
        }
        
        //Funkcija koja vraca sve proizvode od ulogovanog prodavca.
        // @return void
        protected function vratiProizvode() {
            $proizvodModel = new ProizvodModel();
            $korisnik = $this->session->get('korisnik');
            $proizvodi = $proizvodModel->dohvatiMojeProizvode($korisnik->id_korisnik);
            return $proizvodi;
        }

           
        //Index funkcija koja samo poziva showPage funkciju.
        // @return void
        public function index()
	{  
            $this->showPage('index');
	}
        
        //Funkcija koja poziva stranicu katalog na kojoj se nalaze samo proizvodi od ulogovanog prodavca.
        // @return void
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

}

