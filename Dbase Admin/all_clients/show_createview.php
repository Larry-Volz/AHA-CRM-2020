<?

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

//------------------------------ END LOG ENTRY --------------------------------------------------


 include("../../includes/view_settings.inc.php");
 
 include "../../includes/functions.inc.php";  

 switch ($_GET['action1'])
 {

 case ""


?>

<html>



<head>

<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<title>Create a view</title>

<meta name="GENERATOR" content="Microsoft FrontPage 6.0">

<meta name="ProgId" content="FrontPage.Editor.Document">

<style type="text/css" >

        .no_input{

        font-family: Verdana, Arial, Helvetica, sans-serif;

        font-size: 10px;

        color: #000000;

        border: 1px #000000 solid;

        width: 130px;

        height: 25px;

        padding: 5px;

        cursor: pointer;

        }

        .hide_input
        {

        font-family: Verdana, Arial, Helvetica, sans-serif;

        font-size: 10px;

        color: #CCCCFF;
        background-color: #CCCCFF;

        border: 0px #000000 solid;

        width: 130px;

        height: 25px;

        padding: 5px;

        cursor: pointer;
        }

</style>

<script language='javascript' src='../../includes/showhide_layers.js' type="text/javascript"></script>
<script language='javascript' src='../../includes/calendarpopup.js' type="text/javascript"></script>

<script LANGUAGE='javascript'>


function change_date_input(nr)
{
 eval ("date_sel_val = view.f"+nr+"_date.value" ) ;
 if  ( date_sel_val== "1" )
 {
  eval("showdiv('f"+nr+"_date_input') ");
  eval("hidediv('f"+nr+"_date_input_text') ");
 }

 else
 if ( (date_sel_val == 2 ) || (date_sel_val == 3 ) || (date_sel_val == 4 ) || (date_sel_val == 5 ) || (date_sel_val == 6 ) )
 {
  eval("hidediv('f"+nr+"_date_input') ");
  eval("showdiv('f"+nr+"_date_input_text') ");
 }
 else
 {
  eval("hidediv('f"+nr+"_date_input') ");
  eval("hidediv('f"+nr+"_date_input_text') ");
 }


}

function check_if_date(nr)
{
 var date_fields=new Array();
 eval ("sel_val = view.filter"+ nr +".value");
 eval ("operator_val = view.operator"+ nr +".value");
 eval ("oper_sel = view.operator"+nr+"" ) ;
 eval ("lung=view.operator"+nr+".length" );
 eval ("id_operand = 'f"+nr+"_operand' ");
 view.all_or_filtered[1].checked = true ;
// alert(sel_val) ;
 <?
 $i=0;
 foreach ($date_fields as $key=>$value)
 echo "date_fields[".$i++."] = \"$key\"; \n";
 ?>


 for( i=0; i<date_fields.length; i++)
 if ( date_fields[i] == sel_val )
 {
  oper_sel.options[lung]= new Option( "equals" ) ;
  oper_sel.options[lung].value = "=" ;
  oper_sel.options[lung].selected = true ;
  eval("hidediv('f"+nr+"_operand') ");
  eval("hidediv('f"+nr+"_date_input_text') ");
  eval("showdiv('f"+nr+"_date') ");
  eval("showdiv('f"+nr+"_date_input') ");
  eval("view.f"+nr+"_date.options[0] = new Option('Exact Date:') ");
  eval("view.f"+nr+"_date.options[0].value = '1' ");
  eval("view.f"+nr+"_date.options[0].selected = true ");
//  eval("view.f"+nr+"_date.options[0].value = '1'");
  return (1);
 }

  eval("showdiv('f"+nr+"_operand') ");
  eval("hidediv('f"+nr+"_date') ");
  eval("hidediv('f"+nr+"_date_input') ");
  eval("hidediv('f"+nr+"_date_input_text') ");


}


function prompt_win(nr)

{

 for ( i=0; i<nr ; i++)

  {

   eval ( " cc =  document.view.f"+i+".style.backgroundColor " );

   if ( ( cc=="yellow" ) || ( cc=="Yellow" ) )

   {

      eval ( " dd =  document.view.f"+i+".value "  )  ;

   }

  }

 var yourname= prompt('New field name:', dd );

 var aa;

 var bb;

  for ( i=0; i<nr ; i++)

  {

   eval ( " aa =  document.view.f"+i+".style.backgroundColor " );

   eval ( " bb =  document.view.f"+i+".value "  )  ;

   if ( ( aa=="yellow" ) || ( aa=="Yellow" ) )

   {

    eval ( " document.view.f"+i+".value = yourname " )

   }

  }

}





function change_background(color1,color2, m1,nr)

{



 for ( i=0; i<nr ; i++)

 {

    eval("document.view.f"+i+".style.backgroundColor = color1 ") ;

 }





 m1.style.backgroundColor  = color2;



 var b;

 var c;



 for ( i=0; i<nr ; i++)

 {

    eval ( " b =  document.view.f"+i+".style.backgroundColor " );

    eval ( " c =  document.view.n"+i+".value " );

    if (  ( b=="yellow" ) || ( b=="Yellow" ) )

    {



     document.view.selected_field.value = c ;

    }

 }





}





function preview(m2,but,nr)

{
   m1len = m2.length ;
   for ( i=0; i<m1len ; i++){
      if ( m2.options[i].value == document.view.selected_field.value )
      {
      a="n"+i+"";
      a_f="f"+i+"";
      }
     }
   if (  but!="1" )
   {
      for ( i=0; i<m1len ; i++){
      m2.options[i] = null;
     }
   }

//   alert (document.view.selected_field.value);

    if ( ( document.view.selected_field.value!="" ) && ( but!="1" )  )
    {
     b = 0;

     splitString = a.split("");


     b = splitString[1];
     if ( but=="2" ){ b--; }
     else if( but=="3" ) { b++; }
     if (b<0) { b=0; }
     if ( b>nr ) { b=nr; }
     a1="";
     a1="n"+b+"";
     a1_f="f"+b+"";
     aux="";
     eval(" aux = document.view."+a+".value ") ;
     eval("document.view."+a+".value = document.view."+a1+".value ");
     eval( "document.view."+a1+".value = aux " );
     aux="";
     eval(" aux = document.view."+a_f+".value ") ;
     eval("document.view."+a_f+".value = document.view."+a1_f+".value ");
     eval( "document.view."+a1_f+".value = aux " );

    }



    for ( i=0; i<nr ; i++)
    {
            m2.options[i]= new Option( eval("document.view.n"+i+".value") );
            m2.options[i].value= eval("document.view.n"+i+".value");
    }



   // m1len = m2.length ;
    for ( i=0; i<m1len ; i++)
    {
        m2.options[i].selected = true ;
    }
    val_fields = "";
    for ( i=0; i<m1len ; i++){
        if (m2.options[i].selected == true )
        {
            val_fields = val_fields + m2.options[i].value + ";";
        }

    }


//alert(document.view.selected_field.value);

 document.view.action="<?=$_SERVER['PHP_SELF'];?>";

 document.view.fields.value = val_fields;


 document.view.submit();

}











function DeleteSelect(m1)

{



    m1.style.width=0;

    m1.style.height=0;

    m1.disabled=true;

}



function SelectValues(m1)

{

    for (i=0; i<m1.length; i++)

    {

    m1.options[i].selected = true;

    }

}





function one2two(m1,m2,nr) {

    m1len = m1.length ;

    for ( i=0; i<m1len ; i++){

        if (m1.options[i].selected == true ) {

            m2len = m2.length;

            m2.options[m2len]= new Option(m1.options[i].text);

            m2.options[m2len].value=m1.options[i].value;

        }

    }



    for ( i = (m1len -1); i>=0; i--){

        if (m1.options[i].selected == true ) {

            m1.options[i] = null;

        }

    }

   for (i=0; i<m2.length; i++)

   {

     m2.options[i].selected = true;

   }





   if(m2.length<2)

   {

     document.search.action="index.php";

     document.search.submit();

   }











}



function two2one(m1,m2,nr) {



    m2len = m2.length ;

        for ( i=0; i<m2len ; i++){

            if (m2.options[i].selected == true ) {

                m1len = m1.length;

                m1.options[m1len]= new Option(m2.options[i].text);

            }

        }

        for ( i=(m2len-1); i>=0; i--) {

            if (m2.options[i].selected == true ) {

                t=i;
                for (t=i; t<=m2len-2 ; t++ )
                {
                tt=t+1 ;
                eval("view.f"+t+".value = view.f"+tt+".value");
                eval("view.n"+t+".value = view.n"+tt+".value");
                }
                ttt=m2len-1;
                eval("view.f"+ttt+".value = \"\" ");
                eval("view.n"+ttt+".value = \"\" ");
                eval("view.f"+ttt+".disabled = true ");
                eval("view.n"+ttt+".disabled = true ");


                m2.options[i] = null;

            }

        }



   SelectValues(document.search.idarea);

   SelectValues(document.search.iddistrict);

   SelectValues(document.search.idcity);

   SelectValues(document.search.idcityarea);



    if(m2.length<2)

    {

     document.search.action="index.php";

     document.search.submit();

    }


}




   function send_form()
   {

   document.view.action="<?=$_SERVER['PHP_SELF']?>?action1=sent";
//   document.view.action.value="sent";
   document.view.submit();
   }



//-->

</script>

<meta name="Microsoft Border" content="r, default">
</head>



<body><!--msnavigation--><table dir="ltr" border="0" cellpadding="0" cellspacing="0" width="100%"><tr><!--msnavigation--><td valign="top">

<p><font size="6">All Clients Database:&nbsp; New View</font></p>

<hr>

<form method="POST"  name='view'>

<INPUT TYPE="HIDDEN"  name="action1" value="">


        <table border="0" width="100%" id="table6">

                <tr>

                        <td><b>Name of View:</b> <input type="text" name="name_of_view" value='<?=UnformatUserInputText($_POST['name_of_view'])?>' size="39"?>' size="39"></td>

                        <td>Can be used by:<select size="1" name="used_by">

                        <? if(!empty($_POST['used_by'])) echo "<option  value='".$_POST['used_by']."'>".$_POST['used_by']."</option>" ?>

                        <? echo "test: ".$_POST['used_by']; ?>

                        <option  value="Just me">Just me</option>

                        <option value='Program Counselors'>Program Counselors</option>

                        <option value='Management'>Management</option>

                        <option value='Administration'>Administration</option>

                        <option value='Everyone'>Everyone</option>

                        </select></td>

                </tr>

        </table>
<?
        $no_radio   = "checked";
        $yes_radio  = "";

        if (!empty($_POST['intermediate_screen']))
        {
           if ($_POST['intermediate_screen']=="1" )
           {
               $yes_radio ="checked";
               $no_radio  = "";
           }

        }

        $ifv ="";
        if (!empty($_POST['intermediate_field']))
        $ifv ="<option value='$_POST[intermediate_field]'>".$fields_arr[$_POST['intermediate_field']]."</option>";





        $select1="";

        foreach ( $table_field_arr AS $key => $value )

        $select1.="<option value='$key'>$value</option>";

?>
        <br /><br />
        <b>Intermediate screen:</b> <input type="radio" name="intermediate_screen" value="0" <?=$no_radio?> > No&nbsp;&nbsp;&nbsp;<input type="radio" name="intermediate_screen" value="1" <?=$yes_radio?>> Yes<br />

      <b>Choose Intermediate Field </b> <SELECT  name='intermediate_field' ><?=$ifv.$select1?></SELECT>   <br /><br />


        <p><b>Fields to Include:</b><i><br>

        Use the arrow buttons for adding or removing fields from the view.</p>

        <table border="0" id="table1" bgcolor="#CCCCFF">

        <tr>

        <td colspan='6'>

        <table border="0" bgcolor="#CCCCFF">

        <tr>

        <td>



        <img src='../../images/spacer.gif' border='0' width='20' height='1' hspace='0' vspace='0' alt=''></td>

        <td>

       <?

       //generate fields



        //include "../../includes/mysql.inc.php";

        //$DB=new class_mysql;









        $select="";

        foreach ( $fields_arr AS $key => $value )

        $select.="<option value='$value'>$value</option>";









        if (!empty($_POST['fields']))

        {

        $fields=array();

        $fields=explode(";",$_POST['fields']);

        array_pop($fields);

        $field_sel="";



        $nr=0;

        foreach ($fields  as $key=>$value)

        {

        $field_sel.="<option value='$value'>$value</option>";

        $nr++;

        }

        }







       ?>

        <SELECT  name='client1'  MULTIPLE style='width: 200px; height: 200px;'><?=$select?></SELECT>

        </td>

        <td><img src='../../images/spacer.gif' border='0' width='20' height='1' hspace='0' vspace='0' alt=''></td>

        <td>

<INPUT TYPE="BUTTON" onClick='one2two(view.client1,view.client,1);'  value=">>" style='width: 30px; margin: 0px 12px 0px 0px; font-weight: bold;'><br>

<INPUT TYPE="BUTTON" name='arear1' onClick='two2one(view.client1,view.client,1);'  value="<<" style='width: 30px; margin: 10px 0px 0px 0px; font-weight: bold;'></td>

        </td>

        <td><img src='../../images/spacer.gif' border='0' width='20' height='1' hspace='0' vspace='0' alt=''></td>

        <td>

<SELECT  name='client' MULTIPLE style='width: 200px; height: 200px;'><?=$field_sel?></SELECT>

        </td>



        </tr>

        </table>



        </td>

        </tr>



        <tr>

        <td><img src='../../images/spacer.gif' border='0' width='20' height='1' hspace='0' vspace='0' alt=''></td>

        <td cospan=5 align='left'>

         <INPUT TYPE='HIDDEN'  name='fields' value=''>

        <INPUT TYPE='BUTTON'  onclick="preview(view.client,'1','0');"  value='Save changes & Preview'><br><br></td></tr>

        <tr>

        <td><img src='../../images/spacer.gif' border='0' width='20' height='1' hspace='0' vspace='0' alt=''></td>

        <td colspan=5 align='left'>

        <?



        $i=0;



        $table_fields=array();



        $i=0;

        foreach ($fields  as $key=>$value)

        {



        $px=strlen($value)*8;

        if(!empty($_POST["f$i"])) $value=$_POST["f$i"];



        echo "<INPUT TYPE='TEXT' name='f$i'  class='no_input' READONLY onclick=\"change_background('White','Yellow',view.f$i , '$nr' );\" style='width: ".$px."px;'  value=\"$value\">";

        $i++;

        }



        echo "<br>";

        $i=0;

        foreach ($fields  as $key=>$value)

        {

        $px=strlen($value)*8;

        echo "<INPUT TYPE='hidden' name='n$i'  class='no_input' READONLY onclick=\"change_background('White','Yellow',view.f$i , '$nr' );\" style='width: ".$px."px;'  value=\"$value\">";

        $i++;

        }





        ?>



        </td>

        <td>

        </td></tr>



        <tr>

        <td><img src='../../images/spacer.gif' border='0' width='20' height='1' hspace='0' vspace='0' alt=''></td>

        <td cospan=5 align='left'>

         <INPUT TYPE='HIDDEN'  name='selected_field' value=''>

         <INPUT TYPE='HIDDEN'  name='move_dir' value=''>

         <INPUT TYPE='HIDDEN'  name='rename' value=''>

         <?

         if ($nr>1)

         echo"<INPUT TYPE='BUTTON'  onclick=\"preview(view.client,'2','$nr');\"  value='<- Move'>&nbsp;&nbsp;&nbsp;<INPUT TYPE='BUTTON'  onclick=\"prompt_win('$nr');\"  value='Rename'>&nbsp;&nbsp;&nbsp;<INPUT TYPE='BUTTON'  onclick=\"preview(view.client,'3','$nr');\"  value='Move ->'>";

         ?>

         </td>



        </tr>





        </table>





        <table border="0" width="100%" id="table2">

                <tr>

                        <td>&nbsp;<p><b>Sort by</b></td>

                        <td>&nbsp;<p><b>Order</b></td>

                </tr>

                <tr>

                        <td>

                       <select size="1" name="sort1">

                       <?

                       if (!empty($_POST['sort1'])) echo "<option value='".$_POST['sort1']."'>".$fields_arr["$_POST[sort1]"]."</option>";

                       echo "<option value=''>Choose field</option>";

                       foreach ( $fields_arr AS $key=>$value ) echo "<option value='$key'>$value</option>";

                       ?>

                        </select>

                        </td>

                        <td>

                        <select size="1" name="asc_or_desc1">

                        <? if(!empty($_POST['asc_or_desc1']))echo "<option value='".$_POST['asc_or_desc1']."'>".$_POST['asc_or_desc1']."</option>"; ?>

                        <option value="ASC">Ascending (a-z)</option>

                        <option value="DESC">Descending (z-a)</option>

                        </select>

                        </td>

                </tr>

                <tr>

                        <td><select size="1" name="sort2">

                       <?

                       if (!empty($_POST['sort2'])) echo "<option value='".$_POST['sort2']."'>".$fields_arr["$_POST[sort2]"]."</option>";

                       echo "<option value=''>Choose field</option>";

                       foreach ( $fields_arr AS $key=>$value ) echo "<option value='$key'>$value</option>";

                       ?>

                        </select></td>

                        <td><select size="1" name="asc_or_desc2">

                        <? if(!empty($_POST['asc_or_desc2']))echo "<option value='".$_POST['asc_or_desc2']."'>".$_POST['asc_or_desc2']."</option>"; ?>

                        <option value="ASC">Ascending (a-z)</option>

                        <option value="DESC">Descending (z-a)</option>

                        </select></td>

                </tr>

                <tr>

                        <td><select size="1" name="sort3">

                       <?

                       if (!empty($_POST['sort3'])) echo "<option value='".$_POST['sort3']."'>".$fields_arr["$_POST[sort3]"]."</option>";

                       echo "<option value=''>Choose field</option>";

                       foreach ( $fields_arr AS $key=>$value ) echo "<option value='$key'>$value</option>";

                       ?>

                        </select></td>

                        <td><select size="1" name="asc_or_desc3">

                        <? if(!empty($_POST['asc_or_desc3']))echo "<option value='".$_POST['asc_or_desc3']."'>".$_POST['asc_or_desc3']."</option>"; ?>

                        <option value="ASC">Ascending (a-z)</option>

                        <option value="DESC">Descending (z-a)</option>

                        </select></td>

                </tr>

        </table>

         <table border="0" width="100%" id="table3">

                <tr>

                        <td><b>Group by</b></td>

                        <td>&nbsp;</td>

                </tr>

                <tr>

                        <td><select size="1" name="group1">

                        <?

                        if (!empty($_POST['group1'])) echo "<option value='".$_POST['group1']."'>".$fields_arr["$_POST[group1]"]."</option>";

                        echo "<option value=''>Choose field</option>";

                        foreach ( $fields_arr AS $key=>$value ) echo "<option value='$key'>$value</option>";

                        ?>

                        </select></td>

                        <td><select size="1" name="asc_or_desc_groupby1">

                        <? if(!empty($_POST['asc_or_desc_groupby1']))echo "<option value='".$_POST['asc_or_desc_groupby1']."'>".$_POST['asc_or_desc_groupby1']."</option>"; ?>

                        <option value="ASC">Ascending (a-z)</option>

                        <option value="DESC">Descending (z-a)</option>

                        </select></td>

                </tr>

                <tr>

                        <td><select size="1" name="group2">

                        <?

                        if (!empty($_POST['group2'])) echo "<option value='".$_POST['group2']."'>".$fields_arr["$_POST[group2]"]."</option>";

                        echo "<option value=''>Choose field</option>";

                        foreach ( $fields_arr AS $key=>$value ) echo "<option value='$key'>$value</option>";

                        ?>

                        </select></td>

                        <td><select size="1" name="asc_or_desc_groupby2">

                        <? if(!empty($_POST['asc_or_desc_groupby2']))echo "<option value='".$_POST['asc_or_desc_groupby2']."'>".$_POST['asc_or_desc_groupby2']."</option>"; ?>

                        <option value="ASC">Ascending (a-z)</option>

                        <option value="DESC">Descending (z-a)</option>

                        </select></td>

                </tr>

                <tr>

                        <td><select size="1" name="group3">

                        <?

                        if (!empty($_POST['group3'])) echo "<option value='".$_POST['group3']."'>".$fields_arr["$_POST[group3]"]."</option>";

                        echo "<option value=''>Choose field</option>";

                        foreach ( $fields_arr AS $key=>$value ) echo "<option value='$key'>$value</option>";

                        ?>

                        </select></td>

                        <td><select size="1" name="asc_or_desc_groupby3">

                        <? if(!empty($_POST['asc_or_desc_groupby3']))echo "<option value='".$_POST['asc_or_desc_groupby3']."'>".$_POST['asc_or_desc_groupby3']."</option>"; ?>

                        <option value="ASC">Ascending (a-z)</option>

                        <option value="DESC">Descending (z-a)</option>

                        </select></td>

                </tr>

        </table>




        <p><b>Filtering:</b><br>

        <?

          if    ( $_POST['and_or2']=="WHERE" )  $check2="CHECKED";

          else                                  $check1="CHECKED";

         ?>



        <input type="radio" value="" <?=$check1?> checked name="all_or_filtered">Choose all

        records<br>

        <input type="radio" <?=$check2?> name="all_or_filtered" value="WHERE" >Show only records

        where:</p>

        <table border="0" width="100%" id="table4">
        <?
              for ($ii=1;$ii<=4;$ii++)
              {
        ?>

                <tr>

                        <td><select size="1" name="filter<?=$ii?>" onchange='check_if_date(<?=$ii?>);' >

                        <?

                        if ( !empty( $_POST["filter$ii"] ) ) echo "<option value='".$_POST["filter$ii"]."'>".$fields_arr[$_POST["filter$ii"]]."</option>";

                        echo "<option value=''>Choose field</option>";

                        foreach ( $fields_arr AS $key=>$value ) echo "<option value='$key'>$value</option>";

                        ?>

                        </select></td>

                        <td>

                        <select size="1" name="operator<?=$ii?>">

                        <?

                        if (!empty ($_POST["operator$ii"]))

                        {

                        $_POST["operator$ii"]=addslashes($_POST["operator$ii"]);

                        echo "<option value='".$_POST["operator$ii"]."'>".$operator_arr[$_POST["operator$ii"]]."</option>";

                        }

                        echo "<option value=''>Choose Operator</option>";

                        foreach ($operator_arr as $key=>$value) echo  "<option value='$key'>".$value."</option>";

                        ?>

                        </select>

                        </td>

                        <td>
                       <div style='position: relative; display: block;' id="f<?=$ii?>_operand" ><input type="text" name="filter<?=$ii?>_operand" value='<?=$_POST["filter{$ii}_operand"]?>' size="20"></div>
                       <div style='position: relative; display: none;' id="f<?=$ii?>_date" >
                       <select name='f<?=$ii?>_date' size="1" onchange='change_date_input(<?=$ii?>);' >
                       <?

                       if (!empty( $_POST["f{$ii}_date"]))

                       switch ( $_POST["f{$ii}_date"] )
                       {
                        case 1:  echo "<option value=\"1\">Exact Date:</option>";
                                 break;
                        case 2:  echo "<option value=\"2\">Days in the Future:</option>";
                                 break;

                        case 3:  echo "<option value=\"3\">Days in the Past:</option>";
                                 break;

                        case 4:  echo "<option value=\"4\">Day:</option>";
                                 break;

                        case 5:  echo "<option value=\"5\">Month:</option>";
                                 break;

                        case 6:  echo "<option value=\"6\">Year:</option>";
                                 break;

                        case 21:  echo "<option value=\"21\">Today</option>";
                                 break;

                        case 22:  echo "<option value=\"22\">This Week</option>";
                                 break;

                        case 23:  echo "<option value=\"23\">This Month</option>";
                                 break;

                        case 24:  echo "<option value=\"24\">Next Week</option>";
                                 break;

                        case 25:  echo "<option value=\"25\">Next Month</option>";
                                 break;

                        case 26:  echo "<option value=\"26\">Previous Week</option>";
                                 break;

                        case 27:  echo "<option value=\"27\">Previous Month</option>";
                                 break;


                       }


                        ?>
<option value="1">Exact Date:</option><option value="2">Days in the Future:</option><option value="3">Days in the Past:</option><option value="4">Day:</option><option value="5">Month:</option><option value="6">Year:</option><option value="21">Today</option><option value="22">This Week</option><option value="23">This Month</option><option value="24">Next Week</option><option value="25">Next Month</option><option value="26">Previous Week</option><option value="27">Previous Month</option>
                       </select>
                       </div>



                        </td>

                        <td>
                        <div style='position: relative; display: none;' id="f<?=$ii?>_date_input" >

                                 <SCRIPT LANGUAGE="JavaScript" ID="js<?=$ii?>">
                                 var cal<?=$ii?> = new CalendarPopup();
                                 cal<?=$ii?>.setReturnFunction("setMultipleValues<?=$ii?>");
                                 function setMultipleValues<?=$ii?>(y,m,d) {
                                      document.forms[0].f<?=$ii?>_date_input.value=y+"-"+m+"-"+d;   
                                      }
                                 </SCRIPT>

                        <INPUT TYPE="text"  NAME="f<?=$ii?>_date_input" VALUE="<?
                        if (!empty($_POST["f{$ii}_date_input"]))  echo  $_POST["f{$ii}_date_input"];
                        else                                   echo date("m-d-Y");

                        ?>" READONLY

                        ?>"  READONLY>
                        <A HREF="#" onClick="cal<?=$ii?>.showCalendar('anchor<?=$ii?>'); return false;" TITLE="cal<?=$ii?>.showCalendar('anchor<?=$ii?>'); return false;" NAME="anchor<?=$ii?>" ID="anchor<?=$ii?>">
                        <img  src='../../images/calendar_mic.gif' style='vertical-align: top;' border='0' width='25' height='20' hspace='0' vspace='0' alt='Select date'></A>
                        </div>

                        <div style='position: relative; display: none;' id="f<?=$ii?>_date_input_text" >
                        <INPUT TYPE="text"  NAME="f<?=$ii?>_date_input_text" VALUE="<?
                        if (!empty($_POST["f{$ii}_date_input_text"]))  echo  $_POST["f{$ii}_date_input_text"];
                        ?>" style="width: 70px;"
                        ?>" style='width: 70px;'>
                        </div>

                       <?

                        if (!empty( $_POST["f{$ii}_date_input"]))
                        {
                        ?>

                        <script>
                        eval("showdiv('f<?=$ii?>_date') ");
                        eval("showdiv('f<?=$ii?>_date_input') ");
                        eval("hidediv('f<?=$ii?>_date_input_text') ");
                        eval("hidediv('f<?=$ii?>_operand') ");
                        </script>
                        <?
                        }
                        if (!empty( $_POST["f{$ii}_date_input_text"]))
                        {
                        ?>

                        <script>
                        eval("showdiv('f<?=$ii?>_date') ");
                        eval("showdiv('f<?=$ii?>_date_input_text') ");
                        eval("hidediv('f<?=$ii?>_date_input') ");
                        eval("hidediv('f<?=$ii?>_operand') ");
                        </script>
                        <?
                        }


                        if ( (!empty($_POST["filter{$ii}_operand"])) || (empty($_POST["filter{$ii}"])) )
                        {
                        ?>

                        <script>
                        eval("hidediv('f<?=$ii?>_date') ");
                        eval("hidediv('f<?=$ii?>_date_input') ");
                        eval("hidediv('f<?=$ii?>_date_input_text') ");
                        eval("showdiv('f<?=$ii?>_operand') ");
                        </script>
                        <?
                        }


                        ?>
                        </td>

                </tr>

                <tr>

                        <td>

                        <?

                        if     ( $_POST["and_or$ii"]=="OR" )  $check2="CHECKED";

                        else                                  $check1="CHECKED";



                        ?>

                        <input type="radio" name="and_or<?=$ii?>" <?=$check1?> value="AND">and

                        <input type="radio" name="and_or<?=$ii?>" <?=$check2?> value="OR">or</td>

                        <td>&nbsp;</td>

                        <td>&nbsp;</td>

                </tr>

              <?
              }
              ?>




                <tr>

                        <td>&nbsp;</td>

                        <td>&nbsp;</td>

                        <td>&nbsp;</td>

                </tr>


        </table>


        <p><b>Totaling:<br>

        </b>Select the columns to be totaled or subtotaled. Subtotals only apply

        when grouping is specified for the view.</p>

        <table border="0" width="100%" id="table5" bgcolor="#CCCCFF">
                                <tr>

                                        <td><b>Column</td>

                                        <td>&nbsp;</td>

                                        <td><b>Total</td>
                                        <td><b>Subtotal</td>

                                </tr>
        <?

        $i=1;
        foreach ($total_arr_fields as $key=>$value)
        {

                 (!empty($_POST["total$i"]))?  $check1="checked": $check1="";
                 (!empty($_POST["subtotal$i"]))? $check2="checked": $check2="";
                echo
                "
                                <tr>

                                        <td>$value</td>

                                        <td>&nbsp;</td>

                                        <td><input type='checkbox' name='total$i' value='".$key."' $check1 ></td>
                                        <td><input type='checkbox' name='subtotal$i' value='".$key."' $check2 ></td>

                                </tr>

                ";
                $i++;

        }

        ?>
                <tr>



        </table>


        <p><input type="button" value="Submit" onclick="send_form();" name="B1"><input type="reset" value="Reset" name="B2"></p>

</form>



<!--msnavigation--></td><td valign="top" width="24"></td><td valign="top" width="1%">
<p>&nbsp;</p>

</td></tr><!--msnavigation--></table></body>



</html>

<?
  break;

  case "sent":

  include "../../includes/mysql.inc.php";
 // include "../../includes/functions.inc.php";
  $cdb1= new class_mysql;

  $view_table="all_clients";
  $view_sql_table="all_clients_views";

  $desc_sales_categories_table = "desc_sales_categories";
  $sales_stage_table     = "desc_sales_stage";
//  $record_manager_table =
  $referred_by_table     = "desc_referred_by";
//  $referral_category_table  = "";
  $client_flags_table    = "desc_client_flags";
  $primary_goal_table    = "desc_primary_goal";
//  $secondary_goal_table  = "";
  $therapist_table       = "affiliates";
  $action_table          = "desc_action_at_appointment" ;
  $modified_by_table     = "auth_users";


  $date_time_fields = array();
  $date_time_fields = array ( 'sales_contact_next' , 'date_client_sold', 'created' , 'modified' , 'first_appointment' );

  $view_sql = "";
  $from = " FROM $view_table ";
  $join="";
  $where = " WHERE $view_table.client_id!=0 ";
  $group = "";
  $orderby ="";

//catch errors


  for($i=1;$i<=4;$i++)
  if ( (!empty($_POST["filter$i"])) && ( empty($_POST["operator$i"]) )  )
  {
  message_box('Every filter field must have an operator!');
  echo "<script language='Javascript'> setTimeout(\"history.back();\", 2000 ); </script>";
  exit;
  }


  $view_sql = "";
  $view_sql .= "SELECT CONCAT('<a href=\"show_single_client.php?client_id=',$view_table.client_id,'\">','View','</a>') AS 'View',
CONCAT('<a href=\"show_modclient.php?client_id=',$view_table.client_id,'\">','Edit','</a>') AS 'Edit'";


  foreach ($_POST as $key=>$value )  $_POST[$key]=stripslashes($value);

  foreach ($_POST as $key=>$value )
  if  ($value=="client_id")   $_POST[$key]="$financial_table.client_id";




//


  reset($_POST);
  $fields_arr = array_flip($fields_arr);

  $all_or_some_records="";
  $all_or_some_records_alias="";

  $is_financial = 0;





  //generate select fields and join conditions


  foreach ($_POST as $key=>$value )
  if ( ( strpos(" ".$key, "n")==1 ) && ( !empty($value) ) && ( strlen($key)<=3 )  )
  {

   $ind="f".substr($key,1,strlen($key));
   $all_or_some_records.= $value.";";
   $all_or_some_records_alias.=$_POST[$ind].";";

   if  ( in_array($fields_arr[$value],$date_time_fields)  )
   $view_sql .= ", FROM_UNIXTIME( $view_table.$fields_arr[$value],'%M %D %Y %h:%i:%s')  as '".$_POST["$ind"]."'";
   else  //look for other  fields  than all_clients fields
   {

//   $view_sql.= ", $view_table.$fields_arr[$value] as '".$_POST["$ind"]."'";



if     ( $fields_arr[$value]== "sales_category" )
      {
         $view_sql.= ", $desc_sales_categories_table.description as '".$_POST["$ind"]."'";
         generate_join("$view_table.sales_category","$desc_sales_categories_table.id",$join);
         generate_from($desc_sales_categories_table,$from);

      }
      elseif ( $fields_arr[$value]== "sales_stage" )
      {
         $view_sql.= ", $sales_stage_table.description as '".$_POST["$ind"]."'";
         generate_join("$view_table.sales_stage","$sales_stage_table.id",$join);
         generate_from($sales_stage_table,$from);

      }

      elseif ( $fields_arr[$value]== "referred_by" )
      {
         $view_sql.= ", $referred_by_table.description as '".$_POST["$ind"]."'";
         generate_join("$view_table.referred_by","$referred_by_table.id",$join);
         generate_from($referred_by_table,$from);
      }
      elseif ( $fields_arr[$value]== "client_flags" )
      {
         $view_sql.= ", $client_flags_table.description as '".$_POST["$ind"]."'";
         generate_join("$view_table.client_flags","$client_flags_table.id",$join);
         generate_from($referred_by_table,$from);

      }
      elseif ( $fields_arr[$value]== "primary_goal" )
      {
         $view_sql.= ", $primary_goal_table.description as '".$_POST["$ind"]."'";
         generate_join("$view_table.primary_goal","$primary_goal_table.id",$join);
         generate_from($primary_goal_table,$from);

      }
      elseif ( $fields_arr[$value]== "therapist" )
      {
         $view_sql.= ", CONCAT( $therapist_table.title , ' ' ,  $therapist_table.f_name , ' ', $therapist_table.l_name ) as '".$_POST["$ind"]."'";
         generate_join("$view_table.therapist","$therapist_table.id",$join);
         generate_from($therapist_table,$from);

      }
      elseif ( $fields_arr[$value]== "action" )
      {
         $view_sql.= ", $action_table.description as '".$_POST["$ind"]."'";
         generate_join("$view_table.action","$action_table.id",$join);
         generate_from($action_table,$from);
      }
      elseif ( $fields_arr[$value]== "modified_by" )
      {
          $view_sql.= ", CONCAT( $modified_by_table.title , ' ' ,  $modified_by_table.f_name , ' ', $modified_by_table.l_name ) as '".$_POST["$ind"]."'";
         generate_join("$view_table.modified_by","$modified_by_table.id",$join);
         generate_from($modified_by_table,$from);
      }
      
      elseif ( $fields_arr[$value]== "created_by" )
      {
          $view_sql.= ", CONCAT( $modified_by_table.title , ' ' ,  $modified_by_table.f_name , ' ', $modified_by_table.l_name ) as '".$_POST["$ind"]."'";
         generate_join("$view_table.created_by","$modified_by_table.id",$join);
         generate_from($modified_by_table,$from);
      }            

   /*   elseif ( $fields_arr[$value]== "record_manager" )
      {
          $view_sql.= ", CONCAT( $modified_by_table.title , ' ' ,  $modified_by_table.f_name , ' ', $modified_by_table.l_name ) as '".$_POST["$ind"]."'";
         generate_join("$view_table.record_manager","$modified_by_table.id",$join);
         generate_from($modified_by_table,$from);
      }
   */


      //look for financial fields

      elseif ( $fields_arr[$value]== "amount" )
      {
          $view_sql.= ", $financial_table.amount as '".$_POST["$ind"]."'";
          if( $is_financial==0 )
                    {
                    generate_join("$financial_table.client_id","$view_table.client_id",$join);
                    generate_from($financial_table,$from);

                    }
          $is_financial = 1;
      }

      elseif ( $fields_arr[$value]== "date" )
      {
          //$view_sql.= ", $financial_table.amount as '".$_POST["$ind"]."'";
          $view_sql .= ", FROM_UNIXTIME( $financial_table.date,'%M %D %Y %h:%i:%s')  as '".$_POST["$ind"]."'";
          if( $is_financial==0 )
                    {
                    generate_join("$financial_table.client_id","$view_table.client_id",$join);
                    generate_from($financial_table,$from);

                    }
          $is_financial = 1;
      }

      elseif ( $fields_arr[$value]== "cc_number" )
      {
          $view_sql.= ", $financial_table.cc_number as '".$_POST["$ind"]."'";
          if( $is_financial==0 )
                    {
                    generate_join("$financial_table.client_id","$view_table.client_id",$join);
                    generate_from($financial_table,$from);
                    }
          $is_financial = 1;
      }

      elseif ( $fields_arr[$value]== "cc_expiration_date" )
      {
          //$view_sql.= ", $financial_table.amount as '".$_POST["$ind"]."'";
          $view_sql .= ", FROM_UNIXTIME( $financial_table.cc_expiration_date,'%M %D %Y %h:%i:%s')  as '".$_POST["$ind"]."'";
          if( $is_financial==0 )
                    {
                    generate_join("$financial_table.client_id","$view_table.client_id",$join);
                    generate_from($financial_table,$from);
                    }
          $is_financial = 1;
      }

      elseif ( $fields_arr[$value]== "cc_type" )
      {
          $view_sql.= ", $financial_table.cc_type as '".$_POST["$ind"]."'";
          if( $is_financial==0 )
                    {
                    generate_join("$financial_table.client_id","$view_table.client_id",$join);
                    generate_from($financial_table,$from);
                    }
          $is_financial = 1;
      }

      elseif ( $fields_arr[$value]== "xaction_status" )
      {
          $view_sql.= ", $financial_table.xaction_status as '".$_POST["$ind"]."'";
          if( $is_financial==0 )
                    {
                    generate_join("$financial_table.client_id","$view_table.client_id",$join);
                    generate_from($financial_table,$from);
                    }
          $is_financial = 1;
      }


      elseif ( $fields_arr[$value]== "ck_routing_number" )
      {
          $view_sql.= ", $financial_table.ck_routing_number as '".$_POST["$ind"]."'";
          if( $is_financial==0 )
                    {
                    generate_join("$financial_table.client_id","$view_table.client_id",$join);
                    generate_from($financial_table,$from);
                    }
          $is_financial = 1;
      }

      elseif ( $fields_arr[$value]== "ck_account_number" )
      {
          $view_sql.= ", $financial_table.ck_account_number as '".$_POST["$ind"]."'";
          if( $is_financial==0 )
                    {
                    generate_join("$financial_table.client_id","$view_table.client_id",$join);
                    generate_from($financial_table,$from);
                    }
          $is_financial = 1;
      }


      elseif ( $fields_arr[$value]== "ck_number" )
      {
          $view_sql.= ", $financial_table.ck_number as '".$_POST["$ind"]."'";
          if( $is_financial==0 )
                    {
                    generate_join("$financial_table.client_id","$view_table.client_id",$join);
                    generate_from($financial_table,$from);
                    }
          $is_financial = 1;
      }

      elseif ( $fields_arr[$value]== "program_id" )
      {
          $view_sql.= ", $financial_table.program_id as '".$_POST["$ind"]."'";
          if( $is_financial==0 )
                    {
                    generate_join("$financial_table.client_id","$view_table.client_id",$join);
                    generate_from($financial_table,$from);
                    }
          $is_financial = 1;
      }

      elseif ( $fields_arr[$value]== "program_cost" )
      {
          $view_sql.= ", $financial_table.program_cost as '".$_POST["$ind"]."'";
          if( $is_financial==0 )
                    {
                    generate_join("$financial_table.client_id","$view_table.client_id",$join);
                    generate_from($financial_table,$from);
                    }
          $is_financial = 1;
      }

      elseif ( $fields_arr[$value]== "number_of_payments" )
      {
          $view_sql.= ", $financial_table.number_of_payments as '".$_POST["$ind"]."'";
          if( $is_financial==0 )
                    {
                    generate_join("$financial_table.client_id","$view_table.client_id",$join);
                    generate_from($financial_table,$from);
                    }
          $is_financial = 1;
      }

      elseif ( $fields_arr[$value]== "equal_payments_of" )
      {
          $view_sql.= ", $financial_table.equal_payments_of as '".$_POST["$ind"]."'";
          if( $is_financial==0 )
                    {
                    generate_join("$financial_table.client_id","$view_table.client_id",$join);
                    generate_from($financial_table,$from);
                    }
          $is_financial = 1;
      }

      elseif ( $fields_arr[$value]== "notes" )
      {
          $view_sql.= ", $financial_table.notes as '".$_POST["$ind"]."'";
          if( $is_financial==0 )
                    {
                    generate_join("$financial_table.client_id","$view_table.client_id",$join);
                    generate_from($financial_table,$from);
                    }
          $is_financial = 1;
      }

      elseif ( $fields_arr[$value]== "date_sold" )
      {
          //$view_sql.= ", $financial_table.amount as '".$_POST["$ind"]."'";
          $view_sql .= ", FROM_UNIXTIME( $financial_table.date_sold,'%M %D %Y %h:%i:%s')  as '".$_POST["$ind"]."'";
          if( $is_financial==0 )
                    {
                    generate_join("$financial_table.client_id","$view_table.client_id",$join);
                    generate_from($financial_table,$from);
                    }
          $is_financial = 1;
      }

      elseif ( $fields_arr[$value]== "apt_date" )
      {
          //$view_sql.= ", $financial_table.amount as '".$_POST["$ind"]."'";
          $view_sql .= ", FROM_UNIXTIME( $financial_table.apt_date,'%M %D %Y %h:%i:%s')  as '".$_POST["$ind"]."'";
          if( $is_financial==0 )
                    {
                    generate_join("$financial_table.client_id","$view_table.client_id",$join);
                    generate_from($financial_table,$from);
                    }
          $is_financial = 1;
      }


      elseif ($fields_arr[$value]=="financial.client_id")
      {
          $view_sql.= ", $fields_arr[$value] as '".$_POST["$ind"]."'";
          if( $is_financial==0 )
                    {
                    generate_join("$financial_table.client_id","$view_table.client_id",$join);
                    generate_from($financial_table,$from);
                    }
          $is_financial = 1;

      }
      
      elseif ( ($fields_arr[$value]=="auth_users.f_name")or($fields_arr[$value]=="auth_users.l_name")   )
      {
            generate_join("auth_users.id","$financial_table.pc_id",$join);
            generate_join("$view_table.client_id","$financial_table.client_id",$join);    
            
            generate_from("auth_users",$from);
            generate_from($financial_table,$from);   
            
            $view_sql.= ", $fields_arr[$value] as '".$_POST["$ind"]."'";     
      }    

      
      else $view_sql.= ", $view_table.$fields_arr[$value] as '".$_POST["$ind"]."'";


   }


  }


  $subtotal_string="";
  //generate subtotal columns
  $group_fields=$_POST["group1"].$_POST["group2"].$_POST["group3"];

  for ($i=1;$i<=count($total_arr_fields);$i++)
   if ( (!empty($_POST["subtotal$i"])) && ( !empty($group_fields) ) )
   {
   $view_sql.= ", ".$_POST["subtotal$i"]." as '".$total_arr_fields[$_POST["subtotal$i"]]."' ";
   $subtotal_string.=$_POST["subtotal$i"].";";
   }
   elseif ( (!empty($_POST["subtotal$i"])) && ( empty($group_fields) ) )
   {
   message_box('Subtotals only apply when grouping is specified for the view');
   echo "<script language='Javascript'> setTimeout(\"history.back();\", 3000 ); </script>";
   exit;
   }


  //generate total fields

  $total_string="";
  for ($i=1;$i<=count($total_arr_fields);$i++)
  if (!empty($_POST["total$i"]) ) $total_string.=$_POST["total$i"].";";



  if ( (strlen($subtotal_string)>1) || (strlen($total_string)>1) )
  ( $is_financial == 0 ) ? $from.=", $financial_table" : $from.="" ;



  // generate  where sintax



  foreach ($_POST as $key=>$value )
  {
      if($_POST['all_or_filtered']!="WHERE") break;



                                                if ( ( strpos(" ".$key, "filter")==1 ) && ( !empty($value) ) &&( strpos(" ".$key, "_")==0 ))
      {

       //    echo $join;

           include "../../includes/format_fields.inc.php";
       //    echo "<br />".$join;
      //     exit;

             if  ( in_array($value,array_flip($date_fields)) )
            {
                       // echo   $_POST["f{$key[6]}_date_input"];
                        $_POST["f{$key[6]}_date_input"] = date("Y-m-d",strtotime("".$_POST["f{$key[6]}_date_input"].""));
                        
                    //    echo  "<br />".$_POST["f{$key[6]}_date_input"];     
                     //   exit;
                        
                        switch($_POST["f{$key[6]}_date"])
                        {
                        case "1": $where.=" AND FROM_UNIXTIME($value, '%Y-%m-%d')  ".$_POST["operator$key[6]"]."  '".$_POST["f{$key[6]}_date_input"]."' ";
                                  break;

                        case "2": $where.=" AND FROM_UNIXTIME($value,'%Y-%m-%d')   ".$_POST["operator$key[6]"]."  DATE_ADD( NOW() , INTERVAL ".$_POST["f{$key[6]}_date_input_text"]." DAY )  ";
                                  break;
                        case "3": $where.=" AND FROM_UNIXTIME($value,'%Y-%m-%d')  ".$_POST["operator$key[6]"]."  DATE_SUB( NOW() , INTERVAL ".$_POST["f{$key[6]}_date_input_text"]." DAY )    ";
                                  break;
                        case "4": $where.=" AND DAYOFMONTH( FROM_UNIXTIME($value,'%Y-%m-%d') )  ".$_POST["operator$key[6]"]."   '".$_POST["f{$key[6]}_date_input_text"]."' ";

                        case "5": $where.=" AND MONTH( FROM_UNIXTIME($value,'%Y-%m-%d') )  ".$_POST["operator$key[6]"]."   '".$_POST["f{$key[6]}_date_input_text"]."' ";
                                  break;

                        case "6": $where.=" AND YEAR( FROM_UNIXTIME($value,'%Y-%m-%d') )  ".$_POST["operator$key[6]"]."   '".$_POST["f{$key[6]}_date_input_text"]."' ";
                                  break;

                        case "21": $where.=" AND FROM_UNIXTIME($value,'%Y-%m-%d')  ".$_POST["operator$key[6]"]." NOW() ";
                                  break;

                        case "22": $where.=" AND YEARWEEK( FROM_UNIXTIME($value,'%Y-%m-%d') )  ".$_POST["operator$key[6]"]." YEARWEEK( NOW() ) ";
                                  break;

                        case "23": $where.=" AND MONTH( FROM_UNIXTIME($value,'%Y-%m-%d') )  ".$_POST["operator$key[6]"]." MONTH( NOW() )  AND YEAR(FROM_UNIXTIME($value,'%Y-%m-%d')) = YEAR ( NOW() ) ";
                                  break;
                        case "24": $where.=" AND YEARWEEK( FROM_UNIXTIME($value,'%Y-%m-%d') )  ".$_POST["operator$key[6]"]." YEARWEEK( DATE_ADD( NOW() , INTERVAL 7 DAY ) ) ";
                                  break;

                        case "25": $where.=" AND MONTH( FROM_UNIXTIME($value,'%Y-%m-%d') )  ".$_POST["operator$key[6]"]." MONTH( DATE_ADD( NOW() , INTERVAL 1 MONTH ) )  AND YEAR(FROM_UNIXTIME($value,'%Y-%m-%d')) = YEAR (  DATE_ADD( NOW() , INTERVAL 1 MONTH ) ) ";
                                  break;

                        case "26": $where.=" AND YEARWEEK( FROM_UNIXTIME($value,'%Y-%m-%d') )  ".$_POST["operator$key[6]"]." YEARWEEK( DATE_SUB( NOW() , INTERVAL 7 DAY ) ) ";
                                  break;

                        case "27": $where.=" AND MONTH( FROM_UNIXTIME($value,'%Y-%m-%d') )  ".$_POST["operator$key[6]"]." MONTH( DATE_SUB( NOW() , INTERVAL 1 MONTH ) )  AND YEAR(FROM_UNIXTIME($value,'%Y-%m-%d')) = YEAR (  DATE_SUB( NOW() , INTERVAL 1 MONTH ) ) ";
                                  break;




                        }


            }

            elseif ( $_POST["operator$key[6]"] == 'LIKE')             $where.= " AND $value LIKE '%".$_POST["filter$key[6]_operand"]."%' ";
            elseif ( $_POST["operator$key[6]"] == 'NOT LIKE')     $where.= " AND $value NOT LIKE '%".$_POST["filter$key[6]_operand"]."%' ";
            elseif ( $_POST["operator$key[6]"] == '=\'\'')        $where.= " AND $value ". $_POST["operator$key[6]"]."";
            elseif ( $_POST["operator$key[6]"] == '!=\'\'')       $where.= " AND $value ". $_POST["operator$key[6]"]."";
            else                                                  $where.= " AND $value ". $_POST["operator$key[6]"]." '".$_POST["filter$key[6]_operand"]."' ";
            }

  }




                        //generate group by clause
  $i=0;
  $is_group= 0;
  foreach ($_POST as $key=>$value )
  if ( ( strpos(" ".$key, "group")==1 ) && ( !empty($value) )  )
  {
  include "../../includes/format_fields.inc.php";   
   
   if(  $i==0 )
   {
       
       $group.=" ORDER BY ";
       $is_group = 1;  
       $group.= " $value ".$_POST["asc_or_desc_groupby$key[5]"].""; 
   }
   else
     $group.= ", $value ".$_POST["asc_or_desc_groupby$key[5]"]."";
   $i++;
  }

  //generate order by clause

  $i=0;
  foreach ($_POST as $key=>$value )
  if ( ( strpos(" ".$key, "sort")==1 )  && ( !empty($value) )  )
  {

   include "../../includes/format_fields.inc.php";

   if(  $i==0 )
   {
     if ($is_group==0) 
     { 
          $orderby.=" ORDER BY ";
          $orderby.= " $value ".$_POST["asc_or_desc$key[4]"]."";
     }  
     else
     {
         $orderby.= ", $value ".$_POST["asc_or_desc$key[4]"]."";   
     } 
   }
   else   $orderby.= ", $value ".$_POST["asc_or_desc$key[4]"]."";
   $i++;
  }


//  echo $view_sql;






//  $cdb1->select($view_sql);


//  echo "<table cellpadding=5 cellspacing=0 border=1 >";


//  echo "<tr>";
//  while ($field=$cdb1->fetchField())
//  {
//    echo "<td bgcolor='gray'>".$field->name."&nbsp;</td>";
//  }
//  echo "</tr>";

//  while ( $line=$cdb1->FetchArray() )
//  {
//   echo "<tr>";
//   for ($i=0;$i<$cdb1->getFields();$i++ ) echo "<td>".$line[$i]."&nbsp;</td>";
//   echo "</tr>";
//

//  }
//  echo "</table>";

//  echo $view_sql;
//  exit;



//  foreach($_POST as $key=>$value)
//  {
//  echo "$key : ".$value."<br>";
//  }

  //set the right filter fields to be inserted in the database
  for ($i=1;$i<=4;$i++)
  {
            if  ( in_array($_POST["filter$i"],array_flip($date_fields)) )

            {
            if ($_POST["f{$i}_date"]!=1)  $_POST["f{$i}_date_input"]="";
            elseif ( $_POST["f{$i}_date"]>10 )  $_POST["f{$i}_date_input_text"]="";
            $_POST["filter{$i}_operand"]="";
            }
            elseif ($_POST["filter$i"]!="")
            {
            $_POST["f{$i}_date_input"]="";
            $_POST["f{$i}_date_input_text"]="";
            $_POST["f{$i}_date"]="";
            }
            else
            {
            $_POST["f{$i}_date_input"]="";
            $_POST["f{$i}_date_input_text"]="";
            $_POST["f{$i}_date"]="";
            $_POST["filter{$i}_operand"]="";
            }
  }

  $view_sql.=" $from $where $join $group $orderby";


  foreach($_GET as $key=>$value)
  {
          ${$key} = $value;
          $global_vars[$key] = $value;
  }
  foreach($_POST as $key=>$value)
  {
          ${$key} = $value;
          $global_vars[$key] = $value;
  }





  $sql="insert into $view_sql_table

  (id,viewName, view_perms , queryString,group_by1,group_by2,group_by3,sort_by1,sort_by2,sort_by3,all_or_some_records,all_or_some_records_alias,filter1,operator1,filter1_operand,filter1_date,filter1_date_input,filter1_date_input_text,and_or1,filter2,operator2,filter2_operand,filter2_date,filter2_date_input,filter2_date_input_text,and_or2,filter3,operator3,filter3_operand,filter3_date,filter3_date_input,filter3_date_input_text,and_or3,filter4,operator4,filter4_operand,filter4_date,filter4_date_input,filter4_date_input_text, subtotal,total,user_id,all_or_filtered,asc_or_desc1,asc_or_desc2 ,asc_or_desc3,asc_or_desc_groupby1,asc_or_desc_groupby2,asc_or_desc_groupby3,intermediate_screen,intermediate_field )

                 Values

        ('','".FormatUserInputText($name_of_view)."', '$used_by', '".addslashes($view_sql)."','$group1','$group2','$group3','$sort1','$sort2','$sort3','".FormatUserInputText($all_or_some_records)."','".FormatUserInputText($all_or_some_records_alias)."','$filter1','$operator1','$filter1_operand', '$f1_date' ,'$f1_date_input' , '$f1_date_input_text' ,'$and_or1','$filter2','$operator2','$filter2_operand', '$f2_date' ,'$f2_date_input' , '$f2_date_input_text', '$and_or2','$filter3','$operator3','$filter3_operand', '$f3_date' ,'$f3_date_input' , '$f3_date_input_text' , '$and_or3','$filter4','$operator4','$filter4_operand', '$f4_date' ,'$f4_date_input' , '$f4_date_input_text','$subtotal_string' , '$total_string' , '".$_SESSION['user']."','$all_or_filtered','$asc_or_desc1' ,'$asc_or_desc2' ,'$asc_or_desc3', '$asc_or_desc_groupby1','$asc_or_desc_groupby2','$asc_or_desc_groupby3','$intermediate_screen','$intermediate_field' )";

//echo $sql;


//exit;

if( $cdb1->insert($sql) )

{
   message_box('View succesfully inserted!');
   meta_redirect("show_allclients_main.php",1);
   exit;
}


  break;


  }



?>
