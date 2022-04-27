<?php namespace App\Controllers;
use CodeIgniter\Controller;

class Pages extends BaseController{

    public function index(){
        return view('welcome_message.php');
    }

    public function view($page = 'home'){

        if (! is_file(APPPATH.'/Views/pages/'.$page.'.php')){
            //Wooops, we don't have a page for that!
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }      

        $data[] = ucfirst($page); //Capitalize first letter

        echo view('templates/header', $data);
        echo view('pages/'.$page, $data);
        echo view('templates/footer', $data);
    }

}

?>