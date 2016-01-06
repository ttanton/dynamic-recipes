<?php
require('C:\xampp\php\extras\fpdf\fpdf.php');
require('C:\xampp\php\extras\fpdi\fpdi.php');


// Process Dynamic Data
$source = 'https://docs.google.com/spreadsheets/d/1ngb-CdRBxoq67CIgWqtC6mKrDnw-uTuhCCgq49yy0o8/export?format=csv';
$raw_data = "";

try {
	$raw_data = file_get_contents($source);
} catch(Exception $e){
	echo 'Caught exception: ', $e->getMessage(), "\n";
}
$data = str_getcsv($raw_data, "\n"); //parse rows
foreach($data as &$row) $row = str_getcsv($row, ","); //parse into items

// Receive POST Recipe Index
$rec_ind = 1;

// Beer Quotes

$q[0] = "\"You can't pay the bills with beer, but who cares?\" \n- Michael Muela";
$q[1] = "\"Beer is proof that God loves us and wants us to be happy.\" \n- Benjamin Franklin";
$q[2] = "\"Never underestimate how much assistance, how much satisfaction, how much comfort, how much soul and transcendence there might be in a well-made taco and a cold bottle of beer.\" \n- Tom Robbins";
$q[3] = "\"I am a firm believer in the people. If given the truth, they can be depended upon to meet any national crisis. The great point is to bring them the real facts, and beer.\" \n- Abraham Lincoln";
$q[4] = "\"You can't be a real country unless you have a beer and an airline - it helps if you have some kind of football team, or some nuclear weapons, but in the very least you need a beer.\" \n- Frank Zappa";
$q[5] = "\"Give me a woman who loves beer and I will conquer the world.\" \n- Kaiser Wilhelm";
$q[6] = "\"Beer's intellectual. What a shame so many idiots drink it.\" \n- Ray Bradbury";
$q[7] = "\"Thirstily he set it to his lips, and as its cool refreshment began to soothe his throat, he thanked Heaven that in a world of much evil there was still so good a thing as ale.\" \n- Rafael Sabatini";
$q[8] = "\"A man who lies about beer makes enemies.\" \n- Stephen King";
$q[9] = "\"Sometimes when I reflect on all the beer I drink, I feel ashamed. Then I look into the glass and think about the workers in the brewery and all of their hopes and dreams. If I didn't drink this beer, they might be out of work and their dreams would be shattered. I think, 'It is better to drink this beer and let their dreams come true than be selfish and worry about my liver.\" \n- Babe Ruth";
$q[10] = "\"The sacred pint alone can unbind the tongue...\" \n- James Joyce";
$q[11] = "\"He was a wise man who invented beer.\" \n- Plato";
$q[12] = "\"Beer, it's the best damn drink the world.\" \n- Jack Nicholson";


