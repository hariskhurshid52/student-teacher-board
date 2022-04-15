<?php
	/**
	 * Created by Haris.
	 * Date: 2/5/2022
	 * Time: 6:43 PM
	 */

	if (!function_exists('viewResults')) {
		function viewResults($output)
		{
			$ci = &get_instance();
			echo "\n";
			$ci->output
				->set_status_header(200)
				->set_content_type('application/json', 'utf-8')
				->set_header('Cache-Control: no-store, no-cache, must-revalidate')
				->set_header('Pragma: no-cache')
				->set_output(
					json_encode(
						$output,
						JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES
					)
				)
				->_display();
			exit;
		}
	}

	if (!function_exists('show')) {
		function show($obj, $break = false)
		{
			if (is_array($obj) || is_object($obj)) {
				print_r($obj);
			} else {
				echo "\n----------------[ " . date('Y-m-d h:i:s') . " ]-------------------\n\n" .
					$obj .
					"\n\n---------------------------------------------------------------------------\n";
			}
			if ($break) {
				exit;
			}
		}
	}
	if (!function_exists('ajax_response')) {
		function ajax_response($obj = array())
		{
			echo json_encode($obj);
			exit;
		}
	}





