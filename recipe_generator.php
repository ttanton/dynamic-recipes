<?php
echo '<h2>Monster Brew Dynamic Recipe Instructions Generator</h2><br>';
$source = 'https://docs.google.com/spreadsheets/d/1QKOIra_Jy2FoLFi74mJdfOUfRi2N-N_hRa1LhFIQCGQ/export?format=csv';
//$source = 'Recipe_Dynamic_Data.csv';
$raw_data = "";

try{
	$raw_data = file_get_contents($source);
} catch(Exception $e){
	echo 'Caught exception: ', $e->getMessage(), "\n";
}
$data = str_getcsv($raw_data, "\n"); //parse rows
foreach($data as &$row) $row = str_getcsv($row, ","); //parse into items

$len = count($data);
$record = 0;

// foreach($data as &$row) echo $row[0],"<br>";

echo "Select a recipe to print: <br>\n";
echo "<form method=\"post\" action=\"instr_ex.php\">\n"; 
echo "<select name=\"recipe\" size ",$len,"\">\n";
for($i = 0; $i < $len; $i++) {
	echo "<option value=\"",$i,"\">",$data[$i][0],"</option>\n";
	if ($i == $len -1){
		echo "</select><br>";
	}
}
echo "<input type=\"submit\" name=\"submit\" value=\"Build Instructions\" />";
?>
