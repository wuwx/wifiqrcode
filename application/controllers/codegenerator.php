<?php
class CodeGenerator extends CI_Controller {
		
	public function index() {
		$this->load->file('application/third_party/QRcode.php');
		$text = $this->input->get('text');
		
		$this->output->set_content_type("image/png");
		QRcode::png($text, false, QR_ECLEVEL_L, 8, 2);
	}
}
