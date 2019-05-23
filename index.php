<html>
<head>
	<title>Rectangle area</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>

<body>

    <h2>Rectangle area</h2>
<form action=" http://localhost:8000" method="post">

	   <p>Width: <input type="text" name="width" /></p>

	   <p>Lenght: <input type="text" name="lenght" /></p>

	   <input type="submit" name="submit" value="Submit" />

	</form>
</body>
</html>
<?php
//echo("Width: " . $_POST['width'] . "<br />\n");
//echo("Lenght: " . $_POST['lenght'] . "<br />\n");
$w=$_POST['width'];
$l=$_POST['lenght'];
$area = $_POST['width']  *  $_POST['lenght'] ;
echo ("A rectangle of lenght $w  and width $l has area $area");
?>
