<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kezdolap extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('felhasznalo_model');
        $this->load->model('admin_model');
        $this->load->model('kerdes_model');
       
    }

    public function index()
    {
        $this->load->view('head', ['oldal' => 'kezdolap']);

        
        $this->load->view('kezdolap');

       
        $this->load->view('foot');
    }

    public function regisztracio()
    {
        if ($this->session->userdata('user') !== NULL) {
            redirect('');
        }
        $this->load->view('head', ['oldal' => 'regisztracio']);

        $this->load->view('regisztracio');

        $this->load->view('foot');
    }

    public function bejelentkezes()
    {
        if ($this->session->userdata('user') !== NULL) {
            redirect('');
        }
        $this->load->view('head', ['oldal' => 'bejelentkezes']);

        $this->load->view('bejelentkezes');

        $this->load->view('foot');
    }

    public function jatek()
    {
        
        $this->load->view('head', ['oldal' => 'jatek']);

        $this->load->view('jatek');

        $this->load->view('foot');
    }

    public function ranglista()
    {
        $felhasznalok = $this->felhasznalo_model->listaz();
        $data['felhasznalok'] = $felhasznalok;
        

        $this->load->view('head', ['oldal' => 'ranglista']);
        $this->load->view('ranglista', $data);
        $this->load->view('foot');
    }

    public function profil()
    
    {   
        $data['user'] = $this->session->userdata('user');
       
        $this->load->view('head', ['oldal' => 'profil']);
        $this->load->view('profil', $data);
        $this->load->view('foot');
       
    }

   
     		

public function regisztracio_post()
{  
    

    $this->load->library('form_validation');
    $this->form_validation->set_rules('felhasznalo_nev', 'Felhasználónév', 'trim|required|is_unique[felhasznalok.felhasznalo_nev]|min_length[5]|max_length[15]');
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[felhasznalok.email]');
    $this->form_validation->set_rules('password', 'Jelszó', 'trim|required|min_length[6]');
    $this->form_validation->set_rules('password_confirm', 'Jelszó megerősítése', 'trim|required|matches[password]');
    
    


    if ($this->form_validation->run() == FALSE) {
        $this->session->set_flashdata('error', validation_errors());
        $this->session->set_flashdata('last_request', $this->input->post());
        redirect('regisztracio');
    }

    
      $tiltott=array("Nyuszika","Lovacska");
      $str=$this->input->post('felhasznalo_nev');

        if (in_array($str, $tiltott))
        {       $this->session->set_flashdata('error',"A felhasználó név nem tartalmazhat obszcén szavakat.");
                $this->session->set_flashdata('last_request', $this->input->post());
                redirect('regisztracio');
        }
           
    

    $data = [
        'felhasznalo_nev' => $this->input->post('felhasznalo_nev'),
        'email' => $this->input->post('email'),
        'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
       
    ];
    $id = $this->felhasznalo_model->insert($data);
    $this->session->set_flashdata('success', "Sikeres regisztráció");
    redirect('bejelentkezes');
}



public function bejelentkezes_post()
{
    $this->load->library('form_validation');
    $this->form_validation->set_rules('felhasznalo_nev', 'Felhasználónév', 'trim|required');
    $this->form_validation->set_rules('password', 'Jelszó', 'trim|required');


    if ($this->form_validation->run() == FALSE) {
        $this->session->set_flashdata('error', validation_errors());
        $this->session->set_flashdata('last_request', $this->input->post());
        redirect('bejelentkezes');
    }
    $felhasznalonev = $this->input->post('felhasznalo_nev');

    $felhasznalo = $this->felhasznalo_model->search_by_username($felhasznalonev);

    if (empty($felhasznalo)) {
        $this->session->set_flashdata('error', "Hibás felhasználónév vagy jelszó!");
        $this->session->set_flashdata('last_request', $this->input->post());
        redirect('bejelentkezes');
    }

    $jelszo = $this->input->post('password');

    if (!password_verify($jelszo, $felhasznalo['password'])) {
        $this->session->set_flashdata('error', "Hibás felhasználónév vagy jelszó!");
        $this->session->set_flashdata('last_request', $this->input->post());
        redirect('bejelentkezes');
    }

    $array = array(
        'user' => $felhasznalo
    );

    $this->session->set_userdata($array);


    $this->session->set_flashdata('success', "Sikeres bejelentkezés");
    redirect('');
}

public function kijelentkezes()
{	
    $this->session->unset_userdata('user');
    $this->session->set_flashdata('success', "Sikeres kijelentkezés");
    redirect('');
}

public function valtoztatas()
    
    {   
        $data['user'] = $this->session->userdata('user');
        
        $this->load->view('head', ['oldal' => 'profil']);
        $this->load->view('valtoztatas', $data);
        $this->load->view('foot');

        
       
    }

