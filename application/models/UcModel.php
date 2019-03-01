<?php defined('BASEPATH') OR exit('No direct script access allowed');

class UcModel extends CI_Model {

    //Choix de la table
    function __construct()
    {
        parent::__construct();
        $this->table = "ttp_uc";
    }

    //Recupere le niveau
    function get_one($ttp_cv_cv_id, $ttp_competences_competence_id)
    {
        $this->db->select('uc_niv')
            ->from($this->table)
            ->where("ttp_cv_cv_id", $ttp_cv_cv_id)
            ->where("ttp_competences_competence_id", $ttp_competences_competence_id);


        return $this->db->get();
    }

    //Insertion du niveau
    function post($uc_niv,$ttp_cv_cv_id,$ttp_competences_competence_id)
    {
        $data = array(
            "uc_niv" => $uc_niv,
            "ttp_cv_cv_id" => $ttp_cv_cv_id,
            "ttp_competences_competence_id" => $ttp_competences_competence_id
        );

        $this->db->insert($this->table, $data)
                ->where("ttp_cv_cv_id", $ttp_cv_cv_id)
                ->where("ttp_competences_competence_id", $ttp_competences_competence_id);
    }

    //Modification du niveau
    function put($ttp_cv_cv_id,$ttp_competences_competence_id, $uc_niv)
    {
        $data = array(
            "uc_niv" => $uc_niv
        );

        $this->db->where("ttp_cv_cv_id", $ttp_cv_cv_id)
                    ->where("ttp_competences_competence_id", $ttp_competences_competence_id)
            ->update($this->table, $data);
    }

    function get_all()
    {
        return $this->db->get($this->table);
    }

    function get_one($id)
    {
        $this->db->select("utilisateurs_id")
            ->from($this->table)
            ->where("utilisateurs_id", $id)
            ->limit(1);

        return $this->db->get();
    }
}

/* End of file Model_product.php */
/* Location: ./application/models/Model_product.php */
