<html>
<head>
<title>Larrys Keyword Generator</title>



<!--mstheme--><link rel="stylesheet" type="text/css" href="../../../_themes/breeze/bree1011.css"><meta name="Microsoft Theme" content="breeze 1011, default">
</head>
<body>
<h1>Larry's Keyword Generator for Yahoo as of 5/18/06'</h1>

<a href="#descriptions">Click Here</a> to go to the start of the descriptions<br><br>
<hr>
<?

$terms = 0;
$every_500=0;
//*************** CREATE COUNT_EM FUNCTION ***********************************

function count_em(){
global $terms;
global $every_500;

  $terms = $terms+1;

  		if ($terms%499==0){
		  $every_500 += 1;
		  echo"====================================== END OF GROUP OF 500 SET $every_500 ===================================<br>";
		  return $terms;
		}//end every 500 counter

}//end count_em function

//***************************** CREATE STATE ABBREVIATION TO WORD CONVERSION FUNCTION ******************************
FUNCTION state_conversion($state){
  
global $state;
  
  	if ($state=="AL") {
	    $state ="Alabama";
		};
	if ($state=="AK") {
	  $state="Alaska";
	};
	if ($state=="AZ") {$state="Arizona";
	};
	if ($state=="AR") {$state="Arkansas";
	};
	if ($state=="CA") {$state="California";
	};
	if ($state=="CO") {$state="Colorado";
	};
	if ($state=="CT") {$state="Connecticut";
	};
	if ($state=="DE") {$state="Delaware";
	};
	if ($state=="DC") {$state="Washington DC";
	};
	if ($state=="FL") {$state="Florida";
	};
	if ($state=="GA") {$state="Georgia";
	};
	if ($state=="HI") {$state="Hawaii";
	};
	if ($state=="ID") {$state="Idaho";
	};
	if ($state=="IL") {$state="Illinois";
	};
	if ($state=="IN") {$state="Indiana";
	};
	if ($state=="IA") {$state="Iowa";
	};
	if ($state=="KS") {$state="Kansas";
	};
	if ($state=="KY") {$state="Kentucky";
	};
	if ($state=="LA") {$state="Louisiana";
	};
	if ($state=="ME") {$state="Maine";
	};
	if ($state=="MD") {$state="Maryland";
	};
	if ($state=="MA") {$state="Massachusetts";
	};
	if ($state=="MI") {$state="Michigan";
	};
	if ($state=="MN") {$state="Minnesota";
	};
	if ($state=="MS") {$state="Mississippi";
	};
	if ($state=="MO") {$state="Missouri";
	};
	if ($state=="MT") {$state="Montana";
	};
	if ($state=="NE") {$state="Nebraska";
	};
	if ($state=="NV") {$state="Nevada";
	};
	if ($state=="NH") {$state="New Hampshire";
	};
	if ($state=="NJ") {$state="New Jersey";
	};
	if ($state=="NM") {$state="New Mexico";
	};
	if ($state=="NY") {$state="New York";
	};
	if ($state=="NC") {$state="North Carolina";
	};
	if ($state=="ND") {$state="North Dakota";
	};
	if ($state=="OH") {$state="Ohio";
	};
	if ($state=="OK") {$state="Oklahoma";
	};
	if ($state=="OR") {$state="Oregon";
	};
	if ($state=="PA") {$state="Pennsylvania";
	};
	if ($state=="RI") {$state="Rhode Island";
	};
	if ($state=="SC") {$state="South Carolina";
	};
	if ($state=="SD") {$state="South Dakota";
	};
	if ($state=="TN") {$state="Tennessee";
	};
	if ($state=="TX") {$state="Texas";
	};
	if ($state=="UT") {$state="Utah";
	};
	if ($state=="VT") {$state="Vermont";
	};
	if ($state=="VA") {$state="Virginia";
	};
	if ($state=="WA") {$state="Washington";
	};
	if ($state=="WV") {$state="West Virginia";
	};
	if ($state=="WI") {$state="Wisconsin";
	};
	if ($state=="WY") {$state="Wyoming";
	};
  
 return $state; 
}//end state abbrev to word conversion function
  


//################################## CONNECT ###########################################
// create variable for name of database & table
$db_name = "america2_AHC";
$table_name = "affiliates";

//Get my class and methods
include_once("../../ahcDatabase_class.php");

//CONNECT TO DB
$ahcDB->dbConnect();


//open the SQL connection to AHC server databases
//$connection = mysql_connect("mysql209.secureserver.net","america2_AHC","magiclar") or die (mysql_error());

// SELECT DataBase - create var to hold the result of select db function
//$db = mysql_select_db($db_name, $connection) or die (mysql_error());


//create the sql statement
$sql = "SELECT * FROM $table_name WHERE membership_status='Affiliate'ORDER BY address3";

//execute the sql statement and create a variable you can use to display or work with it
$result = mysql_query($sql, $connection) or die(mysql_error());

//###########################################################################################

//STRATEGY:
// - Get City and States from all affiliates
// - for every city and once for every state set variables
// - output the title and search term for each permutation using that variable to cut and paste

//###########################################################################################

	//FIRST LOOP TO OUTPUT SEARCH TERMS IN GROUPS OF 500
	while ($row = mysql_fetch_array($result)){
	  
	  //SETUP FOR STATE CHANGE TRACKING
	  if (isset($state)){
	    $old_state=$state;
	}
	  
	  	//DEFINE VARIABLES
		$city=$row['address2'];
		$state=strtoupper($row['address3']);
		$state = state_conversion($state);
		
		
	//SETUP FOR STATE CHANGE TRACKING	
	$new_state=$state;
	
	//DO SEARCH TERMS THAT ONLY COME UP WHEN STATE CHANGES
	if (($old_state != $new_state)AND(isset($old_state))){//IF STATE CHANGED (after 1st one)
	
		Echo "$state hypnosis <br>"; count_em();
		Echo " $state hypnotherapy <br>"; count_em();
		Echo " $state hypnotist <br>"; count_em();
		Echo " Weight loss hypnotherapy $state <br>"; count_em();
		Echo " Weight loss hypnosis $state <br>"; count_em();
		Echo " Weight loss hypnosis $state <br>"; count_em();
		Echo " Weight loss $state <br>"; count_em();
		Echo " Quit smoking hypnosis $state <br>"; count_em();
		Echo " Quit smoking $state <br>"; count_em();

		Echo " help quit smoking $state <br>"; count_em();

		Echo " Lose weight $state <br>"; count_em();
		Echo " Hypnosis to lose weight $state <br>"; count_em();
		Echo " Drug addiction $state <br>"; count_em();
		Echo " Drug abuse treatment $state <br>"; count_em();
		Echo " Alcoholism $state <br>"; count_em();
		Echo " Alcoholism treatment $state <br>"; count_em();
		Echo " Alcoholism treatment program $state <br>"; count_em();
		Echo " Substance abuse treatment $state <br>"; count_em();
		Echo " Addiction treatment $state <br>"; count_em();
		Echo " addiction treatment center $state <br>"; count_em();
		Echo " drug addiction treatment center $state <br>"; count_em();
		Echo " drug addiction rehab treatment $state <br>"; count_em();
		Echo " drug addiction treatment $state <br>"; count_em();
		Echo " alcohol and drug addiction treatment $state <br>"; count_em();
		Echo " drug addiction treatment program $state <br>"; count_em();
		Echo " drug and alcohol addiction treatment program $state <br>"; count_em();
		Echo " alcohol addiction treatment $state <br>"; count_em();
		Echo " alcoholism help $state <br>"; count_em();
		Echo " alcoholism addiction treatment $state <br>"; count_em();
		Echo " alcoholism treatment center $state <br>"; count_em();
		Echo " alcoholism rehab $state <br>"; count_em();
		Echo"<BR><BR>";
	}// END PRINT STATE SEARCH TERM BLOCK
		
//PRINT ALL OTHER CITY AND CITY + STATE SEARCH TERMS
Echo " $city hypnotherapy <BR>"; count_em();
Echo " $city hypnotist <BR>"; count_em();
Echo " hypnosis $city <BR>"; count_em();
Echo " hypnosis $city $state <BR>"; count_em();
Echo " Hypnosis to lose weight $city <BR>"; count_em();
Echo " Hypnosis to lose weight $city $state <BR>"; count_em();
Echo " Lose weight $city <BR>"; count_em();
Echo " Lose weight $city $state <BR>"; count_em();
Echo " Quit smoking $city <BR>"; count_em();
Echo " Quit smoking hypnosis $city <BR>"; count_em();
Echo " Quit smoking hypnosis $city $state <BR>"; count_em();
Echo " Quit smoking support $city <BR>"; count_em();
Echo " Quit smoking support $city $state <BR>"; count_em();
Echo " help quit smoking $city <BR>"; count_em();
Echo " help quit smoking $city $state <BR>"; count_em();
Echo " Smoking cessation $city <BR>"; count_em();
Echo " Smoking cessation $city $state <BR>"; count_em();
Echo " Weight loss $city <BR>"; count_em();
Echo " Weight loss $city $state <BR>"; count_em();
Echo " Weight loss hypnosis $city <BR>"; count_em();
Echo " Weight loss hypnotherapy $city <BR>"; count_em();
Echo " Drug addiction $city <BR>"; count_em();
Echo " Drug addiction $city $state <BR>"; count_em();
Echo " Drug abuse treatment $city <BR>"; count_em();
Echo " Drug abuse treatment $city $state <BR>"; count_em();
Echo " Alcoholism $city <BR>"; count_em();
Echo " Alcoholism $city $state <BR>"; count_em();
Echo " Alcoholism treatment $city <BR>"; count_em();
Echo " Alcoholism treatment $city $state <BR>"; count_em();
Echo " Alcoholism treatment program $city <BR>"; count_em();
Echo " Alcoholism treatment program $city $state <BR>"; count_em();
Echo " Substance abuse treatment $city <BR>"; count_em();
Echo " Substance abuse treatment $city $state <BR>"; count_em();
Echo " Addiction treatment $city <BR>"; count_em();
Echo " Addiction treatment $city $state <BR>"; count_em();
Echo " addiction treatment center $city <BR>"; count_em();
Echo " addiction treatment center $city $state <BR>"; count_em();
Echo " drug addiction treatment center $city <BR>"; count_em();
Echo " drug addiction treatment center $city $state <BR>"; count_em();
Echo " drug addiction rehab treatment $city <BR>"; count_em();
Echo " drug addiction rehab treatment $city $state <BR>"; count_em();
Echo " drug addiction treatment $city <BR>"; count_em();
Echo " drug addiction treatment $city $state <BR>"; count_em();
Echo " alcohol and drug addiction treatment $city <BR>"; count_em();
Echo " alcohol and drug addiction treatment $city $state <BR>"; count_em();
Echo " drug addiction treatment program $city <BR>"; count_em();
Echo " drug addiction treatment program $city $state <BR>"; count_em();
Echo " drug and alcohol addiction treatment program $city <BR>"; count_em();
Echo " drug and alcohol addiction treatment program $city $state <BR>"; count_em();
Echo " alcohol addiction treatment $city <BR>"; count_em();
Echo " alcohol addiction treatment $city $state <BR>"; count_em();
Echo " alcoholism help $city <BR>"; count_em();
Echo " alcoholism help $city $state <BR>"; count_em();
Echo " alcoholism addiction treatment $city <BR>"; count_em();
Echo " alcoholism addiction treatment $city $state <BR>"; count_em();
Echo " alcoholism treatment center $city <BR>"; count_em();
Echo " alcoholism treatment center $city $state <BR>"; count_em();
Echo " alcoholism rehab $city <BR>"; count_em();
Echo " alcoholism rehab $city $state <BR>"; count_em();
Echo " $city $state hypnotist <BR>"; count_em();
Echo " $city $state hypnotherapy <BR>"; count_em();

		echo "<br>";


//count to 500 for blocks of adwords

}// end while loop
echo "<a name=\"descriptions\"><font color=\"red\" align=\"center\"><br><hr><h1>****BEGINNING OF DESCRIPTIONS****</h1><hr><br></font></a>";


//################################## CONNECT ###########################################
// create variable for name of database & table
$db_name = "america2_AHC";
$table_name = "affiliates";

//open the SQL connection to AHC server databases
$connection = mysql_connect("mysql209.secureserver.net","america2_AHC","magiclar") or die (mysql_error());

// SELECT DataBase - create var to hold the result of select db function
$db = mysql_select_db($db_name, $connection) or die (mysql_error());


//create the sql statement
$sql = "SELECT * FROM $table_name WHERE membership_status='Affiliate'ORDER BY address3";

//execute the sql statement and create a variable you can use to display or work with it
$result2 = mysql_query($sql, $connection) or die(mysql_error());

//###########################################################################################

