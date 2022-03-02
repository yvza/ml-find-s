<?php
echo "Sky? ";
$input_sky = fopen("php://stdin","r");
$sky = trim(fgets($input_sky));

echo "Air Temp? ";
$input_air = fopen("php://stdin","r");
$air = trim(fgets($input_air));

echo "Humidity? ";
$input_hum = fopen("php://stdin","r");
$hum = trim(fgets($input_hum));

echo "Wind? ";
$input_wind = fopen("php://stdin","r");
$wind = trim(fgets($input_wind));

echo "Water? ";
$input_water = fopen("php://stdin","r");
$water = trim(fgets($input_water));

echo "Forecast? ";
$input_forecast = fopen("php://stdin","r");
$forecast = trim(fgets($input_forecast));

$txt_file    = file_get_contents('dummy.txt');
$rows        = explode("\n", $txt_file);
array_shift($rows);
$x=0;
 
foreach($rows as $row => $data)
{
	// Memisahkan Item Data dariPemisah |, array pada PHP dimulaipada index ke-0
	$row_data = explode('|', $data);
		
	$info[$row][0]      = $row_data[0];
	$info[$row][1]      = $row_data[1];
	$info[$row][2]      = $row_data[2];
	$info[$row][3]      = $row_data[3];
	$info[$row][4]      = $row_data[4];
	$info[$row][5]      = $row_data[5];
	$info[$row][6]      = $row_data[6];
		
	$x++;     
}
     
$temp=array('*', '*', '*', '*', '*', '*');

$h=1;

echo "---------------------result------------------\n";
for($i=0; $i<$x; $i++){
	if(substr($info[$i][6],0,3)=='yes'){
		echo "hipotesa ".$h++." :";
		for($j=0; $j<6; $j++){
			if($i==0){
				$temp[$j]=$info[$i][$j];
			}
			else{
				if($info[$i][$j]!=$temp[$j])
					$temp[$j]='*';
			}
			echo " ".$temp[$j];     
		}
	echo "\n";
	}
}

$problem=array($sky, $air, $hum, $wind, $water, $forecast);
echo "masalah : ";

for($i=0;$i<6; $i++){
	echo $problem[$i]." ";
}

for($i=0;$i<6; $i++){
	if($problem[$i]!=$temp[$i])
		$problem[$i]='*';
}
$hasil=0;
for($i=0;$i<6; $i++){
	if($problem[$i]==$temp[$i])
		$hasil++;
}
echo "\nhasil : ";
if($hasil==6)
	echo "yes";
else
	echo "no";
?>