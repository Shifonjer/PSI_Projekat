<?php namespace App\Models;

/*
 * #Autori: Nemanja Maksimovic
 * Model za tabelu kupac
 */

use CodeIgniter\Model;

class KupacModel extends Model{
    
    protected $table = 'kupac';
    protected $pirmaryKey = 'id_korisnik';
    protected $returnType = 'object';
    protected $allowedFields = ['id_korisnik'];
    
    //Dohvata kupca sa zadatim id
    //@param int $id
    //@return object
    public function dohvati($id) {
        $kupac = $this->where('id_korisnik', $id)->first();
        return $kupac;
    }
    
    //Dodavanje kupca u bazu.
    //@param int $id
    //@return void
    public function dodaj($id) {
        $this->insert(['id_korisnik'=>$id]);
    }
}
