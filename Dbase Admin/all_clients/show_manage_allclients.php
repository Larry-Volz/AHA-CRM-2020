<?



//#######################################################################################



//#                STRATEGY:                                                                                                                                                 #



//#                - $GET a variable from search box if it's there and do search if so                                #



//#                - with searches include a group by variable in the database definitions.                #



//#                  then write a function that does a seperate output box each time the grouped        #



//#                  field changes-use GROUP BY maybe to get group totals & nested loop for output #



//#                                                                                                                                                                                #



//#                                                                                                                                                                                #



//#                                                                                                                                                                                #



//#######################################################################################



//Get my class and methods



include_once("../../ahcDatabase_class.php");//drop the ../ if in root directory



//do include files



include_once("../../includes/classes_all_clients.php");

//connect to db



$acIncludes->dbConnect();



//do basic security check



$ahcDB->securityCheckBasic();



//start session

session_start();

//############################## DO LOG ENTRY ##############################################



//CONNECT TO DB

$ahcDB->dbConnect();// IF NOT ALREADY CONNECTED

//do log entry

$now=time();

//$list_id=30; //code for 'add a person' - PUT IN CORRECT CODE FOR PAGE!

//DO LOG ENTRY

//$ahcDB->logEntry($list_id);
//TABLE HELPER include file



?>



<html>

<head>



<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<title>Create a view</title>
 <script language = "JavaScript" type="text/javascript" src="../../includes/javas.js"></script>
<script language="JavaScript">

<!--

function FP_swapImg() {//v1.0

 var doc=document,args=arguments,elm,n; doc.$imgSwaps=new Array(); for(n=2; n<args.length;

 n+=2) { elm=FP_getObjectByID(args[n]); if(elm) { doc.$imgSwaps[doc.$imgSwaps.length]=elm;

 elm.$src=elm.src; elm.src=args[n+1]; } }

}



function FP_preloadImgs() {//v1.0

 var d=document,a=arguments; if(!d.FP_imgs) d.FP_imgs=new Array();

 for(var i=0; i<a.length; i++) { d.FP_imgs[i]=new Image; d.FP_imgs[i].src=a[i]; }

}



function FP_getObjectByID(id,o) {//v1.0

 var c,el,els,f,m,n; if(!o)o=document; if(o.getElementById) el=o.getElementById(id);

 else if(o.layers) c=o.layers; else if(o.all) el=o.all[id]; if(el) return el;

 if(o.id==id || o.name==id) return o; if(o.childNodes) c=o.childNodes; if(c)

 for(n=0; n<c.length; n++) { el=FP_getObjectByID(id,c[n]); if(el) return el; }

 f=o.forms; if(f) for(n=0; n<f.length; n++) { els=f[n].elements;

 for(m=0; m<els.length; m++){ el=FP_getObjectByID(id,els[n]); if(el) return el; } }

 return null;

}

// -->

</script>
<body>

<body onload="FP_preloadImgs(/*url*/'../../images/button_view.jpg', /*url*/'../../images/button_view2.jpg')"><!--msnavigation--><table dir="ltr" border="0" cellpadding="0" cellspacing="0" width="100%"><tr><!--msnavigation--><td valign="top">

<table dir="ltr" border="0" cellpadding="0" cellspacing="0" width="100%">

<tr><!--msnavigation-->

<td valign="top">

<a href="show_createview.php"><img border="0" id="img1" src="../../images/button_view.jpg" height="20" width="100" alt="Add a Client" onmouseover="FP_swapImg(1,0,/*id*/'img1',/*url*/'../../images/button_view2.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img1',/*url*/'../../images/button_view.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img1',/*url*/'../../images/button_view2.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img1',/*url*/'../../images/button_view2.jpg')" fp-style="fp-btn: Jewel 1" fp-title="Add a Client"></a>

<p><font size="6">All Clients Database:&nbsp; Manage Views</font></p>



<hr>

<br>



<?

//require_once('../../../FORMfields/tableHelpers.php');



//instantiate class



// $table2 = new TableSet();







//    $table2->enableSort = true;

 include("../../includes/view_settings.inc.php");
 include "../../includes/mysql.inc.php";
 $cdb_view1= new class_mysql;
 include "../../includes/functions.inc.php";










 $view_sql = "";

 $view_sql .= "SELECT CONCAT('<a href=\"show_createview_edit.php?idview=',$view_sql_table.id,'\">','Edit','</a>') AS 'Edit'";

 $view_sql .=" ,CONCAT('<a href=\'javascript: void confirmare(\"Confirm deletion ?\", \"do_deleteview.php?idview=',$view_sql_table.id,'\" ); \'>','Delete','</a>') AS 'Delete' ";

 $view_sql.=  " ,$view_sql_table.viewName as ViewName, CONCAT( $modified_by_table.f_name ,' ',$modified_by_table.l_name ) as 'Created By' ";

 $view_sql.=  " ,$view_sql_table.id as '' ";
 $view_sql.=  " FROM $view_sql_table LEFT JOIN $modified_by_table  ";
 $view_sql.=  " ON  $view_sql_table.user_id=$modified_by_table.id "." ";

 $view_sql .="ORDER BY $view_sql_table.viewName ";
//echo   $view_sql;

 $cdb2= new class_mysql;

 $cdb2->select($view_sql);









 echo "<TABLE cellpadding='5'  cellspacing='0' align='left' style='font-family: Verdana; font-size: 12px; background-repeat: repeat-x;' ><TR>";


 while( $fields = $cdb2->fetchField()  )

 echo "<TD style='background-image: url(../../images/table_header.gif); height: 24px;' ><b>".$fields->name."</b></TD>";



 echo "</tr>";


 $cdb2->select($view_sql);
 $i=0;

 while ( $line=$cdb2->fetchArray() )

 {

 if (!GetViewPerms($line[4],$view_sql_table)) continue;

 ($i++ % 2)? $bg="#ffffff" : $bg="#F0F0F0";
 echo " <TR>

         <TD align='left'  bgcolor='$bg' style='border: 1px #DDDDDD solid; padding: 10px;'>".$line[0]."&nbsp;</TD>

         <TD  align='left'   bgcolor='$bg' style='border: 1px #DDDDDD solid; padding: 10px;'>".$line[1]."&nbsp;</TD>

         <TD   align='left'  bgcolor='$bg' style='border: 1px #DDDDDD solid; padding: 10px;'>".$line[2]."&nbsp;</TD>

         <TD   align='left'  bgcolor='$bg' style='border: 1px #DDDDDD solid; padding: 10px;' colspan='2'>".$line[3]."&nbsp;</TD>

        </TR   align='left'  bgcolor='$bg' style='border: 1px #DDDDDD solid; padding: 10px;'>";

 }

 echo " </TABLE>";



















//$table2->loadQuery($viewQuery);



//call method to make table and echo to browser







//echo $table2->getTableTag();





?>



</td>

</tr>

</body>

</html>
