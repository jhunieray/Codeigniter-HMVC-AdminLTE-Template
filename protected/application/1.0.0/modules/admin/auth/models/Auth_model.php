<?php
class Auth_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->library("security");
    }

    public function search_admin()
    {
        $username = $this->security->xss_clean($this->input->post('username'));
        
        $query = $this->db->get_where('users', array('username' => $username, 'active' => 1));
        return is_null($query->row()) ? FALSE:$query->row();
    }
}