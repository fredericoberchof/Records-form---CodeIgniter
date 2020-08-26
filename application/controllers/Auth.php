<?php

class Auth extends CI_Controller {
    // Irá exibir a página de registro e suas requisições 
    public function register() {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Nome', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('telefone', 'Telefone', 'required');

        if($this->form_validation->run() == false) {
            //Aqui irá carregar a view
            $this->load->view('register');
        } else {
            // //Aqui irá salvar o registro no banco de dados
            $this->load->model('Auth_model');
            $formArray = array();
            $formArray['nome'] = $this->input->post('name');
            $formArray['email'] = $this->input->post('email');
            $formArray['telefone'] = $this->input->post('telefone');
            $this->Auth_model->create($formArray);

            $this->session->set_flashdata('msg', 'Seu registro foi cadastrado!');
            redirect(base_url().'index.php/Auth/register');
        }
    }
}