<?php

class App {
    protected $controller = 'project';
    protected $method = 'index';
    protected $params = [];

    public function __construct()

    {
        $url = $this->parseURL();

        //cuman alternatif dari sendiri aja, karena akan muncul warning seandainya url gak diisi apa apa, kalau dikomputer gw doang tapi 
        if(empty($url[0] ) )
        {
            $url[0] = 'project'; 
        }
 
        //CONTROLLER class utama yang menyimpan method
        if( file_exists('../app/controllers/' . $url[0] . '.php') ){
            $this->controller = $url[0];
            unset($url[0]); //unset tidak menghilangkan dan menggeser posisi index elemen, hanya menghilangkan valuenya aja 
            
        }

        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller; 



        //METHOD fungsi dalam class 
        if(isset($url[1] ) )
        {
            if( method_exists($this->controller, $url[1] ) )
            {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        //PARAMS /parameter nilai 

        if( !empty($url) )
        {
            $this->params = array_values($url);
        }

        
        //JALANKAN CONTROLLER $ METHOD, SERTA KIRIMKAN PARAMS JIKA ADA 
        //kalau bingung tentang alur class dan methodnya berjalan coba lihat lagi ke atas yang ada REQUIRE_ONCE 
        //dari situ $this->controller sudah menjadi objek dari nilai yang ada di $controller 'new home'

        call_user_func_array([$this->controller, $this->method], $this->params );  // DASARNYA => call_user_func_array(function, params_arr ); PEMANGGILAN FUNGSI TIDKA MEMERLUKAN '()'
                                                                            // YANG SEBENERANYA => call_user_func_array([objek class nya, method dari objeknya], ['nilai1', 'nilai2',.....''])
    }

    public function parseURL()
    {
        if( isset($_GET['url'] ) ) { 
            $url = rtrim($_GET['url'], '/'); //rtrim menghapus string tertentu diakhir 
            $url = filter_var($url, FILTER_SANITIZE_URL); 
            $url = explode('/', $url); 
            return $url; 
        }
    }

}



?>