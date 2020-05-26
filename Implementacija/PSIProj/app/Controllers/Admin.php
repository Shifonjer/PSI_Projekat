<?php namespace App\Controllers;

use App\Models\KorisnikModel;

class Admin extends BaseController
{
    
        protected function showPage($page, $data = []){
            $data['kontroler'] = 'Admin';
            echo view('Sablon/adminHeader');
            echo view($page, $data);
            echo view('Sablon/footer');
        }
        
        protected function vratiKorisnike() {
            $korisnikModel = new KorisnikModel();
            $korisnici = $korisnikModel->findAll();
            $this->showPage('korisnici',['korisnici'=>$korisnici]);
        }
        
	public function index()
	{  
            $this->showPage('index');
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
        
        public function korisnici() {
            
            $this->vratiKorisnike();
        }

        public function obrisi($id) {
            $korisnikModel = new KorisnikModel();
            $korisnikModel->where('id_korisnik',$id)->delete();
            $this->vratiKorisnike();
        }
        
        public function postaviAdmina($id) {
            $korisnikModel = new KorisnikModel();
            $korisnikModel->updateStatus($id, true);
            $this->vratiKorisnike();
        }
        
        public function ukloniAdmina($id) {
            $korisnikModel = new KorisnikModel();
            $korisnikModel->updateStatus($id, false);
            $this->vratiKorisnike();
        }
}