$terms = 0;
$every_500=0;
unset($state);
//unset($row);

	//SECOND LOOP TO OUTPUT DESCRIPTIONS IN GROUPS OF 500
	while ($row2 = mysql_fetch_array($result2)){
	  
	  //SETUP FOR STATE CHANGE TRACKING
	  if (isset($state)){
	    $old_state=$state;
	}
	  
	  	//DEFINE VARIABLES
		$city=$row2['address2'];
		$state=strtoupper($row2['address3']);
		$state = state_conversion($state);
		
		
	//SETUP FOR STATE CHANGE TRACKING	
	$new_state=$state;
	
	//DO SEARCH TERMS THAT ONLY COME UP WHEN STATE CHANGES
	if (($old_state != $new_state)AND(isset($old_state))){//IF STATE CHANGED (after 1st one)
	
		Echo "<strong>$state hypnosis </strong><br><br>"; count_em();
		echo "Recommended $state Hypnosis Clinics<br>
Most experienced & educated $state clinical hypnotists offer private sessions to quit smoking, lose weight, end phobias, end substance abuse and manage pain. Lifetime support guarantee.<br>";
		echo "http://www.americanhypnosisclinic.com<br><br>";
		
		Echo "<strong> $state hypnotherapy </strong><br><br>"; count_em();
		echo "Recommended $state Hypnosis Clinics<br>
Most experienced & educated $state clinical hypnotists offer private sessions to quit smoking, lose weight, end phobias, end substance abuse and manage pain. Lifetime support guarantee.<br>";
		echo "http://www.americanhypnosisclinic.com<br><br>";		
		
		Echo "<strong> $state Hypnotist </strong><br><br>"; count_em();
		echo "Recommended $state Hypnosis Clinics<br>
Most experienced & educated $state clinical hypnotists offer private sessions to quit smoking, lose weight, end phobias, end substance abuse and manage pain. Lifetime support guarantee.<br>";
		echo "http://www.americanhypnosisclinic.com<br><br>";		
		
		
		Echo "<strong> Weight loss hypnotherapy $state </strong><br><br>"; count_em();

		echo "Weight Loss Hypnosis in $state<br>
Get off the diet roller coaster   Personalized hypnosis sessions with experienced hypnotherapists help you lose weight PERMANENTLY. $state locations. Lifetime support guaranteed.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>Weight Loss Hypnosis in $state </strong><br><br>"; count_em();
		echo "Weight Loss Hypnosis $state<br>
Get off the diet roller coaster   Personalized hypnosis sessions with experienced hypnotherapists help you lose weight PERMANENTLY. $state locations. Lifetime support guaranteed.<br>
http://www.americanhypnosisclinic.com<br><br>";		
		
		Echo " <strong>Weight loss hypnosis $state </strong><br>"; count_em();
		echo "Weight Loss Hypnosis $state<br>
Get off the diet roller coaster   Personalized hypnosis sessions with experienced hypnotherapists help you lose weight PERMANENTLY. $state locations. Lifetime support guaranteed.<br>
http://www.americanhypnosisclinic.com<br><br>";	

		Echo " <strong>Weight loss $state </strong><br>"; count_em();
		echo "Hypnosis for Weight Loss<br>
Get off the diet roller coaster   Personalized hypnosis sessions with experienced hypnotherapists help you lose weight PERMANENTLY. $state locations. Lifetime support guaranteed.<br>
http://www.americanhypnosisclinic.com<br><br>";	

		Echo " <strong>Quit smoking hypnosis $state </strong><br>"; count_em();
		echo "Quit Smoking Hypnosis $state<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>
";
		
		Echo " <strong>Quit smoking $state </strong><br>"; count_em();
		echo "Quit Smoking with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>
";
		

		Echo " <strong>help quit smoking $state </strong><br>"; count_em();
		echo "Hypnosis to Help Quit Smoking<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

		Echo " <strong>Lose weight $state </strong><br>"; count_em();
		echo "Lose Weight with Hypnosis<br>
Get off the diet roller coaster   Personalized hypnosis sessions with experienced hypnotherapists help you lose weight PERMANENTLY. $state locations. Lifetime support guaranteed.<br>
http://www.americanhypnosisclinic.com<br><br>";	
		
		Echo " <strong>Hypnosis to lose weight $state </strong><br>"; count_em();
		echo "Hypnosis to Lose Weight <br>
Get off the diet roller coaster   Personalized hypnosis sessions with experienced hypnotherapists help you lose weight PERMANENTLY. $state locations. Lifetime support guaranteed.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>Drug addiction $state </strong><br>"; count_em();
		echo "Hypnosis for Drug Addiction<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>Drug abuse treatment $state </strong><br>"; count_em();
		echo "Drug Abuse Treatment $state<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>Alcoholism $state </strong><br>"; count_em();
		echo "Hypnosis for Alcoholism<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>Alcoholism treatment $state </strong><br>"; count_em();
		echo "Alcoholism Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>Alcoholism treatment program $state </strong><br>"; count_em();
		echo "Alcoholism treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>Substance abuse treatment $state </strong><br>"; count_em();
		echo "Substance Abuse Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>Addiction treatment $state </strong><br>"; count_em();
		echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>addiction treatment center $state </strong><br>"; count_em();
		echo "Addiction Treatment Center $state<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>drug addiction treatment center $state </strong><br>"; count_em();
		echo "End Drug Addiction with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>drug addiction rehab treatment $state </strong><br>"; count_em();
		echo "Drug Addiction Rehab with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>drug addiction treatment $state </strong><br>"; count_em();
		echo "Drug Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>alcohol and drug addiction treatment $state </strong><br>"; count_em();
		echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>drug addiction treatment program $state </strong><br>"; count_em();
		echo "Drug Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>drug and alcohol addiction treatment program $state </strong><br>"; count_em();
		echo "End Addiction Through Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>alcohol addiction treatment $state </strong><br>"; count_em();
		echo "Alcoholism Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>alcoholism help $state </strong><br>"; count_em();
		echo "Alcoholism Help Using Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>alcoholism addiction treatment $state </strong><br>"; count_em();
		echo "Alcoholism Treatment Using Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>alcoholism treatment center $state </strong><br>"; count_em();
		echo "Alcoholism Treatment Using Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo "<strong> alcoholism rehab $state </strong><br>"; count_em();
		echo "Alcoholism Rehab Using Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo"<BR><BR>";
	}// END PRINT STATE SEARCH TERM BLOCK
		
//PRINT ALL OTHER CITY AND CITY + STATE SEARCH TERMS
Echo " <strong>$city hypnotherapy </strong><BR>"; count_em();
echo "Recommended $city Hypnosis Clinics<br>
Most experienced & educated $city clinical hypnotists offer private sessions to quit smoking, lose weight, end phobias, end substance abuse and manage pain. Lifetime support guarantee.<br>";
		echo "http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>$city hypnotist </strong><BR>"; count_em();
echo "Recommended $city Clinical Hypnotists<br>
Most experienced & educated $city clinical hypnotists offer private sessions to quit smoking, lose weight, end phobias, end substance abuse and manage pain. Lifetime support guarantee.<br>";
		echo "http://www.americanhypnosisclinic.com<br><br>";

Echo "<strong> hypnosis $city </strong><BR>"; count_em();
echo "Recommended $city Hypnosis Clinics<br>
Most experienced & educated $city clinical hypnotists offer private sessions to quit smoking, lose weight, end phobias, end substance abuse and manage pain. Lifetime support guarantee.<br>";
		echo "http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>hypnosis $city $state </strong><BR>"; count_em();
echo "Recommended $city Hypnosis Clinics<br>
Most experienced & educated $state clinical hypnotists offer private sessions to quit smoking, lose weight, end phobias, end substance abuse and manage pain. Lifetime support guarantee.<br>";
		echo "http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Hypnosis to lose weight $city </strong><BR>"; count_em();
echo "Hypnosis to Lose Weight <br>
Get off the diet roller coaster   Personalized hypnosis sessions with experienced hypnotherapists help you lose weight PERMANENTLY. $city locations. Lifetime support guaranteed.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo "<strong> Hypnosis to lose weight $city $state</strong> <BR>"; count_em();
echo "Hypnosis to Lose Weight <br>
Get off the diet roller coaster   Personalized hypnosis sessions with experienced hypnotherapists help you lose weight PERMANENTLY. $city locations. Lifetime support guaranteed.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Lose weight $city </strong><BR>"; count_em();
echo "Hypnosis to Lose Weight <br>
Get off the diet roller coaster   Personalized hypnosis sessions with experienced hypnotherapists help you lose weight PERMANENTLY. $city locations. Lifetime support guaranteed.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Lose weight $city $state </strong><BR>"; count_em();
echo "Hypnosis to Lose Weight <br>
Get off the diet roller coaster   Personalized hypnosis sessions with experienced hypnotherapists help you lose weight PERMANENTLY. $city locations. Lifetime support guaranteed.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo "<strong> Quit smoking $city</strong> <BR>"; count_em();
echo "Quit Smoking with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $city according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo "<strong> Quit smoking hypnosis $city </strong><BR>"; count_em();
echo "Quit Smoking with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo "<strong> Quit smoking hypnosis $city $state </strong><BR>"; count_em();
echo "Quit Smoking with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Quit smoking support $city </strong><BR>"; count_em();
echo "Quit Smoking with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Quit smoking support $city $state </strong><BR>"; count_em();
echo "Quit Smoking with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>help quit smoking $city </strong><BR>"; count_em();
echo "Quit Smoking Help Through Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>help quit smoking $city $state </strong><BR>"; count_em();
echo "Quit Smoking with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Smoking cessation $city </strong><BR>"; count_em();
echo "Smoking Cessation Through Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Smoking cessation $city $state </strong><BR>"; count_em();
echo "Smoking Cessation Through Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Weight loss $city </strong><BR>"; count_em();
echo "Weight Loss Hypnosis in $city<br>
Get off the diet roller coaster   Personalized hypnosis sessions with experienced hypnotherapists help you lose weight PERMANENTLY. $state locations. Lifetime support guaranteed.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Weight loss $city $state </strong><BR>"; count_em();
echo "Weight Loss Hypnosis in $city<br>
Get off the diet roller coaster   Personalized hypnosis sessions with experienced hypnotherapists help you lose weight PERMANENTLY. $state locations. Lifetime support guaranteed.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Weight loss hypnosis $city </strong><BR>"; count_em();
echo "Weight Loss Hypnosis in $city<br>
Get off the diet roller coaster   Personalized hypnosis sessions with experienced hypnotherapists help you lose weight PERMANENTLY. $state locations. Lifetime support guaranteed.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Weight loss hypnotherapy $city </strong><BR>"; count_em();
echo "Weight Loss Hypnosis in $city<br>
Get off the diet roller coaster   Personalized hypnosis sessions with experienced hypnotherapists help you lose weight PERMANENTLY. $state locations. Lifetime support guaranteed.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Drug addiction $city </strong><BR>"; count_em();
echo "End Addiction Through Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Drug addiction $city $state </strong><BR>"; count_em();
echo "End Addiction Through Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Drug abuse treatment $city </strong><BR>"; count_em();
echo "End Drug Abuse Through Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Drug abuse treatment $city $state </strong><BR>"; count_em();
echo "Hypnosis Drug Abuse Treatment<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Alcoholism $city </strong><BR>"; count_em();
echo "End Addiction Through Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Alcoholism $city $state </strong><BR>"; count_em();
echo "End Addiction Through Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo "<strong> Alcoholism treatment $city </strong><BR>"; count_em();
echo "End Addiction Through Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Alcoholism treatment $city $state </strong><BR>"; count_em();
echo "End Addiction Through Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Alcoholism treatment program $city </strong><BR>"; count_em();
echo "End Addiction Through Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Alcoholism treatment program $city $state </strong><BR>"; count_em();
echo "End Addiction Through Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Substance abuse treatment $city </strong><BR>"; count_em();
echo "Substance Abuse Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Substance abuse treatment $city $state </strong><BR>"; count_em();
echo "Substance Abuse Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Addiction treatment $city </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Addiction treatment $city $state </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>addiction treatment center $city </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>addiction treatment center $city $state </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>drug addiction treatment center $city </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>drug addiction treatment center $city $state </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>drug addiction rehab treatment $city </strong><BR>"; count_em();
echo "Drug Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>drug addiction rehab treatment $city $state </strong><BR>"; count_em();
echo "Drug Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>drug addiction treatment $city </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>drug addiction treatment $city $state </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>alcohol and drug addiction treatment $city </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>alcohol and drug addiction treatment $city $state </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>drug addiction treatment program $city </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>drug addiction treatment program $city $state </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>drug and alcohol addiction treatment program $city </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>drug and alcohol addiction treatment program $city $state</strong> <BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>alcohol addiction treatment $city </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>alcohol addiction treatment $city $state </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>alcoholism help $city </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>alcoholism help $city $state </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>alcoholism addiction treatment $city </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>alcoholism addiction treatment $city $state </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>alcoholism treatment center $city </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>alcoholism treatment center $city $state </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>alcoholism rehab $city </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>alcoholism rehab $city $state </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>$city $state hypnotist </strong><BR>"; count_em();
echo "Recommended $state Hypnotists<br>
Most experienced & educated $city clinical hypnotists offer private sessions to quit smoking, lose weight, end phobias, end substance abuse and manage pain. Lifetime support guarantee.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>$city $state hypnotherapy </strong><BR>"; count_em();
echo "Recommended $state Hypnotists<br>
Most experienced & educated $city clinical hypnotists offer private sessions to quit smoking, lose weight, end phobias, end substance abuse and manage pain. Lifetime support guarantee.<br>
http://www.americanhypnosisclinic.com<br><br>";


		echo "<br>";


//count to 500 for blocks of adwords

}// end while loop number 2






//STRATEGY:
// - Get nearby city (close_city1) from all affiliates
// - for every nearby city and once for every state set variables
// - output the title and search term for each permutation using that variable to cut and paste

