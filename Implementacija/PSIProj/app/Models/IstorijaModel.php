<?php namespace App\Models;

/*
 * #Autori: Petar Kolic
 * Model za tabelu istorijakupovine
 */

use CodeIgniter\Model;

class IstorijaModel extends Model{
    
    protected $table = 'istorijakupovine';
    protected $pirmaryKey = 'id_istorija';
    protected $returnType = 'object';
    protected $allowedFields = ['id_proizvod','id_korisnik','ime_proizvoda','cena','datum'];
    
    //Dodavanje proizvoda u bazu
    //@param array $proizvodi
    public function dodaj($proizvodi){
        foreach ($proizvodi as $proizvod){
            $data = array(
                'id_proizvod' => $proizvod->id_proizvod,
                'id_korisnik' => $proizvod->id_korisnik,
                'cena' => $proizvod->cena,
                'ime_proizvoda' => $proizvod->ime_proizvoda,
                'datum' => date("Y-m-j")
            ); 
            $this->insert($data);
        }
    }
    
    //Vracanje istorije od ulogovanog korisnika
    //@param int $id_korisnik
    //@return Object $istorija
    public function vratiMoje($id_korisnik) {
        $this->where('id_korisnik', $id_korisnik);
        $istorija = $this->findAll();
        return $istorija;
    }
    
    //Funkcija za racunanje ukupne cene istorije.
    //@param int $id_korisnik
    //@return int $ukupno
    public function ukupnaCena($id_korisnik) {
        $proizvodi = $this->vratiMoje($id_korisnik);
        $ukupno = 0;
        foreach ($proizvodi as $proizvod){
            $ukupno += $proizvod->cena;
        }
        return $ukupno;
    }
    
}
