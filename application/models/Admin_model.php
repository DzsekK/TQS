<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }


    public function delete($id){

        $this->db->where('id', $id);
		$this->db->delete('felhasznalok');
    }

    public function user_list()
    {
        return $this->db->get('felhasznalok')->result_array();
    }


    public function get_temakor(){
        $query = $this->db->get('temakorok');

        foreach ($query->result() as $row)
        {
            $row->id;
            $row->leiras;
        }

        $query = $this->db->query('SELECT id,leiras FROM temakorok');


        return $query->result();

        
    }

    public function get_nehezseg(){
        $query = $this->db->get('nehezsegiszint');

        foreach ($query->result() as $row)
        {
            $row->id;
            $row->leiras;
        }

        $query = $this->db->query('SELECT id,leiras FROM nehezsegiszint');


        return $query->result();

        
    }


    public function get_kerdes(){
        $query = $this->db->get('kerdesek');

        foreach ($query->result() as $row)
        {
            $row->id;
            $row->leiras;
        }

        $query = $this->db->query('SELECT id,leiras FROM kerdesek');


        return $query->result();

        
    }

    

        
    


}