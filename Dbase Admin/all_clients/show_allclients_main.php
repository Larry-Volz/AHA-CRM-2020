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

$list_id=30; //code for 'add a person' - PUT IN CORRECT CODE FOR PAGE!



//DO LOG ENTRY

$ahcDB->logEntry($list_id);



//------------------------------ END LOG ENTRY --------------------------------------------------



//########################## if current view isn't set then set it ##################################



/* ################# RE-VISIT THIS:  SET SO SESSION KEEPS IT WHEN RETURNING ????????????????????????

if (!isset($_SESSION[current_view])){

  $_SESSION[current_view]="1";//id for leads by sales stage (default)

  $current_view=1;

}else{

  if($_POST['choose_view']!=""){

    $current_view=$_POST['choose_view'];

    $_SESSION[current_view]=$current_view;

}//end else

  $current_view=$_SESSION[current_view];

}// end check-in with the session variables



*/

   if(!isset($_POST['choose_view'])){





       $current_view=1;// DEFAULT VIEW if no choice made



 }else{



      $current_view=$_POST['choose_view']; //else use what the person chose

}


 include("../../includes/view_settings.inc.php");
 include "../../includes/mysql.inc.php";
 $cdb_view1= new class_mysql;
 include "../../includes/functions.inc.php";
 include "../../includes/a123z.class.php";






//####################### Make HTML select box of views to output view options ######################################






// (Retrieves the views from table called all_clients_views)



$desc_table="all_clients_views";

$select_box_name="choose_view";

$field_name="queryString";

         $chooseViewSelectBox="<select name = \"".$select_box_name."\">";

        //get all descriptions

        $query1 = "SELECT * FROM $desc_table ORDER BY `default` desc, `viewName` asc ";

        $results1 = mysql_query($query1);// or die(mysql_error())
    //    echo mysql_error();
          //start looping through descriptions one by one

                while ($descriptions = mysql_fetch_array($results1)){

                          $view_id = $descriptions['id'];

                           if (!GetViewPerms($view_id,$view_sql_table)) continue;

                          $desc = $descriptions['viewName'];

                          $queries = $descriptions['queryString'];

                                  $chooseViewSelectBox .= "<option value = \"".$view_id."\"";

                                        if ($current_view == $view_id){//if this choice is one of those selected...

                                        //        $msg .= "\$choice_id = $choice_id and \$id = $id -> Match!<br><br>"; //testing??????????????

                                                          $chooseViewSelectBox .= " selected";

                                                          $viewQuery=$queries;

                                                }//end of if statement

                                          $chooseViewSelectBox .= ">".$desc."</option>";

                  }//end OUTER while loop

        $chooseViewSelectBox .= "</select>";

// ######################### CHECK TO SEE IF SEARCH FIELD SENT A QUERY ##################

//from do_client_lookup.php...

//**** IF Search field DID send a query then create this long output/search ****

if ($_GET[search_string])        {

//  echo "<h1> Get[search_string]= {$_GET[search_string]}<br> and Get[search_field]=$_GET[search_field]</h1>";

        $search_string= $_GET[search_string];
        $search_field=$_GET[search_field];

          $viewQuery="SELECT CONCAT('<a href=\"show_single_client.php?client_id=',client_id,'\">','View','</a>') AS 'View',

        CONCAT('<a href=\"show_modclient.php?client_id=',client_id,'\">','Edit','</a>') AS 'Edit',

        FROM_UNIXTIME(all_clients.sales_contact_next,'%M %D %Y %h:%i:%s') AS contact_next,

        desc_sales_categories.description AS sales_category,

        all_clients.f_name,

        all_clients.l_name,

        all_clients.prim_tel,

        all_clients.sec_tel,

        all_clients.mob_tel,

        desc_primary_goal.description AS primary_goal,

        FROM_UNIXTIME(all_clients.created,'%M %D %Y') AS created,

        FROM_UNIXTIME(all_clients.modified,'%M %D %Y') AS modified,

        auth_users.f_name AS rec_man_f_name,

        auth_users.l_name AS rec_man_l_name



        FROM all_clients, desc_sales_stage, auth_users, desc_primary_goal, desc_sales_categories



        WHERE desc_sales_stage.id=all_clients.sales_stage

        AND all_clients.record_manager=auth_users.id

        AND desc_primary_goal.id=all_clients.primary_goal

        AND desc_sales_categories.id=all_clients.sales_category



        AND $search_field LIKE '$search_string'



        ORDER BY all_clients.l_name";

}



// ########################### CREATE TABLE WITH tableHelpers.php ########################


//TABLE HELPER include file

require_once('../../../FORMfields/tableHelpers.php');

//instantiate class

//    $table2 = new TableSet();

//    $table2->enableSort = true;


//$table2->loadQuery($viewQuery);


// ########################################### end PHP ########################################################

?>

<html>

<head>

