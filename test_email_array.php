<?
$affilSalesRecipients = array(
							array("fName" => "Wendy",
							"eMail"=> "wendyneugent@hotmail.com"
							),
							array("fName"=>"Heather",
							"eMail"=>"heather@ahc.intranets.com"
							),
							array("fName"=>"Larry",
							"eMail"=>"larry@americanhypnosisclinic.com"
							),
							array("fName"=>"Meredith",
							"eMail"=>"receptionist@americanhypnosisclinic.com"
							),
							array("fName"=>"Rachael",
							"eMail"=>"rachael@americanhypnosisclinic.com"
							),
							array("fName"=>"Maggie",
							"eMail"=>"maggiemc7@yahoo.com"
							),
							array("fName"=>"Sue",
							"eMail"=>"ahcsue@hotmail.com"
							),
							array("fName"=>"Pat",
							"eMail"=>"ahcpat@hotmail.com"
							),							
							array("fName"=>"Nicole",
							"eMail"=>"nraynor@ec.rr.com"
							),	
							array("fName"=>"Carolyn",
							"eMail"=>"crmoserva@cox.net"
							)
						);
						
foreach ($affilSalesRecipients as $mailTo){
  
  	$name = $mailTo['fName'];
  	$eMail = $mailTo['eMail'];
  	
  
	$body = "Dear $name, \r\n \r\n This is just a quick note to let you know that $f_name $l_name from {$address2}, {$address3} has applied and been accepted as an American Hypnosis Clinic Affiliate with a $ranking star rating.\r\n You can learn more about $f_name in the Affiliates section of our Intranet.  \r\n Hopefully this addition to our team will help you place clients in that area. \r\n All the best, \r\n \r\n Larry";

	$from = "larry@americanhypnosisclinic.com";
	$subject = "New AHC Affiliate Member in ".$address3;
	
		echo "$eMail <br> $subject <br><br>$body<br><br>$from<br><br><br><br>";

}
//************************* THEN INFORM THE APPLICANT ***************************


?>						