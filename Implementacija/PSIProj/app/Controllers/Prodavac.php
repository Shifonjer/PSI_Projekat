<?php namespace App\Controllers;

use App\Models\KorisnikModel;
use App\Models\ProizvodModel;

class Prodavac extends BaseController
{
    
        protected function showPage($page, $data = []){
            $data['kontroler'] = 'Prodavac';
            echo view('Sablon/prodavacHeader');
            echo view($page, $data);
            echo view('Sablon/footer');
        }
        
        protected function vratiProizvode() {
            $proizvodModel = new ProizvodModel();
            $korisnik = $this->session->get('korisnik');
            $proizvodi = $proizvodModel->dohvatiMojeProizvode($korisnik->id_korisnik);
            return $proizvodi;
        }


        public function index()
	{  
            $this->showPage('index');
	}
        
        public function katalog() {
            $proizvodi = $this->vratiProizvode();
            $this->showPage('katalog',['proizvodi'=>$proizvodi, 'kupi'=>false]);
        }
        
        public function dodavanje() {
            $proizvodi = $this->vratiProizvode();
            $this->showPage('dodavanje',['proizvodi'=>$proizvodi]);
        }
        
        public function promeni() {
            $proizvodModel = new ProizvodModel();
            $proizvodModel->updateKolicina($this->request->getVar('id'), $this->request->getVar('kolicina'));
            $this->dodavanje();
        }
        
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
        
        public function about(){
            $this->showPage('about');
        }

}

