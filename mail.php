<?
if ( mail("svarga15@yahoo.com", "the subject", "test",
       "From: svarga15@yahoo.com\nReply-To: svarga15@yahoo.com\nX-Mailer: PHP/" . phpversion()) )
echo "E-mail trimis";
else
echo "Eroare";





?>