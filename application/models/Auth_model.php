<?php
class Auth_model extends CI_Model {

    // Esta funçao irá salvar os registros no banco de dados
    public function create($formArray) {
        $this->db->insert('clientes', $formArray);
    }  
}
?>