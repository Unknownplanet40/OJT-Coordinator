<?php
function one(){

  // rondom number between 400 to 600
  $total_Time = rand(400, 600);
  //$total_Time = 600;
  $Fulfilled_Time = rand(24, 600);

  function getPercentage($total_Time, $Fulfilled_Time)
  {
    return ($Fulfilled_Time / $total_Time) * 100;
  }

  // call the function and store the returned value in a variable.
  $percentage = getPercentage($total_Time, $Fulfilled_Time);

  // Round the percentage to 0 decimal place.
  $percentage = round($percentage, 0);


  // Print the percentage.
  echo "Total Time: $total_Time<br>";
  echo "Fulfilled Time: $Fulfilled_Time<br>";
  echo "The percentage is: $percentage%<br>";
}

function two(){
  // current date
  $Login_date = date("Y-m-d");
  $Date_Completion = date("Y-m-d", strtotime("+1 year 2 months 3 days"));

  $date1 = date("Y-m-d", strtotime($Login_date));
  $date2 = date("Y-m-d", strtotime($Date_Completion));

  $datetime1 = new DateTime($date1);
  $datetime2 = new DateTime($date2);

  $interval = $datetime1->diff($datetime2);

  $days = $interval->format('%a');

  $total_days = 365;

  $percentage = ($days / $total_days) * 100;

  //remove decimal
  $percentage = number_format($percentage, 0, '.', '');

  echo "Date 1: $date1<br>";
  echo "Date 2: $date2<br>";
  echo "The percentage is: $percentage%<br>";
}

function hourscalcu(){
  //set timezone to Asia/Manila to get the current time
  date_default_timezone_set('Asia/Manila');

  $date = date("Y-m-d H:i:s");

  $timelogin = "2021-09-01 08:30:00";
  //$timelogoout = "2021-09-01 17:00:00";
  $timelogoout = $date;
  $timeRequired = 9;

  //only get the time
  $timelogin = date("H:i:s", strtotime($timelogin));
  $timelogoout = date("H:i:s", strtotime($timelogoout));

  //count the hours of login to logout
  
  $time1 = new DateTime($timelogin);
  $time2 = new DateTime($timelogoout);
  $interval = $time1->diff($time2); //difference between two dates or times
  $hours = $interval->format('%h'); //get the hour
  $minutes = $interval->format('%i'); //get the minutes
  $seconds = $interval->format('%s'); //get the seconds
  $totalhours = $hours + ($minutes / 60) + ($seconds / 3600); //convert minutes and seconds to hours
  $totalhours = number_format($totalhours, 0, '.', ''); //remove decimal

  //convert $timelogin and $timelogoout to 12 hours format
  $timelogin = date("h:i:s A", strtotime($timelogin));
  $timelogoout = date("h:i:s A", strtotime($timelogoout));



  echo "Time Login: $timelogin<br>";
  echo "Time Logout: $timelogoout<br>";
  echo "required hours: $timeRequired<br>";
  echo "Total Hours: $totalhours<br>";
  if ($totalhours > $timeRequired) {
    echo "You have been Over Time";
  } else if ($totalhours == $timeRequired) {
    echo "You have been On Time";
  } else {
    echo "You have been Under Time";
  }
}
hourscalcu();
echo "<br>";
one();
echo "<br>";
two();

?>