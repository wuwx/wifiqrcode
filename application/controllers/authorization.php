<?php
class Authorization extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->file('application/third_party/CAS.php');
		phpCAS::client(CAS_VERSION_2_0, "sso.neu.edu.cn", 443, "cas");
		phpCAS::setNoCasServerValidation();
		phpCAS::forceAuthentication();
		if (!in_array(phpCAS::getUser(), array(
			'neunc@neu.edu.cn',
		))) {
			die('Access Deny!');
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

		$current_user = phpCAS::getUser();		
		log_message('error', "$current_user $data[remote_addr] $data[mac_address] $data[timeout]");
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
