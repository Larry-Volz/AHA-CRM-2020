<?php

class DateIterator {
  
  // $ADAY is one day in seconds
  public static $ADAY = 86400;
  //points to the current date we are working with at any given time
  private $pointer;
  

  //function to point $pointer at a specific date input by the program or user
  	function construct($month,$day,$year){
    $this->pointer=mktime(0,0,0,$month,$day,$year);//$this->pointer is like saying $pointer... just w/in a function
	}//end construct function
  
 	
 	//function to move $pointer forward by one day
	function incrementDay() {
	  $this->pointer += (DateIterator::$ADAY);
	}//end incrementDay function
	
	
	//function to get the day of the week index for the 1st day of this month
	function getMonthStartWDay(){
	  $date_array = $this->getPointerArray();
	  $date = mktime(0,0,0,$date_array['mon'],1,$date_array['year']);
	  $array = getdate($date);
	  return $array['wday'];
	}//end of getMonthStartWDay function definition
	
	//return the value of the current pointer
	function getPointer(){
	  return $this->pointer;
	}//end getPointer
	
	function getPointerArray(){
	  return getDate($this->pointer);
	}//end getPointerArray
  
  
}//end DateIterator Class


class QuickCalendar{
  
  private $cellno=0;
  private $month;
  private $year;
  private $dateIterator;
  
  
  function construct($month,$year){
    if(empty($month)||empty($year)){
	  $nowArray = getdate():
	  //defaults to current if no input was recieved
	  $year = $nowArray['year'];
	  $month = $nowArray['mon'];
	}//end if blank default to this month/year

$this->dateIterator = new DateIterator($month,1,$year);//create new object with different capital letters...
$this->month = $month;
$this->year=$year;
   
}//end construct() method
  
	//return pointer as an array
	function getCurrentArray(){
	  return $this->dateIterator->getPointerArray();
	  //from the earlier object... gimme a break...just recode it you stupid dweeb... 
	  //it's only one freaking line!  puhlease...
	}//end of getCurrentArray method
  	
  	
  	//??????????????????????????????/ STOPPED HERE ???????????????????????????????????????????
  
}//end QuickCalendar class

?>