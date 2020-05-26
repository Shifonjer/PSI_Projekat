<?php namespace App\Controllers;

use App\Models\KorisnikModel;

class Korisnik extends BaseController
{

        protected function showPage($page,$data = []){
            $data['kontroler'] = 'Korisnik';
            echo view('Sablon/kupacHeader');
            echo view($page,$data);
            echo view('Sablon/footer');
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
        
        public function logout() {
            return redirect()->to(site_url('Home'));
        }
    
}

