<?php namespace App\Models;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of KupacModel
 *
 * @author necah
 */

use CodeIgniter\Model;

class KupacModel extends Model{
    
    protected $table = 'kupac';
    protected $pirmaryKey = 'id_korisnik';
    protected $returnType = 'object';
    protected $allowedFields = ['id_korisnik'];
    
    public function dohvati($id) {
        $kupac = $this->where('id_korisnik', $id)->first();
        return $kupac;
    }
    
    public function dodaj($id) {
        $this->insert(['id_korisnik'=>$id]);
    }
}