//###########################################################################################

	//FIRST LOOP TO OUTPUT SEARCH TERMS IN GROUPS OF 500
	while ($row = mysql_fetch_array($result)){
	  
	  //SETUP FOR STATE CHANGE TRACKING
	  if (isset($state)){
	    $old_state=$state;
	}
	  
	  	//DEFINE VARIABLES
		$city=$row['close_city1'];
		$state=strtoupper($row['address3']);
		$state = state_conversion($state);
		
		
	//SETUP FOR STATE CHANGE TRACKING	
	$new_state=$state;
	
	//DO SEARCH TERMS THAT ONLY COME UP WHEN STATE CHANGES
	if (($old_state != $new_state)AND(isset($old_state))){//IF STATE CHANGED (after 1st one)
	
		Echo "$state hypnosis <br>"; count_em();
		Echo " $state hypnotherapy <br>"; count_em();
		Echo " $state hypnotist <br>"; count_em();
		Echo " Weight loss hypnotherapy $state <br>"; count_em();
		Echo " Weight loss hypnosis $state <br>"; count_em();
		Echo " Weight loss hypnosis $state <br>"; count_em();
		Echo " Weight loss $state <br>"; count_em();
		Echo " Quit smoking hypnosis $state <br>"; count_em();
		Echo " Quit smoking $state <br>"; count_em();

		Echo " help quit smoking $state <br>"; count_em();

		Echo " Lose weight $state <br>"; count_em();
		Echo " Hypnosis to lose weight $state <br>"; count_em();
		Echo " Drug addiction $state <br>"; count_em();
		Echo " Drug abuse treatment $state <br>"; count_em();
		Echo " Alcoholism $state <br>"; count_em();
		Echo " Alcoholism treatment $state <br>"; count_em();
		Echo " Alcoholism treatment program $state <br>"; count_em();
		Echo " Substance abuse treatment $state <br>"; count_em();
		Echo " Addiction treatment $state <br>"; count_em();
		Echo " addiction treatment center $state <br>"; count_em();
		Echo " drug addiction treatment center $state <br>"; count_em();
		Echo " drug addiction rehab treatment $state <br>"; count_em();
		Echo " drug addiction treatment $state <br>"; count_em();
		Echo " alcohol and drug addiction treatment $state <br>"; count_em();
		Echo " drug addiction treatment program $state <br>"; count_em();
		Echo " drug and alcohol addiction treatment program $state <br>"; count_em();
		Echo " alcohol addiction treatment $state <br>"; count_em();
		Echo " alcoholism help $state <br>"; count_em();
		Echo " alcoholism addiction treatment $state <br>"; count_em();
		Echo " alcoholism treatment center $state <br>"; count_em();
		Echo " alcoholism rehab $state <br>"; count_em();
		Echo"<BR><BR>";
	}// END PRINT STATE SEARCH TERM BLOCK
		
//PRINT ALL OTHER CITY AND CITY + STATE SEARCH TERMS
Echo " $city hypnotherapy <BR>"; count_em();
Echo " $city hypnotist <BR>"; count_em();
Echo " hypnosis $city <BR>"; count_em();
Echo " hypnosis $city $state <BR>"; count_em();
Echo " Hypnosis to lose weight $city <BR>"; count_em();
Echo " Hypnosis to lose weight $city $state <BR>"; count_em();
Echo " Lose weight $city <BR>"; count_em();
Echo " Lose weight $city $state <BR>"; count_em();
Echo " Quit smoking $city <BR>"; count_em();
Echo " Quit smoking hypnosis $city <BR>"; count_em();
Echo " Quit smoking hypnosis $city $state <BR>"; count_em();
Echo " Quit smoking support $city <BR>"; count_em();
Echo " Quit smoking support $city $state <BR>"; count_em();
Echo " help quit smoking $city <BR>"; count_em();
Echo " help quit smoking $city $state <BR>"; count_em();
Echo " Smoking cessation $city <BR>"; count_em();
Echo " Smoking cessation $city $state <BR>"; count_em();
Echo " Weight loss $city <BR>"; count_em();
Echo " Weight loss $city $state <BR>"; count_em();
Echo " Weight loss hypnosis $city <BR>"; count_em();
Echo " Weight loss hypnotherapy $city <BR>"; count_em();
Echo " Drug addiction $city <BR>"; count_em();
Echo " Drug addiction $city $state <BR>"; count_em();
Echo " Drug abuse treatment $city <BR>"; count_em();
Echo " Drug abuse treatment $city $state <BR>"; count_em();
Echo " Alcoholism $city <BR>"; count_em();
Echo " Alcoholism $city $state <BR>"; count_em();
Echo " Alcoholism treatment $city <BR>"; count_em();
Echo " Alcoholism treatment $city $state <BR>"; count_em();
Echo " Alcoholism treatment program $city <BR>"; count_em();
Echo " Alcoholism treatment program $city $state <BR>"; count_em();
Echo " Substance abuse treatment $city <BR>"; count_em();
Echo " Substance abuse treatment $city $state <BR>"; count_em();
Echo " Addiction treatment $city <BR>"; count_em();
Echo " Addiction treatment $city $state <BR>"; count_em();
Echo " addiction treatment center $city <BR>"; count_em();
Echo " addiction treatment center $city $state <BR>"; count_em();
Echo " drug addiction treatment center $city <BR>"; count_em();
Echo " drug addiction treatment center $city $state <BR>"; count_em();
Echo " drug addiction rehab treatment $city <BR>"; count_em();
Echo " drug addiction rehab treatment $city $state <BR>"; count_em();
Echo " drug addiction treatment $city <BR>"; count_em();
Echo " drug addiction treatment $city $state <BR>"; count_em();
Echo " alcohol and drug addiction treatment $city <BR>"; count_em();
Echo " alcohol and drug addiction treatment $city $state <BR>"; count_em();
Echo " drug addiction treatment program $city <BR>"; count_em();
Echo " drug addiction treatment program $city $state <BR>"; count_em();
Echo " drug and alcohol addiction treatment program $city <BR>"; count_em();
Echo " drug and alcohol addiction treatment program $city $state <BR>"; count_em();
Echo " alcohol addiction treatment $city <BR>"; count_em();
Echo " alcohol addiction treatment $city $state <BR>"; count_em();
Echo " alcoholism help $city <BR>"; count_em();
Echo " alcoholism help $city $state <BR>"; count_em();
Echo " alcoholism addiction treatment $city <BR>"; count_em();
Echo " alcoholism addiction treatment $city $state <BR>"; count_em();
Echo " alcoholism treatment center $city <BR>"; count_em();
Echo " alcoholism treatment center $city $state <BR>"; count_em();
Echo " alcoholism rehab $city <BR>"; count_em();
Echo " alcoholism rehab $city $state <BR>"; count_em();
Echo " $city $state hypnotist <BR>"; count_em();
Echo " $city $state hypnotherapy <BR>"; count_em();

		echo "<br>";


//count to 500 for blocks of adwords

}// end while loop
echo "<a name=\"descriptions\"><font color=\"red\" align=\"center\"><br><hr><h1>****BEGINNING OF DESCRIPTIONS****</h1><hr><br></font></a>";


//################################## CONNECT ###########################################
// create variable for name of database & table
$db_name = "america2_AHC";
$table_name = "affiliates";

//open the SQL connection to AHC server databases
$connection = mysql_connect("mysql209.secureserver.net","america2_AHC","magiclar") or die (mysql_error());

// SELECT DataBase - create var to hold the result of select db function
$db = mysql_select_db($db_name, $connection) or die (mysql_error());


//create the sql statement
$sql = "SELECT * FROM $table_name WHERE membership_status='Affiliate'ORDER BY address3";

//execute the sql statement and create a variable you can use to display or work with it
$result2 = mysql_query($sql, $connection) or die(mysql_error());

//###########################################################################################

$terms = 0;
$every_500=0;
unset($state);
//unset($row);

	//SECOND LOOP TO OUTPUT DESCRIPTIONS IN GROUPS OF 500
	while ($row2 = mysql_fetch_array($result2)){
	  
	  //SETUP FOR STATE CHANGE TRACKING
	  if (isset($state)){
	    $old_state=$state;
	}
	  
	  	//DEFINE VARIABLES
		$city=$row2['address2'];
		$state=strtoupper($row2['address3']);
		$state = state_conversion($state);
		
		
	//SETUP FOR STATE CHANGE TRACKING	
	$new_state=$state;
	
	//DO SEARCH TERMS THAT ONLY COME UP WHEN STATE CHANGES
	if (($old_state != $new_state)AND(isset($old_state))){//IF STATE CHANGED (after 1st one)
	
		Echo "<strong>$state hypnosis </strong><br><br>"; count_em();
		echo "Recommended $state Hypnosis Clinics<br>
Most experienced & educated $state clinical hypnotists offer private sessions to quit smoking, lose weight, end phobias, end substance abuse and manage pain. Lifetime support guarantee.<br>";
		echo "http://www.americanhypnosisclinic.com<br><br>";
		
		Echo "<strong> $state hypnotherapy </strong><br><br>"; count_em();
		echo "Recommended $state Hypnosis Clinics<br>
Most experienced & educated $state clinical hypnotists offer private sessions to quit smoking, lose weight, end phobias, end substance abuse and manage pain. Lifetime support guarantee.<br>";
		echo "http://www.americanhypnosisclinic.com<br><br>";		
		
		Echo "<strong> $state Hypnotist </strong><br><br>"; count_em();
		echo "Recommended $state Hypnosis Clinics<br>
Most experienced & educated $state clinical hypnotists offer private sessions to quit smoking, lose weight, end phobias, end substance abuse and manage pain. Lifetime support guarantee.<br>";
		echo "http://www.americanhypnosisclinic.com<br><br>";		
		
		
		Echo "<strong> Weight loss hypnotherapy $state </strong><br><br>"; count_em();

		echo "Weight Loss Hypnosis in $state<br>
Get off the diet roller coaster   Personalized hypnosis sessions with experienced hypnotherapists help you lose weight PERMANENTLY. $state locations. Lifetime support guaranteed.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>Weight Loss Hypnosis in $state </strong><br><br>"; count_em();
		echo "Weight Loss Hypnosis $state<br>
Get off the diet roller coaster   Personalized hypnosis sessions with experienced hypnotherapists help you lose weight PERMANENTLY. $state locations. Lifetime support guaranteed.<br>
http://www.americanhypnosisclinic.com<br><br>";		
		
		Echo " <strong>Weight loss hypnosis $state </strong><br>"; count_em();
		echo "Weight Loss Hypnosis $state<br>
Get off the diet roller coaster   Personalized hypnosis sessions with experienced hypnotherapists help you lose weight PERMANENTLY. $state locations. Lifetime support guaranteed.<br>
http://www.americanhypnosisclinic.com<br><br>";	

		Echo " <strong>Weight loss $state </strong><br>"; count_em();
		echo "Hypnosis for Weight Loss<br>
Get off the diet roller coaster   Personalized hypnosis sessions with experienced hypnotherapists help you lose weight PERMANENTLY. $state locations. Lifetime support guaranteed.<br>
http://www.americanhypnosisclinic.com<br><br>";	

		Echo " <strong>Quit smoking hypnosis $state </strong><br>"; count_em();
		echo "Quit Smoking Hypnosis $state<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>
";
		
		Echo " <strong>Quit smoking $state </strong><br>"; count_em();
		echo "Quit Smoking with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>
";
		

		Echo " <strong>help quit smoking $state </strong><br>"; count_em();
		echo "Hypnosis to Help Quit Smoking<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

		Echo " <strong>Lose weight $state </strong><br>"; count_em();
		echo "Lose Weight with Hypnosis<br>
Get off the diet roller coaster   Personalized hypnosis sessions with experienced hypnotherapists help you lose weight PERMANENTLY. $state locations. Lifetime support guaranteed.<br>
http://www.americanhypnosisclinic.com<br><br>";	
		
		Echo " <strong>Hypnosis to lose weight $state </strong><br>"; count_em();
		echo "Hypnosis to Lose Weight <br>
Get off the diet roller coaster   Personalized hypnosis sessions with experienced hypnotherapists help you lose weight PERMANENTLY. $state locations. Lifetime support guaranteed.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>Drug addiction $state </strong><br>"; count_em();
		echo "Hypnosis for Drug Addiction<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>Drug abuse treatment $state </strong><br>"; count_em();
		echo "Drug Abuse Treatment $state<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>Alcoholism $state </strong><br>"; count_em();
		echo "Hypnosis for Alcoholism<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>Alcoholism treatment $state </strong><br>"; count_em();
		echo "Alcoholism Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>Alcoholism treatment program $state </strong><br>"; count_em();
		echo "Alcoholism treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>Substance abuse treatment $state </strong><br>"; count_em();
		echo "Substance Abuse Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>Addiction treatment $state </strong><br>"; count_em();
		echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>addiction treatment center $state </strong><br>"; count_em();
		echo "Addiction Treatment Center $state<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>drug addiction treatment center $state </strong><br>"; count_em();
		echo "End Drug Addiction with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>drug addiction rehab treatment $state </strong><br>"; count_em();
		echo "Drug Addiction Rehab with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>drug addiction treatment $state </strong><br>"; count_em();
		echo "Drug Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>alcohol and drug addiction treatment $state </strong><br>"; count_em();
		echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>drug addiction treatment program $state </strong><br>"; count_em();
		echo "Drug Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>drug and alcohol addiction treatment program $state </strong><br>"; count_em();
		echo "End Addiction Through Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>alcohol addiction treatment $state </strong><br>"; count_em();
		echo "Alcoholism Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>alcoholism help $state </strong><br>"; count_em();
		echo "Alcoholism Help Using Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>alcoholism addiction treatment $state </strong><br>"; count_em();
		echo "Alcoholism Treatment Using Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>alcoholism treatment center $state </strong><br>"; count_em();
		echo "Alcoholism Treatment Using Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo "<strong> alcoholism rehab $state </strong><br>"; count_em();
		echo "Alcoholism Rehab Using Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo"<BR><BR>";
	}// END PRINT STATE SEARCH TERM BLOCK
		
//PRINT ALL OTHER CITY AND CITY + STATE SEARCH TERMS
Echo " <strong>$city hypnotherapy </strong><BR>"; count_em();
echo "Recommended $city Hypnosis Clinics<br>
Most experienced & educated $city clinical hypnotists offer private sessions to quit smoking, lose weight, end phobias, end substance abuse and manage pain. Lifetime support guarantee.<br>";
		echo "http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>$city hypnotist </strong><BR>"; count_em();
echo "Recommended $city Clinical Hypnotists<br>
Most experienced & educated $city clinical hypnotists offer private sessions to quit smoking, lose weight, end phobias, end substance abuse and manage pain. Lifetime support guarantee.<br>";
		echo "http://www.americanhypnosisclinic.com<br><br>";

Echo "<strong> hypnosis $city </strong><BR>"; count_em();
echo "Recommended $city Hypnosis Clinics<br>
Most experienced & educated $city clinical hypnotists offer private sessions to quit smoking, lose weight, end phobias, end substance abuse and manage pain. Lifetime support guarantee.<br>";
		echo "http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>hypnosis $city $state </strong><BR>"; count_em();
echo "Recommended $city Hypnosis Clinics<br>
Most experienced & educated $state clinical hypnotists offer private sessions to quit smoking, lose weight, end phobias, end substance abuse and manage pain. Lifetime support guarantee.<br>";
		echo "http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Hypnosis to lose weight $city </strong><BR>"; count_em();
echo "Hypnosis to Lose Weight <br>
Get off the diet roller coaster   Personalized hypnosis sessions with experienced hypnotherapists help you lose weight PERMANENTLY. $city locations. Lifetime support guaranteed.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo "<strong> Hypnosis to lose weight $city $state</strong> <BR>"; count_em();
echo "Hypnosis to Lose Weight <br>
Get off the diet roller coaster   Personalized hypnosis sessions with experienced hypnotherapists help you lose weight PERMANENTLY. $city locations. Lifetime support guaranteed.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Lose weight $city </strong><BR>"; count_em();
echo "Hypnosis to Lose Weight <br>
Get off the diet roller coaster   Personalized hypnosis sessions with experienced hypnotherapists help you lose weight PERMANENTLY. $city locations. Lifetime support guaranteed.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Lose weight $city $state </strong><BR>"; count_em();
echo "Hypnosis to Lose Weight <br>
Get off the diet roller coaster   Personalized hypnosis sessions with experienced hypnotherapists help you lose weight PERMANENTLY. $city locations. Lifetime support guaranteed.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo "<strong> Quit smoking $city</strong> <BR>"; count_em();
echo "Quit Smoking with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $city according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo "<strong> Quit smoking hypnosis $city </strong><BR>"; count_em();
echo "Quit Smoking with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo "<strong> Quit smoking hypnosis $city $state </strong><BR>"; count_em();
echo "Quit Smoking with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Quit smoking support $city </strong><BR>"; count_em();
echo "Quit Smoking with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Quit smoking support $city $state </strong><BR>"; count_em();
echo "Quit Smoking with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>help quit smoking $city </strong><BR>"; count_em();
echo "Quit Smoking Help Through Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>help quit smoking $city $state </strong><BR>"; count_em();
echo "Quit Smoking with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Smoking cessation $city </strong><BR>"; count_em();
echo "Smoking Cessation Through Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Smoking cessation $city $state </strong><BR>"; count_em();
echo "Smoking Cessation Through Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Weight loss $city </strong><BR>"; count_em();
echo "Weight Loss Hypnosis in $city<br>
Get off the diet roller coaster   Personalized hypnosis sessions with experienced hypnotherapists help you lose weight PERMANENTLY. $state locations. Lifetime support guaranteed.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Weight loss $city $state </strong><BR>"; count_em();
echo "Weight Loss Hypnosis in $city<br>
Get off the diet roller coaster   Personalized hypnosis sessions with experienced hypnotherapists help you lose weight PERMANENTLY. $state locations. Lifetime support guaranteed.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Weight loss hypnosis $city </strong><BR>"; count_em();
echo "Weight Loss Hypnosis in $city<br>
Get off the diet roller coaster   Personalized hypnosis sessions with experienced hypnotherapists help you lose weight PERMANENTLY. $state locations. Lifetime support guaranteed.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Weight loss hypnotherapy $city </strong><BR>"; count_em();
echo "Weight Loss Hypnosis in $city<br>
Get off the diet roller coaster   Personalized hypnosis sessions with experienced hypnotherapists help you lose weight PERMANENTLY. $state locations. Lifetime support guaranteed.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Drug addiction $city </strong><BR>"; count_em();
echo "End Addiction Through Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Drug addiction $city $state </strong><BR>"; count_em();
echo "End Addiction Through Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Drug abuse treatment $city </strong><BR>"; count_em();
echo "End Drug Abuse Through Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Drug abuse treatment $city $state </strong><BR>"; count_em();
echo "Hypnosis Drug Abuse Treatment<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Alcoholism $city </strong><BR>"; count_em();
echo "End Addiction Through Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Alcoholism $city $state </strong><BR>"; count_em();
echo "End Addiction Through Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo "<strong> Alcoholism treatment $city </strong><BR>"; count_em();
echo "End Addiction Through Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Alcoholism treatment $city $state </strong><BR>"; count_em();
echo "End Addiction Through Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Alcoholism treatment program $city </strong><BR>"; count_em();
echo "End Addiction Through Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Alcoholism treatment program $city $state </strong><BR>"; count_em();
echo "End Addiction Through Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Substance abuse treatment $city </strong><BR>"; count_em();
echo "Substance Abuse Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Substance abuse treatment $city $state </strong><BR>"; count_em();
echo "Substance Abuse Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Addiction treatment $city </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Addiction treatment $city $state </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>addiction treatment center $city </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>addiction treatment center $city $state </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>drug addiction treatment center $city </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>drug addiction treatment center $city $state </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>drug addiction rehab treatment $city </strong><BR>"; count_em();
echo "Drug Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>drug addiction rehab treatment $city $state </strong><BR>"; count_em();
echo "Drug Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>drug addiction treatment $city </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>drug addiction treatment $city $state </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>alcohol and drug addiction treatment $city </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>alcohol and drug addiction treatment $city $state </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>drug addiction treatment program $city </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>drug addiction treatment program $city $state </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>drug and alcohol addiction treatment program $city </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>drug and alcohol addiction treatment program $city $state</strong> <BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>alcohol addiction treatment $city </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>alcohol addiction treatment $city $state </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>alcoholism help $city </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>alcoholism help $city $state </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>alcoholism addiction treatment $city </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>alcoholism addiction treatment $city $state </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>alcoholism treatment center $city </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>alcoholism treatment center $city $state </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>alcoholism rehab $city </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>alcoholism rehab $city $state </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>$city $state hypnotist </strong><BR>"; count_em();
echo "Recommended $state Hypnotists<br>
Most experienced & educated $city clinical hypnotists offer private sessions to quit smoking, lose weight, end phobias, end substance abuse and manage pain. Lifetime support guarantee.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>$city $state hypnotherapy </strong><BR>"; count_em();
echo "Recommended $state Hypnotists<br>
Most experienced & educated $city clinical hypnotists offer private sessions to quit smoking, lose weight, end phobias, end substance abuse and manage pain. Lifetime support guarantee.<br>
http://www.americanhypnosisclinic.com<br><br>";


		echo "<br>";


//count to 500 for blocks of adwords

}// end while loop number 2


