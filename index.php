<form action= "http://localhost:8000" method="post">
<p>Day: <input type="text" name="Day" /></p>
<input type="submit" name="submit" value="Submit" />
</form>





<?php
switch($_POST['Day'])
{
    case "Monday":
        echo(" Laugh on Monday, laugh for danger.". $_POST['Day'] . "<br />\n");
        break;
    case "Tuesday":
        echo (" Laugh on Tuesday, kiss a stranger." . $_POST['Day'] . "<br />\n");
        break;
    case "Wednesday":
        echo (" Laugh on Wednesday, laugh for a letter." . $_POST['Day'] . "<br />\n");
	break;
    case "Thursday":
        echo (" Laugh on Thursday, something better." . $_POST['Day'] . "<br />\n");
        break;
    case "Friday":
        echo (" Laugh on Friday, laugh for sorrow." . $_POST['Day'] . "<br />\n");
        break;
    case "Saturday":
        echo (" Laugh on Saturday, joy tomorrow." . $_POST['Day'] . "<br />\n");
        break;
    case "Sunday":
        echo (" Laugh on Sunday, have a nice day." . $_POST['Day'] ."<br />\n");
	break;
}
?>
