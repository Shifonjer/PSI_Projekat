<?php namespace App\Models;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of IstorijaModel
 *
 * @author necah
 */

use CodeIgniter\Model;

class IstorijaModel extends Model{
    
    protected $table = 'istorijakupovine';
    protected $pirmaryKey = 'id_istorija';
    protected $returnType = 'object';
    protected $allowedFields = ['id_proizvod','id_korisnik','ime_proizvoda','cena','datum'];
    
    
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
    
    public function vratiMoje($id_korisnik) {
        $this->where('id_korisnik', $id_korisnik);
        $istorija = $this->findAll();
        return $istorija;
    }
    
    public function ukupnaCena($id_korisnik) {
        $proizvodi = $this->vratiMoje($id_korisnik);
        $ukupno = 0;
        foreach ($proizvodi as $proizvod){
            $ukupno += $proizvod->cena;
        }
        return $ukupno;
    }
    
}