<meta http-equiv="Content-Language" content="en-us">

<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<title>New Page 1</title>

<meta name="GENERATOR" content="Microsoft FrontPage 6.0">

<meta name="ProgId" content="FrontPage.Editor.Document">

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

<script language='javascript' src='../../includes/calendarpopup.js' type="text/javascript"></script>
<meta name="Microsoft Border" content="r, default">
</head>



<body onload="FP_preloadImgs(/*url*/'../../images/button11.jpg', /*url*/'../../images/button12.jpg', /*url*/'../../images/button19.jpg', /*url*/'../../images/button1A.jpg', /*url*/'../../images/button13.jpg', /*url*/'../../images/button14.jpg')"><!--msnavigation--><table dir="ltr" border="0" cellpadding="0" cellspacing="0" width="100%"><tr><!--msnavigation--><td valign="top">



<link rel="stylesheet" type="text/css" href="../../../FORMfields/tableHelpers.css" />





<table border="0" width="100%" id="table1">

        <tr>

                <td width="100" valign="top"><a href="show_addclient.php">

                <img border="0" id="img1" src="../../images/button10.jpg" height="20" width="100" alt="Add a Client" onmouseover="FP_swapImg(1,0,/*id*/'img1',/*url*/'../../images/button11.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img1',/*url*/'../../images/button10.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img1',/*url*/'../../images/button12.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img1',/*url*/'../../images/button11.jpg')" fp-style="fp-btn: Jewel 1" fp-title="Add a Client"></a></td>

                <td  valign="top">
                
                <!--<a href="show_advancedview"><img border="0" id="img3" src="../../images/button15.jpg" height="20" width="100" alt="Adv. Search" fp-style="fp-btn: Jewel 1" fp-title="Adv. Search" onmouseover="FP_swapImg(1,0,/*id*/'img3',/*url*/'../../images/button13.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img3',/*url*/'../../images/button15.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img3',/*url*/'../../images/button14.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img3',/*url*/'../../images/button13.jpg')"></a>-->
                </td>

                <td valign="top">
                
                <?
                // echo "test=".$_SESSION['permission'];   
                
                if ( $_SESSION['permission'] == "god" ) 
                {
                
                ?>
                <a href="show_manage_allclients.php"><img border="0" id="img2" src="../../images/button18.jpg" height="20" width="100" alt="Manage" onmouseover="FP_swapImg(1,0,/*id*/'img2',/*url*/'../../images/button19.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img2',/*url*/'../../images/button18.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img2',/*url*/'../../images/button1A.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img2',/*url*/'../../images/button19.jpg')" fp-style="fp-btn: Jewel 1" fp-title="Manage"></a>
                <?
                }
                ?>


                </td>



                <td width="394">



                </td>

        </tr>

</table>

<p><font size="5">All Clients</font><hr></p>



<form method="POST" action="show_allclients_main.php">

<table border="0" width="850" id="table2">

        <tr>

                <td>



                <? echo "$chooseViewSelectBox"; ?><br><input type="submit" name="Change View" value="Change View" >



                </td>

                <td></td>

                <td>

        </form>

        <form method="GET" action="<?=$_SERVER['PHP_SELF']?>" enctype="application/x-www-form-urlencoded">



                <p align="right">Find <input type="text" name="search_string" size="18"> in

                        <select name="search_field" size="1" >
                        <?=
                         $cdb5= new class_mysql;
                         $sql="select * from $view_sql_table where `default`=1 LIMIT 1 ";
                         $cdb5->select($sql);
                         $default=$cdb5->FetchArray();
                         $default_id = $default['id'];

                         if (!empty($_POST["$select_box_name"]))    $id_current_view=$_POST["$select_box_name"];


                         else                                       $id_current_view=$default_id;

                         if (!empty($_GET['id_current_view']))      $id_current_view=$_GET["id_current_view"];

                         if (!GetViewPerms($id_current_view,$view_sql_table)) exit;


                         $cdb3= new class_mysql;                        
                         $sql="select * from $view_sql_table where id=$id_current_view ";

                         // echo $sql;
                         $cdb3->select($sql);
                         $view = $cdb3->FetchArray();                        
                         
                         $arr1=array();
                         $arr1= explode(";",$view['all_or_some_records']);  
                         $fields_arr_alias = array_flip($fields_arr);
                                       
                       //  $sel_arr=array();
                         foreach ($arr1 as $key=>$value )
                         if (!empty($value))
                         {
                         echo "<option value='$fields_arr_alias[$value]' >".$value."</option>";
                         
                         }      
                         
                          
                                       
                         ?>
                         </select>



                        <br><input type="submit" value="Submit" name="search">



                        &nbsp;</p>

                </form>



                </td>

        </tr>

