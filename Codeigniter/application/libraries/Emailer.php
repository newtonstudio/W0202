<?php
require './vendor/autoload.php';
use Mailgun\Mailgun;

class Emailer {
	public function sendmail($to, $cc="", $bcc="", $subject, $html){

		$mgClient = new Mailgun('key-3c123e0a5c67c56f17b70d50517e397f');
		$domain = "sandbox7e1e8cc953714273a441fdd9f0967239.mailgun.org";

		$sendArray = array();
		$sendArray['from'] = 'ContactUs <postmaster@sandbox7e1e8cc953714273a441fdd9f0967239.mailgun.org>';

		$sendArray['to'] = $to;
		$sendArray['subject'] = $subject;
		$sendArray['html'] = $html;

		if(!empty($cc)) {
			$sendArray['cc'] = $cc;
		}
		if(!empty($bcc)) {
			$sendArray['bcc'] = $bcc;
		}		


		# Make the call to the client.
		$result = $mgClient->sendMessage($domain, $sendArray, array(
		    'attachment' => array()
		));

	}
}
?>