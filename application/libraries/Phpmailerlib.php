<?php
	
	require 'vendor/autoload.php';
	
	use PHPMailer\PHPMailer\PHPMailer;
	
	class Phpmailerlib
	{
		public $mail;
		
		public function __construct()
		{
			$this->mail = new PHPMailer(true);
			$this->mail->isSMTP();
			$this->mail->Host = 'smtp.ionos.co.uk';
			$this->mail->SMTPAuth = true;
			$this->mail->Username = 'bablu@onlinemail.kugeza.com';
			$this->mail->Password = 'GusomA24031985!A';
			$this->mail->SMTPSecure = 'TLS';
			$this->mail->Port = 587;
			
			$this->mail->setFrom('cohort@onlinemail.kugeza.com', 'School of Kinyarwanda');
			$this->mail->isHTML(true);
		}
	}
