<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Log_aktivnost_urednika extends CI_Controller {
    
    
    public static $SEPARATOR = ";";

    function __construct() {
        parent::__construct();
        $this->load->helper('file');
        /*$this->load->model('Log_aktivnost_urednika_model'); //TODO !!!!
        $this->k_model = new Log_aktivnost_urednika_model();*/
    }

    public function log($akcija="klot")
    {
        $putanja = './log.php';
        $stara_aktivnost = read_file('./log.php');
        $data = $this->session->userdata('name') ."|". $this->session->userdata('id_user')."|".time().'|' . $akcija . self::$SEPARATOR . $stara_aktivnost;

        if ( ! write_file($putanja, $data))
        {
             //echo 'Neuspešan upis loga aktivnosti';
        }
        else
        {
             //echo 'Aktivnost zabeležena!';
        }
    }
    
    
    public function log_pregled()
    {
        $putanja = './log.php';
        $stara_aktivnost = read_file('./log.php');
       
        return ''. $stara_aktivnost;
        
    }
}