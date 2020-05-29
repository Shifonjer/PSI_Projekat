<?php namespace App\Models;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of KorisnikModel
 *
 * @author necah
 */

use CodeIgniter\Model;
use App\Models\KupacModel;

class KorisnikModel extends Model{
    
    protected $table = 'korisnik';
    protected $pirmaryKey = 'id_korisnik';
    protected $returnType = 'object';
    protected $allowedFields = ['ime','prezime','email','sifra','isAdmin'];
    
    public function loginKorisnik($email,$password){
        $korisnik = $this->getKorisnik($email);
        if($korisnik != null && $korisnik->sifra == $password){
            return $korisnik;
        }else{
            return null;
        }
    }
    
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

    public function updateStatus($id, $status){
        $builder = $this->builder();
        $data = ['isAdmin' => $status];
        $builder->where('id_korisnik',$id);
        $builder->set($data);
        $builder->update();
    }

    protected function getKorisnik($email){
        $korisnik = $this->where('email', $email)->first();
        return $korisnik;
    }
   
}
