<?php
class Report_manage extends CI_Controller{

	private $data = array();

	public function __construct(){
		parent::__construct();
		$this->data['pageName'] = "report";
		$this->load->model("Pageview_model");
	}

	public function falseData(){

		$start_ts = time()-365*24*3600;
		$end_ts   = time();

		for($i=$start_ts; $i < $end_ts; $i=$i+24*3600) {

			$random_number = rand(1000,9999);
			$current_date = date("Y-m-d", $i);

			$pgData = $this->Pageview_model->getOne(array(
				'postdate' => $current_date,
				'is_deleted' => 0,
			));

			if(empty($pgData)) {

				$this->Pageview_model->insert(array(
					'postdate' => $current_date,
					'pageCount' => $random_number,
					'created_date' => date("Y-m-d H:i:s"),
				));

				echo $current_date." ".$random_number."<br/>";

			}

			

		}

	}

	public function index(){

		$pgList = $this->Pageview_model->get(array(
			'is_deleted' => 0,
		));

		$daysArray = array();
		$daysArray[1] = 0;
		$daysArray[2] = 0;
		$daysArray[3] = 0;
		$daysArray[4] = 0;
		$daysArray[5] = 0;
		$daysArray[6] = 0;
		$daysArray[7] = 0;


		foreach($pgList as $v)  {

			$ts = strtotime($v['postdate']);
			$day = date("N", $ts);

			$daysArray[$day]+=$v['pageCount'];

		}


		$outputList = array();
		$outputList[] = array(
			'Days', 'View'
		);

		foreach($daysArray as $k=>$v)  {

			$outputList[] = array(
				(string)$k, (int)$v
			);

		}

		$this->data['outputList'] = $outputList;


		$this->load->view("contact/header", $this->data);
		$this->load->view("contact/report", $this->data);
		$this->load->view("contact/footer", $this->data);

	}

}
?>