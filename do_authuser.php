<html>

<head>

 <!-- <meta http-equiv="REFRESH"content="0;URL=index2.php"> -->

</head>

<body>

Well at least the page loaded

<?php




 session_start();
// Check and make sure entries made for both

try {

    if ((!$_POST["username"]) || (!$_POST["password"])){

        //header( "Location: index.htm");
    //or security - to avoid page caching
    header( "Location: re-login_page.html");

    echo "NO FORM INPUT!!!";

        exit;

    }  //end entry-check IF block
} catch (Exception $e) {
    $ignore = $e;
}

// //testing
// //echo "$_POST[username] - $_POST[password] ";



################################# CONNECT #################################################

include_once("ahcDatabase_class.php");



// create variable for name of database & table

$db_name = "america2_AHC";

$table_name = "auth_users";


//$ahcDB->dbConnect();
//SETTINGS FOR DREAMHOST DEPLOYMENT - UNNEEDED FOR LOCAL XAMPP DEVELOPMENT

// $servername = 'mysql.americanhypnotherapyassociation.com';
// $username = "larryvolz";
// $password = "ZacNat727";
// $dbname = "america2_ahc";

$servername = 'localhost';
$username = "root";
$password = "";
$dbname = "america2_ahc";


//open the SQL connection to AHC server databases
// $connection = mysql_connect($servername, $username, $password) or die (mysql_error());

$connection=mysqli_connect ($servername, $username, $password);
            
            //return error if no connection
            if (!$connection){
                die("Connection failed: " . mysqli_connect_error());
            }
            //otherwise confirm success
            echo "<p>Server connected successfully</p>";




// Select Database and create var to hold the result of select db function

$db = mysqli_select_db($connection, $dbname); 

//return error if no connection
if (!$db){
    die("Connection failed: " . mysqli_connect_error());
}






// //#################################### QUERY 1  Password match #######################################

// create the sql statement

echo ("username = $_POST[username] <br>");
echo ("password = $_POST[password]<br>");

 $sql = "SELECT * FROM $table_name WHERE username = '$_POST[username]' AND password = '$_POST[password]'";



//execute the sql statement and create a variable you can use to display or work with it

$result = mysqli_query($connection, $sql);

if (!$result){
    die("<p style = 'color: red'>Connection failed: </p>" . mysqli_connect_error());
}

// check for number rows returned

$num = mysqli_num_rows($result);

echo "number of records found matching = $num";


echo "<p style = 'color: red'>Made it here!</p>";

// //echo "<br> num <br>";//??????????????????????? TESTING ONLY ??????????????????????????

// //var_dump($num);//??????????????????????? TESTING ONLY ??????????????????????????





// //################### New ######## QUERY 2 Get LEVEL of permission granted ######################

// $query2="SELECT * from $table_name WHERE username = '$_POST["username"]' AND password = password('$_POST["password"]')";



// // $result2=@mysql_query($query2) or die(mysql_error());



// // //permissions array

$perm_array=mysqli_fetch_array($result);



// // //get level of permission

$permission=$perm_array["member_type"];

echo "P up: ".$permission;





//get personal variables - add member to front of it to distinguish it in the session blob

$member_f_name=$perm_array["f_name"];

$member_l_name=$perm_array["l_name"];

$member_type=$permission;









// //echo"<br>permission<br>";//??????????????????????? TESTING ONLY ??????????????????????????

// //var_dump($permission);//??????????????????????? TESTING ONLY ??????????????????????????



//get user id#

$user_id = $perm_array["id"];



// echo"<br>user_id = ".$user_id;//??????????????????????? TESTING ONLY ??????????????????????????

// var_dump($user_id);//??????????????????????? TESTING ONLY ??????????????????????????






// //####################### IF PASSWORD MATCHES set session variables #####################################



// //if # returned is more than one then we have a winner!

if ($num > 0) {




// //                 //set session variables to say yes to authorized users



                 $_SESSION["auth"]="ok"; //set session cookie

                $auth = $_SESSION["auth"];



        echo"<br>auth<br>".$_SESSION["auth"];//????????????? TESTING ONLY ?????????????

        var_dump($auth);//??????????????????????? TESTING ONLY ??????????????????????????







// //################ set variable to give level of permissions throughout the site #################



                 $_SESSION["permission"]= $permission;

               $permission = $_SESSION["permission"];//??????????????????????? TESTING ONLY ??????????????????



               echo"<br> session[permission]<br>";//??????????????????????? TESTING ONLY ???????????????

               var_dump($permission);//??????????????????????? TESTING ONLY ??????????????????????????







// ################# SET variable TO ID THIS USER #################################################



                $_SESSION["user"]= $user_id;

               $user_id=$_SESSION["user"];//??????????????????????? TESTING ONLY ??????????????????



                echo"<br> session[user]<br>";//??????????????????????? TESTING ONLY ???????????????

                var_dump($user_id);//??????????????????????? TESTING ONLY ??????????????????????????



// //########################## SET VARIABLES FOR PERSONALIZATION #####################



                $_SESSION["member_f_name"]=$member_f_name;

                $_SESSION["member_l_name"]=$member_l_name;





// //#################### set session start timer ################################
// // 
                $_SESSION["timer_start"]= time();



// //################ set home page destination #######################



// //****************************!!!!!!!!!!!!!!!!!  THIS SHOULD WORK TO INDIVIDUALIZE PAGES - WHY NOT???!!!???!!!!!!!!!
$destination = "inside_index_".$permission.".php";



       echo "destination is $destination";//testing??????????????????????????????????????????????





// /*OLD WAY - WORKED!!!! ???????????????????????????????????????????????????????????????????????
// //SINCE YOU'RE OKAY... MOVE ALONG TO THE REAL INDEX PAGE...
//             header("Location: $destination");
//         exit;

        }//end big IF block
// */



// //NEW METHOD - IDEA IS TO PUT $destination IN SESSION AND HAVE INDEX RETRIEVE IT!



//                 // $_SESSION[destination]=$destination;







// //MAKE A JOURNAL ENTRY



// // $list_id=7;//Log in code

// // $now=time();

// // $table_name="activity_log";



// //   $sql2="INSERT INTO $table_name (id,user_id,list_id,time) VALUES ('','$user_id','$list_id','$now')";

// //   mysql_query($sql2)or die(mysql_error());




// // }//end big IF block





// /* DEBUGGING ????????????????????????????????????????????????????????????????????????

//                 else {


// //OTHERWISE... TRY AND LOGIN AGAIN IF YOU LIKE
//             header("Location: authenticate.htm");

//         exit;
//     }//end else



// */


?>
</body>

</html>
