<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {
	public function get_data(){
		return $this->db->get('crawling_tweet')->result();
	}
}
