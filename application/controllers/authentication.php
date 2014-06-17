<?php
class Authentication extends CI_Controller {
		
	public function index() {
		$timestamp   = time();
		$remote_addr = $this->input->server("REMOTE_ADDR");
		$mac_address = $this->input->server("MAC_ADDRESS");

		$data['code_text'] = urlencode(site_url("authorization?remote_addr=$remote_addr&mac_address=$mac_address&timestamp=$timestamp"));
		
		$this->load->view('authentication', $data);
	}
}
