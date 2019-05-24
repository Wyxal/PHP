<?php/*
$startDate = strtotime('this week monday');
$endDate = strtotime('this week sunday');

$date = $startDate;
while ($date <= $endDate) {
    echo date('l',$date).PHP_EOL;
    $date = strtotime('+1 day',$date);
}*/
?>
What day of week is?
<form action= "http://localhost:8000" method="post">
<select name="formday">
<option value="">Select...</option>
<option value="1">Monday</option>
<option value="2">Tuesday</option>
<option value="3">Wednesday</option>
<option value="4">Thursday</option>
<option value="5">Friday</option>
<option value="6">Saturday</option>
<option value="7">Sunday</option>
</select>
<input type="submit" value="Submit" />
</form>




<?php
date_default_timezone_set('UTC');
switch($_POST['formday'])
{
    case '1':
        echo(" Laugh on Monday, laugh for danger.");
        break;
    case '2':
        echo (" Laugh on Tuesday, kiss a stranger.");
        break;
    case '3':
        echo (" Laugh on Wednesday, laugh for a letter.");
	break;
    case '4':
        echo (" Laugh on Thursday, something better.");
        break;
    case '5':
        echo (" Laugh on Friday, laugh for sorrow.");
        break;
    case '6':
        echo (" Laugh on Saturday, joy tomorrow.");
        break;
    case '7':
        echo (" Laugh on Sunday, have a nice day.");
	break;
    default : 
	    echo date("l");
	    break;
}
?>
