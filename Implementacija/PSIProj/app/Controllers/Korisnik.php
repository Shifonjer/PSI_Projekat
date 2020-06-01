<?php namespace App\Controllers;

use App\Models\IstorijaModel;
use App\Models\ProizvodModel;
use App\Models\KorpaModel;

// #Autori: Nemanja Maksimovic, Petar Kolic
// Kontroler koji obradjuje funkcionalnosti dostupne kupcu

class Korisnik extends BaseController
{

        //Funkcija koja sluzi za prikaz stranice. 
        //Kao parametri prosledjuje se ime stranice kao i podaci koji su potrebni u samoj stranici.
        // @param String $page, array $data
        // @return void
        protected function showPage($page,$data = []){
            $data['kontroler'] = 'Korisnik';
            echo view('Sablon/kupacHeader');
            echo view($page,$data);
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
            return $this->showPage('katalog',['proizvodi'=>$proizvodi, 'kupi'=>true]);
        }
        
        //Funkcija koja se poziva kada korisnik pritisne dugme kupi za neki proizvod.
        //Proizvod se dodaje u korpu i njegova kolicina se smanjuje za jedan u bazi.
        //@param int $id_proizvoda
        // @return void
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
        
        //Funkcija za logout svih korisnika sistema.
        // @return redirect
        public function logout() {
            $this->session->remove('korisnik');
            return redirect()->to(site_url('Home'));
        }
        
        //Vraca stranicu istorija kupovine. 
        //Funkcija prosledjuje sve kupljene proizvode od ulogovanog korisnika kao i ostale potrebne podatke za prikaz stranice.
        // @return void
        public function istorija() {
            $istorijaModel = new IstorijaModel();
            $id = $this->session->get('korisnik')->id_korisnik;
            $istorija = $istorijaModel->vratiMoje($id);
            $ukupno = $istorijaModel->ukupnaCena($id);
            $data = ['istorija'=>$istorija,'ukupno'=>$ukupno];
            $this->showPage('istorija', $data);
        }
        
        //Funkcija koja prikazuje korpu u kojoj se nalaze izabrani proizvodi koji jos uvek nisu placeni.
        // @return void
        public function korpa() {
            $korpaModel = new KorpaModel();
            $id = $this->session->get('korisnik')->id_korisnik;
            $korpa = $korpaModel->vratiAktivne($id);
            $ukupno = $korpaModel->ukupnaCena($id);
            $data = ['korpa'=>$korpa,'ukupno'=>$ukupno];
            $this->showPage('korpa', $data);
        }
    
        //Funkcija koja se poziva kada korisnik obrise proizvod iz korpe.
        //@param int $id
        // @return redirect
        public function obrisi_korpa($id) {
            $korpaModel = new KorpaModel();
            $proizvodModel = new ProizvodModel();
            $korpaModel->izbaci($id);
            $korpa = $korpaModel->vrati($id);
            $proizvod = $proizvodModel->vratiProizvod($korpa->id_proizvod);
            $proizvodModel->updateKolicina($proizvod->id_proizvod, ($proizvod->kolicina + 1));
            return redirect()->to(site_url('Korisnik/korpa'));
        }
        
        //Funkcija za placanje proizvoda. 
        //Izbaca proizvode iz korpe i ubacuje u istoriju.
        // @return redirect
        public function plati() {
            $korpaModel = new KorpaModel();
            $proizvodi = $this->request->getVar('proizvodi');
            $korpaModel->plati($proizvodi);
            return redirect()->to(site_url('Korisnik/katalog'));
        }
}

