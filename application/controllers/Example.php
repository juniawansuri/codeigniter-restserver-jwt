<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Example extends SYS_Controller {

    public function __construct(){
        parent::__construct();
        //Do your magic here
    }
    
    public function index_get(){
        $this->response(array(
                            'status' => true,
                            'user_data' => $this->user
                        ), parent::HTTP_OK);
    }

}

/* End of file Example.php */
