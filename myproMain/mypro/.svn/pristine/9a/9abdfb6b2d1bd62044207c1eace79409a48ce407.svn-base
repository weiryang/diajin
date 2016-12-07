<?php 
class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
 
    public function is_logged_in()
    {
        $user = $this->session->userdata('userid');
        if (empty($user))
        {
        	return false;
        }
        else
        {
        	return true;
        }
        	
        //return isset($user);
    }
}