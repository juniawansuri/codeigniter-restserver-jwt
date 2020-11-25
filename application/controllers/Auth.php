<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;
use Firebase\JWT\JWT;

// dummy user data
define("USER", array(
    'uid' => 1,
    'username' => 'user',
    'password' => md5('@user'),
    'name' => 'Jhon Doe'
    // etc
));

class Auth extends RestController {

    public function __construct(){
        parent::__construct();
        //Do your magic here
    }

    /**
     * override method from codeigniter-restserver, bypass for this class if u enable API KEY
     *
     * @return void
     */
    protected function _detect_api_key(){
        // bypass
        return true;
    }

    /**
     * example login
     *
     * @return void
     */
    public function login_post(){
        // next use form validation
        $username = $this->post('username');
        $password = $this->post('password');

        if (USER['username'] === $username && USER['password'] === md5($password)){
            // instance firebase php-jwt
            $JWT = new JWT();
            // init current time
            $current_time = time();
            // encode jwt here
            $payload = array(
                "uid" => USER['uid'],
                "name" => USER['name'],
                "iat" => $current_time,
                "nbf" => $current_time,
                "exp" => $current_time + 24 * 60 * 1000 // 1 day
            );
            $token = $JWT->encode($payload, 'YOUR_SECRET_KEY');
            
            $this->response(array(
                                'status' => true,
                                'token' => $token,
                                'message' => "Logged in."
                            ), parent::HTTP_OK);
        }

		$this->response(array(
                            'status' => false,
                            'message' => 'wrong username or password'
                        ), parent::HTTP_FORBIDDEN);
    }

}

/* End of file Controllername.php */