//STRATEGY:
// - Get close_city2 and States from all affiliates
// - for every city and once for every state set variables
// - output the title and search term for each permutation using that variable to cut and paste

//###########################################################################################

	//FIRST LOOP TO OUTPUT SEARCH TERMS IN GROUPS OF 500
	while ($row = mysql_fetch_array($result)){
	  
	  //SETUP FOR STATE CHANGE TRACKING
	  if (isset($state)){
	    $old_state=$state;
	}
	  
	  	//DEFINE VARIABLES
		$city=$row['close_city2'];
		$state=strtoupper($row['address3']);
		$state = state_conversion($state);
		
		
	//SETUP FOR STATE CHANGE TRACKING	
	$new_state=$state;
	
	//DO SEARCH TERMS THAT ONLY COME UP WHEN STATE CHANGES
	if (($old_state != $new_state)AND(isset($old_state))){//IF STATE CHANGED (after 1st one)
	
		Echo "$state hypnosis <br>"; count_em();
		Echo " $state hypnotherapy <br>"; count_em();
		Echo " $state hypnotist <br>"; count_em();
		Echo " Weight loss hypnotherapy $state <br>"; count_em();
		Echo " Weight loss hypnosis $state <br>"; count_em();
		Echo " Weight loss hypnosis $state <br>"; count_em();
		Echo " Weight loss $state <br>"; count_em();
		Echo " Quit smoking hypnosis $state <br>"; count_em();
		Echo " Quit smoking $state <br>"; count_em();

		Echo " help quit smoking $state <br>"; count_em();

		Echo " Lose weight $state <br>"; count_em();
		Echo " Hypnosis to lose weight $state <br>"; count_em();
		Echo " Drug addiction $state <br>"; count_em();
		Echo " Drug abuse treatment $state <br>"; count_em();
		Echo " Alcoholism $state <br>"; count_em();
		Echo " Alcoholism treatment $state <br>"; count_em();
		Echo " Alcoholism treatment program $state <br>"; count_em();
		Echo " Substance abuse treatment $state <br>"; count_em();
		Echo " Addiction treatment $state <br>"; count_em();
		Echo " addiction treatment center $state <br>"; count_em();
		Echo " drug addiction treatment center $state <br>"; count_em();
		Echo " drug addiction rehab treatment $state <br>"; count_em();
		Echo " drug addiction treatment $state <br>"; count_em();
		Echo " alcohol and drug addiction treatment $state <br>"; count_em();
		Echo " drug addiction treatment program $state <br>"; count_em();
		Echo " drug and alcohol addiction treatment program $state <br>"; count_em();
		Echo " alcohol addiction treatment $state <br>"; count_em();
		Echo " alcoholism help $state <br>"; count_em();
		Echo " alcoholism addiction treatment $state <br>"; count_em();
		Echo " alcoholism treatment center $state <br>"; count_em();
		Echo " alcoholism rehab $state <br>"; count_em();
		Echo"<BR><BR>";
	}// END PRINT STATE SEARCH TERM BLOCK
		
//PRINT ALL OTHER CITY AND CITY + STATE SEARCH TERMS
Echo " $city hypnotherapy <BR>"; count_em();
Echo " $city hypnotist <BR>"; count_em();
Echo " hypnosis $city <BR>"; count_em();
Echo " hypnosis $city $state <BR>"; count_em();
Echo " Hypnosis to lose weight $city <BR>"; count_em();
Echo " Hypnosis to lose weight $city $state <BR>"; count_em();
Echo " Lose weight $city <BR>"; count_em();
Echo " Lose weight $city $state <BR>"; count_em();
Echo " Quit smoking $city <BR>"; count_em();
Echo " Quit smoking hypnosis $city <BR>"; count_em();
Echo " Quit smoking hypnosis $city $state <BR>"; count_em();
Echo " Quit smoking support $city <BR>"; count_em();
Echo " Quit smoking support $city $state <BR>"; count_em();
Echo " help quit smoking $city <BR>"; count_em();
Echo " help quit smoking $city $state <BR>"; count_em();
Echo " Smoking cessation $city <BR>"; count_em();
Echo " Smoking cessation $city $state <BR>"; count_em();
Echo " Weight loss $city <BR>"; count_em();
Echo " Weight loss $city $state <BR>"; count_em();
Echo " Weight loss hypnosis $city <BR>"; count_em();
Echo " Weight loss hypnotherapy $city <BR>"; count_em();
Echo " Drug addiction $city <BR>"; count_em();
Echo " Drug addiction $city $state <BR>"; count_em();
Echo " Drug abuse treatment $city <BR>"; count_em();
Echo " Drug abuse treatment $city $state <BR>"; count_em();
Echo " Alcoholism $city <BR>"; count_em();
Echo " Alcoholism $city $state <BR>"; count_em();
Echo " Alcoholism treatment $city <BR>"; count_em();
Echo " Alcoholism treatment $city $state <BR>"; count_em();
Echo " Alcoholism treatment program $city <BR>"; count_em();
Echo " Alcoholism treatment program $city $state <BR>"; count_em();
Echo " Substance abuse treatment $city <BR>"; count_em();
Echo " Substance abuse treatment $city $state <BR>"; count_em();
Echo " Addiction treatment $city <BR>"; count_em();
Echo " Addiction treatment $city $state <BR>"; count_em();
Echo " addiction treatment center $city <BR>"; count_em();
Echo " addiction treatment center $city $state <BR>"; count_em();
Echo " drug addiction treatment center $city <BR>"; count_em();
Echo " drug addiction treatment center $city $state <BR>"; count_em();
Echo " drug addiction rehab treatment $city <BR>"; count_em();
Echo " drug addiction rehab treatment $city $state <BR>"; count_em();
Echo " drug addiction treatment $city <BR>"; count_em();
Echo " drug addiction treatment $city $state <BR>"; count_em();
Echo " alcohol and drug addiction treatment $city <BR>"; count_em();
Echo " alcohol and drug addiction treatment $city $state <BR>"; count_em();
Echo " drug addiction treatment program $city <BR>"; count_em();
Echo " drug addiction treatment program $city $state <BR>"; count_em();
Echo " drug and alcohol addiction treatment program $city <BR>"; count_em();
Echo " drug and alcohol addiction treatment program $city $state <BR>"; count_em();
Echo " alcohol addiction treatment $city <BR>"; count_em();
Echo " alcohol addiction treatment $city $state <BR>"; count_em();
Echo " alcoholism help $city <BR>"; count_em();
Echo " alcoholism help $city $state <BR>"; count_em();
Echo " alcoholism addiction treatment $city <BR>"; count_em();
Echo " alcoholism addiction treatment $city $state <BR>"; count_em();
Echo " alcoholism treatment center $city <BR>"; count_em();
Echo " alcoholism treatment center $city $state <BR>"; count_em();
Echo " alcoholism rehab $city <BR>"; count_em();
Echo " alcoholism rehab $city $state <BR>"; count_em();
Echo " $city $state hypnotist <BR>"; count_em();
Echo " $city $state hypnotherapy <BR>"; count_em();

		echo "<br>";


//count to 500 for blocks of adwords

}// end while loop
echo "<a name=\"descriptions\"><font color=\"red\" align=\"center\"><br><hr><h1>****BEGINNING OF DESCRIPTIONS****</h1><hr><br></font></a>";


//################################## CONNECT ###########################################
// create variable for name of database & table
$db_name = "america2_AHC";
$table_name = "affiliates";

//open the SQL connection to AHC server databases
$connection = mysql_connect("mysql209.secureserver.net","america2_AHC","magiclar") or die (mysql_error());

// SELECT DataBase - create var to hold the result of select db function
$db = mysql_select_db($db_name, $connection) or die (mysql_error());


//create the sql statement
$sql = "SELECT * FROM $table_name WHERE membership_status='Affiliate'ORDER BY address3";

//execute the sql statement and create a variable you can use to display or work with it
$result2 = mysql_query($sql, $connection) or die(mysql_error());

//###########################################################################################

