<?php namespace App\Models;
use CodeIgniter\Model;

/*$this-> accede al objeto de la BASE DE DATOS.*/

class CrudAnimal extends Model{
    
    protected $table = 'fotos';
    protected $primaryKey = 'id';
    protected $allowedFiles = ['nombre', 'especie', 'protectora', 'imagen', 'telefono'];

    
    public function getAnimalsSpecie($especie){
        return $this->asArray()->where(['especie' => $especie])->findAll();
    }


    public function getAnimalsName($name){
        return $this->asArray()->where(['nombre' => $name])->findAll();
    }

    
}



 
?>