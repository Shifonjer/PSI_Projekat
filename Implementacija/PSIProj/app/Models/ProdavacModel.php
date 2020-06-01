<?php namespace App\Models;

/*
 * #Autori: Mina Jankovic
 * Model za tabelu prodavac
 */

use CodeIgniter\Model;

class ProdavacModel extends Model {
    
    protected $table = 'prodavac';
    protected $pirmaryKey = 'id_korisnik';
    protected $returnType = 'object';
    protected $allowedFields = ['id_korisnik'];
}
