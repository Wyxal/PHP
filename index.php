<?php
$width = 7;
$height = 7;
for($r=1;$r<=$width;$r++)
{
for($c=1;$c<=$height;$c++)
{
	$array[$r][$c] = rand(0,100);
}
}
print_r (getMax($array));
echo "$var\n";
print_r (getMin($array));

echo '<pre>';
print_r ($array);
echo'</pre>';

function getMax($array)
{
   $n = count($array);
   $max = $array[1][1];
   for ($r = 1; $r <= $n; $r++)
	{
		for($c=1; $c<=$n; $c++)
		{
       if ($max < $array[$r][$c])
           $max = $array[$r][$c];
       		}
        }
   return $max;
}

function getMin($array)
{
   $n = count($array);
   $min = $array[1][1];
   for ($r = 1; $r <= $n; $r++)
        {
                for($c=1; $c<=$n; $c++)
                {
       if ($min > $array[$r][$c])
           $min = $array[$r][$c];
       		}
  	 }
   return $min;

}
?>
