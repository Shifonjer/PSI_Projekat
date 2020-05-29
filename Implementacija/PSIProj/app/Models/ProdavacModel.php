<?php namespace App\Models;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProdavacModel
 *
 * @author necah
 */

use CodeIgniter\Model;

class ProdavacModel extends Model {
    
    protected $table = 'prodavac';
    protected $pirmaryKey = 'id_korisnik';
    protected $returnType = 'object';
    protected $allowedFields = ['id_korisnik'];
}
