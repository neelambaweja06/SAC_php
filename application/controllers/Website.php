<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Website extends CI_Controller {

	public function index()
{
  $this->load->view("website/include/header"); 
  $this->load->view("website/index"); 
  $this->load->view("website/include/footer"); 
}

public function about()
{
  $this->load->view("website/include/header");
  $this->load->view("website/about"); 
  $this->load->view("website/include/footer");
}

public function team()
{
  $this->load->view("website/include/header");
  $this->load->view("website/team"); 
  $this->load->view("website/include/footer");
}
public function contact()
{
  $this->load->view("website/include/header");
  $this->load->view("website/contact"); 
  $this->load->view("website/include/footer");
}
public function gallery()
{
  $this->load->view("website/include/header");
  $this->load->view("website/gallery"); 
  $this->load->view("website/include/footer");
}
public function blog()
{
  $this->load->view("website/include/header");
  $this->load->view("website/blog"); 
  $this->load->view("website/include/footer");
}
public function event()
{
  $this->load->view("website/include/header");
  $this->load->view("website/event"); 
  $this->load->view("website/include/footer");
}
public function blog_detail()
{
  $this->load->view("website/include/header");
  $this->load->view("website/blog_detail"); 
  $this->load->view("website/include/footer");
}
public function event_detail()
{
  $this->load->view("website/include/header");
  $this->load->view("website/event_detail"); 
  $this->load->view("website/include/footer");
}
}
