<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Kerdes_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function kerdes_insert($data)
    {
        $this->db->insert('kerdesek', $data);
        return $this->db->insert_id();
    }

    public function valasz_insert($data){
        $this->db->insert('valaszok',$data);
        return $this->db->insert_id();
    }


}