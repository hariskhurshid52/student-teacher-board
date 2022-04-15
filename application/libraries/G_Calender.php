<?php
	
	require 'vendor/autoload.php';
	
	
	class G_Calender
	{
		
		public $client;
		public $calender;
		public $events;
		
		public function __construct()
		{
			$server_name = !empty($_SERVER['SERVER_NAME']) ? $_SERVER['SERVER_NAME'] : 'amasomo.com';
			$this->client = new Google_Client();
			$this->client->setApplicationName('Kinyarwanda Proficiency Program Cohort S’2022');
			$this->client->setScopes(Google_Service_Calendar::CALENDAR);
			$this->client->addScope(Google_Service_Calendar::CALENDAR_EVENTS);
			$this->client->setAuthConfig(__DIR__ . '/' . $server_name . '_calender.creds.json');
			$this->client->setAccessType('offline');
			$this->client->setPrompt('select_account consent');
			$this->client->addScope('profile');
			
		}
		
		
		public function getUser()
		{
			$google_ouath = new Google_Service_Oauth2($this->client);
			return (object)$google_ouath->userinfo->get();
		}
		
		public function calender()
		{
			$this->calender = new Google_Service_Calendar($this->client);
			return $this->calender;
		}
		
		public function events()
		{
			$this->events = new Google_Service_Calendar_Event($this->client);
			return $this->events;
		}
		
		public function getEventData($data)
		{
			return new Google_Service_Calendar_Event($data);
		}
		
		
	}
