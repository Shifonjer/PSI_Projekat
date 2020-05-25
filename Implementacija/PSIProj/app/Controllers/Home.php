<?php namespace App\Controllers;

use App\Models\KorisnikModel;

class Home extends BaseController
{
        
        protected function showPage($page, $data = []){
            echo view('Sablon/gostHeader');
            echo view($page, $data);
            echo view('Sablon/footer');
        }
        
	public function index()
	{
            $this->showPage('index');
	}
        
        public function goLogin($poruka = null){
            $this->showPage('login', ['poruka'=>$poruka]);
        }
        
        public function goRegister($poruka = null){
            $this->showPage('register', ['poruka'=>$poruka]);
        }
        
        public function login(){

            $korisnikModel = new KorisnikModel();
            $korisnik = $korisnikModel->loginKorisnik($this->request->getVar('email'), $this->request->getVar('password'));
            if($korisnik == null){
                return $this->goLogin('Ne postoji korisnik sa unetim podacima!');
            }else{
                return redirect()->to(site_url('Korisnik'));
            }    
        }
        
        public function register(){
                $korisnik = array(
                    'ime' => $this->request->getVar('ime'),
                    'prezime' => $this->request->getVar('prezime'),
                    'email' => $this->request->getVar('email'),
                    'sifra' => $this->request->getVar('password'),
                    'isAdmin' => false
                );
                if(strlen($korisnik['sifra']) < 3){
                    return $this->goRegister('Sifra mora da sadrzi tri ili vise karaktera!');
                }
                $korisnikModel = new KorisnikModel();
                $result = $korisnikModel->registerKorisnik($korisnik);
                if($result == true){
                    echo "<script type='text/javascript'>alert('Uspesno ste se registrovali!');</script>";
                    $this->showPage('index');
                }else{
                    return $this->goRegister('Postoji korisnik sa unetim emailom!');
                }
        }

}
