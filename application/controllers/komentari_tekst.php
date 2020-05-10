 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Komentari_tekst extends CI_Controller {


    private $kacenje_id;
    private $tip;

    function __construct() {
        parent::__construct();
        $this->load->helper('url');

        $this->tip       = "s";
        $this->kacenje_id = 0;

        $this->load->model('Meni_model', 'meni_model', TRUE); 
    }


    public function dodaj()
    {

        $this->load->model('Komentari_cms_model', 'komentari_cms_model', TRUE);

        //echo  json_encode(array("feed" => $this->input->post('tid') . $this->input->post('tekst')));
        //echo json_encode(array("feed" =>$this->komentari_cms_model->dodaj(html_entity_decode($tekst, ENT_QUOTES, "UTF-8"), $post, $this->session->userdata('id_user') )  ));
        echo json_encode(array("feed" =>$this->komentari_cms_model->dodaj($this->input->post('tekst'), $this->input->post('tid'), $this->session->userdata('id_user') )  ));
    }


}