<?php namespace App\Models;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of KorpaModel
 *
 * @author necah
 */

use CodeIgniter\Model;
use App\Models\IstorijaModel;

class KorpaModel extends Model{
    
    protected $table = 'korpa';
    protected $pirmaryKey = 'id_korpa';
    protected $returnType = 'object';
    protected $allowedFields = ['id_proizvod','id_korisnik','ime_proizvoda','cena','is_active'];
    
    
    public function dodaj($proizvod){
        $this->insert($proizvod);
    }
    
    public function vrati($id) {
        $korpa = $this->where('id_korpa', $id)->first();
        return $korpa;
    }
    
    public function vratiAktivne($id_korisnik) {
        $this->where('id_korisnik', $id_korisnik);
        $this->where('is_active', true);
        $aktivni = $this->findAll();
        return $aktivni;
    }
    
    public function ukupnaCena($id_korisnik) {
        $proizvodi = $this->vratiAktivne($id_korisnik);
        $ukupno = 0;
        foreach ($proizvodi as $proizvod){
            $ukupno += $proizvod->cena;
        }
        return $ukupno;
    }
    
    public function izbaci($id) {
        $builder = $this->builder();
        $data = ['is_active' => false];
        $builder->where('id_korpa',$id);
        $builder->set($data);
        $builder->update();
    }
    
    public function plati($proizvodi){
        $result = $this->whereIn('id_korpa',$proizvodi)->findAll();
        foreach ($result as $prozivod){
            $this->izbaci($prozivod->id_korpa);
        }
        $istorijaModel = new IstorijaModel();
        $istorijaModel->dodaj($result);
    }
}
