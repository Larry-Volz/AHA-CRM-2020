<?

//write the message in HTML
$recipient="larry@americanhypnosisclinic.com";
$replyToAddress = "larry@americanhypnosisclinic.com";
$subject = "test of using html e-mail";
$msg = "<strong>This is a Test</strong><br>This is only a test of using <b>HTML</b> in e-mails.";

//create the mailheaders including MIME
$mailheaders = "MIME-Version: 1.0\r\n";
$mailheaders .= "From: Larry Volz <larry@americanhypnosisclinic.com>\r\n";
$mailheaders .= "Content-type: text/html; charset=ISO-8859-1/4/n";
//$mailheaders .= "Reply-To: $replyToAddress";

//send the mail
mail($recipient, $subject, $msg, $mailheaders);

?>

<html>
<head>
<title></title>

Hopefully you just got an e-mail with html formatting.

</head>
<body>




</body>
</html>