<?php namespace App\Controllers;

// #Autori: Nemanja Maksimovic, Mina Jankovic
// Kontroler koji obradjuje funkcionalnosti dostupne gostu

use App\Models\KorisnikModel;
use App\Models\KupacModel;
use App\Models\ProdavacModel;
use App\Models\ProizvodModel;

class Home extends BaseController
{
        //Funkcija koja sluzi za prikaz stranice. 
        //Kao parametri prosledjuje se ime stranice kao i podaci koji su potrebni u samoj stranici.
        // @param String $page, array $data
        // @return void
        protected function showPage($page, $data = []){
            $data['kontroler'] = 'Home';
            echo view('Sablon/gostHeader');
            echo view($page, $data);
            echo view('Sablon/footer');
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
            $proizvodModel = new ProizvodModel();
            $proizvodi = $proizvodModel->findAll();
            $this->showPage('katalog',['proizvodi'=>$proizvodi, 'kupi'=>false]);
        }
        
        //Funkcija koja prikazuje stranicu radnje 
        //koja takodje menja izabranu lokaciju na mapi u zavisnosti od izabrane lokacije.
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
        
        //Prikaz login stranice.
        // @param String $poruka
        // @return void
        public function goLogin($poruka = null){
            $this->showPage('login', ['poruka'=>$poruka]);
        }
        
        //Prikaz stranice za registraciju.
        // @param String $poruka
        // @return void
        public function goRegister($poruka = null){
            $this->showPage('register', ['poruka'=>$poruka]);
        }
        
        //Funkcija koja vrsi autorizaciju korisnika.
        //U zavisnosti od unetih podataka korisnik se preusmerava na odgovarajucu stranicu.
        // @return redirect
        public function login(){

            $korisnikModel = new KorisnikModel();
            $kupacModel = new KupacModel();
            $korisnik = $korisnikModel->loginKorisnik($this->request->getVar('email'), $this->request->getVar('password'));
            if($korisnik == null){
                return $this->goLogin('Ne postoji korisnik sa unetim podacima!');
            }else{
                if($korisnik->isAdmin == true){
                    
                    return redirect()->to(site_url('Admin'));
                }else{
                    $this->session->set('korisnik',$korisnik);
                    $kupac = $kupacModel->dohvati($korisnik->id_korisnik);
                    if($kupac !=null){
                        return redirect()->to(site_url('Korisnik'));
                    }else{
                        return redirect()->to(site_url('Prodavac'));
                    }
                }
            }    
        }
        
        //Funkcija koja obradjuje registraciju korisnika sa validacijom unetih podataka i njihovim unosom u bazu.
        // @return redirect
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
