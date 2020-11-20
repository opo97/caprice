<?php
require('fpdf17\fpdf.php');
session_start();
$id = $_SESSION['c_id'];
//db connection
$con = mysqli_connect("localhost","root","","icecreamshop") or die(mysqli_error($con));

//get invoices data
$sql = "SELECT * FROM reservedorder r JOIN icecream i ON r.iceid = i.iceid JOIN ic_flavour c ON c.flavourid = r.flavourid JOIN customer t ON r.custid = t.custid
       WHERE r.custid = '$id' AND status ='pending'";
$result = mysqli_query($con, $sql)
          or die(mysqli_error($con));


$count=0;
while($invoice = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
	$c_name = $invoice['custName'];
	$c_addr = $invoice['custAddress'];
	$c_Zip = $invoice['custZip'];
	$c_city = $invoice['custCity'];
	$c_state = $invoice['custState'];
	$cp = $invoice['custPhone'];
	$status = $invoice['status'];

	if ($status == "pending") {
		$count++;
	}
}


if ($count == 0) {
	echo "<script type='text/Javascript'>
	alert('You cannot make payment because all order already in process for delivery');
	window.location='cart2.php';
	</script>";
}
	

//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

$pdf = new FPDF('P','mm','A4');

$pdf->AddPage();

//set font to arial, bold, 14pt
$pdf->SetFont('Arial','B',14);

$pdf->Image('img/logo2.png',10,10,-1000);
$pdf->Cell(130	,40,'',0,0);
$pdf->Cell(59	,40,'',0,1);
//Cell(width , height , text , border , end line , [align] )
$pdf->Cell(130	,5,'Fruzzie Gelato',0,0);
$pdf->Cell(59	,5,'INVOICE',0,1);//end of line

//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);

$pdf->Cell(130	,5,'N0 488, Kota Bangi',0,0);
$pdf->Cell(59	,5,'',0,1);//end of line

$pdf->Cell(130	,5,'Rawang, 48300, Malaysia',0,0);
$pdf->Cell(25	,5,'Date',0,0);
$pdf->Cell(34	,5,date("Y-m-d"),0,1);//end of line

$pdf->Cell(130	,5,'Phone : 09-6584120',0,0);
$pdf->Cell(25	,5,'Customer ID',0,0);
$pdf->Cell(34	,5,$id,0,1);//end of line

$pdf->Cell(130	,5,'Fax : 09-6585220',0,0);
$pdf->Cell(25	,5," ",0,0);
$pdf->Cell(34	,5," ",0,1);//end of line

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line

//billing address
$pdf->Cell(100	,5,'Bill to',0,1);//end of line

//add dummy cell at beginning of each line for indentation
$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,$c_name,0,1);

$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,$c_addr,0,1);

$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,$c_city.', '.$c_Zip.', '.$c_state,0,1);

$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,$cp,0,1);

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line

//invoice contents
$pdf->SetFont('Arial','B',12);

$pdf->Cell(100	,5,'Description',1,0);
$pdf->Cell(35	,5,'Per Piece (RM)',1,0);
$pdf->Cell(20	,5,'Quantity',1,0);
$pdf->Cell(34	,5,'Amount (RM)',1,1);//end of line

$pdf->SetFont('Arial','',12);

//Numbers are right-aligned so we give 'R' after new line parameter

//items
$query = mysqli_query($con, "SELECT * FROM reservedorder r JOIN icecream i ON r.iceid = i.iceid JOIN ic_flavour c ON c.flavourid = r.flavourid
       WHERE custid = '$id' AND status='pending' ");
$tax = 0; //total tax
$amount = 0; //total amount
$total = 0;

//display the items
while($item = mysqli_fetch_array($query, MYSQLI_ASSOC)){

	$o_id = $item['orderid'];

	if (isset($_GET['pay'])) {
		$sql2 = "UPDATE reservedorder SET status='received' WHERE orderid=$o_id";
		$result2 = mysqli_query($con, $sql2)
				or die(mysqli_error($con));
	}

	$amount = ($item['icePrice']+$item['flavourPrice']) * $item['orderQty'];
	$pdf->Cell(100	,5,$item['iceDesc'].' + '.$item['flavourDesc'],1,0);
	//add thousand separator using number_format function
	$pdf->Cell(35	,5,number_format($item['icePrice']).' + '.number_format($item['flavourPrice']),1,0);
	$pdf->Cell(20	,5,number_format($item['orderQty']),1,0);
	$pdf->Cell(34	,5,number_format($amount),1,1,'R');//end of line
	//accumulate tax and amount
	$total = $total + $amount;
}

//summary
$pdf->Cell(130	,5,'',0,0);
$pdf->Cell(25	,5,'Subtotal',0,0);
$pdf->Cell(8	,5,'RM',1,0);
$pdf->Cell(26	,5,number_format($total),1,1,'R');//end of line

$pdf->Cell(117	,5,'',0,0);
$pdf->Cell(38	,5,'Delivery Charge',0,0);
$pdf->Cell(8	,5,'RM',1,0);
$pdf->Cell(26	,5,number_format(12),1,1,'R');//end of line

$pdf->Cell(130	,5,'',0,0);
$pdf->Cell(25	,5,'Total Due',0,0);
$pdf->Cell(8	,5,'RM',1,0);
$pdf->Cell(26	,5,number_format($total + 12),1,1,'R');//end of line

$pdf->Output();
?>
