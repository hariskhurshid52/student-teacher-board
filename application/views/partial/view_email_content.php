<?php
	/**
	 * view_email_content.php
	 * Developer: Haris
	 * Date: 2/5/2022
	 * Time: 15:22
	 */
?>

<div class="form-group has-form-text">
	<label for="txtemail">Your Email: </label>
	<input type="text" class="form-control" id="txtemail" value="<?=$this->session->userdata['logged_in']['email']?>" placeholder="Enter email">
	<small class="form-text">We'll never share your email with anyone else.</small>
</div>

<button class="btn btn-primary" onclick="send_email('<?=$section?>')">Send</button>
