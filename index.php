<?php
 $rows = $_POST ['width'];  
 $columns = $_POST ['height'];  
$width = 7;
$height = 7;
    $i=1;
    $table='<table border="1">';
    for($r=0;$r<$width;$r++)
    {
	    $table .= '<tr>';
	   
        for($c=0;$c<$height;$c++)
	{
	    $i=($c+1)*($r+1);
            $table .= "<td>$i</td>";
            
        }
        $table .= '<tr>';
    }
    $table .= '</table>';
    echo $table;
?>
