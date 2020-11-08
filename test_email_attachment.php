<?

        error_reporting(E_ALL);
        require_once('includes/htmlMimeMail.php');
		/*
        * Create the mail object.
		* No longer takes any arguments
        */
        $mail = new htmlMimeMail();

		
//read in attachment  
$attachment = $mail->getFile('mydata.txt');

        /*
        * Get the contents of the example text/html files.
		* Text/html data doesn't have to come from files,
		* could come from anywhere.
        */
        $text = $mail->getFile('includes/docs/examples/example.txt');
        $html = $mail->getFile('includes/docs/examples/example.html');
      /*
        * Add the text, html and embedded images.
        * The name (background.gif in this case)
		* of the image should match exactly
        * (case-sensitive) to the name in the html.
        */
        $mail->setHtml($html, $text);
 //       $mail->addHtmlImage($background, 'background.gif', 'image/gif');

        /*
        * This is used to add an attachment to
        * the email. Due to above, the $attachment
		* variable contains the example zip file.
        */
        //$mail->addAttachment($attachment, 'example.zip', 'application/zip');
        $mail->addAttachment($attachment, 'PC_Guide.htm', 'application/htm');

        /*
        * Set the return path of the message
        */
		$mail->setReturnPath('larry@americanhypnosisclinic.com');
		
		/**
        * Set some headers
        */
		$mail->setFrom('"Larry Volz" <larry@americanhypnosisclinic.com>');
		$mail->setSubject('Test mail');
		$mail->setHeader('X-Mailer', 'HTML Mime mail class (http://www.phpguru.org)');
		
		/**
        * Send it using SMTP. If you're using Windows you should *always* use
		* the smtp method of sending, as the mail() function is buggy.
        */
		$result = $mail->send(array('larry@americanhypnosisclinic.com'), 'smtp');

		// These errors are only set if you're using SMTP to send the message
		if (!$result) {
			print_r($mail->errors);
		} else {
			echo 'Mail sent!';
		}
/*
$mail->setText($mailbody);
$mail->addAttachment($attachment,'mydata.txt','text/plain');
$mail->setReturnPath('larry@americanhypnosisclinic.com');
$mail->setFrom('larry@americanhypnosisclinic.com');
$mail->setSubject('Evaluator');

$mail->send('larry@americanhypnosisclinic.com', 'smtp')
*/


?>

<html>
<head>
<title></title>



</head>
<body>

Hopefully sending an e-mail with the subject "Test Mail" and the attachment labled 'mydata.tex'


</body>
</html>