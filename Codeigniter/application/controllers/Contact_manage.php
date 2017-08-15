<?php
class Contact_manage extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Contact_model');
	}

	public function testmail(){

		$this->load->library("emailer");

		$this->emailer->sendmail("newtonstudio@gmail.com", "", "", "Hello World!", "<h1>Testing Mailgun</h1>");


	}	

	public function manage($page=1){

		$item_per_page = 5;

		$total_item = $this->Contact_model->record_count(array(
			'is_deleted' => 0,
		));

		//echo $total_item;
		//exit;



		$start = ($page - 1) * $item_per_page;

		$dataList = $this->Contact_model->fetch($start, $item_per_page, array(
				'is_deleted' => 0,
			));
		//echo $this->db->last_query();
		//print_r($dataList);
		//exit;

		$this->load->library("pagination");
		$config = array();
		$config['base_url'] = base_url('manage');
		$config['total_rows'] = $total_item;
		$config['per_page'] = $item_per_page;
		$config['uri_segment'] = 2;
		$config['use_page_numbers'] = TRUE;

		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';

		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['first_link'] = 'First';

		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['last_link'] = 'Last';

		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['next_link'] = '&gt;';

		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['prev_link'] = '&lt;';


		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';


		$this->pagination->initialize($config);

		$pagination = $this->pagination->create_links();

		$data = array();
		$data['dataList'] = $dataList;
		$data['pageName'] = "manage";
		$data['pagination'] = $pagination;

		$this->load->view("contact/header",$data);
		$this->load->view("contact/manage", $data);
		$this->load->view("contact/footer", $data);

	}

	public function delete($id){
		$this->Contact_model->delete(array(
			'id' => $id,
		));
		redirect(base_url('manage'));
	}

	public function index($id=FALSE,$mode="I"){

		$hasSent = $this->input->get("submitDone", true);

		$data = array();
		$data['hasSent'] = $hasSent;
		$data['pageName'] = "index";


		if($id==FALSE) {
			$mode = "Add";
		} else {

			if($mode == "E") {
				$mode = "Edit";
			} else {
				$mode = "Copy";
			}

			$contactData = $this->Contact_model->getOne(array(
				'id' => $id,
			));
			$data['contactData'] = $contactData;

		}
		$data['mode'] = $mode;

		$this->load->view("contact/header",$data);
		$this->load->view("contact/index", $data);
		$this->load->view("contact/footer", $data);
	}

	public function submit(){


		$this->load->library("emailer");

		$id = $this->input->post("id", true);
		$mode = $this->input->post("mode", true);

		$name = $this->input->post("name", true);
		$email = $this->input->post("email", true);
		$message = $this->input->post("message", true);

		if($mode == "Add" || $mode == "Copy") {


			$this->Contact_model->insert(array(
				'name' => $name,
				'email' => $email ,
				'message' => $message,
				'created_date' => date("Y-m-d H:i:s"),
			));

			if($mode == "Add") {

				$this->emailer->sendmail("newtonstudio@gmail.com", "", "", "You've got a new message!", $message);


				redirect(base_url('contact?submitDone=true'));
			} else {
				redirect(base_url('manage'));
			}

		} else if ($mode == "Edit") {

			$this->Contact_model->update(array(
				'id' => $id,
			), array(
				'name' => $name,
				'email' => $email ,
				'message' => $message,
				'modified_date' => date("Y-m-d H:i:s"),
			));
			redirect(base_url('manage'));

		}


	}

	public function test_add(){
		$this->Contact_model->insert(array(
			'name' => "Jason",
			'email' => "jason.tian@i-tea.com.tw",
			'message' => "Hello World!",
			'created_date' => date("Y-m-d H:i:s"),
		));

	}

	public function test_get(){

		$dataList = $this->Contact_model->get(array(
			'is_deleted' => 0,
		));

		print_r($dataList);

	}

	public function test_update(){

		$this->Contact_model->update(array(
			'id' => 2,
		), array(
			'name' => "Michael",
		));

	}

	public function test_delete(){
		$this->Contact_model->delete(array(
			'id' => 1,
		));
	}

}

?>