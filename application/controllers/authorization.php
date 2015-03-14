<?php
class Authorization extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		if ( ! isset($_SERVER['PHP_AUTH_USER']) ||
		     ! isset($_SERVER['PHP_AUTH_PW']) ||
		     $_SERVER['PHP_AUTH_USER'] != 'admin' ||
		     $_SERVER['PHP_AUTH_PW'] != 'password' ) {
			header('WWW-Authenticate: Basic realm="WifiQRCode"');
			header('HTTP/1.0 401 Unauthorized');
			exit;
		}
	}
	
	private function _show() {
		$data['timestamp']   = $this->input->get('timestamp');
		$data['remote_addr'] = $this->input->get('remote_addr');
		$data['mac_address'] = $this->input->get('mac_address');
		$data['timeout']     = $this->input->post('timeout');
		
		$this->load->view('authorization', $data);
	}
	
	private function _create() {
		$data['timestamp']   = $this->input->get('timestamp');
		$data['remote_addr'] = $this->input->get('remote_addr');
		$data['mac_address'] = $this->input->get('mac_address');
		$data['timeout']     = $this->input->post('timeout');
		
		$socket = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
		@socket_sendto($socket, "", 0, 0, $data['remote_addr'], $data['timeout']);

		log_message('error', "$_SERVER[PHP_AUTH_USER] $data[remote_addr] $data[mac_address] $data[timeout]");
		$this->session->set_flashdata('success', '授权成功');
		
		redirect("message");
	}
	
	public function _remap() {
		switch($this->input->server('REQUEST_METHOD')) {
			case 'POST':
				$this->_create();
				break;
			default:
				$this->_show();
		}

	}
}
