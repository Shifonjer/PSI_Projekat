<?php namespace App\Models;

/**
 * Description of ProizvodModel
 *
 * @author necah
 */

use CodeIgniter\Model;

class ProizvodModel extends Model{
    
    protected $table = 'proizvod';
    protected $pirmaryKey = 'id_proizvod';
    protected $returnType = 'object';
    protected $allowedFields = ['naziv','kolicina','cena'];
    
    public function updateKolicina($id, $kolicina){
        $builder = $this->builder();
        $data = ['kolicina' => $kolicina];
        $builder->where('id_proizvod',$id);
        $builder->set($data);
        $builder->update();
    }
    
    public function dohvatiMojeProizvode($id){
        $proizvodi = $this->where('id_prodavac', $id)->findAll();
        return $proizvodi;
    }
    
    public function vratiProizvod($id){
        $proizvod = $this->where('id_proizvod', $id)->first();
        return $proizvod;
    }
}
