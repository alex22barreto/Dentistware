<?php
class MY_Controller extends CI_Controller{
    public $data = array();
    function __construct(){
        parent::__construct();
        $this->data ['page_title'] = 'Dentistware ';
		$this->data ['before_closing_head'] = '';
		$this->data ['before_closing_body'] = '';
		$this->data ['page_title_end'] = '';
		$this->data['page_title_start'] = "Dentistware ";
		
		//$this->data['user_info'] = $this->session->userdata();
		//$this->load->library('Auth');
    }
    
    public function is_logged_in() {
    	return $this->session->userdata ( 'logged_in' );
    }
    
	public function render($the_view = NULL) {
        $this->data ['the_view_content'] = (is_null ( $the_view )) ? '' : $this->load->view ( $the_view, $this->data, TRUE );
        $this->load->view ( 'templates/master_view', $this->data );
	}
	
	public function get_user_menu($branch_selected = '', $leaf_selected = '') {
		$this->load->config('menu');
		$tipo = $this->session->userdata('tipo_persona');
		$menu_config = array(
				'branch_select' => $branch_selected,
				'leaf_select' => $leaf_selected,
		);
		$this->data['menu_usuario'] = menu_nav($this->config->item('menu_' . $tipo), $menu_config);
	}
}

class Admin_Controller extends MY_Controller{
	
}