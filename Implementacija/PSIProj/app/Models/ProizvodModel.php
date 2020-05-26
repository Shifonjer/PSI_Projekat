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
    

}
