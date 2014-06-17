<?php
class Message extends CI_Controller {
	
	public function index() {
		$data = array();
		$this->load->view('message', $data);
	}
	
}