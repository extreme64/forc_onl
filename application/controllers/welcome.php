<?php

Class Meni_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function sve()
	{
        $this->load->model('Meni_model', 'meni_model', TRUE);
        return $this->meni_model->sve();

	}
}
