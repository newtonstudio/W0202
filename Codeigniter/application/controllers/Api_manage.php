<?php
require './vendor/autoload.php';

class Api_manage extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->Model("News_model");
		$this->load->Model("User_model");

	}

	public function testToken(){

		$token = "EAAU6exZBgk1QBACa0W5ddqQhi55Yvain31B6XEAAh3X2WTHscFjgw39NREKkhorER8JZA29hq2g5mTWPbsPoNfKskusvAfH0fmoR37EAZAZBZABoPtwxocFNGnAattVthjOlAi5QaZCkIjoaYB7HhtDXjRwjIY1kb9Qd9ZA6mXNyM2YaUrXmJmYIxDBm9XUKShxZA4yWZABVIuAZDZD";

		$fb = new \Facebook\Facebook([
			  'app_id' => '1471675369558868',
			  'app_secret' => '26ce0b82a8b9aedfcc4f9bb9c41c00ea',
			  'default_graph_version' => 'v2.10',
			  'default_access_token' => $token, // optional
			]);

			$response = $fb->get('/me?fields=id,name');

			$user = $response->getGraphUser();

			echo json_encode($user);





	}

	public function fblogin(){

		try {

			$type = "fb";
			$token = $this->input->post("token", true);

			$fb = new \Facebook\Facebook([
			  'app_id' => '1471675369558868',
			  'app_secret' => '26ce0b82a8b9aedfcc4f9bb9c41c00ea',
			  'default_graph_version' => 'v2.10',
			  //'default_access_token' => '{access-token}', // optional
			]);

			$response = $fb->get('/me?fields=id,name,email', $token);

			$user = $response->getGraphUser();



		} catch(Exception $e){

			echo json_encode(array(
				'status' => "ERROR",
				'result' => $e->getMessage(),
			));

		}

	}

	public function googleLogin(){

		try {

			$type = "google";
			$fullname = $this->input->post("fullname", true);
			$googleID = $this->input->post("googleID", true);
			$photo = $this->input->post("photo", true);
			$email = $this->input->post("email", true);

			$token = $this->input->post("token", true);

			if(empty($googleID)) {
				throw new Exception("GoogleID cannot be empty");
				
			}

			if(empty($token)) {
				throw new Exception("token invalid");
			}

			$client = new Google_Client(['client_id' => "1011735560172-64ofvrf1vafbr084n980q2b6sncaqh4l.apps.googleusercontent.com"]);
			$payload = $client->verifyIdToken($token);
			if ($payload) {
			  $googleID = $payload['sub'];
			  $fullname = $payload['name'];
			  $photo    = $payload['picture'];
			  $email    = $payload['email'];
			  
			} else {
			 	
				throw new Exception("Invalid Token (google said)");
				
			}



			$userData = $this->User_model->getOne(array(
				'googleID' => $googleID,
			));
			if(empty($userData)) {

				$userID = $this->User_model->insert(array(
					'type' => $type,
					'fullname' => $fullname,
					'googleID' => $googleID,
					'photo' => $photo,
					'email' => $email,
					'token' => $token,
					'created_date' => date("Y-m-d H:i:s"),
				));

			} else {

				$userID = $userData['userID'];

			}

			echo json_encode(array(
				'status' => "OK",
				'result' => $userID,
			));

		} catch(Exception $e) {

			echo json_encode(array(
				'status' => "ERROR",
				'result' => $e->getMessage(),
			));

		}



	}

	public function testmachine(){

		$this->load->view("test");

	}

	public function postNews(){

		try {

			$title = $this->input->post("title", true);
			$content = $this->input->post("content", true);
			$date = date("Y-m-d h:i:s");

			if(empty($title)) {
				throw new Exception("Your title cannot be empty");
			}

			if(empty($content)) {
				throw new Exception("Your content cannot be empty");
			}

			$newsData = $this->News_model->getOne(array(
				'title' => $title,
			));
			if(!empty($newsData)) {
				throw new Exception("This title is duplicated, please try another title");
			}

			$news_id = $this->News_model->insert(array(
				'title' => $title,
				'content' => $content,
				'created_date' => $date,
			));

			echo json_encode(array(
				'status' => "OK",
				'result' => $news_id,
			));

		} catch(Exception $e) {

			echo json_encode(array(
				'status' => "ERROR",
				'result' => $e->getMessage(),
			));

		}


	}

	public function array_to_xml( $data, &$xml_data ) {
	    foreach( $data as $key => $value ) {
	        if( is_numeric($key) ){
	            $key = 'item'.$key; //dealing with <0/>..<n/> issues
	        }
	        if( is_array($value) ) {
	            $subnode = $xml_data->addChild($key);
	            $this->array_to_xml($value, $subnode);
	        } else {
	            $xml_data->addChild("$key",htmlspecialchars("$value"));
	        }
	     }
	}

	public function getNewsList($mode="json"){

		$newslist = $this->News_model->getData();

		$json = array();
		if(!empty($newslist)) {
			foreach($newslist as $v) {

				$json[] = array(
					'id' => $v['id'],
					'title' => $v['title'],
					'content' => $v['content'],
					'created_date' => $v['created_date'],
				);
			}
		}

		if($mode == "json") {

			echo json_encode($json);

		} else {

			$simplexml = new SimpleXMLElement('<?xml version="1.0"?><results />');
			$this->array_to_xml($json, $simplexml);
			echo $simplexml->asXML(); 


		}


	}


}
?>