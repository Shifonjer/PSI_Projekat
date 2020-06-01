<?php namespace App\Models;

/*
 * #Autori: Mina Jankovic
 * Model za tabelu korpa
 */

use CodeIgniter\Model;
use App\Models\IstorijaModel;

class KorpaModel extends Model{
    
    protected $table = 'korpa';
    protected $pirmaryKey = 'id_korpa';
    protected $returnType = 'object';
    protected $allowedFields = ['id_proizvod','id_korisnik','ime_proizvoda','cena','is_active'];
    
    
    //Dodavanje proizvoda u korpu.
    //@param object $proizvod
    //@return void
    public function dodaj($proizvod){
        $this->insert($proizvod);
    }
    
    //Dohvatanje reda u tabeli sa zadatim id
    //@param int $id
    //@return object
    public function vrati($id) {
        $korpa = $this->where('id_korpa', $id)->first();
        return $korpa;
    }
    
    //Dohvatanje podataka iz tabele za datog korisnika gde je status aktivan
    //@param int $id_korisnik
    //@return object
    public function vratiAktivne($id_korisnik) {
        $this->where('id_korisnik', $id_korisnik);
        $this->where('is_active', true);
        $aktivni = $this->findAll();
        return $aktivni;
    }
    
    //Racunanje ukupne cene svih proizvoda u korpi
    //@param int $id_korisnik
    //@return int
    public function ukupnaCena($id_korisnik) {
        $proizvodi = $this->vratiAktivne($id_korisnik);
        $ukupno = 0;
        foreach ($proizvodi as $proizvod){
            $ukupno += $proizvod->cena;
        }
        return $ukupno;
    }
    
    //Prebacuje status reda u tabeli uneaktivan za zadati id
    //@param int $id
    //@return void
    public function izbaci($id) {
        $builder = $this->builder();
        $data = ['is_active' => false];
        $builder->where('id_korpa',$id);
        $builder->set($data);
        $builder->update();
    }
    
    //Funkcija koja izbacuje sve proizvode iz korpe i ubacuje ih u tabelu istorija
    //@param array $proizvodi
    //@return void
    public function plati($proizvodi){
        $result = $this->whereIn('id_korpa',$proizvodi)->findAll();
        foreach ($result as $prozivod){
            $this->izbaci($prozivod->id_korpa);
        }
        $istorijaModel = new IstorijaModel();
        $istorijaModel->dodaj($result);
    }
}
