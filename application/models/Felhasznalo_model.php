<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Felhasznalo_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function insert($data)
    {
        $this->db->insert('felhasznalok', $data);
        return $this->db->insert_id();
    }

    public function listaz(){
        $this->db->order_by("pontszam", "desc");
        return $this->db->get('felhasznalok')->result_array();
    }

    public function search_by_username($username)
    {

        $this->db->where('felhasznalo_nev', $username);
        return $this->db->get('felhasznalok')->row_array();
    }
    
    public function get_by_id($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('felhasznalok')->row_array();
    }

    
    public function update($id,$data){
        
        $this->db->where('id',$id);
        $this->db->update('felhasznalok',$data);
        return true;
    }
}
