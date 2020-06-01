<?php namespace App\Models;

/*
 * #Autori: Nemanja Maksimovic
 * Model za tabelu korisnik
 */

use CodeIgniter\Model;
use App\Models\KupacModel;

class KorisnikModel extends Model{
    
    protected $table = 'korisnik';
    protected $pirmaryKey = 'id_korisnik';
    protected $returnType = 'object';
    protected $allowedFields = ['ime','prezime','email','sifra','isAdmin'];
    
    //Funkcija koja pretrazuje korisnika u bazi za date podatke.
    //@param String $email, String $password
    // @return Object
    public function loginKorisnik($email,$password){
        $korisnik = $this->getKorisnik($email);
        if($korisnik != null && $korisnik->sifra == $password){
            return $korisnik;
        }else{
            return null;
        }
    }
    
    //Funkcija koja upisuje korisnika u bazu.
    //@param object $korisnik
    // @return boolean
    public function registerKorisnik($korisnik){
        if($this->getKorisnik($korisnik['email']) == null){
            $id = $this->insert($korisnik);
            $kupacModel = new KupacModel();
            $kupacModel->dodaj($id);
            return true;
        }
        else {
            return false;
        }
    }
    
    //Funkcija za promenu admin prava korisnika
    //@param int $id, boolean $status
    public function updateStatus($id, $status){
        $builder = $this->builder();
        $data = ['isAdmin' => $status];
        $builder->where('id_korisnik',$id);
        $builder->set($data);
        $builder->update();
    }

    
    //Funkcija koja vraca korisnika sa datim emailom
    //@param String $email
    //@return Object
    protected function getKorisnik($email){
        $korisnik = $this->where('email', $email)->first();
        return $korisnik;
    }
   
}
