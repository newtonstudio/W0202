<?php
class News_manage extends CI_Controller {

	private $data = array();

	public function index(){

		//echo "News Manage";
		$this->load->model("News_model");

		$dataList = $this->News_model->getData();
		
		$this->data['title'] = "News List";
		$this->data['dataList'] = $dataList;
		$this->data['pageName'] = "news";

		$this->load->view("header", $this->data);
		$this->load->view("news/index", $this->data);
		$this->load->view("footer");

	}

	public function news_detail($id){

		$this->load->model("News_model");

		$newsData = $this->News_model->getOne($id);

	
		$this->data['title'] = $newsData['title'];		
		$this->data['newsData'] = $newsData;
		$this->data['pageName'] = "news";

		$this->load->view("header", $this->data);
		$this->load->view("news/detail", $this->data);
		$this->load->view("footer");


	}


	public function about(){

		$this->data['title'] = "About";
		$this->data['pageName'] = "about";

		$this->load->view("header", $this->data);
		$this->load->view("news/about");
		$this->load->view("footer");

	}

}
?>