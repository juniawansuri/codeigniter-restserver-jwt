<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Core controller
 */
use chriskacerguis\RestServer\RestController;
use Firebase\JWT\JWT;

class SYS_Controller extends RestController {

    // user data from jwt
    protected $user = [];

    public function __construct(){
        parent::__construct();
        // remove if u using API KEY too
        $this->_verify_jwt();
    }

    /**
     * verify JWT, remove from constructor if u using API KEY too
     *
     * @return void
     */
    protected function _verify_jwt(){
        // verify JWT before execute next process
        $headers = $this->input->request_headers();
        $token = (isset($headers['Authorization'])) ? $headers['Authorization'] : NULL;
        if ($token !== NULL) {
            try {
                // JWT library instance
                $this->JWT = new JWT();
                $decoded = $this->JWT->decode($token, 'YOUR_SECRET_KEY', array('HS256'));
                if ($decoded){
                    $this->user['uid'] = $decoded->uid;
                    $this->user['name'] = $decoded->name;
                    return true;
                } else {
                    $this->response([
                        $this->config->item('rest_status_field_name')  => false,
                        $this->config->item('rest_message_field_name') => $this->lang->line('text_rest_unauthorized')], 
                        parent::HTTP_UNAUTHORIZED
                    );
                }
            } catch (Exception $e) {
                $this->response([
                    $this->config->item('rest_status_field_name')  => false,
                    $this->config->item('rest_message_field_name') => $this->lang->line('text_rest_unauthorized')], 
                    parent::HTTP_UNAUTHORIZED
                );
            }
        }

        $this->response([
            $this->config->item('rest_status_field_name')  => false,
            $this->config->item('rest_message_field_name') => $this->lang->line('text_rest_unauthorized')], 
            parent::HTTP_UNAUTHORIZED
        );
    }

    /**
     * override method from codeigniter-restserver, u can user API KEY and JWT
     *
     * @return void
     */
    protected function _detect_api_key(){

        // verify JWT before execute next process
        $headers = $this->input->request_headers();
        $token = (isset($headers['Authorization'])) ? $headers['Authorization'] : NULL;
        if ($token !== NULL) {
            try {
                // jwt instance
                $this->JWT = new JWT();
                $decoded = $this->JWT->decode($token, 'YOUR_SECRET_KEY', array('HS256'));
                if ($decoded){
                    $this->user['uid'] = $decoded->uid;
                    $this->user['name'] = $decoded->name;
                    return true;
                } else {
                    return false;
                }
            } catch (Exception $e) {
                $this->response([
                    $this->config->item('rest_status_field_name')  => false,
                    $this->config->item('rest_message_field_name') => $this->lang->line('text_rest_unauthorized')], 
                    parent::HTTP_UNAUTHORIZED
                );
            }
        }

        // Get the api key name variable set in the rest config file
        $api_key_variable = $this->config->item('rest_key_name');

        // Work out the name of the SERVER entry based on config
        $key_name = 'HTTP_'.strtoupper(str_replace('-', '_', $api_key_variable));

        $this->rest->key = null;
        $this->rest->level = null;
        $this->rest->user_id = null;
        $this->rest->ignore_limits = false;

        // Find the key from server or arguments
        if (($key = isset($this->_args[$api_key_variable]) ? $this->_args[$api_key_variable] : $this->input->server($key_name))) {
            if (!($row = $this->rest->db->where($this->config->item('rest_key_column'), $key)->get($this->config->item('rest_keys_table'))->row())) {
                return false;
            }

            $this->rest->key = $row->{$this->config->item('rest_key_column')};

            isset($row->user_id) && $this->rest->user_id = $row->user_id;
            isset($row->level) && $this->rest->level = $row->level;
            isset($row->ignore_limits) && $this->rest->ignore_limits = $row->ignore_limits;

            $this->_apiuser = $row;

            /*
             * If "is private key" is enabled, compare the ip address with the list
             * of valid ip addresses stored in the database
             */
            if (empty($row->is_private_key) === false) {
                // Check for a list of valid ip addresses
                if (isset($row->ip_addresses)) {
                    // multiple ip addresses must be separated using a comma, explode and loop
                    $list_ip_addresses = explode(',', $row->ip_addresses);
                    $ip_address = $this->input->ip_address();
                    $found_address = false;

                    foreach ($list_ip_addresses as $list_ip) {
                        if ($ip_address === trim($list_ip)) {
                            // there is a match, set the the value to TRUE and break out of the loop
                            $found_address = true;
                            break;
                        }
                    }

                    return $found_address;
                } else {
                    // There should be at least one IP address for this private key
                    return false;
                }
            }

            return true;
        }

        // No key has been sent
        return false;
    }
    
}

/* End of file SYS_Controller.php */
