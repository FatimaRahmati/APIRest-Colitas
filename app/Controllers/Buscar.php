<?php namespace App\Controllers;
use App\Models\CrudAnimal;
use App\Controllers\ApiController;
use CodeIgniter\Controller;


class Buscar extends BaseController{

    public function index(){
        return view('welcome_message.php');
        
    }


    public function view($page = 'nombre'){

        if (! is_file(APPPATH.'/Views/buscar/'.$page.'.php')){
            //Wooops, we don't have a page for that!
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }      

        $data[] = ucfirst($page); //Capitalize first letter

        echo view('templates/header', $data);
        echo view('buscar/'.$page, $data);
        echo view('templates/footer', $data);
    }
    
    
    public function getField($campo){
        $nombre;
        if (isset ($_REQUEST[$campo])){
            $nombre = $_REQUEST[$campo];           
            $nombreFormat= trim(htmlspecialchars($nombre));        
            return $nombreFormat;
        }
        else{
            $nombre = "";
            return $nombre;
        }
    }

    
    public function showBySpecie(){
        $especie = $this->getField('nombreEspecie');

        if (!$especie){//Esto mejor hacerlo con isset
            echo view('templates/header');
            echo view('buscar/especie');
            echo view('templates/footer');
            //Ojo, que si no se llena el campo, 
            
        }else {
            $modelo = new CrudAnimal();
            $data = [
                'fotos' => $modelo->getAnimalsSpecie($especie),
                'title' => 'Listado de fotos',
            ];            
            echo view('templates/header');
            echo view('fotos/especie', $data);
            echo view('templates/footer');
        }    
    }

    
    public function showByName(){
       
        $nombreAnimal = $this->getField('nombreAnimal');

        if(!$nombreAnimal){
            echo view('templates/header');
            echo view('buscar/nombre');
            echo view('templates/footer');
        }
        else{
            $url = 'http://localhost:8081/fotos/nombre/'.$nombreAnimal; 
            $datos = json_decode(file_get_contents($url), true);
           
            $data = [
                'fotos' => $datos["data"],
                'title' => 'Listado de fotos'
            ];

            echo view('templates/header');
            echo view('fotos/nombre', $data);
            echo view('templates/footer');
        }

    }

}

?>