<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Auth {

	private $CI;
// 	protected $PasswordHash;
	
	public function __construct() {
		$this->CI = & get_instance ();
		
		$this->CI->load->database ();
		$this->CI->load->library ( 'session' );
		$this->CI->load->model ( 'terceros_model' );
	}
	
	public function logged_in() {
		return $this->CI->session->userdata ( 'logged_in' );
	}
	
	public function login($email, $password) {
	
		$user = $this->CI->terceros_model->get_user_by_email ( $email );
	
		if ($user != NULL) {
			if ($user->estado === 'RET') {
				return 1;
			}
			if (password_verify($password, $user->claveAcceso)) {
				unset($user->claveAcceso);
				$this->CI->session->set_userdata(array(
						'logged_in' => TRUE,
						'id_tercero' => $user->idTercero,
						'documento' => $user->documento,
						'nombre_completo' => $user->nombreCompleto,
						'email' => $user->email,
						'tipo_tercero' => $user->tipoTercero,
						'foto' => $user->urlFoto,
				));
				return 2;
			} else {
				return 3;
			}
		} else {
			return 4;
		}
	}

	
	public function logout($redirect = false) {
		$this->CI->session->sess_destroy ();
		if ($redirect) {
			$this->CI->load->helper ( 'url' );
			redirect ( $redirect, 'refresh' );
		}
	}
	
// 	public function reset_password($user_id, $new_password) {
// 		$new_password = $this->PasswordHash->HashPassword ( $new_password );
// 		$this->CI->login_model->update_user ( $user_id, array (
// 				'claveAcceso' => $new_password 
// 		) );
// 	}
	
}
