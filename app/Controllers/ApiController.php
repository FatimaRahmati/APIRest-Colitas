<?php namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use App\Models\CrudAnimal;

class ApiController extends ResourceController{
    
    protected $modelName = 'App\Models\CrudAnimal';
    protected $format = 'json';


    private function genericResponse($data, $msj, $code){
        if ($code == 200){
            return $this->respond(array(
                "data" => $data,
                "code" => $code,
            ));
        }
        else{
            return $this->respond(array(
                "msj" => $msj,
                "code" => $code,
            ));
        }
    }


    private function url($segmento){
        if (isset($_SERVER['HTTPS'])){
            $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
        }
        else{
            $protocol = "http";
        }
        return $protocol."://".$_SERVER['HTTP_HOST'].$segmento;  
       
    }


    private function map($data){
        $animales = array();

        foreach ($data as $row){
            $animal = array(
                "id" => $row['id'],
                "nombre" => $row['nombre'],
                "especie" => $row['especie'],
                "protectora" => $row['protectora'],
                "imagen" => base64_encode($row['imagen']),
                "telefono" => $row['telefono'],
                "link" => array(
                    array("rel" => "self", "href" => $this->url("/fotos/nombre/".$row['nombre']), "action" => "GET", "types" => ["text/xml", "application/json"]),
                ),
        );
            array_push($animales, $animal);
        }
        return $animales;
    }


    
    public function muestraAnimal($name){
        $data = $this->model->getAnimalsName($name);
        $animalNombre = $this->map($data);
        return $this->genericResponse($animalNombre, null, 200);
    }

}