$terms = 0;
$every_500=0;
unset($state);
//unset($row);

	//SECOND LOOP TO OUTPUT DESCRIPTIONS IN GROUPS OF 500
	while ($row2 = mysql_fetch_array($result2)){
	  
	  //SETUP FOR STATE CHANGE TRACKING
	  if (isset($state)){
	    $old_state=$state;
	}
	  
	  	//DEFINE VARIABLES
		$city=$row2['address2'];
		$state=strtoupper($row2['address3']);
		$state = state_conversion($state);
		
		
	//SETUP FOR STATE CHANGE TRACKING	
	$new_state=$state;
	
	//DO SEARCH TERMS THAT ONLY COME UP WHEN STATE CHANGES
	if (($old_state != $new_state)AND(isset($old_state))){//IF STATE CHANGED (after 1st one)
	
		Echo "<strong>$state hypnosis </strong><br><br>"; count_em();
		echo "Recommended $state Hypnosis Clinics<br>
Most experienced & educated $state clinical hypnotists offer private sessions to quit smoking, lose weight, end phobias, end substance abuse and manage pain. Lifetime support guarantee.<br>";
		echo "http://www.americanhypnosisclinic.com<br><br>";
		
		Echo "<strong> $state hypnotherapy </strong><br><br>"; count_em();
		echo "Recommended $state Hypnosis Clinics<br>
Most experienced & educated $state clinical hypnotists offer private sessions to quit smoking, lose weight, end phobias, end substance abuse and manage pain. Lifetime support guarantee.<br>";
		echo "http://www.americanhypnosisclinic.com<br><br>";		
		
		Echo "<strong> $state Hypnotist </strong><br><br>"; count_em();
		echo "Recommended $state Hypnosis Clinics<br>
Most experienced & educated $state clinical hypnotists offer private sessions to quit smoking, lose weight, end phobias, end substance abuse and manage pain. Lifetime support guarantee.<br>";
		echo "http://www.americanhypnosisclinic.com<br><br>";		
		
		
		Echo "<strong> Weight loss hypnotherapy $state </strong><br><br>"; count_em();

		echo "Weight Loss Hypnosis in $state<br>
Get off the diet roller coaster   Personalized hypnosis sessions with experienced hypnotherapists help you lose weight PERMANENTLY. $state locations. Lifetime support guaranteed.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>Weight Loss Hypnosis in $state </strong><br><br>"; count_em();
		echo "Weight Loss Hypnosis $state<br>
Get off the diet roller coaster   Personalized hypnosis sessions with experienced hypnotherapists help you lose weight PERMANENTLY. $state locations. Lifetime support guaranteed.<br>
http://www.americanhypnosisclinic.com<br><br>";		
		
		Echo " <strong>Weight loss hypnosis $state </strong><br>"; count_em();
		echo "Weight Loss Hypnosis $state<br>
Get off the diet roller coaster   Personalized hypnosis sessions with experienced hypnotherapists help you lose weight PERMANENTLY. $state locations. Lifetime support guaranteed.<br>
http://www.americanhypnosisclinic.com<br><br>";	

		Echo " <strong>Weight loss $state </strong><br>"; count_em();
		echo "Hypnosis for Weight Loss<br>
Get off the diet roller coaster   Personalized hypnosis sessions with experienced hypnotherapists help you lose weight PERMANENTLY. $state locations. Lifetime support guaranteed.<br>
http://www.americanhypnosisclinic.com<br><br>";	

		Echo " <strong>Quit smoking hypnosis $state </strong><br>"; count_em();
		echo "Quit Smoking Hypnosis $state<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>
";
		
		Echo " <strong>Quit smoking $state </strong><br>"; count_em();
		echo "Quit Smoking with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>
";
		

		Echo " <strong>help quit smoking $state </strong><br>"; count_em();
		echo "Hypnosis to Help Quit Smoking<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

		Echo " <strong>Lose weight $state </strong><br>"; count_em();
		echo "Lose Weight with Hypnosis<br>
Get off the diet roller coaster   Personalized hypnosis sessions with experienced hypnotherapists help you lose weight PERMANENTLY. $state locations. Lifetime support guaranteed.<br>
http://www.americanhypnosisclinic.com<br><br>";	
		
		Echo " <strong>Hypnosis to lose weight $state </strong><br>"; count_em();
		echo "Hypnosis to Lose Weight <br>
Get off the diet roller coaster   Personalized hypnosis sessions with experienced hypnotherapists help you lose weight PERMANENTLY. $state locations. Lifetime support guaranteed.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>Drug addiction $state </strong><br>"; count_em();
		echo "Hypnosis for Drug Addiction<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>Drug abuse treatment $state </strong><br>"; count_em();
		echo "Drug Abuse Treatment $state<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>Alcoholism $state </strong><br>"; count_em();
		echo "Hypnosis for Alcoholism<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>Alcoholism treatment $state </strong><br>"; count_em();
		echo "Alcoholism Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>Alcoholism treatment program $state </strong><br>"; count_em();
		echo "Alcoholism treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>Substance abuse treatment $state </strong><br>"; count_em();
		echo "Substance Abuse Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>Addiction treatment $state </strong><br>"; count_em();
		echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>addiction treatment center $state </strong><br>"; count_em();
		echo "Addiction Treatment Center $state<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>drug addiction treatment center $state </strong><br>"; count_em();
		echo "End Drug Addiction with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>drug addiction rehab treatment $state </strong><br>"; count_em();
		echo "Drug Addiction Rehab with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>drug addiction treatment $state </strong><br>"; count_em();
		echo "Drug Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>alcohol and drug addiction treatment $state </strong><br>"; count_em();
		echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>drug addiction treatment program $state </strong><br>"; count_em();
		echo "Drug Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>drug and alcohol addiction treatment program $state </strong><br>"; count_em();
		echo "End Addiction Through Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>alcohol addiction treatment $state </strong><br>"; count_em();
		echo "Alcoholism Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>alcoholism help $state </strong><br>"; count_em();
		echo "Alcoholism Help Using Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>alcoholism addiction treatment $state </strong><br>"; count_em();
		echo "Alcoholism Treatment Using Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>alcoholism treatment center $state </strong><br>"; count_em();
		echo "Alcoholism Treatment Using Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo "<strong> alcoholism rehab $state </strong><br>"; count_em();
		echo "Alcoholism Rehab Using Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo"<BR><BR>";
	}// END PRINT STATE SEARCH TERM BLOCK
		
//PRINT ALL OTHER CITY AND CITY + STATE SEARCH TERMS
Echo " <strong>$city hypnotherapy </strong><BR>"; count_em();
echo "Recommended $city Hypnosis Clinics<br>
Most experienced & educated $city clinical hypnotists offer private sessions to quit smoking, lose weight, end phobias, end substance abuse and manage pain. Lifetime support guarantee.<br>";
		echo "http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>$city hypnotist </strong><BR>"; count_em();
echo "Recommended $city Clinical Hypnotists<br>
Most experienced & educated $city clinical hypnotists offer private sessions to quit smoking, lose weight, end phobias, end substance abuse and manage pain. Lifetime support guarantee.<br>";
		echo "http://www.americanhypnosisclinic.com<br><br>";

Echo "<strong> hypnosis $city </strong><BR>"; count_em();
echo "Recommended $city Hypnosis Clinics<br>
Most experienced & educated $city clinical hypnotists offer private sessions to quit smoking, lose weight, end phobias, end substance abuse and manage pain. Lifetime support guarantee.<br>";
		echo "http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>hypnosis $city $state </strong><BR>"; count_em();
echo "Recommended $city Hypnosis Clinics<br>
Most experienced & educated $state clinical hypnotists offer private sessions to quit smoking, lose weight, end phobias, end substance abuse and manage pain. Lifetime support guarantee.<br>";
		echo "http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Hypnosis to lose weight $city </strong><BR>"; count_em();
echo "Hypnosis to Lose Weight <br>
Get off the diet roller coaster   Personalized hypnosis sessions with experienced hypnotherapists help you lose weight PERMANENTLY. $city locations. Lifetime support guaranteed.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo "<strong> Hypnosis to lose weight $city $state</strong> <BR>"; count_em();
echo "Hypnosis to Lose Weight <br>
Get off the diet roller coaster   Personalized hypnosis sessions with experienced hypnotherapists help you lose weight PERMANENTLY. $city locations. Lifetime support guaranteed.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Lose weight $city </strong><BR>"; count_em();
echo "Hypnosis to Lose Weight <br>
Get off the diet roller coaster   Personalized hypnosis sessions with experienced hypnotherapists help you lose weight PERMANENTLY. $city locations. Lifetime support guaranteed.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Lose weight $city $state </strong><BR>"; count_em();
echo "Hypnosis to Lose Weight <br>
Get off the diet roller coaster   Personalized hypnosis sessions with experienced hypnotherapists help you lose weight PERMANENTLY. $city locations. Lifetime support guaranteed.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo "<strong> Quit smoking $city</strong> <BR>"; count_em();
echo "Quit Smoking with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $city according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo "<strong> Quit smoking hypnosis $city </strong><BR>"; count_em();
echo "Quit Smoking with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo "<strong> Quit smoking hypnosis $city $state </strong><BR>"; count_em();
echo "Quit Smoking with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Quit smoking support $city </strong><BR>"; count_em();
echo "Quit Smoking with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Quit smoking support $city $state </strong><BR>"; count_em();
echo "Quit Smoking with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>help quit smoking $city </strong><BR>"; count_em();
echo "Quit Smoking Help Through Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>help quit smoking $city $state </strong><BR>"; count_em();
echo "Quit Smoking with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Smoking cessation $city </strong><BR>"; count_em();
echo "Smoking Cessation Through Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Smoking cessation $city $state </strong><BR>"; count_em();
echo "Smoking Cessation Through Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Weight loss $city </strong><BR>"; count_em();
echo "Weight Loss Hypnosis in $city<br>
Get off the diet roller coaster   Personalized hypnosis sessions with experienced hypnotherapists help you lose weight PERMANENTLY. $state locations. Lifetime support guaranteed.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Weight loss $city $state </strong><BR>"; count_em();
echo "Weight Loss Hypnosis in $city<br>
Get off the diet roller coaster   Personalized hypnosis sessions with experienced hypnotherapists help you lose weight PERMANENTLY. $state locations. Lifetime support guaranteed.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Weight loss hypnosis $city </strong><BR>"; count_em();
echo "Weight Loss Hypnosis in $city<br>
Get off the diet roller coaster   Personalized hypnosis sessions with experienced hypnotherapists help you lose weight PERMANENTLY. $state locations. Lifetime support guaranteed.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Weight loss hypnotherapy $city </strong><BR>"; count_em();
echo "Weight Loss Hypnosis in $city<br>
Get off the diet roller coaster   Personalized hypnosis sessions with experienced hypnotherapists help you lose weight PERMANENTLY. $state locations. Lifetime support guaranteed.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Drug addiction $city </strong><BR>"; count_em();
echo "End Addiction Through Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Drug addiction $city $state </strong><BR>"; count_em();
echo "End Addiction Through Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Drug abuse treatment $city </strong><BR>"; count_em();
echo "End Drug Abuse Through Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Drug abuse treatment $city $state </strong><BR>"; count_em();
echo "Hypnosis Drug Abuse Treatment<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Alcoholism $city </strong><BR>"; count_em();
echo "End Addiction Through Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Alcoholism $city $state </strong><BR>"; count_em();
echo "End Addiction Through Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo "<strong> Alcoholism treatment $city </strong><BR>"; count_em();
echo "End Addiction Through Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Alcoholism treatment $city $state </strong><BR>"; count_em();
echo "End Addiction Through Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Alcoholism treatment program $city </strong><BR>"; count_em();
echo "End Addiction Through Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Alcoholism treatment program $city $state </strong><BR>"; count_em();
echo "End Addiction Through Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Substance abuse treatment $city </strong><BR>"; count_em();
echo "Substance Abuse Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Substance abuse treatment $city $state </strong><BR>"; count_em();
echo "Substance Abuse Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Addiction treatment $city </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Addiction treatment $city $state </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>addiction treatment center $city </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>addiction treatment center $city $state </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>drug addiction treatment center $city </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>drug addiction treatment center $city $state </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>drug addiction rehab treatment $city </strong><BR>"; count_em();
echo "Drug Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>drug addiction rehab treatment $city $state </strong><BR>"; count_em();
echo "Drug Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>drug addiction treatment $city </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>drug addiction treatment $city $state </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>alcohol and drug addiction treatment $city </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>alcohol and drug addiction treatment $city $state </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>drug addiction treatment program $city </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>drug addiction treatment program $city $state </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>drug and alcohol addiction treatment program $city </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>drug and alcohol addiction treatment program $city $state</strong> <BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>alcohol addiction treatment $city </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>alcohol addiction treatment $city $state </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>alcoholism help $city </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>alcoholism help $city $state </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>alcoholism addiction treatment $city </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>alcoholism addiction treatment $city $state </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>alcoholism treatment center $city </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>alcoholism treatment center $city $state </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>alcoholism rehab $city </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>alcoholism rehab $city $state </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>$city $state hypnotist </strong><BR>"; count_em();
echo "Recommended $state Hypnotists<br>
Most experienced & educated $city clinical hypnotists offer private sessions to quit smoking, lose weight, end phobias, end substance abuse and manage pain. Lifetime support guarantee.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>$city $state hypnotherapy </strong><BR>"; count_em();
echo "Recommended $state Hypnotists<br>
Most experienced & educated $city clinical hypnotists offer private sessions to quit smoking, lose weight, end phobias, end substance abuse and manage pain. Lifetime support guarantee.<br>
http://www.americanhypnosisclinic.com<br><br>";


		echo "<br>";


//count to 500 for blocks of adwords

}// end while loop number 2//STRATEGY:
// - Get City and States from all affiliates
// - for every city and once for every state set variables
// - output the title and search term for each permutation using that variable to cut and paste

