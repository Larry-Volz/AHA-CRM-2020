<?php

//############################## Start ####################################

$print_block = "<h1>You've reached do_programfinancial</h1>
<strong>Transaction Details:</strong><BR>
xid (Transaction ID) = $_POST[xid]  <br>
authcode (Authorization code if status is ok) = $_POST[authcode] <br>
avs_response (Only on card transacitons ) = $_POST[avs_response] <br>
cc_last_four (Only on card transacitons ) = $_POST[cc_last_four] <br>
cc_name (Visa, MasterCard, American Express, Discover. Only cc's) = $_POST[cc_name] <br>
cvv2_response (Only on card transacitons ) = $_POST[avs_response] <br>
trans_type (order) = $_POST[trans_type] <br>
when (Time/date stamp in format of 20010509134443 - meaning 05/09/2001 at 13:44:43) = $_POST[when] <br>
status (ok, error, fail, begun) = $_POST[status] <br>
error_message  = $_POST[error_message] <br> <br>

<strong>Recurring Details:</strong><br>
recipe_name = $_POST[recipe_name] <br>
recipe_every = $_POST[recipe_every] <br>
recipe_period = $_POST[recipe_period] <br>
orig_xid (Transaction ID of originating parent transaction.) = $_POST[orig_xid] <br>
rem_reps (Remaining repetitions.) = $_POST[rem_reps] <br>
start_date = $_POST[start_date] <br>

Recurring Items:
Item specifics for recurring transactions are passed back in the following format:
1-desc, 1-cost, 1-qty, 1-x, 2-desc, 2-cost, ...(Where x would be a user specified item attribute)

There are three different scenarios for the values of these fields
1. No recur_total, recur_desc passed with original trans
   These items will reflect the item set passed through with the original order form
2. recur_total, recur_desc passed with original trans
   1-cost will be equal to recur_total, 1-desc will be equal to recur_desc, 1-qty will be 1
3. Manually scheduled recurring transaction
   These items will reflect the items that were specified while scheduling the manual recipe

recur_desc (Deprecated but still returns value of 1-desc) = $_POST[recur_desc] <br>
recur_total = $_POST[recur_total] <br>

Customer Information:
first_name = $_POST[first_name] <br>
last_name = $_POST[last_name] <br>
address = $_POST[address] <br>
city = $_POST[city] <br>
state = $_POST[state] <br>
zip = $_POST[zip] <br>
ctry = $_POST[ctry] <br>
email = $_POST[email] <br>
phone = $_POST[phone] <br>

Shipping Information:
saddr = $_POST[saddr] <br>
scity = $_POST[scity] <br>
sctry  = $_POST[sctry] <br>
sfname = $_POST[sfname] <br>
slname = $_POST[slname] <br>
sstate  = $_POST[sstate] <br>
szip = $_POST[szip] <br> ";

?>



<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>New Page 1</title>

<meta name="Microsoft Border" content="r, default">
</head>

<body><!--msnavigation--><table dir="ltr" border="0" cellpadding="0" cellspacing="0" width="100%"><tr><!--msnavigation--><td valign="top">

<? echo " $print_block "; ?>


<!-- ############################# iTransact Testing  ################################
Use "Testy" for first name
Test Account Numbers:
CREDIT CARD DEMO
Credit Card Number: 5454545454545454
Exp. Date: anything not expired

CHECKING ACCOUNT DEMO
ABA Number: 124000054
Account Number: 12345




####################### iTransact VARIABLES from postback #########################
Transaction Details:
xid (Transaction ID)
authcode (Authorization code if status is 'ok'.
avs_response (Only on card transacitons )
cc_last_four (Only on card transacitons )
cc_name (Visa, MasterCard, American Express, Discover. Only on card transactions)
cvv2_response (Only on card transacitons )
trans_type (order)
when (Time/date stamp in format of "20010509134443" - meaning 05/09/2001 at 13:44:43)
status (ok, error, fail, begun)
error_message

Recurring Details:
recipe_name
recipe_every
recipe_period
orig_xid (Transaction ID of originating parent transaction.)
rem_reps (Remaining repetitions.)
start_date

Recurring Items:
Item specifics for recurring transactions are passed back in the following format:
1-desc, 1-cost, 1-qty, 1-x, 2-desc, 2-cost, ...(Where x would be a user specified item attribute)

There are three different scenarios for the values of these fields
1. No recur_total, recur_desc passed with original trans
   These items will reflect the item set passed through with the original order form
2. recur_total, recur_desc passed with original trans
   1-cost will be equal to recur_total, 1-desc will be equal to recur_desc, 1-qty will be 1
3. Manually scheduled recurring transaction
   These items will reflect the items that were specified while scheduling the manual recipe

recur_desc (Deprecated but still returns value of 1-desc
recur_total

Customer Information:
first_name
last_name
address
city
state
zip
ctry
email
phone

Shipping Information:
saddr
scity
sctry
sfname
slname
sstate
szip -->
<!--msnavigation--></td><td valign="top" width="24"></td><td valign="top" width="1%">
<p>&nbsp;</p>

</td></tr><!--msnavigation--></table></body>

</html>
