<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Restserver\Libraries\REST_Controller;

require APPPATH . '/libraries/REST_Controller.php';
 
class Users extends \Restserver\Libraries\REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }

    /**
     *  Add New User
     * @method : POST
     */
    public function add_user_post()
    {
        
    }

    /**
     *  Fetch All User Data
     * @method : GET
     */
    public function fetch_all_users_get()
    {
        header("Access-Control-Allow-Origin: *");
        $data = $this->user_model->fetch_all_users();
        $this->response($data);
    }
}