<?php
require './vendor/autoload.php';

class Login_manage extends CI_Controller{
	public function __construct(){
		parent::__construct();
	}
	public function login(){
		$this->load->view("login");		
	}

	public function fbcallback(){

		//echo $_GET['state'];
		//exit;

		//http://w0202.local/fbcallback?code=AQBehFo3_oCndV8vFtYpuG3k7WOa9o1HR33jR8l0pzI2xW-TQZ6gNGE9eE4IXOb73YTbzrge7Hplred8asjUt1tIFJbfw5CWEX1WJKU2g_imTu6PSQsb-q9jlLkwFyNtWjofZoUCv_zrZXvop8eVq0Ayi4xib290S0XswgNZcx7MmS-HpCqu1eSmLh4RvY12ad6PAuVVLxAGrjQkwZZ_7vVvybRa65OykRTOY3rqsSvAJ2C4elPA7gBLVghPeemYPWDFw9ByJNMkYI8TgZU7kMu48drp5Sp1yrTnppCbSQ0VCsu8DpCfMFZKV66aa-D8xpLO-tLWbpNbRGyyYYbklYJk_W7XeFjBiiS3kOsQRCjyIw&state=29100a24f7631ee59e3fc4a600cf6d4e#_=_
		//$code = $this->input->get("code", true);
		//$state = $this->input->get("state", true);

		$fb = new \Facebook\Facebook([
			  'app_id' => '1471675369558868',
			  'app_secret' => '26ce0b82a8b9aedfcc4f9bb9c41c00ea',
			  'default_graph_version' => 'v2.10',
			  //'default_access_token' => $token, 
			]);

		$helper = $fb->getRedirectLoginHelper();

		try {
		  $accessToken = $helper->getAccessToken();
		} catch(Facebook\Exceptions\FacebookResponseException $e) {
		  // When Graph returns an error
		  echo 'Graph returned an error: ' . $e->getMessage();
		  exit;
		} catch(Facebook\Exceptions\FacebookSDKException $e) {
		  // When validation fails or other local issues
		  echo 'Facebook SDK returned an error: ' . $e->getMessage();
		  exit;
		}

		if (! isset($accessToken)) {
		  if ($helper->getError()) {
		    header('HTTP/1.0 401 Unauthorized');
		    echo "Error: " . $helper->getError() . "\n";
		    echo "Error Code: " . $helper->getErrorCode() . "\n";
		    echo "Error Reason: " . $helper->getErrorReason() . "\n";
		    echo "Error Description: " . $helper->getErrorDescription() . "\n";
		  } else {
		    header('HTTP/1.0 400 Bad Request');
		    echo 'Bad request';
		  }
		  exit;
		}

		// Logged in
		echo '<h3>Access Token</h3>';
		var_dump($accessToken->getValue());

		// The OAuth 2.0 client handler helps us manage access tokens
		$oAuth2Client = $fb->getOAuth2Client();

		// Get the access token metadata from /debug_token
		$tokenMetadata = $oAuth2Client->debugToken($accessToken);
		echo '<h3>Metadata</h3>';
		var_dump($tokenMetadata);

		// Validation (these will throw FacebookSDKException's when they fail)
		$tokenMetadata->validateAppId("1471675369558868"); // Replace {app-id} with your app id
		// If you know the user ID this access token belongs to, you can validate it here
		//$tokenMetadata->validateUserId('123');
		$tokenMetadata->validateExpiration();

		if (! $accessToken->isLongLived()) {
		  // Exchanges a short-lived access token for a long-lived one
		  try {
		    $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
		  } catch (Facebook\Exceptions\FacebookSDKException $e) {
		    echo "<p>Error getting long-lived access token: " . $helper->getMessage() . "</p>\n\n";
		    exit;
		  }

		  echo '<h3>Long-lived</h3>';
		  var_dump($accessToken->getValue());
		}

		$_SESSION['fb_access_token'] = (string) $accessToken;




	}

	public function fblogin(){

		$fb = new \Facebook\Facebook([
			  'app_id' => '1471675369558868',
			  'app_secret' => '26ce0b82a8b9aedfcc4f9bb9c41c00ea',
			  'default_graph_version' => 'v2.10',
			  //'default_access_token' => $token, 
			]);

		$helper = $fb->getRedirectLoginHelper();

		$permissions = ['email']; // Optional permissions
		$loginUrl = $helper->getLoginUrl('http://w0202.local/Codeigniter/fbcallback', $permissions);

		$data = array();
		$data['link'] =  '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';

		$this->load->view("fblogin", $data);		
	}
}
?>