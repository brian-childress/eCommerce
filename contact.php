<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = trim($_POST["name"]);
	$email = trim($_POST["email"]);
	$message = trim($_POST["message"]);
	
	if ($name == "" OR $email == "" OR $message ==""){
		echo "You must specify a value for name, email address, and a message.";
		exit;
	}

	foreach( $_POST as $value ){
		if( stripos($value, 'Content-Type') != FALSE){
			echo "There was a problem with the information you entered.";
			exit;
		}
	}

	if ($_POST["address"] != ""){
		echo "Your form submission has an error.";
	}

	//Include PHP Mailer Library
	require_once("_/components/phpmailer/class.phpmailer.php");
	$mail = new PHPMailer();

	//Validate Email Address
	if (!$mail->ValidateAddress($email)){
		echo "You must enter a valid email address.";
		exit;
	}

	$email_body = "";
	$email_body = $email_body . "Name: " . $name . "<br>";
	$email_body = $email_body . "Email: " . $email . "<br>";
	$email_body = $email_body . "Message: " . $message;
	
	//Send Email

	$mail->SetFrom($email, $name);

	$address = "brian@brianchildress.co";
	$mail->AddAddress($address, "Shirts 4 Mike");

	$mail->Subject = "Shirts Contact Form | " . $name;

	$mail->MsgHTML($email_body);

/*
	$mail->AddAttachment("images/phpmailer.gif");      // attachment
	$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment
*/
	if(!$mail->Send()) {
	echo "Mailer Error: " . $mail->ErrorInfo;
	exit;
	} 

	header("Location: contact.php?status=thanks");
	exit;
}
?>

<?php 
$pageTitle = "Contact";
$section = "contact";
include('_/components/header.php'); ?>
	<div class="section page">
		<div class="wrapper">
			<h1>Contact</h1>
			<?php if (isset($_GET["status"]) AND $_GET["status"] =="thanks") { ?>
				<p>Thanks for the email! I&rsquo;ll be in touch shortly.</p>
			<?php } else { ?>
					<p>I&rsquo;d love to hear from you! Complete the form to send me an email.</p>
				
					<form method ="post" action="contact.php">
						<table>
							<tr>
								<th>
									<label for="name">Name</label>
								</th>
								<td>
									<input type="text" name="name" id="name">
								</td>
							</tr>
							<tr>
								<th>
									<label for="email">Email</label>
								</th>
								<td>
									<input type="text" name="email" id="email">
								</td>
							</tr>
							<tr>
								<th>
									<label for="message">Message</label>
								</th>
								<td>
									<textarea name="message" id="message"></textarea>
								</td>
							</tr>
							<tr style="display:none;">
								<th>
									<label for="address">Address</label>
								</th>
								<td>
									<input type="text" name="address" id="address">
									<p>Humans leave this field blan.</p>
								</td>
							</tr>
						</table>
						<input type="submit" value="Send">
					</form>
				
				<?php } ?>
				</div> <!-- wrapper -->
			</div> <!-- page -->
<?php include('_/components/footer.php'); ?>