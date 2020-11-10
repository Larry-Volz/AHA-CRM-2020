<?
//    header('Pragma: public');
//    header('Cache-Control: private');
//    header('Cache-Control: no-cache, must-revalidate');


   //     error_reporting(E_PARSE);

        $fields_arr = array (
        'financial.client_id'  => "Client ID" ,
        'f_name'   => "First Name" ,
        'middle_initial' => "Middle Initial",
        'l_name' => "Last name",
        'sales_category' => "Sales Category",
        'sales_stage' => "Sales Stage",
        'sales_contact_next' => "Sales Contact Next",
      //  'date_client_sold' => "Date sold to client",
        'record_manager' => "Record manager",
        'referred_by' => "Referred by",
        'referred_by_details' => "Details: Referred By",
        'referral_category' => "Referral Category",
        'client_flags' => "Client flag",
        'address1' => "Address1",
        'address2' => "City",
        'address3' => "State",
        'postcode' => "Zip",
        'country' => "Country",
        'email' => "E-mail",
        'prim_tel' => "Primary phone number",
        'sec_tel' => "Secondary phone number",
        'mob_tel' => "Mobile",
        'phone_ext' => "Phone Ext.",
        'primary_goal' => "Primary goal",
        'secondary_goal' => "Secondary goal",
        'additional_information' => "Additional Information",
        'first_appointment' => "First Appointment",
        'therapist' => "Therapist",
        'action' => "Action",
        'created' => "Created",
        'created_by'=>"Created By",
        'modified'=> "Modified",
        'modified_by'=> "Modified By",
        'motivation'=> "Motivation",
        'call_before' => "Call Before",
        'call_after'  => "Call After",
        'why_us'  => "Why Us",
        'amount'  => "Deposit Taken",
        'date' => "Date inserted by pc" ,
        'auth_users.f_name' => 'PC First Name',
        'auth_users.l_name' => 'PC Last Name',    
        'cc_number'  => "Credit Card Number" ,
        'cc_expiration_date' => "Expiration date" ,
        'cc_type' => "Credit Card Type" ,
        'xaction_status' => "XAction Status" ,
        'ck_routing_number' => "Ck Routing Number" ,
        'ck_account_number' => "Ck Account Number" ,
        'ck_number' => "Ck number",
        'program_id' => "Program index" ,
        'program_cost' => "Program Cost" ,
        'number_of_payments' => "Number of payments" ,
        'equal_payments_of' => "Equal Payments Of" ,
        'notes' => "Notes" ,
      //  'pc_id' => "Pc id" ,
        'date_sold' => "Date Client Sold",
        'apt_date' => "Apointment date"


        );

        $date_fields = array(
        'sales_contact_next' => "Sales Contact Next",
        'first_appointment' => "First Appointment",
        'created' => "Created",
        'modified'=> "Modified",
        'date' => "Date inserted by pc" ,
        'cc_expiration_date' => "Expiration date" ,
        'date_sold' => "Date Client Sold",
        'apt_date' => "Apointment date"



        );

        $financial_fields = array
        (
       // 'client_f_name' => "Financial Client First Name",

       // 'client_l_name' => "Financial Client Last Name",

    //    'fclient_id'  => "Financial Client ID",
        'amount'  => "Amount",
        'date' => "Date inserted by pc" ,
        'cc_number'  => "Credit Card Number" ,
        'cc_expiration_date' => "Expiration date" ,
        'cc_type' => "Credit Card Type" ,
        'xaction_status' => "XAction Status" ,
        'ck_routing_number' => "Ck Routing Number" ,
        'ck_account_number' => "Ck Account Number" ,
        'ck_number' => "Ck number",
        'program_id' => "Program index" ,
        'program_cost' => "Program Cost" ,
        'number_of_payments' => "Number of payments" ,
        'equal_payments_of' => "Equal Payments Of" ,
        'notes' => "Notes" ,
      //  'pc_id' => "Pc id" ,
        'date_sold' => "Date Client Sold",
        'apt_date' => "Apointment date"
        );


        $total_arr_fields = array(
        'financial.client_id' => "Client ID Number",
        'phone_ext' => "Phone Ext.",
        'program_cost' => "Program Cost",
        'number_of_payments' => "Number of payments",
        'equal_payments_of'   => "Equal payments of"
        );




        $operator_arr=array

        (

         'LIKE' => "contains" ,

         'NOT LIKE' => "does not contain" ,

         '=' => "equals" ,

         '!=' => "is not equal to" ,

         '=\'\'' => "is empty" ,

         '!=\'\'' => "is not empty" ,

         '<' => "is less than" ,

         '>' => "is greater than" ,

         '<=' => "less than or equal to" ,

         '>=' => "is greater than or equal to"

        );


        function undo_magic_quotes_gpc($mGetPostCookieRequestVariable)
        {
            if(get_magic_quotes_gpc() != 0)
            {
                if(is_array($mGetPostCookieRequestVariable))
                {
                    return array_map('undo_magic_quotes_gpc', $mGetPostCookieRequestVariable);
                }
                else
                {
                    return stripslashes($mGetPostCookieRequestVariable);
                }
            }
            else
            {
                return $mGetPostCookieRequestVariable;
            }
        }
        $_GET = undo_magic_quotes_gpc($_GET);
        $_POST = undo_magic_quotes_gpc($_POST);
        $_COOKIE = undo_magic_quotes_gpc($_COOKIE);
        $_REQUEST = undo_magic_quotes_gpc($_REQUEST);

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
        $financial_table = "financial";

        $date_time_fields = array();
        $date_time_fields = array ( 'sales_contact_next' , 'date_client_sold', 'created' , 'modified' , 'first_appointment' );



        $table_field_arr = array (
        'financial.client_id'  => "Client ID" ,
        'f_name'   => "First Name" ,
        'middle_initial' => "Middle Initial",
        'l_name' => "Last name",
        $desc_sales_categories_table.'.sales_category' => "Sales Category",
        $sales_stage_table.'.sales_stage' => "Sales Stage",
        'sales_contact_next' => "Sales Contact Next",
      //  'date_client_sold' => "Date sold to client",
        'record_manager' => "Record manager",
        $referred_by_table.'.referred_by' => "Referred by",
        'referred_by_details' => "Details: Referred By",
        'referral_category' => "Referral Category",
        $client_flags_table.'client_flags' => "Client flag",
        $view_table.'.address1' => "Address1",
        $view_table.'.address2' => "City",
        $view_table.'.address3' => "State",
        'postcode' => "Zip",
        'country' => "Country",
        'email' => "E-mail",
        'prim_tel' => "Primary phone number",
        'sec_tel' => "Secondary phone number",
        'mob_tel' => "Mobile",
        'phone_ext' => "Phone Ext.",
        $primary_goal_table.'.primary_goal' => "Primary goal",
        'secondary_goal' => "Secondary goal",
        'additional_information' => "Additional Information",
        'first_appointment' => "First Appointment",
        $therapist_table.'.therapist' => "Therapist",
        $action_table.'action' => "Action",
        'created' => "Created",
        'created_by'=>"Created By",
        'modified'=> "Modified",
        $modified_by_table.'.modified_by'=> "Modified By",
        'motivation'=> "Motivation",
        'call_before' => "Call Before",
        'call_after'  => "Call After",
        'why_us'  => "Why Us",
        $financial_table.'amount'  => "Deposit Taken",
        'date' => "Date inserted by pc" ,
        $financial_table.'.cc_number'  => "Credit Card Number" ,
        $financial_table.'.cc_expiration_date' => "Expiration date" ,
        $financial_table.'.cc_type' => "Credit Card Type" ,
        $financial_table.'.xaction_status' => "XAction Status" ,
        $financial_table.'.ck_routing_number' => "Ck Routing Number" ,
        $financial_table.'.ck_account_number' => "Ck Account Number" ,
        $financial_table.'.ck_number' => "Ck number",
        $financial_table.'.program_id' => "Program index" ,
        $financial_table.'.program_cost' => "Program Cost" ,
        $financial_table.'.number_of_payments' => "Number of payments" ,
        $financial_table.'.equal_payments_of' => "Equal Payments Of" ,
        'notes' => "Notes" ,
      //  'pc_id' => "Pc id" ,
        $financial_table.'.date_sold' => "Date Client Sold",
        'apt_date' => "Apointment date"


        );        

  function generate_join($key1,$key2,&$join)
  {   
  if ( strpos(" ".$join,$key1."=".$key2) == 0 ) 
  $join.= " AND ".$key1."=".$key2." " ;
 
  }

  function generate_from($table,&$from)
  {   
  if ( strpos(" ".$from,", $table") == 0 )  
  $from.=", ".$table;
 
  }
        

?>