function write_instruction($rec_ind, $q, $data){
// $ind = recipe index, $q = quote array, $data = recipe data array

// Dynamic Data

$bul = html_entity_decode("&bull;", ENT_HTML401,"cp1252");
$deg = html_entity_decode("&deg;", ENT_HTML401,"cp1252");

$recipe = $data[$rec_ind][0];
$style = $data[$rec_ind][1];
$og = $data[$rec_ind][2];
$fg = $data[$rec_ind][3];
$abv = $data[$rec_ind][4] . "%";
$mash = $bul . " " . $data[$rec_ind][5] . " min @ " . $data[$rec_ind][6] . $deg . " F";
if(empty($data[$rec_ind][7])){$hop1 = ""; } else{$hop1 = $bul . " " . $data[$rec_ind][7];}
if(empty($data[$rec_ind][8])){$hop2 = ""; } else{$hop2 = $bul . " " . $data[$rec_ind][8];}
if(empty($data[$rec_ind][9])){$hop3 = ""; } else{$hop3 = $bul . " " . $data[$rec_ind][9];}
if(empty($data[$rec_ind][10])){$hop4 = ""; } else{$hop4 = $bul . " " . $data[$rec_ind][10];}
if(empty($data[$rec_ind][11])){$hop5 = ""; } else{$hop5 = $bul . " " . $data[$rec_ind][11];}
if(empty($data[$rec_ind][12])){$hop6 = ""; } else{$hop6 = $bul . " " . $data[$rec_ind][12];}

if (empty($data[$rec_ind][13])){
	$sp_inst = "No special instructions needed. Instead, we have included a quote about beer: \n" . $q[rand(0,12)];
} else{
	$sp_inst = $data[$rec_ind][13];
}
if(empty($data[$rec_ind][14])){$ing1 = ""; } else{$ing1 = $bul . " " . $data[$rec_ind][14];}
if(empty($data[$rec_ind][15])){$ing2 = ""; } else{$ing2 = $bul . " " . $data[$rec_ind][15];}
if(empty($data[$rec_ind][16])){$ing3 = ""; } else{$ing3 = $bul . " " . $data[$rec_ind][16];}
if(empty($data[$rec_ind][17])){$ing4 = ""; } else{$ing4 = $bul . " " . $data[$rec_ind][17];}
if(empty($data[$rec_ind][18])){$ing5 = ""; } else{$ing5 = $bul . " " . $data[$rec_ind][18];}
if(empty($data[$rec_ind][19])){$ing6 = ""; } else{$ing6 = $bul . " " . $data[$rec_ind][19];}
if(empty($data[$rec_ind][20])){$ing7 = ""; } else{$ing7 = $bul . " " . $data[$rec_ind][20];}
if(empty($data[$rec_ind][21])){$ing8 = ""; } else{$ing8 = $bul . " " . $data[$rec_ind][21];}
if(empty($data[$rec_ind][22])){$ing9 = ""; } else{$ing9 = $bul . " " . $data[$rec_ind][22];}
if(empty($data[$rec_ind][23])){$ing10 = ""; } else{$ing10 = $bul . " " . $data[$rec_ind][23];}
if(empty($data[$rec_ind][24])){$ing11 = ""; } else{$ing11 = $bul . " " . $data[$rec_ind][24];}
if(empty($data[$rec_ind][25])){$ing12 = ""; } else{$ing12 = $bul . " " . $data[$rec_ind][25];}
if(empty($data[$rec_ind][26])){$ing13 = ""; } else{$ing13 = $bul . " " . $data[$rec_ind][26];}
if(empty($data[$rec_ind][27])){$ing14 = ""; } else{$ing14 = $bul . " " . $data[$rec_ind][27];}
if(empty($data[$rec_ind][28])){$ing15 = ""; } else{$ing15 = $bul . " " . $data[$rec_ind][28];}
if(empty($data[$rec_ind][29])){$ing16 = ""; } else{$ing16 = $bul . " " . $data[$rec_ind][29];}
if(empty($data[$rec_ind][30])){$ing17 = ""; } else{$ing17 = $bul . " " . $data[$rec_ind][30];}
if(empty($data[$rec_ind][31])){$ing18 = ""; } else{$ing18 = $bul . " " . $data[$rec_ind][31];}

// Initiate FPDI & FPDF

$pdf = new FPDI();
$pdf->setSourceFile("allgrain_template.pdf");

// Create page 1 & Read Template Page 1

$pdf->AddPage('P','Letter');
$tmp = $pdf->importPage(1);
$pdf->useTemplate($tmp,0,0);

// Declare Fonts

$pdf->AddFont('Kenyancoffee','','Kenyancoffeerg.php');
$pdf->AddFont('Roboto','','Roboto-Regular.php');
$pdf->AddFont('Roboto','L','Roboto-Light.php');
$pdf->AddFont('Roboto','B','Roboto-Bold.php');

// Write Dynamic Data - Header

$pdf->SetFont('Kenyancoffee','',23);
$pdf->SetTextColor(229,80,84);
$pdf->SetXY(57.3,19);
$pdf->Cell(0,0,$recipe);

$pdf->SetFont('Roboto','L',9.9);
$pdf->SetTextColor(0,0,0);
$pdf->SetXY(57.3,25.5);
$pdf->Cell(0,0,$style);

$pdf->SetFont('Roboto','L',9.9);
$pdf->SetTextColor(0,0,0);
$pdf->SetXY(65.2,36.2);
$pdf->Cell(0,0,$og);

$pdf->SetFont('Roboto','L',9.9);
$pdf->SetTextColor(0,0,0);
$pdf->SetXY(85.2,36.2);
$pdf->Cell(0,0,$fg);

$pdf->SetFont('Roboto','L',9.9);
$pdf->SetTextColor(0,0,0);
$pdf->SetXY(108.5,36.2);
$pdf->Cell(0,0,$abv);

// Write Dynamic Data - Ingredients

$pdf->SetFont('Roboto','B',7.5);
$pdf->SetTextColor(255,255,255);
$pdf->SetXY(5.3,156.5);
$pdf->Cell(0,0,$ing1);

$pdf->SetFont('Roboto','B',7.5);
$pdf->SetTextColor(255,255,255);
$pdf->SetXY(5.3,161.5);
$pdf->Cell(0,0,$ing2);

$pdf->SetFont('Roboto','B',7.5);
$pdf->SetTextColor(255,255,255);
$pdf->SetXY(5.3,166.5);
$pdf->Cell(0,0,$ing3);

$pdf->SetFont('Roboto','B',7.5);
$pdf->SetTextColor(255,255,255);
$pdf->SetXY(5.3,171.5);
$pdf->Cell(0,0,$ing4);

$pdf->SetFont('Roboto','B',7.5);
$pdf->SetTextColor(255,255,255);
$pdf->SetXY(5.3,176.5);
$pdf->Cell(0,0,$ing5);

$pdf->SetFont('Roboto','B',7.5);
$pdf->SetTextColor(255,255,255);
$pdf->SetXY(5.3,181.5);
$pdf->Cell(0,0,$ing6);

$pdf->SetFont('Roboto','B',7.5);
$pdf->SetTextColor(255,255,255);
$pdf->SetXY(5.3,186.5);
$pdf->Cell(0,0,$ing7);

$pdf->SetFont('Roboto','B',7.5);
$pdf->SetTextColor(255,255,255);
$pdf->SetXY(5.3,191.5);
$pdf->Cell(0,0,$ing8);

$pdf->SetFont('Roboto','B',7.5);
$pdf->SetTextColor(255,255,255);
$pdf->SetXY(5.3,196.5);
$pdf->Cell(0,0,$ing9);

$pdf->SetFont('Roboto','B',7.5);
$pdf->SetTextColor(255,255,255);
$pdf->SetXY(5.3,201.5);
$pdf->Cell(0,0,$ing10);

$pdf->SetFont('Roboto','B',7.5);
$pdf->SetTextColor(255,255,255);
$pdf->SetXY(5.3,206.5);
$pdf->Cell(0,0,$ing11);

$pdf->SetFont('Roboto','B',7.5);
$pdf->SetTextColor(255,255,255);
$pdf->SetXY(5.3,211.5);
$pdf->Cell(0,0,$ing12);

$pdf->SetFont('Roboto','B',7.5);
$pdf->SetTextColor(255,255,255);
$pdf->SetXY(5.3,216.5);
$pdf->Cell(0,0,$ing13);

$pdf->SetFont('Roboto','B',7.5);
$pdf->SetTextColor(255,255,255);
$pdf->SetXY(5.3,221.5);
$pdf->Cell(0,0,$ing14);

$pdf->SetFont('Roboto','B',7.5);
$pdf->SetTextColor(255,255,255);
$pdf->SetXY(5.3,226.5);
$pdf->Cell(0,0,$ing15);

$pdf->SetFont('Roboto','B',7.5);
$pdf->SetTextColor(255,255,255);
$pdf->SetXY(5.3,231.5);
$pdf->Cell(0,0,$ing16);

$pdf->SetFont('Roboto','B',7.5);
$pdf->SetTextColor(255,255,255);
$pdf->SetXY(5.3,236.5);
$pdf->Cell(0,0,$ing17);

$pdf->SetFont('Roboto','B',7.5);
$pdf->SetTextColor(255,255,255);
$pdf->SetXY(5.3,241.5);
$pdf->Cell(0,0,$ing18);

// Write Dynamic Data - Mash Schedule

$pdf->SetFont('Roboto','',7.5);
$pdf->SetTextColor(0,0,0);
$pdf->SetXY(63,159);
$pdf->Cell(0,0,$mash);

// Write Dynamic Data - Hop Schedule

$pdf->SetFont('Roboto','',7.5);
$pdf->SetTextColor(0,0,0);
$pdf->SetXY(114,229.4);
$pdf->Cell(0,0,$hop1);

$pdf->SetFont('Roboto','',7.5);
$pdf->SetTextColor(0,0,0);
$pdf->SetXY(114,232.6);
$pdf->Cell(0,0,$hop2);

$pdf->SetFont('Roboto','',7.5);
$pdf->SetTextColor(0,0,0);
$pdf->SetXY(114,235.8);
$pdf->Cell(0,0,$hop3);

$pdf->SetFont('Roboto','',7.5);
$pdf->SetTextColor(0,0,0);
$pdf->SetXY(114,239);
$pdf->Cell(0,0,$hop4);

$pdf->SetFont('Roboto','',7.5);
$pdf->SetTextColor(0,0,0);
$pdf->SetXY(114,242.2);
$pdf->Cell(0,0,$hop5);

$pdf->SetFont('Roboto','',7.5);
$pdf->SetTextColor(0,0,0);
$pdf->SetXY(114,245.4);
$pdf->Cell(0,0,$hop6);

// Create page 2 & Read Template Page 2

$pdf->AddPage('P','Letter');
$tmp = $pdf->importPage(2);
$pdf->useTemplate($tmp,0,0);

// Write Dynamic Data - Special Instructions

$pdf->SetFont('Roboto','',7.5);
$pdf->SetTextColor(255,255,255);
$pdf->SetXY(11,13);
$pdf->MultiCell(165,3,utf8_decode($sp_inst));

$shortname = str_replace(' ', '', $recipe);
$filename = "C:/Users/tyler/Google Drive/MonsterBrew/Product/Recipe Kits/Instructions/Instructions - All Grain/AG_INS_" . $shortname . ".pdf";
$pdf->Output($filename,'F');
}

for($i=1; $i<count($data); $i++){
	echo "Building... " . $data[$i][0] . "\n";
	write_instruction($i, $q, $data);
	
}

?>