<html>
<head></head>
<body>
<?php
$today = getdate();
$start = new DateTime('2019-08-01');
$end = new DateTime('2019-08-31');
if(($today > $start) && ($today < $end))
echo "It's August so it's really hot.\n";
else echo "Not August, so at least not in the peak of the heat.\n";
 ?>
</body>
</html>

