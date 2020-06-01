<?php namespace App\Models;

/*
 * #Autori: Petar Kolic
 * Model za tabelu proizvod
 */

use CodeIgniter\Model;

class ProizvodModel extends Model{
    
    protected $table = 'proizvod';
    protected $pirmaryKey = 'id_proizvod';
    protected $returnType = 'object';
    protected $allowedFields = ['naziv','kolicina','cena'];
    
    //Update kolicine proizvoda u bazi
    //@prama int $id, int $kolicina
    //@return void
    public function updateKolicina($id, $kolicina){
        $builder = $this->builder();
        $data = ['kolicina' => $kolicina];
        $builder->where('id_proizvod',$id);
        $builder->set($data);
        $builder->update();
    }
    
    //Funkcija koja dohvata sve proizvode sa zadatim id prodavca
    //@param int $id
    //@return object
    public function dohvatiMojeProizvode($id){
        $proizvodi = $this->where('id_prodavac', $id)->findAll();
        return $proizvodi;
    }
    
    //Funkcija koja vraca proizvod sa zadatim id
    //@param int $id
    //@return object
    public function vratiProizvod($id){
        $proizvod = $this->where('id_proizvod', $id)->first();
        return $proizvod;
    }
}