//###########################################################################################

	//FIRST LOOP TO OUTPUT SEARCH TERMS IN GROUPS OF 500
	while ($row = mysql_fetch_array($result)){
	  
	  //SETUP FOR STATE CHANGE TRACKING
	  if (isset($state)){
	    $old_state=$state;
	}
	  
	  	//DEFINE VARIABLES
		$city=$row['address2'];
		$state=strtoupper($row['address3']);
		$state = state_conversion($state);
		
		
	//SETUP FOR STATE CHANGE TRACKING	
	$new_state=$state;
	
	//DO SEARCH TERMS THAT ONLY COME UP WHEN STATE CHANGES
	if (($old_state != $new_state)AND(isset($old_state))){//IF STATE CHANGED (after 1st one)
	
		Echo "$state hypnosis <br>"; count_em();
		Echo " $state hypnotherapy <br>"; count_em();
		Echo " $state hypnotist <br>"; count_em();
		Echo " Weight loss hypnotherapy $state <br>"; count_em();
		Echo " Weight loss hypnosis $state <br>"; count_em();
		Echo " Weight loss hypnosis $state <br>"; count_em();
		Echo " Weight loss $state <br>"; count_em();
		Echo " Quit smoking hypnosis $state <br>"; count_em();
		Echo " Quit smoking $state <br>"; count_em();

		Echo " help quit smoking $state <br>"; count_em();

		Echo " Lose weight $state <br>"; count_em();
		Echo " Hypnosis to lose weight $state <br>"; count_em();
		Echo " Drug addiction $state <br>"; count_em();
		Echo " Drug abuse treatment $state <br>"; count_em();
		Echo " Alcoholism $state <br>"; count_em();
		Echo " Alcoholism treatment $state <br>"; count_em();
		Echo " Alcoholism treatment program $state <br>"; count_em();
		Echo " Substance abuse treatment $state <br>"; count_em();
		Echo " Addiction treatment $state <br>"; count_em();
		Echo " addiction treatment center $state <br>"; count_em();
		Echo " drug addiction treatment center $state <br>"; count_em();
		Echo " drug addiction rehab treatment $state <br>"; count_em();
		Echo " drug addiction treatment $state <br>"; count_em();
		Echo " alcohol and drug addiction treatment $state <br>"; count_em();
		Echo " drug addiction treatment program $state <br>"; count_em();
		Echo " drug and alcohol addiction treatment program $state <br>"; count_em();
		Echo " alcohol addiction treatment $state <br>"; count_em();
		Echo " alcoholism help $state <br>"; count_em();
		Echo " alcoholism addiction treatment $state <br>"; count_em();
		Echo " alcoholism treatment center $state <br>"; count_em();
		Echo " alcoholism rehab $state <br>"; count_em();
		Echo"<BR><BR>";
	}// END PRINT STATE SEARCH TERM BLOCK
		
//PRINT ALL OTHER CITY AND CITY + STATE SEARCH TERMS
Echo " $city hypnotherapy <BR>"; count_em();
Echo " $city hypnotist <BR>"; count_em();
Echo " hypnosis $city <BR>"; count_em();
Echo " hypnosis $city $state <BR>"; count_em();
Echo " Hypnosis to lose weight $city <BR>"; count_em();
Echo " Hypnosis to lose weight $city $state <BR>"; count_em();
Echo " Lose weight $city <BR>"; count_em();
Echo " Lose weight $city $state <BR>"; count_em();
Echo " Quit smoking $city <BR>"; count_em();
Echo " Quit smoking hypnosis $city <BR>"; count_em();
Echo " Quit smoking hypnosis $city $state <BR>"; count_em();
Echo " Quit smoking support $city <BR>"; count_em();
Echo " Quit smoking support $city $state <BR>"; count_em();
Echo " help quit smoking $city <BR>"; count_em();
Echo " help quit smoking $city $state <BR>"; count_em();
Echo " Smoking cessation $city <BR>"; count_em();
Echo " Smoking cessation $city $state <BR>"; count_em();
Echo " Weight loss $city <BR>"; count_em();
Echo " Weight loss $city $state <BR>"; count_em();
Echo " Weight loss hypnosis $city <BR>"; count_em();
Echo " Weight loss hypnotherapy $city <BR>"; count_em();
Echo " Drug addiction $city <BR>"; count_em();
Echo " Drug addiction $city $state <BR>"; count_em();
Echo " Drug abuse treatment $city <BR>"; count_em();
Echo " Drug abuse treatment $city $state <BR>"; count_em();
Echo " Alcoholism $city <BR>"; count_em();
Echo " Alcoholism $city $state <BR>"; count_em();
Echo " Alcoholism treatment $city <BR>"; count_em();
Echo " Alcoholism treatment $city $state <BR>"; count_em();
Echo " Alcoholism treatment program $city <BR>"; count_em();
Echo " Alcoholism treatment program $city $state <BR>"; count_em();
Echo " Substance abuse treatment $city <BR>"; count_em();
Echo " Substance abuse treatment $city $state <BR>"; count_em();
Echo " Addiction treatment $city <BR>"; count_em();
Echo " Addiction treatment $city $state <BR>"; count_em();
Echo " addiction treatment center $city <BR>"; count_em();
Echo " addiction treatment center $city $state <BR>"; count_em();
Echo " drug addiction treatment center $city <BR>"; count_em();
Echo " drug addiction treatment center $city $state <BR>"; count_em();
Echo " drug addiction rehab treatment $city <BR>"; count_em();
Echo " drug addiction rehab treatment $city $state <BR>"; count_em();
Echo " drug addiction treatment $city <BR>"; count_em();
Echo " drug addiction treatment $city $state <BR>"; count_em();
Echo " alcohol and drug addiction treatment $city <BR>"; count_em();
Echo " alcohol and drug addiction treatment $city $state <BR>"; count_em();
Echo " drug addiction treatment program $city <BR>"; count_em();
Echo " drug addiction treatment program $city $state <BR>"; count_em();
Echo " drug and alcohol addiction treatment program $city <BR>"; count_em();
Echo " drug and alcohol addiction treatment program $city $state <BR>"; count_em();
Echo " alcohol addiction treatment $city <BR>"; count_em();
Echo " alcohol addiction treatment $city $state <BR>"; count_em();
Echo " alcoholism help $city <BR>"; count_em();
Echo " alcoholism help $city $state <BR>"; count_em();
Echo " alcoholism addiction treatment $city <BR>"; count_em();
Echo " alcoholism addiction treatment $city $state <BR>"; count_em();
Echo " alcoholism treatment center $city <BR>"; count_em();
Echo " alcoholism treatment center $city $state <BR>"; count_em();
Echo " alcoholism rehab $city <BR>"; count_em();
Echo " alcoholism rehab $city $state <BR>"; count_em();
Echo " $city $state hypnotist <BR>"; count_em();
Echo " $city $state hypnotherapy <BR>"; count_em();

		echo "<br>";


//count to 500 for blocks of adwords

}// end while loop
echo "<a name=\"descriptions\"><font color=\"red\" align=\"center\"><br><hr><h1>****BEGINNING OF DESCRIPTIONS****</h1><hr><br></font></a>";


//################################## CONNECT ###########################################
// create variable for name of database & table
$db_name = "america2_AHC";
$table_name = "affiliates";

//open the SQL connection to AHC server databases
$connection = mysql_connect("mysql209.secureserver.net","america2_AHC","magiclar") or die (mysql_error());

// SELECT DataBase - create var to hold the result of select db function
$db = mysql_select_db($db_name, $connection) or die (mysql_error());


//create the sql statement
$sql = "SELECT * FROM $table_name WHERE membership_status='Affiliate'ORDER BY address3";

//execute the sql statement and create a variable you can use to display or work with it
$result2 = mysql_query($sql, $connection) or die(mysql_error());

//###########################################################################################

$terms = 0;
$every_500=0;
unset($state);
//unset($row);

	//SECOND LOOP TO OUTPUT DESCRIPTIONS IN GROUPS OF 500
	while ($row2 = mysql_fetch_array($result2)){
	  
	  //SETUP FOR STATE CHANGE TRACKING
	  if (isset($state)){
	    $old_state=$state;
	}
	  
	  	//DEFINE VARIABLES
		$city=$row2['address2'];
		$state=strtoupper($row2['address3']);
		$state = state_conversion($state);
		
		
	//SETUP FOR STATE CHANGE TRACKING	
	$new_state=$state;
	
	//DO SEARCH TERMS THAT ONLY COME UP WHEN STATE CHANGES
	if (($old_state != $new_state)AND(isset($old_state))){//IF STATE CHANGED (after 1st one)
	
		Echo "<strong>$state hypnosis </strong><br><br>"; count_em();
		echo "Recommended $state Hypnosis Clinics<br>
Most experienced & educated $state clinical hypnotists offer private sessions to quit smoking, lose weight, end phobias, end substance abuse and manage pain. Lifetime support guarantee.<br>";
		echo "http://www.americanhypnosisclinic.com<br><br>";
		
		Echo "<strong> $state hypnotherapy </strong><br><br>"; count_em();
		echo "Recommended $state Hypnosis Clinics<br>
Most experienced & educated $state clinical hypnotists offer private sessions to quit smoking, lose weight, end phobias, end substance abuse and manage pain. Lifetime support guarantee.<br>";
		echo "http://www.americanhypnosisclinic.com<br><br>";		
		
		Echo "<strong> $state Hypnotist </strong><br><br>"; count_em();
		echo "Recommended $state Hypnosis Clinics<br>
Most experienced & educated $state clinical hypnotists offer private sessions to quit smoking, lose weight, end phobias, end substance abuse and manage pain. Lifetime support guarantee.<br>";
		echo "http://www.americanhypnosisclinic.com<br><br>";		
		
		
		Echo "<strong> Weight loss hypnotherapy $state </strong><br><br>"; count_em();

		echo "Weight Loss Hypnosis in $state<br>
Get off the diet roller coaster   Personalized hypnosis sessions with experienced hypnotherapists help you lose weight PERMANENTLY. $state locations. Lifetime support guaranteed.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>Weight Loss Hypnosis in $state </strong><br><br>"; count_em();
		echo "Weight Loss Hypnosis $state<br>
Get off the diet roller coaster   Personalized hypnosis sessions with experienced hypnotherapists help you lose weight PERMANENTLY. $state locations. Lifetime support guaranteed.<br>
http://www.americanhypnosisclinic.com<br><br>";		
		
		Echo " <strong>Weight loss hypnosis $state </strong><br>"; count_em();
		echo "Weight Loss Hypnosis $state<br>
Get off the diet roller coaster   Personalized hypnosis sessions with experienced hypnotherapists help you lose weight PERMANENTLY. $state locations. Lifetime support guaranteed.<br>
http://www.americanhypnosisclinic.com<br><br>";	

		Echo " <strong>Weight loss $state </strong><br>"; count_em();
		echo "Hypnosis for Weight Loss<br>
Get off the diet roller coaster   Personalized hypnosis sessions with experienced hypnotherapists help you lose weight PERMANENTLY. $state locations. Lifetime support guaranteed.<br>
http://www.americanhypnosisclinic.com<br><br>";	

		Echo " <strong>Quit smoking hypnosis $state </strong><br>"; count_em();
		echo "Quit Smoking Hypnosis $state<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>
";
		
		Echo " <strong>Quit smoking $state </strong><br>"; count_em();
		echo "Quit Smoking with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>
";
		

		Echo " <strong>help quit smoking $state </strong><br>"; count_em();
		echo "Hypnosis to Help Quit Smoking<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

		Echo " <strong>Lose weight $state </strong><br>"; count_em();
		echo "Lose Weight with Hypnosis<br>
Get off the diet roller coaster   Personalized hypnosis sessions with experienced hypnotherapists help you lose weight PERMANENTLY. $state locations. Lifetime support guaranteed.<br>
http://www.americanhypnosisclinic.com<br><br>";	
		
		Echo " <strong>Hypnosis to lose weight $state </strong><br>"; count_em();
		echo "Hypnosis to Lose Weight <br>
Get off the diet roller coaster   Personalized hypnosis sessions with experienced hypnotherapists help you lose weight PERMANENTLY. $state locations. Lifetime support guaranteed.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>Drug addiction $state </strong><br>"; count_em();
		echo "Hypnosis for Drug Addiction<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>Drug abuse treatment $state </strong><br>"; count_em();
		echo "Drug Abuse Treatment $state<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>Alcoholism $state </strong><br>"; count_em();
		echo "Hypnosis for Alcoholism<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>Alcoholism treatment $state </strong><br>"; count_em();
		echo "Alcoholism Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>Alcoholism treatment program $state </strong><br>"; count_em();
		echo "Alcoholism treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>Substance abuse treatment $state </strong><br>"; count_em();
		echo "Substance Abuse Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>Addiction treatment $state </strong><br>"; count_em();
		echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>addiction treatment center $state </strong><br>"; count_em();
		echo "Addiction Treatment Center $state<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>drug addiction treatment center $state </strong><br>"; count_em();
		echo "End Drug Addiction with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>drug addiction rehab treatment $state </strong><br>"; count_em();
		echo "Drug Addiction Rehab with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>drug addiction treatment $state </strong><br>"; count_em();
		echo "Drug Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>alcohol and drug addiction treatment $state </strong><br>"; count_em();
		echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>drug addiction treatment program $state </strong><br>"; count_em();
		echo "Drug Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>drug and alcohol addiction treatment program $state </strong><br>"; count_em();
		echo "End Addiction Through Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>alcohol addiction treatment $state </strong><br>"; count_em();
		echo "Alcoholism Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>alcoholism help $state </strong><br>"; count_em();
		echo "Alcoholism Help Using Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>alcoholism addiction treatment $state </strong><br>"; count_em();
		echo "Alcoholism Treatment Using Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>alcoholism treatment center $state </strong><br>"; count_em();
		echo "Alcoholism Treatment Using Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo "<strong> alcoholism rehab $state </strong><br>"; count_em();
		echo "Alcoholism Rehab Using Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo"<BR><BR>";
	}// END PRINT STATE SEARCH TERM BLOCK
		
//PRINT ALL OTHER CITY AND CITY + STATE SEARCH TERMS
Echo " <strong>$city hypnotherapy </strong><BR>"; count_em();
echo "Recommended $city Hypnosis Clinics<br>
Most experienced & educated $city clinical hypnotists offer private sessions to quit smoking, lose weight, end phobias, end substance abuse and manage pain. Lifetime support guarantee.<br>";
		echo "http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>$city hypnotist </strong><BR>"; count_em();
echo "Recommended $city Clinical Hypnotists<br>
Most experienced & educated $city clinical hypnotists offer private sessions to quit smoking, lose weight, end phobias, end substance abuse and manage pain. Lifetime support guarantee.<br>";
		echo "http://www.americanhypnosisclinic.com<br><br>";

Echo "<strong> hypnosis $city </strong><BR>"; count_em();
echo "Recommended $city Hypnosis Clinics<br>
Most experienced & educated $city clinical hypnotists offer private sessions to quit smoking, lose weight, end phobias, end substance abuse and manage pain. Lifetime support guarantee.<br>";
		echo "http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>hypnosis $city $state </strong><BR>"; count_em();
echo "Recommended $city Hypnosis Clinics<br>
Most experienced & educated $state clinical hypnotists offer private sessions to quit smoking, lose weight, end phobias, end substance abuse and manage pain. Lifetime support guarantee.<br>";
		echo "http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Hypnosis to lose weight $city </strong><BR>"; count_em();
echo "Hypnosis to Lose Weight <br>
Get off the diet roller coaster   Personalized hypnosis sessions with experienced hypnotherapists help you lose weight PERMANENTLY. $city locations. Lifetime support guaranteed.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo "<strong> Hypnosis to lose weight $city $state</strong> <BR>"; count_em();
echo "Hypnosis to Lose Weight <br>
Get off the diet roller coaster   Personalized hypnosis sessions with experienced hypnotherapists help you lose weight PERMANENTLY. $city locations. Lifetime support guaranteed.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Lose weight $city </strong><BR>"; count_em();
echo "Hypnosis to Lose Weight <br>
Get off the diet roller coaster   Personalized hypnosis sessions with experienced hypnotherapists help you lose weight PERMANENTLY. $city locations. Lifetime support guaranteed.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Lose weight $city $state </strong><BR>"; count_em();
echo "Hypnosis to Lose Weight <br>
Get off the diet roller coaster   Personalized hypnosis sessions with experienced hypnotherapists help you lose weight PERMANENTLY. $city locations. Lifetime support guaranteed.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo "<strong> Quit smoking $city</strong> <BR>"; count_em();
echo "Quit Smoking with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $city according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo "<strong> Quit smoking hypnosis $city </strong><BR>"; count_em();
echo "Quit Smoking with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo "<strong> Quit smoking hypnosis $city $state </strong><BR>"; count_em();
echo "Quit Smoking with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Quit smoking support $city </strong><BR>"; count_em();
echo "Quit Smoking with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Quit smoking support $city $state </strong><BR>"; count_em();
echo "Quit Smoking with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>help quit smoking $city </strong><BR>"; count_em();
echo "Quit Smoking Help Through Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>help quit smoking $city $state </strong><BR>"; count_em();
echo "Quit Smoking with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Smoking cessation $city </strong><BR>"; count_em();
echo "Smoking Cessation Through Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Smoking cessation $city $state </strong><BR>"; count_em();
echo "Smoking Cessation Through Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Weight loss $city </strong><BR>"; count_em();
echo "Weight Loss Hypnosis in $city<br>
Get off the diet roller coaster   Personalized hypnosis sessions with experienced hypnotherapists help you lose weight PERMANENTLY. $state locations. Lifetime support guaranteed.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Weight loss $city $state </strong><BR>"; count_em();
echo "Weight Loss Hypnosis in $city<br>
Get off the diet roller coaster   Personalized hypnosis sessions with experienced hypnotherapists help you lose weight PERMANENTLY. $state locations. Lifetime support guaranteed.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Weight loss hypnosis $city </strong><BR>"; count_em();
echo "Weight Loss Hypnosis in $city<br>
Get off the diet roller coaster   Personalized hypnosis sessions with experienced hypnotherapists help you lose weight PERMANENTLY. $state locations. Lifetime support guaranteed.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Weight loss hypnotherapy $city </strong><BR>"; count_em();
echo "Weight Loss Hypnosis in $city<br>
Get off the diet roller coaster   Personalized hypnosis sessions with experienced hypnotherapists help you lose weight PERMANENTLY. $state locations. Lifetime support guaranteed.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Drug addiction $city </strong><BR>"; count_em();
echo "End Addiction Through Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Drug addiction $city $state </strong><BR>"; count_em();
echo "End Addiction Through Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Drug abuse treatment $city </strong><BR>"; count_em();
echo "End Drug Abuse Through Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Drug abuse treatment $city $state </strong><BR>"; count_em();
echo "Hypnosis Drug Abuse Treatment<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Alcoholism $city </strong><BR>"; count_em();
echo "End Addiction Through Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Alcoholism $city $state </strong><BR>"; count_em();
echo "End Addiction Through Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo "<strong> Alcoholism treatment $city </strong><BR>"; count_em();
echo "End Addiction Through Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Alcoholism treatment $city $state </strong><BR>"; count_em();
echo "End Addiction Through Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Alcoholism treatment program $city </strong><BR>"; count_em();
echo "End Addiction Through Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Alcoholism treatment program $city $state </strong><BR>"; count_em();
echo "End Addiction Through Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Substance abuse treatment $city </strong><BR>"; count_em();
echo "Substance Abuse Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Substance abuse treatment $city $state </strong><BR>"; count_em();
echo "Substance Abuse Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Addiction treatment $city </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Addiction treatment $city $state </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>addiction treatment center $city </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>addiction treatment center $city $state </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>drug addiction treatment center $city </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>drug addiction treatment center $city $state </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>drug addiction rehab treatment $city </strong><BR>"; count_em();
echo "Drug Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>drug addiction rehab treatment $city $state </strong><BR>"; count_em();
echo "Drug Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>drug addiction treatment $city </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>drug addiction treatment $city $state </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>alcohol and drug addiction treatment $city </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>alcohol and drug addiction treatment $city $state </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>drug addiction treatment program $city </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>drug addiction treatment program $city $state </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>drug and alcohol addiction treatment program $city </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>drug and alcohol addiction treatment program $city $state</strong> <BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>alcohol addiction treatment $city </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>alcohol addiction treatment $city $state </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>alcoholism help $city </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>alcoholism help $city $state </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>alcoholism addiction treatment $city </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>alcoholism addiction treatment $city $state </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>alcoholism treatment center $city </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>alcoholism treatment center $city $state </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>alcoholism rehab $city </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>alcoholism rehab $city $state </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>$city $state hypnotist </strong><BR>"; count_em();
echo "Recommended $state Hypnotists<br>
Most experienced & educated $city clinical hypnotists offer private sessions to quit smoking, lose weight, end phobias, end substance abuse and manage pain. Lifetime support guarantee.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>$city $state hypnotherapy </strong><BR>"; count_em();
echo "Recommended $state Hypnotists<br>
Most experienced & educated $city clinical hypnotists offer private sessions to quit smoking, lose weight, end phobias, end substance abuse and manage pain. Lifetime support guarantee.<br>
http://www.americanhypnosisclinic.com<br><br>";


		echo "<br>";


//count to 500 for blocks of adwords

}// end while loop number 2





