<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

	function __construct() {
		parent::__construct();
      }

	//loads the search page for user to enter their search term
	public function index() {
		$this->load->view('Search');
	}

	//called from search page, sends search term to controller, then opens message view with the result
	public function dosearch() {
		$this->load->model('Messages_model');
		$searchString = $this->input->get('search');
		$results = $this->Messages_model->searchMessages($searchString);
		$data = array('results' => $results, 'name' => 'Search for '.$searchString, 'following' => true);
		$this->load->view('ViewMessages', $data);
	}
}
