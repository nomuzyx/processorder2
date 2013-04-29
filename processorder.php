<?php
$tyreqty =$_POST['tyreqty'];
$oilqty  =$_POST['oilqty'];
$sparkqty=$_POST['sparkqty'];
$address =$_POST['address'];

//$rootdoc = $_SERVER['rootdoc.txt'];
$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
?>
<html>
<head>
<title>
	Noman's Auto parts- results
</title>	
</head>
<body>
	<h1>Noman's Auto Parts</h1>
	<h2>Order Result</h2>
	<?php 
	$date=date('H:i,js F');
	echo"<p> Order Process at ";
	echo $date;
	echo"</p>";
	echo "<p> Your Order is as follows.</p>";

	$totalqty= $tyreqty + $oilqty + $sparkqty ;
	echo"Item Ordered :".$totalqty."</br>";

	if($totalqty == 0)
	{
		echo "You have not order anything on previous Page.";
	}
	else
	{
		if ($tyreqty>0)
		{
			echo "Tyre Qty.".$tyreqty."</br>";
		}
		if ($oilqty>0)
		{
			echo "Oil Qty.".$oilqty."</br>";
		}
		if ($sparkqty>0)
		{
			echo "Spark Qty.".$sparkqty."</br>";
		}
	}
	$totalamt = 0.00;

	define('TYREPRICE',100);
	define('OILPRICE',50);
	define('SPARKPRICE',5);

	$totalamt= $tyreqty * TYREPRICE + $oilqty * OILPRICE + $sparkqty * SPARKPRICE;

	$totalamt=number_format($totalamt,2,'.',' ');

	echo'<p>Total of orders is :'.$totalamt.'</p>';
	echo'<p>Address to Ship: '.$address.'</p>';

	$outstring = $date."\t".$tyreqty." Tyres \t". $oilqty." oil\t".$sparkqty." Spark Plugs \t\$.".$totalamt."\t".$address."\n";

	@ $fp = fopen("$DOCUMENT_ROOT/processorder/rootdoc.txt",'ab');

	if (!$fp)
	{
		echo"<p><strong> Your order could not be Processed at this time.Please try later.</strong></p></body></html>";
		exit;

	}
	fwrite($fp,$outstring,strlen($outstring));
	fclose($fp);
	echo"<p>Order Written.</p>";

	?> 
</body>	
</html>