</table>







        <?

 //call method to make table and echo to browser
 //      echo $table2->getTableTag();

 
 
   
     //--------------------------end search sql add-on 
 


      switch ($_GET['intermediate'])
      {

      case "":
      $cdb5= new class_mysql;
      $sql="select * from $view_sql_table where `default`=1 LIMIT 1 ";
      $cdb5->select($sql);
      $default=$cdb5->FetchArray();
      $default_id = $default['id'];

      if (!empty($_POST["$select_box_name"]))    $id_current_view=$_POST["$select_box_name"];



      else                                       $id_current_view=$default_id;

      if (!empty($_GET['id_current_view']))      $id_current_view=$_GET["id_current_view"];

      if (!GetViewPerms($id_current_view,$view_sql_table)) exit;


      $cdb3= new class_mysql;
      $cdb2= new class_mysql;
      $sql="select * from $view_sql_table where id=$id_current_view ";

     // echo $sql;
      $cdb3->select($sql);
      $view = $cdb3->FetchArray();
      
      
      if ($_GET['search_string'])
      {
      
      $value="";
      $value=$_GET['search_field'];
      include "../../includes/format_fields.inc.php";
                  
      $sql_add  = " WHERE $value LIKE '%$_GET[search_string]%' AND ";
      
    //  echo  $sql_add;

      $view["queryString"] = str_replace('WHERE',$sql_add,$view["queryString"]);      
      }
      



      if ( ($view['intermediate_screen']=='1') && ( empty($_GET['field_type']) )  )
      // checking if intermdiate type view and for intermediate variables
      {
      meta_redirect($_SERVER['PHP_SELF']."?id_current_view=$id_current_view&intermediate=1",0);
      exit;
      }
      elseif ( ($view['intermediate_screen']=='1') && ( !empty($_GET['field_type']) )  )
      {



      switch ($view['viewName'])
        {
            case "A1 - Affiliate Sales":

          //  echo "INTRA";
            $sql_add  = " WHERE FROM_UNIXTIME( $view[intermediate_field] ,'%Y-%m-%d') >= '".date("Y-m-d",strtotime("$_GET[year]-$_GET[month]-1"))."' AND ";
            $sql_add .= " FROM_UNIXTIME( $view[intermediate_field],'%Y-%m-%d') < DATE_ADD('".date("Y-m-d",strtotime("$_GET[year]-$_GET[month]-1"))."', INTERVAL 1 MONTH ) AND  ";

            //echo  $sql_add;
            $view["queryString"] = str_replace('WHERE',$sql_add,$view["queryString"]);
            break;



            case "A3 - No Affil Avail - for various dates":

         

          //  $sql_add  = " WHERE FROM_UNIXTIME( $view[intermediate_field] ) >= '$_GET[start_date]'  AND ";
            if (empty($_GET['end_date']))
            $sql_add  = " WHERE FROM_UNIXTIME($view[intermediate_field],'%Y-%m-%d') = '".date("Y-m-d",strtotime("$_GET[start_date]"))."'  AND ";
            else
            {
            $sql_add  = " WHERE FROM_UNIXTIME( $view[intermediate_field] ,'%Y-%m-%d') >= '".date("Y-m-d",strtotime("$_GET[start_date]"))."'  AND ";
            $sql_add  .= " FROM_UNIXTIME( $view[intermediate_field],'%Y-%m-%d') <='".date("Y-m-d",strtotime("$_GET[end_date]"))."'  AND ";
            }
            $view["queryString"] = str_replace('WHERE',$sql_add,$view["queryString"]);

          //  echo $view["queryString"]; 
          //  echo "Intra";
           /// exit;
            
            
            break;

            case "A4 Modified - for various employees":
            case "Recently Modified":

            $sql_add  = " WHERE modified_by IN ";
            $arr=$_GET['user_id'];

            $val1 ="(";
            foreach ($arr as $key=>$value)
            {
            $val1  .= "$value,";
            }
            $val1.="0) AND ";
            $sql_add.=$val1;
            $view["queryString"] = str_replace('WHERE',$sql_add,$view["queryString"]);

            break;

            case "M1 - Mktg - Referred by":
            case "M2 - Mktng - Refrd by":
            case "M3 - Mktg - Rfrd by":

            if (empty($_GET['end_date']))
            $sql_add  = " WHERE FROM_UNIXTIME( $view[intermediate_field],'%Y-%m-%d') = '".date("Y-m-d",strtotime("$_GET[start_date]"))."'  AND ";
            else
            {
            $sql_add  = " WHERE FROM_UNIXTIME( $view[intermediate_field],'%Y-%m-%d') >= '".date("Y-m-d",strtotime("$_GET[start_date]"))."'  AND ";
            $sql_add  .= " FROM_UNIXTIME( $view[intermediate_field],'%Y-%m-%d') <='".date("Y-m-d",strtotime("$_GET[end_date]"))."'  AND ";
            }

            $sort_add = " ORDER BY $_GET[sort] $_GET[sort_type]";

            $view["queryString"] = str_replace('WHERE',$sql_add,$view["queryString"]);
            
            if (strpos(" ".$view["queryString"],"ORDER BY")>0 ) $max=strpos($view["queryString"],"ORDER BY")-1;
            else                                                $max=strlen($view["queryString"]);
                                                                  
            $view["queryString"] = substr($view["queryString"],0,$max ) ;
            $view["queryString"] .= $sort_add;

                
            break;

            case "S6 - New Sales":
            case "S9 - New Sales":

            if (empty($_GET['end_date']))
            $sql_add  = " WHERE FROM_UNIXTIME( financial.date_sold,'%Y-%m-%d' ) = '".date("Y-m-d",strtotime("$_GET[start_date]"))."'  AND ";
            else
            {
            $sql_add  = " WHERE FROM_UNIXTIME( financial.date_sold,'%Y-%m-%d' ) >= '".date("Y-m-d",strtotime("$_GET[start_date]"))."'  AND ";
            $sql_add  .= " FROM_UNIXTIME( financial.date_sold,'%Y-%m-%d' ) <='".date("Y-m-d",strtotime("$_GET[end_date]"))."'  AND ";
            }
            //$view["queryString"] = str_replace('WHERE',$sql_add,$view["queryString"]);

            $sql_add  .= " record_manager IN ";
            $arr=$_GET['user_id'];

            $val1 ="(";
            foreach ($arr as $key=>$value)
            {
            $val1  .= "$value,";
            }
            $val1.="0) AND ";
            $sql_add.=$val1;
            $view["queryString"] = str_replace('WHERE',$sql_add,$view["queryString"]);
            break;




        }


      }
      


      
      
//********************************Listing generation******************************************************
   //   echo  $view["queryString"];
   //   exit;
   
    
   
           function  generate_total_subtotal_table($view,&$view1)
           {
                GLOBAL $total_arr_fields,$fields_arr,$table_field_arr,$view_table,$view_sql_table, $desc_sales_categories_table,$sales_stage_table,$referred_by_table,$client_flags_table,$primary_goal_table,$therapist_table,$action_table,$modified_by_table,$financial_table,$date_fields;      
               $arr_subtotal1=array();
               $arr_subtotal =array();
               $arr_total = array();
               $group_arr = array();
               $arr_subtotal1=explode(";",$view['subtotal']); 
               $arr_total=explode(";",$view['total']); 
               
               $arr_diff = array_diff($arr_total, $arr_subtotal1); 
               $arr_subtotal = array_merge($arr_subtotal1, $arr_diff); 

               
               $group_by="";  
               $cdb_group = new class_mysql();
               
               //********* eliminate select  clause  and insert the new one
               $view["queryString"]=substr($view["queryString"],strpos($view["queryString"],"FROM "),strlen($view["queryString"]));
               
               
               if (strpos(" ".$view["queryString"],"ORDER BY")>0)
               $view["queryString"]=substr($view["queryString"],0,strpos($view["queryString"],"ORDER BY"));  
               
               
           
               
               $sql_striped = $view["queryString"];
               
               $sel="SELECT CONCAT(";
               
               $group_arr= array($view['group_by1'],$view['group_by2'],$view['group_by3']);
               
               $i=1;
               foreach ($group_arr as $key=>$value)
               {
               include "../../includes/format_fields.inc.php";    
               $view["group_by$i"]=$value;
               $i++;
               }
               
           //    $date_fields             $group_arr
              
              
               $date_fields_reverse=array_flip($date_fields); 
               if (!empty($view['group_by1'])) 
               {
                   if(in_array($group_arr[0],$date_fields_reverse))  
                   $sel.=" FROM_UNIXTIME( $view[group_by1] ,'%M %D %Y %h:%i:%s') ";  
                   else 
                   $sel.="$view[group_by1]";   
               }
               if (!empty($view['group_by2']))
               {
                   if(in_array($group_arr[1],$date_fields_reverse))  
                   $sel.=",' - ', FROM_UNIXTIME( $view[group_by2] ,'%M %D %Y %h:%i:%s') ";  
                   else 
                   $sel.=",' - ', $view[group_by2]";              
               }  
               if (!empty($view['group_by3']))
               {
                   if(in_array($group_arr[2],$date_fields_reverse))  
                   $sel.=",' - ', FROM_UNIXTIME( $view[group_by3] ,'%M %D %Y %h:%i:%s') ";  
                   else 
                   $sel.=",' - ', $view[group_by3]";                
               }
      
               
               $txt="";
               
              // print_r($group_arr);
               if (!empty($view['group_by1']))   $txt .= $fields_arr[$group_arr[0]];
               if (!empty($view['group_by2']))   $txt .= " - ".$fields_arr[$group_arr[1]]; 
               if (!empty($view['group_by3']))   $txt .=" - ".$fields_arr[$group_arr[2]]; 
               
               $sel.=") as '$txt' , CONCAT('','') AS '' ";
               $sel .= ", count(*) as 'Nr of items' ";
               
               foreach  ($arr_subtotal as $key=>$value)
               {
                if( (!empty($value)) && ( in_array($value,$arr_subtotal1) ) ) $sel.=",sum($value) as '".$total_arr_fields[$value]."' ";
                elseif ( (!empty($value)) && ( !in_array($value,$arr_subtotal1) ) )
                
                $sel.=", Concat('','') as '".$total_arr_fields[$value]."' "; 
                
                
               }
               
               $view["queryString"]=$sel.$view["queryString"];
               
               //*********END  eliminate select  clause
               
               
               
               //**********************generate and insert group by clause
               $group_by.=" GROUP BY";
               if (!empty($view['group_by1']))  $group_by.=" $view[group_by1] $view[asc_or_desc_groupby1]";
               if (!empty($view['group_by2']))  $group_by.=", $view[group_by2] $view[asc_or_desc_groupby1]";
               if (!empty($view['group_by3']))  $group_by.=", $view[group_by3] $view[asc_or_desc_groupby1]";
               $view["queryString"].=$group_by;
               
               //**********************END generate and insert group by clause 
               
              //  echo  $view["queryString"];  
               
               // exit;
               

               
               $cdb_group->select($view["queryString"]) ;


               

               $fields_num=$cdb_group->getFields();

               $html2= "<TABLE cellpadding='1'  cellspacing='0' align='left' style='font-family: Verdana; font-size: 10px; ' >";
               $html2.= "<TR>";

               $ttt=0;
               while( $fields = $cdb_group->fetchField()  )
               {
               $html2.= "<TD style='background-image: url(../../images/table_header.gif); height: 22px; background-repeat: repeat-x;' ><b>".$fields->name."</b></TD>";
               $ttt++;
               }
               $html2.= "</TR>";     
               
                  
               
               while ( $line=$cdb_group->fetchArray() )

                  {
                           $html2.= "<TR>";
                         // if (!GetViewPerms($line[4],$view_sql_table)) continue;

                          ($i++ % 2)? $bg="#ffffff" : $bg="#F0F0F0";

                          for ($j=0;$j<$fields_num;$j++)
                          {
                              if ($j==1)  
                              $html2.="<TD align='left'  bgcolor='$bg' style='border: 1px #DDDDDD solid; padding: 2px;'><b>Subtotals</b></TD>"; 
                              else
                              {
                              if ( is_numeric(stripslashes($line[$j])) && ($j>2) )  $line[$j]= number_format(stripslashes($line[$j]),2,".",",");
                              else  $line[$j]=$line[$j];
                              
                              $html2.="<TD align='left'  bgcolor='$bg' style='border: 1px #DDDDDD solid; padding: 2px;'>".$line[$j]."&nbsp;</TD>";
                              }
                          }
                         $html2.= "</TR>";       
                  }                      
              

              
              $total_sel="SELECT CONCAT('','') as '', CONCAT('','') as '', COUNT(*) ";
              foreach  ($arr_subtotal as $key=>$value)
              {
                if( (!empty($value)) && ( in_array($value,$arr_total) ) ) $total_sel.=",sum($value) as '".$total_arr_fields[$value]."' ";
                elseif ( (!empty($value)) && ( !in_array($value,$arr_total) ) )
                
                $total_sel.=", Concat('','') as '".$total_arr_fields[$value]."' "; 
                
                
              }

              
              $sql_striped=$total_sel.$sql_striped;
              
            //  $sql_striped=substr($sql_striped,0,strpos($sql_striped,"GROUP BY"));
             // $sql_striped.=" GROUP BY all_clients.client_id "; 
              
              $cdb_group->select($sql_striped);
              $totals = array();
              
              for ($i=0;$i<$fields_num;$i++)
              $totals[$i]=0;
        
                           
      
  
              while ( $line=$cdb_group->fetchArray() )

                  {
                          for ($j=0;$j<$fields_num;$j++)
                          {
                             $totals[$j]+=$line[$j];
                          }
                  }   
                  
              $totals[0]="";
              $totals[1]="<b>Totals</b>";
              
            //  print_r($totals);
              
              $html2.="<tr>";
              $i=0;
              foreach ($totals as $key=>$value)
              {
                  if ( ($value<1)&& (is_numeric($value)) ) $value="&nbsp;";
                  if ( ($i>2) && is_numeric($value) ) $value= number_format($value,2,".",",");
                  
                  $html2 .= "<TD align='left'  bgcolor='#FFFFFF' style='border: 1px #DDDDDD solid; padding: 2px;'><b>".$value."</b></td>";
              $i++;
              }
              $html2.="</tr>"; 
              
              $html2 .= "<tr><td colspan='50'>&nbsp;</td></tr></table>";
            
              echo   $html2;
              

              
           }

     
      if ( (!empty($view['group_by1'])) || (!empty($view['group_by2'])) || (!empty($view['group_by3']))  )                          generate_total_subtotal_table($view,$view1);    

      $cdb2->select($view["queryString"]);
       


      $fields_num=$cdb2->getFields();

      $html1= "<TABLE cellpadding='5'  cellspacing='0' align='left' style='font-family: Verdana; font-size: 12px; ' >";
      $html2= "<TR>";

      $ttt=0;
      while( $fields = $cdb2->fetchField()  )
      {
      $html2.= "<TD style='background-image: url(../../images/table_header.gif); height: 35px; background-repeat: repeat-x;' ><b>".$fields->name."</b></TD>";
      $ttt++;
      }
      $html2.= "</TR>";


      $cdb2->select($view["queryString"]);

      $nr_rez=$cdb2->GetRecords();


      if (!isset($_GET['page']))  $_GET['page']=1;

      $a123z                 = new a123z();
      $a123z->total          = $nr_rez;

      $a123z->max=20;

      $a123z->url="show_allclients_main.php?id=1&id_current_view=$id_current_view";

      foreach ($_GET as $key=>$value) $a123z->url.="&$key=$value";
   //   foreach ($_POST as $key=>$value) $a123z->url.="&$key=$value";


      $a123z->page     = $_GET['page']; // variable represents the current page.

      $a123z->template = array(  // menu template
                                                                  'First'                  => '<a href=[URL]&page=1  class=link_box2_red_big >&lt;&lt; First</a>&nbsp;&nbsp;',                             // First page link
                                                                  'Previous'        => '<a href=[URL]&page=[PAGE_P] class=link_box2_red_big  >&lt; Previous</a>&nbsp;&nbsp;&nbsp;',            // Previous page link
                                                                  'Page'                => '<a href=[URL]&page=[PAGE] class=link_box2_red_big >[PAGE]</a>&nbsp;',                                            // Pages numbers link
                                                                  'CurPage'                => '<font class=link_box2_black >[CurPAGE]</font>&nbsp;',                                                                     // Current Page Link
                                                                  'Next'                => '&nbsp;&nbsp;&nbsp;<a href=[URL]&page=[PAGE_N] class=link_box2_red_big  >Next &gt;</a>',                        // Next page link
                                                                  'Last'                => '&nbsp;&nbsp;<a href=[URL]&page=[PAGE_L] class=link_box2_red_big >Last &gt;&gt;</a>'                       // Last page link
                                                                  
                                                         
                                                                  );

      $start=0;
      $end=0;
      if ( ($a123z->page==1)||(empty($a123z->page)) )
           {
           $start=0;
           $end=$a123z->max;
           }
      else
           {
           $start=intval( ($a123z->page-1)*$a123z->max) ;
           $end=intval($a123z->max);
           }



      $output= $a123z->output()."&nbsp;&nbsp;&nbsp;&nbsp;<a href='".$a123z->url."&page=&all=yes&class=link_box2_red_big' >Show All</a>&nbsp;&nbsp;";
      
      


      //echo  $view["queryString"];
     //  exit;
     $view1["queryString"].=$view["queryString"];
     if($_GET['all']!="yes")  $view1["queryString"].=" LIMIT $start,$end ";

      // echo $view1["queryString"];

      //  exit;
      $cdb2->select($view1["queryString"]);

      echo $htm1."<TR><TD align='left'  colspan='$ttt' bgcolor='#F0F0F0' style='border: 1px #DDDDDD solid; padding: 10px;font-family: Verdana; font-size: 12px;'><b>View name: $view[viewName]<br>Results: $nr_rez</b>&nbsp;&nbsp;&nbsp;$output</TD></TR><table><TABLE cellpadding='5'  cellspacing='0' align='left' style='font-family: Verdana; font-size: 12px; ' >".$html2;


      if($nr_rez>0)
      {
        
          
                  while ( $line=$cdb2->fetchArray() )

                  {
                           echo "<TR>";
                         // if (!GetViewPerms($line[4],$view_sql_table)) continue;

                          ($i++ % 2)? $bg="#ffffff" : $bg="#F0F0F0";

                          for ($j=0;$j<$fields_num;$j++)
                          echo "<TD align='left'  bgcolor='$bg' style='border: 1px #DDDDDD solid; padding: 10px;'>".stripslashes($line[$j])."&nbsp;</TD>";

                          echo "</TR>";
                  }

            


                  echo "<TR><TD align='left'  colspan='100' bgcolor='#F0F0F0' style='border: 1px #DDDDDD solid; padding: 10px;'><b>Results: $nr_rez</b>&nbsp;&nbsp;&nbsp;$output</TD></TR></TABLE>";



     }
     
//********************************END Listing generation******************************************************      

     break;

     case "1":   // intermediate page code


     $cdb3= new class_mysql;
     $cdb4 = new class_mysql;
     $sql="select * from $view_sql_table where id=$_GET[id_current_view] ";
     $cdb3->select($sql);
     $view =$cdb3->fetchArray();

     if ($view['viewName']=="A1 - Affiliate Sales")
     {

         $sel= "<select name='month'>";
         for  ($i=1;$i<=12;$i++)
         {
         $sel.= "<option value='$i'>".date("F", strtotime("2006-$i-1"))."</option>";
         }
         $sel.= "</select>";

         $type="month";
         $text="Choose month/year";
         $sel.= "&nbsp;<select name='year'><option value='".date("Y")."'>".date("Y")."</option>";
         for ($i=2005;$i<=date("Y");$i++)
         {
         $sel.= "<option value='$i'>$i</option>";
         }
         $sel.= "</select>";
     }

     if ($view['viewName']=="A3 - No Affil Avail - for various dates")
     {
         $type="period";
         $start_date = '
                                 <SCRIPT LANGUAGE="JavaScript" ID="js1">
                                 var cal1 = new CalendarPopup();
                                 cal1.setReturnFunction("setMultipleValues1");
                                 function setMultipleValues1(y,m,d) {
                                      document.field.start_date.value=y+"-"+m+"-"+d;
                                      }
                                 </SCRIPT>';

         $start_date.="<INPUT TYPE=\"text\"  NAME=\"start_date\" VALUE=\"\"  READONLY>
                        <A HREF=\"#\" onClick=\"cal1.showCalendar('anchor1'); return false;\" TITLE=\"cal1.showCalendar('anchor1'); return false;\" NAME=\"anchor1\" ID=\"anchor1\">
                        <img  src='../../images/calendar_mic.gif' style='vertical-align: top;' border='0' width='25' height='20' hspace='0' vspace='0' alt='Select date'></A>";

          $end_date = '
                                 <SCRIPT LANGUAGE="JavaScript" ID="js2">
                                 var cal2 = new CalendarPopup();
                                 cal2.setReturnFunction("setMultipleValues2");
                                 function setMultipleValues2(y,m,d) {
                                      document.field.end_date.value=y+"-"+m+"-"+d;
                                      }
                                 </SCRIPT>';
         $end_date.="<INPUT TYPE=\"text\"  NAME=\"end_date\" VALUE=\"\"  READONLY>
                        <A HREF=\"#\" onClick=\"cal2.showCalendar('anchor2'); return false;\" TITLE=\"cal2.showCalendar('anchor2'); return false;\" NAME=\"anchor2\" ID=\"anchor2\">
                        <img  src='../../images/calendar_mic.gif' style='vertical-align: top;' border='0' width='25' height='20' hspace='0' vspace='0' alt='Select date'></A>";

         $text="Enter start/end date(<sup>Leave empty second field if the filter criteria is only for a specific day</sup>)";


     }


     if (($view['viewName']=="A4 Modified - for various employees")or($view['viewName']=="Recently Modified"))
     {
         $type="id";
         $text="Choose employee(<sup>Use Ctrl for multiple selection</sup>)";



         $sql= "select * from auth_users order by  f_name";
         $cdb4->select($sql);
         $sel= "<select name='user_id[]' MULTIPLE style='height: 200px; width: 150px'>";

         while ($user=$cdb4->FetchArray())
         {
         $sel.= "<option value='$user[id]'>".$user['f_name']." ".$user['l_name']."</option>";
         }

         $sel.= "</select>";


     }

     if ( ($view['viewName']=="M1 - Mktg - Referred by")or($view['viewName']=="M2 - Mktng - Refrd by" )or($view['viewName']=="M3 - Mktg - Rfrd by") )
     {

         $type="period";
         $start_date = '
                                 <SCRIPT LANGUAGE="JavaScript" ID="js1">
                                 var cal1 = new CalendarPopup();
                                 cal1.setReturnFunction("setMultipleValues1");
                                 function setMultipleValues1(y,m,d) {
                                      document.field.start_date.value=y+"-"+m+"-"+d;
                                      }
                                 </SCRIPT>';

         $start_date.="<INPUT TYPE=\"text\"  NAME=\"start_date\" VALUE=\"\"  READONLY>
                        <A HREF=\"#\" onClick=\"cal1.showCalendar('anchor1'); return false;\" TITLE=\"cal1.showCalendar('anchor1'); return false;\" NAME=\"anchor1\" ID=\"anchor1\">
                        <img  src='../../images/calendar_mic.gif' style='vertical-align: top;' border='0' width='25' height='20' hspace='0' vspace='0' alt='Select date'></A>";

          $end_date = '
                                 <SCRIPT LANGUAGE="JavaScript" ID="js2">
                                 var cal2 = new CalendarPopup();
                                 cal2.setReturnFunction("setMultipleValues2");
                                 function setMultipleValues2(y,m,d) {
                                      document.field.end_date.value=y+"-"+m+"-"+d;
                                      }
                                 </SCRIPT>';
         $end_date.="<INPUT TYPE=\"text\"  NAME=\"end_date\" VALUE=\"\"  READONLY>
                        <A HREF=\"#\" onClick=\"cal2.showCalendar('anchor2'); return false;\" TITLE=\"cal2.showCalendar('anchor2'); return false;\" NAME=\"anchor2\" ID=\"anchor2\">
                        <img  src='../../images/calendar_mic.gif' style='vertical-align: top;' border='0' width='25' height='20' hspace='0' vspace='0' alt='Select date'></A>";

         $text="Enter start/end date(<sup>Leave empty second field if the filter criteria is only for a specific day</sup>)";
         $text2 = "Enter sort field";


         $sel1= "<select name='sort' >";

         foreach ($table_field_arr as $key=>$value)
         {
         $sel1.= "<option value='$key'>".$value."</option>";
         }

         $sel1.= "</select>";
         $sel2= "<select name='sort_type' >";

         $sel2.= "<option value='ASC'>Ascending</option>";
         $sel2.= "<option value='DESC'>Descending</option>";

         $sel2.= "</select>";

     }
     if ( ( $view['viewName']=="S6 - New Sales")||( $view['viewName']=="S9 - New Sales") )
     {

         $type="id";
         $text="Choose employee(<sup>Use Ctrl for multiple selection</sup>)";
         $text3="Enter start/end date(<sup>Leave empty second field if the filter criteria is only for a specific day</sup>)";
         $sql= "select * from auth_users order by  f_name";
         $cdb4->select($sql);
         $sel= "<select name='user_id[]' MULTIPLE style='height: 200px; width: 150px'>";

         while ($user=$cdb4->FetchArray())
         {
         $sel.= "<option value='$user[id]'>".$user['f_name']." ".$user['l_name']."</option>";
         }
         $sel.= "</select>";

         $start_date = '
                                 <SCRIPT LANGUAGE="JavaScript" ID="js1">
                                 var cal1 = new CalendarPopup();
                                 cal1.setReturnFunction("setMultipleValues1");
                                 function setMultipleValues1(y,m,d) {
                                      document.field.start_date.value=y+"-"+m+"-"+d;
                                      }
                                 </SCRIPT>';

         $start_date.="<INPUT TYPE=\"text\"  NAME=\"start_date\" VALUE=\"\"  READONLY>
                        <A HREF=\"#\" onClick=\"cal1.showCalendar('anchor1'); return false;\" TITLE=\"cal1.showCalendar('anchor1'); return false;\" NAME=\"anchor1\" ID=\"anchor1\">
                        <img  src='../../images/calendar_mic.gif' style='vertical-align: top;' border='0' width='25' height='20' hspace='0' vspace='0' alt='Select date'></A>";

          $end_date = '
                                 <SCRIPT LANGUAGE="JavaScript" ID="js2">
                                 var cal2 = new CalendarPopup();
                                 cal2.setReturnFunction("setMultipleValues2");
                                 function setMultipleValues2(y,m,d) {
                                      document.field.end_date.value=y+"-"+m+"-"+d;
                                      }
                                 </SCRIPT>';
         $end_date.="<INPUT TYPE=\"text\"  NAME=\"end_date\" VALUE=\"\"  READONLY>
                        <A HREF=\"#\" onClick=\"cal2.showCalendar('anchor2'); return false;\" TITLE=\"cal2.showCalendar('anchor2'); return false;\" NAME=\"anchor2\" ID=\"anchor2\">
                        <img  src='../../images/calendar_mic.gif' style='vertical-align: top;' border='0' width='25' height='20' hspace='0' vspace='0' alt='Select date'></A>";



     }



     ?>
     <br /><br /><br />
     <form name="field" action="<?=$_SERVER['PHP_SELF']?>" method='GET'>
     <table align="center" >
     <tr>
     <td>
     <b><?=$view['viewName']?>   </b>
     <table cellpadding="5" cellspacing="0" style="border: 1px solid #000000" >
   <tr valign="top">
      <td>
      <b><?=$text?></b><br />
     <?=$sel?><br /><b><?=$text3?></b><br />
     <?=$start_date?>&nbsp;&nbsp;
     <?=$end_date?><br /><br />
     <b><?=$text2?></b>
     <?=$sel1?>&nbsp;<?=$sel2?>
     <br /><br />
     <input type="hidden" name="field_type" value="<?=$type?>">
     <input type="hidden" name="id_current_view" value="<?=$_GET['id_current_view']?>">

     <input type="submit" value="Proceed to view">
      </td>
   </tr>
</table>
     </tr>
     </td>
     </table>

</form>

     <?
     break;

     }


 ?>










<!--msnavigation--></td><td valign="top" width="24"></td><td valign="top" width="1%">
<p>&nbsp;</p>

</td></tr><!--msnavigation--></table></body>
<br><br>


</html>
