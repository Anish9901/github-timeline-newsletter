<html>
  <head>
    <title>
      GitHub Timleine Updates.
    </title>
  </head>
  <body>
  <h1>GitHub Timleine Updates</h1>
  <?php
  $aa = 'hello';
  echo '<a style="text-decoration: none;" href="https://google.com">'.$aa.'</a>';
/* //$api_url = "https://github.com/timeline";
//$my_var = file_get_contents('test.xml');
//echo $my_var; */
//$xml = '<xml><test><a a="b" r="x" q="v" /></test><b/></xml>';
//$x = new SimpleXMLElement($xml);
$xml = simplexml_load_file('test.xml') or die("Cant load xml");
//print_r($xml);
//echo "hello";

foreach($xml->entry as $record)
{
  //print_r($record);
	/* $show = $record->link->attributes();
  //print_r($show);
  
  echo $show['href'];
  echo "<br>";
  echo $record->title;
  echo "<br>"; */
  $yo = $record->title;
  $str = explode(" ",$yo);
  echo $str[0]." ";
  echo $str[count($str)-1]."<br>";
  /* echo $record->author->name;
  echo "<br>";
  echo $record->author->uri;
  echo "<br>";
  //echo $record->author->uri;
  echo $record->content."\n\n"; */
}


/*  foreach($xml as $record)
{ 
    print_r($record);
} */
/* $attr = $x->test[0]->a[0]->attributes();
echo $attr['a']; */
//print_r($attr)

//print_r($xml)

?>
</body>
</html>


