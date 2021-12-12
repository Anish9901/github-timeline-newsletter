<?php
//$api_url = "https://github.com/timeline";
//$my_var = file_get_contents('test.xml');
//echo $my_var;
$xml = simplexml_load_file('https://github.com/timeline') or die("Cant load xml");
//print_r($xml);
foreach($xml as $record)
{
	echo "\n";
    echo $record->id."\n";
echo $record->content."\n\n";
}
//foreach($xml as $record)
//{
//    print_r($record);
//}
?>
