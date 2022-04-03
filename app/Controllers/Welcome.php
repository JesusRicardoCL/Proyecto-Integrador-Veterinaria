<?php
namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Welcome extends ResourceController{
 
	public function index()
	{
		session_start();		
		$this->load->helper("url");  
		if(!isset($_SESSION["cliente"])){ 
			redirect("/login/index"); 
		} 
		

	
		$this->load->view('main/index');
	}

 
 

}
