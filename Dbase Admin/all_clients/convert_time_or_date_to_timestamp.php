<?
if($_POST[month]){
  $month=$_POST[month];
  $day=$_POST[day];  
  $year=$_POST[year];  
  $hour=$_POST[hour];  
  $minute=$_POST[minute]; 
  $second=$_POST[second];   
  
  $timestamp=mktime($hour,$minute,$second,$month,$day,$year);
  
}




?>

<html>
<head>
<title></title>



</head>
<body>
<strong>Timestamp = <? echo "$timestamp"; ?></strong><br>
<br>
<br>
<form method="post" action="convert_time_or_date_to_timestamp.php">
Month: <input type="text" name="month"><br>
Day: <input type="text" name="day" /><br>
Year: <input type="text" name="year" value="2006"/><br>
Hour (24 hr format): <input type="text" name="hour" /><br>
Minute: <input type="text" name="minute" /><br>
Second: <input type="text" name="second" /><br>


<input type="submit" value="submit">
</form>



</body>
</html>