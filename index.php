<form action= "http://localhost:8000" method="post">
<p>Monday: <input type="checkbox" name="day" value="1" /></p>
<p>Tuesday: <input type="checkbox" name="day" value="2" /></p>
<p>Wednesday: <input type="checkbox" name="day" value="3" /></p>
<p>Trursday: <input type="checkbox" name="day" value="4" /></p>
<p>Friday: <input type="checkbox" name="day" value="5" /></p>
<p>Saturday: <input type="checkbox" name="day" value="6" /></p>
<p>Sunday: <input type="checkbox" name="day" value="7" /></p>
<input type="submit" name="submit" value="Submit" />
</form>





<?php
switch($_POST['day'])
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
}
?>
