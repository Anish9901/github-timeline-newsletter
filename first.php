<html>
  <head>
    <title>
      GitHub Timleine Updates.
    </title>
  </head>
  <body>
  <h1>GitHub Timleine Updates</h1>
  <?php
  
$xml = simplexml_load_file('test.xml') or die("Cant load xml");

/* $abc = 'fff/aaa';
$xyz =  'aaa/bbb';
$link = 'https://github.com';
$test = "$xyz forked <a href = '$link/$abc'>$abc</a> from $xyz <br>"; */
//$test = $xyz.' forked <a href = "#">'.$abc.' </a>from '.$xyz.'<br>';
echo $test;

foreach($xml->entry as $record)
{
  //print_r($record);
	$show = $record->link->attributes();
  //print_r($show);
  
  /* echo "<br>";
  echo $record->title;
  echo "<br>";  */
  $first = '';
  $last = '';
  $middle = '';
  $restofthestring = '';
  $yo = $record->title;
  $str = explode(" ",$yo);
  $first = $str[0]." ";
  $last = $str[count($str)-1];

  $href1 = $record->author->uri;
  $href2 = $show['href'];
  $href3 = "https://github.com/".$last;

  if ($str[1]=="forked")
  {
    $middle = $str[2];
    //echo $middle;
  }
  for ($x = 1; $x < count($str)-1;$x++)
  {
    if ($str[1]=="forked")
    {
      $middle = $str[2];
      $restofthestring = "forked <a href= '$href2'>$middle</a> from";
    }
    else
    {
      $restofthestring = $restofthestring.$str[$x]." "; 
    }
  }
  //$show = "$first $middle $last";
  $beg = "<a href = '$href1'>$first</a>";
  $end = "<a href = '$href3'>$last</a>";
  $check = "<a href = '$href2'>[Check Here]</a>";
  echo "$beg $restofthestring $end $check"."<br><br>";
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


