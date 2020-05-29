<?php namespace App\Controllers;

use App\Models\IstorijaModel;
use App\Models\ProizvodModel;
use App\Models\KorpaModel;


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
        
        public function katalog() {
            $proizvodModel = new ProizvodModel();
            $proizvodi = $proizvodModel->findAll();
            return $this->showPage('katalog',['proizvodi'=>$proizvodi, 'kupi'=>true]);
        }
        
        public function kupi($id_proizvod) {
            $proizvodModel = new ProizvodModel();
            $korpaModel = new KorpaModel();
            $proizvod = $proizvodModel->vratiProizvod($id_proizvod);
            $korpa = array(
                'id_korisnik' => $this->session->get('korisnik')->id_korisnik,
                'id_proizvod' => $proizvod->id_proizvod,
                'ime_proizvoda' => $proizvod->naziv,
                'cena' => $proizvod->cena,
                'is_active' => true
            );
            if($proizvod->kolicina > 0){
                $proizvodModel->updateKolicina($proizvod->id_proizvod, ($proizvod->kolicina - 1));
                $korpaModel->dodaj($korpa);
            }
            return redirect()->to(site_url('Korisnik/katalog'));
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
            $this->session->remove('korisnik');
            return redirect()->to(site_url('Home'));
        }
        
        public function istorija() {
            $istorijaModel = new IstorijaModel();
            $id = $this->session->get('korisnik')->id_korisnik;
            $istorija = $istorijaModel->vratiMoje($id);
            $ukupno = $istorijaModel->ukupnaCena($id);
            $data = ['istorija'=>$istorija,'ukupno'=>$ukupno];
            $this->showPage('istorija', $data);
        }
        
        public function korpa() {
            $korpaModel = new KorpaModel();
            $id = $this->session->get('korisnik')->id_korisnik;
            $korpa = $korpaModel->vratiAktivne($id);
            $ukupno = $korpaModel->ukupnaCena($id);
            $data = ['korpa'=>$korpa,'ukupno'=>$ukupno];
            $this->showPage('korpa', $data);
        }
    
        public function obrisi_korpa($id) {
            $korpaModel = new KorpaModel();
            $proizvodModel = new ProizvodModel();
            $korpaModel->izbaci($id);
            $korpa = $korpaModel->vrati($id);
            $proizvod = $proizvodModel->vratiProizvod($korpa->id_proizvod);
            $proizvodModel->updateKolicina($proizvod->id_proizvod, ($proizvod->kolicina + 1));
            return redirect()->to(site_url('Korisnik/korpa'));
        }
        
        public function plati() {
            $korpaModel = new KorpaModel();
            $proizvodi = $this->request->getVar('proizvodi');
            $korpaModel->plati($proizvodi);
            return redirect()->to(site_url('Korisnik/katalog'));
        }
}

