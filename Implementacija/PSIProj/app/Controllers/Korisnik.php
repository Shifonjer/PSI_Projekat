<?php namespace App\Controllers;

use App\Models\KorisnikModel;

class Korisnik extends BaseController
{

        protected function showPage($page){
            echo view('Sablon/kupacHeader');
            echo view($page);
            echo view('Sablon/footer');
        }
        
	public function index()
	{
            $this->showPage('index');
	}
        
        public function logout() {
            return redirect()->to(site_url('Home'));
        }
    
}

