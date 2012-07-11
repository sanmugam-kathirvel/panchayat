<?php
//documentation on the spreadsheet package is at:
//http://pear.php.net/manual/en/package.fileformats.spreadsheet-excel-writer.php
App::import('Vendor', 'Writer', array('file' => 'Spreadsheet'.DS.'Writer.php'));
$workbook  = new Spreadsheet_Excel_Writer();
$worksheet = $workbook->addWorksheet('SetMerge');
$samp = array('sanmugam', 'raj', 'selvamani', 'vishnu');
// Sets the color of a cell's content
$format = $workbook->addFormat();
//$format->setFgColor('blue');
//$format->setAlign('merge');
$i = 0;
foreach($samp as $s){
  $worksheet->write(0, $i, $s, $format);
  $i++;
}
$fmt = $workbook->addFormat();
$fmt->setAlign('center');
$worksheet->write(1, 0, 'Vishnu', $fmt);
$worksheet->setMerge(1, 0, 1, 2);
// Merge cells from row 0, col 0 to row 2, col 2
//$worksheet->setMerge(0, 0, 2, 2);

$workbook->send('SetMerge.xls');
$workbook->close();
?>
