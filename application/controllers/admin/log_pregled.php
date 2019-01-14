

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');





/* DEPRICATED << @pocetna ln. 41. 'public function log()'  04-Nov-15   */
 //TODO : delete this file!!!!







class Log_pregled extends CI_Controller {
    
    private $log;
    
    function __construct() {
        parent::__construct();
        $this->load->library('Log_aktivnost_urednika');
        $this->log = new Log_aktivnost_urednika();
        
        $this->load->model('Meni_model', 'meni_model', TRUE);            
    }
    
    
    
    
    public function index()
	{

      print $this->log->log_pregled();
    
    }
}