//STRATEGY:
// - Get close_city3 and States from all affiliates
// - for every city and once for every state set variables
// - output the title and search term for each permutation using that variable to cut and paste

//###########################################################################################

	//FIRST LOOP TO OUTPUT SEARCH TERMS IN GROUPS OF 500
	while ($row = mysql_fetch_array($result)){
	  
	  //SETUP FOR STATE CHANGE TRACKING
	  if (isset($state)){
	    $old_state=$state;
	}
	  
	  	//DEFINE VARIABLES
		$city=$row['close_city3'];
		$state=strtoupper($row['address3']);
		$state = state_conversion($state);
		
		
	//SETUP FOR STATE CHANGE TRACKING	
	$new_state=$state;
	
	//DO SEARCH TERMS THAT ONLY COME UP WHEN STATE CHANGES
	if (($old_state != $new_state)AND(isset($old_state))){//IF STATE CHANGED (after 1st one)
	
		Echo "$state hypnosis <br>"; count_em();
		Echo " $state hypnotherapy <br>"; count_em();
		Echo " $state hypnotist <br>"; count_em();
		Echo " Weight loss hypnotherapy $state <br>"; count_em();
		Echo " Weight loss hypnosis $state <br>"; count_em();
		Echo " Weight loss hypnosis $state <br>"; count_em();
		Echo " Weight loss $state <br>"; count_em();
		Echo " Quit smoking hypnosis $state <br>"; count_em();
		Echo " Quit smoking $state <br>"; count_em();

		Echo " help quit smoking $state <br>"; count_em();

		Echo " Lose weight $state <br>"; count_em();
		Echo " Hypnosis to lose weight $state <br>"; count_em();
		Echo " Drug addiction $state <br>"; count_em();
		Echo " Drug abuse treatment $state <br>"; count_em();
		Echo " Alcoholism $state <br>"; count_em();
		Echo " Alcoholism treatment $state <br>"; count_em();
		Echo " Alcoholism treatment program $state <br>"; count_em();
		Echo " Substance abuse treatment $state <br>"; count_em();
		Echo " Addiction treatment $state <br>"; count_em();
		Echo " addiction treatment center $state <br>"; count_em();
		Echo " drug addiction treatment center $state <br>"; count_em();
		Echo " drug addiction rehab treatment $state <br>"; count_em();
		Echo " drug addiction treatment $state <br>"; count_em();
		Echo " alcohol and drug addiction treatment $state <br>"; count_em();
		Echo " drug addiction treatment program $state <br>"; count_em();
		Echo " drug and alcohol addiction treatment program $state <br>"; count_em();
		Echo " alcohol addiction treatment $state <br>"; count_em();
		Echo " alcoholism help $state <br>"; count_em();
		Echo " alcoholism addiction treatment $state <br>"; count_em();
		Echo " alcoholism treatment center $state <br>"; count_em();
		Echo " alcoholism rehab $state <br>"; count_em();
		Echo"<BR><BR>";
	}// END PRINT STATE SEARCH TERM BLOCK
		
//PRINT ALL OTHER CITY AND CITY + STATE SEARCH TERMS
Echo " $city hypnotherapy <BR>"; count_em();
Echo " $city hypnotist <BR>"; count_em();
Echo " hypnosis $city <BR>"; count_em();
Echo " hypnosis $city $state <BR>"; count_em();
Echo " Hypnosis to lose weight $city <BR>"; count_em();
Echo " Hypnosis to lose weight $city $state <BR>"; count_em();
Echo " Lose weight $city <BR>"; count_em();
Echo " Lose weight $city $state <BR>"; count_em();
Echo " Quit smoking $city <BR>"; count_em();
Echo " Quit smoking hypnosis $city <BR>"; count_em();
Echo " Quit smoking hypnosis $city $state <BR>"; count_em();
Echo " Quit smoking support $city <BR>"; count_em();
Echo " Quit smoking support $city $state <BR>"; count_em();
Echo " help quit smoking $city <BR>"; count_em();
Echo " help quit smoking $city $state <BR>"; count_em();
Echo " Smoking cessation $city <BR>"; count_em();
Echo " Smoking cessation $city $state <BR>"; count_em();
Echo " Weight loss $city <BR>"; count_em();
Echo " Weight loss $city $state <BR>"; count_em();
Echo " Weight loss hypnosis $city <BR>"; count_em();
Echo " Weight loss hypnotherapy $city <BR>"; count_em();
Echo " Drug addiction $city <BR>"; count_em();
Echo " Drug addiction $city $state <BR>"; count_em();
Echo " Drug abuse treatment $city <BR>"; count_em();
Echo " Drug abuse treatment $city $state <BR>"; count_em();
Echo " Alcoholism $city <BR>"; count_em();
Echo " Alcoholism $city $state <BR>"; count_em();
Echo " Alcoholism treatment $city <BR>"; count_em();
Echo " Alcoholism treatment $city $state <BR>"; count_em();
Echo " Alcoholism treatment program $city <BR>"; count_em();
Echo " Alcoholism treatment program $city $state <BR>"; count_em();
Echo " Substance abuse treatment $city <BR>"; count_em();
Echo " Substance abuse treatment $city $state <BR>"; count_em();
Echo " Addiction treatment $city <BR>"; count_em();
Echo " Addiction treatment $city $state <BR>"; count_em();
Echo " addiction treatment center $city <BR>"; count_em();
Echo " addiction treatment center $city $state <BR>"; count_em();
Echo " drug addiction treatment center $city <BR>"; count_em();
Echo " drug addiction treatment center $city $state <BR>"; count_em();
Echo " drug addiction rehab treatment $city <BR>"; count_em();
Echo " drug addiction rehab treatment $city $state <BR>"; count_em();
Echo " drug addiction treatment $city <BR>"; count_em();
Echo " drug addiction treatment $city $state <BR>"; count_em();
Echo " alcohol and drug addiction treatment $city <BR>"; count_em();
Echo " alcohol and drug addiction treatment $city $state <BR>"; count_em();
Echo " drug addiction treatment program $city <BR>"; count_em();
Echo " drug addiction treatment program $city $state <BR>"; count_em();
Echo " drug and alcohol addiction treatment program $city <BR>"; count_em();
Echo " drug and alcohol addiction treatment program $city $state <BR>"; count_em();
Echo " alcohol addiction treatment $city <BR>"; count_em();
Echo " alcohol addiction treatment $city $state <BR>"; count_em();
Echo " alcoholism help $city <BR>"; count_em();
Echo " alcoholism help $city $state <BR>"; count_em();
Echo " alcoholism addiction treatment $city <BR>"; count_em();
Echo " alcoholism addiction treatment $city $state <BR>"; count_em();
Echo " alcoholism treatment center $city <BR>"; count_em();
Echo " alcoholism treatment center $city $state <BR>"; count_em();
Echo " alcoholism rehab $city <BR>"; count_em();
Echo " alcoholism rehab $city $state <BR>"; count_em();
Echo " $city $state hypnotist <BR>"; count_em();
Echo " $city $state hypnotherapy <BR>"; count_em();

		echo "<br>";


//count to 500 for blocks of adwords

}// end while loop
echo "<a name=\"descriptions\"><font color=\"red\" align=\"center\"><br><hr><h1>****BEGINNING OF DESCRIPTIONS****</h1><hr><br></font></a>";


//################################## CONNECT ###########################################
// create variable for name of database & table
$db_name = "america2_AHC";
$table_name = "affiliates";

//open the SQL connection to AHC server databases
$connection = mysql_connect("mysql209.secureserver.net","america2_AHC","magiclar") or die (mysql_error());

// SELECT DataBase - create var to hold the result of select db function
$db = mysql_select_db($db_name, $connection) or die (mysql_error());


//create the sql statement
$sql = "SELECT * FROM $table_name WHERE membership_status='Affiliate'ORDER BY address3";

//execute the sql statement and create a variable you can use to display or work with it
$result2 = mysql_query($sql, $connection) or die(mysql_error());