public function valtoztatas_post()
{
    $this->load->library('form_validation');
    $this->form_validation->set_rules('password', 'Jelszó', 'trim|required');
    $this->form_validation->set_rules('new_password', 'Új jelszó', 'trim|required|min_length[6]');
    $this->form_validation->set_rules('new_password_confirm', 'Új jelszó megerősítése', 'trim|required|matches[new_password]');
    
    $data['user'] = $this->session->userdata('user');

    
    $id=$this->session->userdata('user')['id'];;
    $old_pass=$this->input->post('password');
    $new_pass=$this->input->post('new_password');
    $conf_pass=$this->input->post('new_password_confirm');


    if ($this->form_validation->run() == FALSE) {
        $this->session->set_flashdata('error', validation_errors());
        $this->session->set_flashdata('last_request', $this->input->post());
        redirect('valtoztatas');
    }

    if (!password_verify($old_pass, $this->session->userdata('user')['password'])) {
        $this->session->set_flashdata('error', "Hibás jelszó!");
        $this->session->set_flashdata('last_request', $this->input->post());
        redirect('valtoztatas');
    }

    if ($old_pass == $new_pass) {
        $this->session->set_flashdata('error',"Az új jelszó nem egyezhet meg a régivel.");
        $this->session->set_flashdata('last_request', $this->input->post());
        redirect('valtoztatas');
    }

   

    
   
    $this->felhasznalo_model->update($id,array('password'=>password_hash($new_pass, PASSWORD_DEFAULT)));
     $this->session->set_flashdata('success', "Sikeres jelszóváltoztatás");
         redirect('valtoztatas');
    
}


    public function felhasznalok()

    {   if ($this->session->userdata('user') == NULL) 
        redirect('');

        $felhasznalok = $this->admin_model->user_list();
        $data['felhasznalok'] = $felhasznalok;
        $data['user'] = $this->session->userdata('user');

        $this->load->view('head', ['oldal' => 'felhasznalok']);
        $this->load->view('felhasznalok', $data,$data);
        $this->load->view('foot');

    }

    public function user_delete($id)
    {

        $this->admin_model->delete($id);
        $this->session->set_flashdata('success', "Sikeres törlés");
        redirect('felhasznalok');

    }


    public function kerdes_felvetel()
    {
        if ($this->session->userdata('user') == NULL) {
            redirect('');
        }

        $data['temakor'] = $this->admin_model->get_temakor();
        $data['nehezseg'] = $this->admin_model->get_nehezseg();


        $this->load->view('head', ['oldal' => 'Admin']);

        $this->load->view('kerdes',$data,$data);

        $this->load->view('foot');
    }

    public function kerdes_felvetel_post(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('leiras', 'Leírás', 'trim|required|is_unique[kerdesek.leiras]');
        $this->form_validation->set_rules('temakor', 'Témakör','required' );
        $this->form_validation->set_rules('nehezseg', 'Nehézség','required');
        
        


    if ($this->form_validation->run() == FALSE) {
        $this->session->set_flashdata('error', validation_errors());
        $this->session->set_flashdata('last_request', $this->input->post());
        redirect('kerdes_felvetel');
    }

    $data = [
        'leiras' => $this->input->post('leiras'),
        'temakor_id' => $this->input->post('temakor'),
        'nehezsegiszint_id'=>$this->input->post('nehezseg'),
       
    ];
    $id = $this->kerdes_model->kerdes_insert($data);
    $this->session->set_flashdata('success', "Sikeres felvétel");
    redirect('valasz_felvetel');
    }

    public function valasz_felvetel()
    {
        if ($this->session->userdata('user') == NULL) {
            redirect('');
        }

        $data['kerdes'] = $this->admin_model->get_kerdes();

        $this->load->view('head', ['oldal' => 'Admin']);

        $this->load->view('valasz',$data);

        $this->load->view('foot');
    }

    public function valasz_felvetel_post(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('leiras', 'Leírás', 'trim|required|is_unique[kerdesek.leiras]');
        $this->form_validation->set_rules('kerdes', 'Kérdés', 'trim|required');
        $this->form_validation->set_rules('helyes', 'helyes', 'trim|required');
        
        


    if ($this->form_validation->run() == FALSE) {
        $this->session->set_flashdata('error', validation_errors());
        $this->session->set_flashdata('last_request', $this->input->post());
        redirect('valasz_felvetel');
    }

    $data = [
        'leiras' => $this->input->post('leiras'),
        'kerdes_id' => $this->input->post('kerdes'),
        'helyes'=>$this->input->post('helyes'),
       
    ];
    $id = $this->kerdes_model->valasz_insert($data);
    $this->session->set_flashdata('success', "Sikeres felvétel");
    redirect('felhasznalok');
    }

}


