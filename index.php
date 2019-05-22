<?php
$width = 7;
$height = 7;
    $i;
    $table='<table border="1">';
    for($r=1;$r<=$width;$r++)
    {
	    $table .= '<tr>';
	   
        for($c=1;$c<=$height;$c++)
	{
	    $i=$c*$r;
            $table .= "<td>$i</td>";
            
        }
        $table .= '<tr>';
    }
    $table .= '</table>';
    echo $table;
?>