//###########################################################################################

$terms = 0;
$every_500=0;
unset($state);
//unset($row);

	//SECOND LOOP TO OUTPUT DESCRIPTIONS IN GROUPS OF 500
	while ($row2 = mysql_fetch_array($result2)){
	  
	  //SETUP FOR STATE CHANGE TRACKING
	  if (isset($state)){
	    $old_state=$state;
	}
	  
	  	//DEFINE VARIABLES
		$city=$row2['address2'];
		$state=strtoupper($row2['address3']);
		$state = state_conversion($state);
		
		
	//SETUP FOR STATE CHANGE TRACKING	
	$new_state=$state;
	
	//DO SEARCH TERMS THAT ONLY COME UP WHEN STATE CHANGES
	if (($old_state != $new_state)AND(isset($old_state))){//IF STATE CHANGED (after 1st one)
	
		Echo "<strong>$state hypnosis </strong><br><br>"; count_em();
		echo "Recommended $state Hypnosis Clinics<br>
Most experienced & educated $state clinical hypnotists offer private sessions to quit smoking, lose weight, end phobias, end substance abuse and manage pain. Lifetime support guarantee.<br>";
		echo "http://www.americanhypnosisclinic.com<br><br>";
		
		Echo "<strong> $state hypnotherapy </strong><br><br>"; count_em();
		echo "Recommended $state Hypnosis Clinics<br>
Most experienced & educated $state clinical hypnotists offer private sessions to quit smoking, lose weight, end phobias, end substance abuse and manage pain. Lifetime support guarantee.<br>";
		echo "http://www.americanhypnosisclinic.com<br><br>";		
		
		Echo "<strong> $state Hypnotist </strong><br><br>"; count_em();
		echo "Recommended $state Hypnosis Clinics<br>
Most experienced & educated $state clinical hypnotists offer private sessions to quit smoking, lose weight, end phobias, end substance abuse and manage pain. Lifetime support guarantee.<br>";
		echo "http://www.americanhypnosisclinic.com<br><br>";		
		
		
		Echo "<strong> Weight loss hypnotherapy $state </strong><br><br>"; count_em();

		echo "Weight Loss Hypnosis in $state<br>
Get off the diet roller coaster   Personalized hypnosis sessions with experienced hypnotherapists help you lose weight PERMANENTLY. $state locations. Lifetime support guaranteed.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>Weight Loss Hypnosis in $state </strong><br><br>"; count_em();
		echo "Weight Loss Hypnosis $state<br>
Get off the diet roller coaster   Personalized hypnosis sessions with experienced hypnotherapists help you lose weight PERMANENTLY. $state locations. Lifetime support guaranteed.<br>
http://www.americanhypnosisclinic.com<br><br>";		
		
		Echo " <strong>Weight loss hypnosis $state </strong><br>"; count_em();
		echo "Weight Loss Hypnosis $state<br>
Get off the diet roller coaster   Personalized hypnosis sessions with experienced hypnotherapists help you lose weight PERMANENTLY. $state locations. Lifetime support guaranteed.<br>
http://www.americanhypnosisclinic.com<br><br>";	

		Echo " <strong>Weight loss $state </strong><br>"; count_em();
		echo "Hypnosis for Weight Loss<br>
Get off the diet roller coaster   Personalized hypnosis sessions with experienced hypnotherapists help you lose weight PERMANENTLY. $state locations. Lifetime support guaranteed.<br>
http://www.americanhypnosisclinic.com<br><br>";	

		Echo " <strong>Quit smoking hypnosis $state </strong><br>"; count_em();
		echo "Quit Smoking Hypnosis $state<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>
";
		
		Echo " <strong>Quit smoking $state </strong><br>"; count_em();
		echo "Quit Smoking with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>
";
		

		Echo " <strong>help quit smoking $state </strong><br>"; count_em();
		echo "Hypnosis to Help Quit Smoking<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

		Echo " <strong>Lose weight $state </strong><br>"; count_em();
		echo "Lose Weight with Hypnosis<br>
Get off the diet roller coaster   Personalized hypnosis sessions with experienced hypnotherapists help you lose weight PERMANENTLY. $state locations. Lifetime support guaranteed.<br>
http://www.americanhypnosisclinic.com<br><br>";	
		
		Echo " <strong>Hypnosis to lose weight $state </strong><br>"; count_em();
		echo "Hypnosis to Lose Weight <br>
Get off the diet roller coaster   Personalized hypnosis sessions with experienced hypnotherapists help you lose weight PERMANENTLY. $state locations. Lifetime support guaranteed.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>Drug addiction $state </strong><br>"; count_em();
		echo "Hypnosis for Drug Addiction<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>Drug abuse treatment $state </strong><br>"; count_em();
		echo "Drug Abuse Treatment $state<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>Alcoholism $state </strong><br>"; count_em();
		echo "Hypnosis for Alcoholism<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>Alcoholism treatment $state </strong><br>"; count_em();
		echo "Alcoholism Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>Alcoholism treatment program $state </strong><br>"; count_em();
		echo "Alcoholism treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>Substance abuse treatment $state </strong><br>"; count_em();
		echo "Substance Abuse Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>Addiction treatment $state </strong><br>"; count_em();
		echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>addiction treatment center $state </strong><br>"; count_em();
		echo "Addiction Treatment Center $state<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>drug addiction treatment center $state </strong><br>"; count_em();
		echo "End Drug Addiction with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>drug addiction rehab treatment $state </strong><br>"; count_em();
		echo "Drug Addiction Rehab with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>drug addiction treatment $state </strong><br>"; count_em();
		echo "Drug Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>alcohol and drug addiction treatment $state </strong><br>"; count_em();
		echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>drug addiction treatment program $state </strong><br>"; count_em();
		echo "Drug Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>drug and alcohol addiction treatment program $state </strong><br>"; count_em();
		echo "End Addiction Through Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>alcohol addiction treatment $state </strong><br>"; count_em();
		echo "Alcoholism Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>alcoholism help $state </strong><br>"; count_em();
		echo "Alcoholism Help Using Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>alcoholism addiction treatment $state </strong><br>"; count_em();
		echo "Alcoholism Treatment Using Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo " <strong>alcoholism treatment center $state </strong><br>"; count_em();
		echo "Alcoholism Treatment Using Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo "<strong> alcoholism rehab $state </strong><br>"; count_em();
		echo "Alcoholism Rehab Using Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";
		
		Echo"<BR><BR>";
	}// END PRINT STATE SEARCH TERM BLOCK
		
//PRINT ALL OTHER CITY AND CITY + STATE SEARCH TERMS
Echo " <strong>$city hypnotherapy </strong><BR>"; count_em();
echo "Recommended $city Hypnosis Clinics<br>
Most experienced & educated $city clinical hypnotists offer private sessions to quit smoking, lose weight, end phobias, end substance abuse and manage pain. Lifetime support guarantee.<br>";
		echo "http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>$city hypnotist </strong><BR>"; count_em();
echo "Recommended $city Clinical Hypnotists<br>
Most experienced & educated $city clinical hypnotists offer private sessions to quit smoking, lose weight, end phobias, end substance abuse and manage pain. Lifetime support guarantee.<br>";
		echo "http://www.americanhypnosisclinic.com<br><br>";

Echo "<strong> hypnosis $city </strong><BR>"; count_em();
echo "Recommended $city Hypnosis Clinics<br>
Most experienced & educated $city clinical hypnotists offer private sessions to quit smoking, lose weight, end phobias, end substance abuse and manage pain. Lifetime support guarantee.<br>";
		echo "http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>hypnosis $city $state </strong><BR>"; count_em();
echo "Recommended $city Hypnosis Clinics<br>
Most experienced & educated $state clinical hypnotists offer private sessions to quit smoking, lose weight, end phobias, end substance abuse and manage pain. Lifetime support guarantee.<br>";
		echo "http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Hypnosis to lose weight $city </strong><BR>"; count_em();
echo "Hypnosis to Lose Weight <br>
Get off the diet roller coaster   Personalized hypnosis sessions with experienced hypnotherapists help you lose weight PERMANENTLY. $city locations. Lifetime support guaranteed.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo "<strong> Hypnosis to lose weight $city $state</strong> <BR>"; count_em();
echo "Hypnosis to Lose Weight <br>
Get off the diet roller coaster   Personalized hypnosis sessions with experienced hypnotherapists help you lose weight PERMANENTLY. $city locations. Lifetime support guaranteed.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Lose weight $city </strong><BR>"; count_em();
echo "Hypnosis to Lose Weight <br>
Get off the diet roller coaster   Personalized hypnosis sessions with experienced hypnotherapists help you lose weight PERMANENTLY. $city locations. Lifetime support guaranteed.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Lose weight $city $state </strong><BR>"; count_em();
echo "Hypnosis to Lose Weight <br>
Get off the diet roller coaster   Personalized hypnosis sessions with experienced hypnotherapists help you lose weight PERMANENTLY. $city locations. Lifetime support guaranteed.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo "<strong> Quit smoking $city</strong> <BR>"; count_em();
echo "Quit Smoking with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $city according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo "<strong> Quit smoking hypnosis $city </strong><BR>"; count_em();
echo "Quit Smoking with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo "<strong> Quit smoking hypnosis $city $state </strong><BR>"; count_em();
echo "Quit Smoking with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Quit smoking support $city </strong><BR>"; count_em();
echo "Quit Smoking with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Quit smoking support $city $state </strong><BR>"; count_em();
echo "Quit Smoking with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>help quit smoking $city </strong><BR>"; count_em();
echo "Quit Smoking Help Through Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>help quit smoking $city $state </strong><BR>"; count_em();
echo "Quit Smoking with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Smoking cessation $city </strong><BR>"; count_em();
echo "Smoking Cessation Through Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Smoking cessation $city $state </strong><BR>"; count_em();
echo "Smoking Cessation Through Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Weight loss $city </strong><BR>"; count_em();
echo "Weight Loss Hypnosis in $city<br>
Get off the diet roller coaster   Personalized hypnosis sessions with experienced hypnotherapists help you lose weight PERMANENTLY. $state locations. Lifetime support guaranteed.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Weight loss $city $state </strong><BR>"; count_em();
echo "Weight Loss Hypnosis in $city<br>
Get off the diet roller coaster   Personalized hypnosis sessions with experienced hypnotherapists help you lose weight PERMANENTLY. $state locations. Lifetime support guaranteed.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Weight loss hypnosis $city </strong><BR>"; count_em();
echo "Weight Loss Hypnosis in $city<br>
Get off the diet roller coaster   Personalized hypnosis sessions with experienced hypnotherapists help you lose weight PERMANENTLY. $state locations. Lifetime support guaranteed.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Weight loss hypnotherapy $city </strong><BR>"; count_em();
echo "Weight Loss Hypnosis in $city<br>
Get off the diet roller coaster   Personalized hypnosis sessions with experienced hypnotherapists help you lose weight PERMANENTLY. $state locations. Lifetime support guaranteed.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Drug addiction $city </strong><BR>"; count_em();
echo "End Addiction Through Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Drug addiction $city $state </strong><BR>"; count_em();
echo "End Addiction Through Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Drug abuse treatment $city </strong><BR>"; count_em();
echo "End Drug Abuse Through Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Drug abuse treatment $city $state </strong><BR>"; count_em();
echo "Hypnosis Drug Abuse Treatment<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Alcoholism $city </strong><BR>"; count_em();
echo "End Addiction Through Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Alcoholism $city $state </strong><BR>"; count_em();
echo "End Addiction Through Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo "<strong> Alcoholism treatment $city </strong><BR>"; count_em();
echo "End Addiction Through Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Alcoholism treatment $city $state </strong><BR>"; count_em();
echo "End Addiction Through Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Alcoholism treatment program $city </strong><BR>"; count_em();
echo "End Addiction Through Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Alcoholism treatment program $city $state </strong><BR>"; count_em();
echo "End Addiction Through Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Substance abuse treatment $city </strong><BR>"; count_em();
echo "Substance Abuse Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Substance abuse treatment $city $state </strong><BR>"; count_em();
echo "Substance Abuse Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Addiction treatment $city </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>Addiction treatment $city $state </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>addiction treatment center $city </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>addiction treatment center $city $state </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>drug addiction treatment center $city </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>drug addiction treatment center $city $state </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>drug addiction rehab treatment $city </strong><BR>"; count_em();
echo "Drug Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>drug addiction rehab treatment $city $state </strong><BR>"; count_em();
echo "Drug Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>drug addiction treatment $city </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>drug addiction treatment $city $state </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>alcohol and drug addiction treatment $city </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>alcohol and drug addiction treatment $city $state </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>drug addiction treatment program $city </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>drug addiction treatment program $city $state </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>drug and alcohol addiction treatment program $city </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>drug and alcohol addiction treatment program $city $state</strong> <BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>alcohol addiction treatment $city </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>alcohol addiction treatment $city $state </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>alcoholism help $city </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>alcoholism help $city $state </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>alcoholism addiction treatment $city </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>alcoholism addiction treatment $city $state </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>alcoholism treatment center $city </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>alcoholism treatment center $city $state </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>alcoholism rehab $city </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>alcoholism rehab $city $state </strong><BR>"; count_em();
echo "Addiction Treatment with Hypnosis<br>
Hypnosis is the easiest, most safe and most effective way to quit.We recommend the higest rated hypnotherapists in $state according to customer feedback.Lifetime guaranteed programs.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>$city $state hypnotist </strong><BR>"; count_em();
echo "Recommended $state Hypnotists<br>
Most experienced & educated $city clinical hypnotists offer private sessions to quit smoking, lose weight, end phobias, end substance abuse and manage pain. Lifetime support guarantee.<br>
http://www.americanhypnosisclinic.com<br><br>";

Echo " <strong>$city $state hypnotherapy </strong><BR>"; count_em();
echo "Recommended $state Hypnotists<br>
Most experienced & educated $city clinical hypnotists offer private sessions to quit smoking, lose weight, end phobias, end substance abuse and manage pain. Lifetime support guarantee.<br>
http://www.americanhypnosisclinic.com<br><br>";


		echo "<br>";


//count to 500 for blocks of adwords

}// end while loop number 2

echo "<br>$terms total entries";
?>

</body>
</html>