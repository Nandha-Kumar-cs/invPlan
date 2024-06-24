<?php
?>
<!DOCTYPE html>
<html lang="<?php _trans('cldr'); ?>">
<head>
    <meta charset="utf-8">
    <title><?php _trans('invoice'); ?></title>
    <link rel="stylesheet"
          href="<?php echo base_url(); ?>assets/<?php echo get_setting('system_theme', 'invoiceplane'); ?>/css/templates.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/core/css/custom-pdf.css">
</head>
<body>
<style>

body {
  size: 5.5in 8.5in;
}
table {
  border-collapse: collapse;
  margin-top: 10%;
  margin-bottom: 15%;
 
}
td{
overflow:hidden;
}

</style>

<?php

	include './Custom/config.php';
	
	$invoice_id=$invoice->invoice_id;
	$result = mysqli_query($con,"SELECT inv_amount.invoice_total, inv_amount.invoice_item_tax_total as tax_total,invoice.invoice_terms,invoice.client_id,
								inv_item_amount.item_subtotal,inv_item_amount.item_tax_total,inv_item_amount.item_discount,inv_item_amount.item_total, inv_item.item_description,inv_item.item_quantity,inv_item.item_price,
								tax_rates.tax_rate_name,tax_rates.tax_rate_percent FROM `ip_invoices` as invoice 
								JOIN `ip_invoice_amounts` as inv_amount ON inv_amount.invoice_id=invoice.invoice_id 
								JOIN `ip_invoice_items` as inv_item ON inv_item.invoice_id=invoice.invoice_id 
								JOIN `ip_invoice_item_amounts` as inv_item_amount ON inv_item_amount.item_id=inv_item.item_id 
								JOIN `ip_tax_rates` as tax_rates ON tax_rates.tax_rate_id=inv_item.item_tax_rate_id 
								WHERE invoice.invoice_id=".$invoice_id."");
					
	
	$row = mysqli_fetch_array($result);
	
	$sql20=mysqli_query($con,"SELECT  ifnull(`invoice_custom_fieldvalue`,'-')  as payment_terms FROM `ip_invoice_custom` WHERE `invoice_custom_fieldid`=7 AND `invoice_id`=".$invoice_id." 
UNION ALL
SELECT '-' as payment_terms FROM DUAL");
//echo (json_encode($invoice))."ssssss<br>";
//echo $invoice->invoice_terms;

	$row20= mysqli_fetch_array($sql20); 
	
	$sql21=mysqli_query($con,"SELECT ifnull(`client_custom_fieldvalue`,'-') as gstno FROM `ip_client_custom` WHERE `client_custom_fieldid`=35 AND `client_id`='$row[client_id]' 
UNION ALL
SELECT '-' as gstno FROM DUAL");
	$row21= mysqli_fetch_array($sql21); 
		$sql22=mysqli_query($con,"SELECT `tax_rate_name`,`tax_rate_percent` FROM `ip_invoice_items` 
jOIN `ip_tax_rates` as tax_rates on tax_rates.tax_rate_id=item_tax_rate_id
WHERE `invoice_id`=".$invoice_id." ORDER BY `item_id` asc");
	$row22= mysqli_fetch_array($sql22); 
	
	
	$sql23=mysqli_query($con,"SELECT  ifnull(`invoice_custom_fieldvalue`,'-')  as con_order_no FROM `ip_invoice_custom` WHERE `invoice_custom_fieldid`=5 AND `invoice_id`=".$invoice_id." 
UNION ALL
SELECT '-' as con_order_no FROM DUAL");
	$row23= mysqli_fetch_array($sql23);	
	
	
	
//	SELECT ifnull( ifnull(`invoice_custom_fieldvalue`,'-') ,'-') as reference FROM `ip_invoice_custom` WHERE `invoice_custom_fieldid`=6 AND `invoice_id`=436
//UNION ALL
//SELECT '-' as reference FROM DUAL
		
	$sql2=mysqli_query($con,"SELECT  ifnull(`invoice_custom_fieldvalue`,'-')  as reference FROM `ip_invoice_custom` WHERE `invoice_custom_fieldid`=6 AND `invoice_id`=".$invoice_id." 
UNION ALL
SELECT '-' as reference FROM DUAL");
	$row2 = mysqli_fetch_array($sql2); 	
	
	$sql3=mysqli_query($con,"SELECT  ifnull(`invoice_custom_fieldvalue`,'-')  as con_order_date FROM `ip_invoice_custom` WHERE `invoice_custom_fieldid`=36 AND `invoice_id`=".$invoice_id." 
UNION ALL
SELECT '-' as con_order_date FROM DUAL");
	$row3 = mysqli_fetch_array($sql3); 	
	
	$sql4=mysqli_query($con,"SELECT  ifnull(`invoice_custom_fieldvalue`,'-')  as mode_of_shipment FROM `ip_invoice_custom` WHERE `invoice_custom_fieldid`=9 AND `invoice_id`=".$invoice_id." 
UNION ALL
SELECT '-' as mode_of_shipment FROM DUAL");
	$row4 = mysqli_fetch_array($sql4); 
	
	$sql5=mysqli_query($con,"SELECT  ifnull(`invoice_custom_fieldvalue`,'-')  as port_of_loading FROM `ip_invoice_custom` WHERE `invoice_custom_fieldid`=39 AND `invoice_id`=".$invoice_id." 
UNION ALL
SELECT '-' as port_of_loading FROM DUAL");
	$row5 = mysqli_fetch_array($sql5); 
	
	$sql6=mysqli_query($con,"SELECT  ifnull(`invoice_custom_fieldvalue`,'-')  as port_of_discharge FROM `ip_invoice_custom` WHERE `invoice_custom_fieldid`=40 AND `invoice_id`=".$invoice_id." 
UNION ALL
SELECT '-' as port_of_discharge FROM DUAL");
	$row6 = mysqli_fetch_array($sql6); 	 
	
	$sql7=mysqli_query($con,"SELECT  ifnull(`invoice_custom_fieldvalue`,'-')  as gft_des FROM `ip_invoice_custom` WHERE `invoice_custom_fieldid`=67 AND `invoice_id`=".$invoice_id." 
UNION ALL
SELECT '-' as gft_des FROM DUAL");
	$row7 = mysqli_fetch_array($sql7);	
	
	$sql8=mysqli_query($con,"SELECT  ifnull(`invoice_custom_fieldvalue`,'-')  as con_tax_no FROM `ip_invoice_custom` WHERE `invoice_custom_fieldid`=42 AND `invoice_id`=".$invoice_id."");
	$row8 = mysqli_fetch_array($sql8); 
	
	
	$sql9=mysqli_query($con,"SELECT  ifnull(`invoice_custom_fieldvalue`,'-')  as gross_weight FROM `ip_invoice_custom` WHERE `invoice_custom_fieldid`=2 AND `invoice_id`=".$invoice_id." 
UNION ALL
SELECT '-' as gross_weight FROM DUAL");
	$row9 = mysqli_fetch_array($sql9); 	
	
	$sql10=mysqli_query($con,"SELECT  ifnull(`invoice_custom_fieldvalue`,'-')  as no_of_packages FROM `ip_invoice_custom` WHERE `invoice_custom_fieldid`=1 AND `invoice_id`=".$invoice_id." 
UNION ALL
SELECT '-' as no_of_packages FROM DUAL");
	$row10 = mysqli_fetch_array($sql10);	
	
	$sql11=mysqli_query($con,"SELECT  ifnull(`invoice_custom_fieldvalue`,'-')  as delivery_to FROM `ip_invoice_custom` WHERE `invoice_custom_fieldid`=15 AND `invoice_id`=".$invoice_id." 
UNION ALL
SELECT '-' as delivery_to FROM DUAL");
	$row11 = mysqli_fetch_array($sql11);	
	
	$sql12=mysqli_query($con,"SELECT  ifnull(`invoice_custom_fieldvalue`,'-')  as ats_form_no FROM `ip_invoice_custom` WHERE `invoice_custom_fieldid`=55 AND `invoice_id`=".$invoice_id." 
UNION ALL
SELECT '-' as ats_form_no FROM DUAL");
	$row12 = mysqli_fetch_array($sql12);	
	
	$sql13=mysqli_query($con,"SELECT  ifnull(`invoice_custom_fieldvalue`,'-')  as usd_rate FROM `ip_invoice_custom` WHERE `invoice_custom_fieldid`=64 AND `invoice_id`=".$invoice_id." 
UNION ALL
SELECT '-' as usd_rate FROM DUAL");
	$row13= mysqli_fetch_array($sql13);	
	
	$sql14=mysqli_query($con,"SELECT  ifnull(`invoice_custom_fieldvalue`,'-')  as exchange_value FROM `ip_invoice_custom` WHERE `invoice_custom_fieldid`=14 AND `invoice_id`=".$invoice_id." 
UNION ALL
SELECT '-' as exchange_value FROM DUAL");
	$row14= mysqli_fetch_array($sql14);	
	
	$sql15=mysqli_query($con,"SELECT  ifnull(`invoice_custom_fieldvalue`,'-')  as ref_no FROM `ip_invoice_custom` WHERE `invoice_custom_fieldid`=66 AND `invoice_id`=".$invoice_id." 
UNION ALL
SELECT '-' as ref_no FROM DUAL");
	$row15= mysqli_fetch_array($sql15);
	
	$sql16=mysqli_query($con,"
	SELECT `ip_custom_values`.custom_values_value as currency
FROM `ip_invoice_custom` 
join `ip_custom_values` ON `ip_custom_values`.`custom_values_id`=`ip_invoice_custom`.`invoice_custom_fieldvalue`
where invoice_id=".$invoice_id." AND invoice_custom_fieldid=51");
	$row16= mysqli_fetch_array($sql16);
	
	$sql50=mysqli_query($con,"
	SELECT `ip_custom_values`.custom_values_value as shipment
FROM `ip_invoice_custom` 
join `ip_custom_values` ON `ip_custom_values`.`custom_values_id`=`ip_invoice_custom`.`invoice_custom_fieldvalue`
where invoice_id=".$invoice_id." AND invoice_custom_fieldid=9");
	$row50= mysqli_fetch_array($sql50);
	
	$sql17=mysqli_query($con,"SELECT  ifnull(`invoice_custom_fieldvalue`,'-')  as itchs_code FROM `ip_invoice_custom` WHERE `invoice_custom_fieldid`=41 AND `invoice_id`=".$invoice_id." 
UNION ALL
SELECT '-' as itchs_code FROM DUAL");
	$row17= mysqli_fetch_array($sql17);
	
	$sql18=mysqli_query($con,"SELECT  ifnull(`invoice_custom_fieldvalue`,'-')  as hsn_code FROM `ip_invoice_custom` WHERE `invoice_custom_fieldid`=8 AND `invoice_id`=".$invoice_id." 
UNION ALL
SELECT '-' as hsn_code FROM DUAL");
	$row18= mysqli_fetch_array($sql18);	
	/*
	SELECT client_custom.client_custom_fieldvalue as gstno,
		case 
        	when invoice_custom.invoice_custom_fieldid=7 
            	THEN invoice_custom.invoice_custom_fieldvalue END as payment_terms         

	FROM `ip_invoices` as invoice 
	JOIN `ip_client_custom` as client_custom ON client_custom.`client_id`=invoice.client_id 
	right JOIN `ip_invoice_custom` as invoice_custom ON invoice.invoice_id=invoice_custom.invoice_id
	
	WHERE client_custom.client_custom_fieldid=35 AND invoice.invoice_id=3
	
	
	
	SELECT invoice.invoice_id,
		case 
        	when invoice_custom.invoice_custom_fieldid=7 
            	THEN invoice_custom.invoice_custom_fieldvalue END as payment_terms,
         case 
         	when client_custom.client_custom_fieldid=35
            	then client_custom.client_custom_fieldvalue END as gstno

	FROM `ip_invoices` as invoice 
	JOIN `ip_client_custom` as client_custom ON client_custom.`client_id`=invoice.client_id 
	right JOIN `ip_invoice_custom` as invoice_custom ON invoice.invoice_id=invoice_custom.invoice_id
	
	WHERE  AND invoice.invoice_id=3
	
	
	SELECT client_custom.client_custom_fieldvalue as gstno, invoice_custom.invoice_custom_fieldvalue as payment_terms,
custom_fields.custom_field_label,custom_fields.custom_field_id
	FROM `ip_invoices` as invoice 
	JOIN `ip_client_custom` as client_custom ON client_custom.`client_id`=invoice.client_id
	left JOIN `ip_invoice_custom` as invoice_custom ON invoice.invoice_id=invoice_custom.invoice_id
    join `ip_custom_fields`as custom_fields ON custom_fields.custom_field_id=invoice_custom.invoice_custom_fieldid	
	WHERE client_custom.client_custom_fieldid=35 AND invoice.invoice_id=3 AND custom_fields.custom_field_table="ip_invoice_custom" 
	*/
	
?>

<?php

if($custom_fields['invoice']['Marks&Number of Package']!=''){
$sexp=explode(" ",$custom_fields['invoice']['Marks&Number of Package']);
//echo json_encode($sexp).'<BR>';

$idx=1;
 if($sexp[2]==0){
	$idx=1;
 }
}
else{
	$sexp[2]=1;
}
for($idx=0;$idx<=$sexp[2];$idx++)
{

?>
<TABLE FRAME=VOID CELLSPACING=0 COLS=10 RULES=NONE BORDER=0 STYLE="margin-top:20%;">
	<COLGROUP><COL WIDTH=89><COL WIDTH=86><COL WIDTH=187><COL WIDTH=181><COL WIDTH=175><COL WIDTH=151><COL WIDTH=78><COL WIDTH=105><COL WIDTH=107><COL WIDTH=97></COLGROUP>
	<TBODY>
		<TR>
			<TD STYLE="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000 " COLSPAN=10 WIDTH=1255 HEIGHT=30 ALIGN=CENTER><B><FONT SIZE=3.5>PACKING LIST</FONT></B></TD>
			</TR>
		<TR>
			<TD STYLE="border-top: 1px solid #000000; border-left: 1px solid #000000" HEIGHT=20 ALIGN=LEFT><FONT SIZE=3.5><B><I><U><?php
				if( $row16['currency']!='INR') echo	'EXPORTER';
				else echo 'CONSIGNOR';
			?></I></U></B></TD>
			<TD STYLE="border-top: 1px solid #000000" ALIGN=LEFT><BR></TD>
			<TD STYLE="border-top: 1px solid #000000; border-right: 1px solid #000000" ALIGN=LEFT><BR></TD>
			<TD STYLE="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE><FONT SIZE=3.5> <B>Invoice No</B></FONT></TD>
			<TD STYLE="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER SIZE=3><B>Date of invoice</B></FONT></TD>
			<TD STYLE="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER><FONT SIZE=3.5><B>Packing List No.</B></FONT></TD>
			<TD STYLE="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=2 ALIGN=CENTER><FONT SIZE=3.5><B>Packing List Date</B></FONT></TD>
			<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=2 ROWSPAN=3 ALIGN=CENTER VALIGN=MIDDLE><B><FONT FACE="Arial Black" SIZE=4>PACKING SLIP<BR><?php
			if($idx>0)
			{
				if($idx<10){ echo '0'. $idx;} else{ echo $idx; }
				echo '-';
			if($custom_fields['invoice']['Marks&Number of Package']!='')
			{
			
			echo substr($custom_fields['invoice']['Marks&Number of Package'] ,5,2).'';
			}
			else{
				echo '01'.'';
			}
			 } ?></FONT></B></TD>
			</TR>
		<TR>
			<TD STYLE="border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=3 HEIGHT=17 ALIGN=LEFT> MAGNETO DYNAMICS PVT. LTD.,</TD>
			<TD STYLE="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ROWSPAN=2 ALIGN=CENTER VALIGN=MIDDLE SDVAL="27" SDNUM="1033;"><FONT SIZE=3.5><?php echo $invoice->invoice_number; ?></FONT></TD>
			<TD STYLE="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ROWSPAN=2 ALIGN=CENTER VALIGN=MIDDLE SDNUM="1033;0;MM/DD/YY"><FONT SIZE=3.5><?php echo date('d-M-Y',strtotime($invoice->invoice_date_created)); ?></FONT></TD>
			<TD STYLE="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ROWSPAN=2 ALIGN=CENTER VALIGN=MIDDLE SDVAL="27" SDNUM="1033;"><FONT SIZE=3.5><?php echo $invoice->invoice_number; ?></FONT></TD>
			<TD STYLE="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=2 ROWSPAN=2 ALIGN=CENTER VALIGN=MIDDLE SDNUM="1033;0;MM/DD/YY"><FONT SIZE=3.5><?php echo date('d-M-Y',strtotime($invoice->invoice_date_created)); ?></FONT></TD>
			</TR>
		<TR>
			<TD STYLE="border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=3 HEIGHT=17 ALIGN=LEFT> Plot No.7,8 &amp; 9</TD>
			</TR> 
		<TR>
			<TD STYLE="border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=3 HEIGHT=20 ALIGN=LEFT><FONT FACE="Lucida Sans Unicode"> Venkateswara Nagar Main Road,</FONT></TD>
			<TD STYLE="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=3 ALIGN=LEFT><FONT FACE="Lucida Sans Unicode"><B>Buyer`s Order No.&amp; Date</B></FONT></TD>
			<TD STYLE="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=4 ALIGN=LEFT><B>Buyer Ref. Name</B></TD>
			</TR>
		<TR>
			<TD STYLE="border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=3 HEIGHT=24 ALIGN=LEFT><FONT FACE="Lucida Sans Unicode"> Perungudi,  Chennai &ndash; 600 096.</FONT></TD>
			<TD STYLE="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=3 ALIGN=LEFT><FONT SIZE=3.5><?php if(isset($row23["con_order_no"])) { 
			$row23['con_order_no']=str_replace("&","<br>",$row23['con_order_no']);
			echo $row23['con_order_no'];} ?><?php if(isset($row3["con_order_date"])) { echo ' & '.$row3['con_order_date'];} ?></FONT></TD>
			<TD STYLE="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=4 ALIGN=LEFT><FONT SIZE=3.5><?php if(isset($custom_fields['invoice']['Reference Name'])){ echo $custom_fields['invoice']['Reference Name']; } ?></FONT></TD>
			</TR>
		<TR>
			<TD STYLE="border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=3 HEIGHT=20 ALIGN=LEFT><FONT FACE="Lucida Sans Unicode"> INDIA.</FONT></TD>
			<TD STYLE="border-left: 1px solid #000000" ALIGN=LEFT><B><I><U><FONT SIZE=3.5>	<?php
				if( $row16['currency']!='INR') echo	'SHIP TO';
				else echo 'DELIVERY ADDRESS';
			?></FONT></U></I></B></TD>
			<TD STYLE="border-top: 1px solid #000000; border-right: 1px solid #000000" ALIGN=LEFT><BR></TD>
			<TD STYLE="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=2 ALIGN=CENTER VALIGN=MIDDLE><B>Pre Carriage by</B></TD>
			<TD STYLE="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=3 ALIGN=CENTER><B>Place of Receipt by Pre-Carrier</B></TD>
			</TR>
		<TR>
			<TD STYLE="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=3 HEIGHT=20 ALIGN=LEFT>Ph : 044-24960663</TD>
			<TD STYLE="border-left: 1px solid #000000" rowspan=5 ALIGN=LEFT ><?php echo nl2br($invoice->invoice_terms); ?></TD>
			<TD STYLE="border-right: 1px solid #000000" ALIGN=LEFT><BR></TD>
			<TD STYLE="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=2 ROWSPAN=2 ALIGN=CENTER VALIGN=MIDDLE><FONT SIZE=3.5><?php if(isset($custom_fields['invoice']['Mode of Shipment'])) { echo $custom_fields['invoice']['Mode of Shipment']; }?></FONT></TD>
			<TD STYLE="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=3 ROWSPAN=2 ALIGN=CENTER VALIGN=MIDDLE><FONT SIZE=3.5><?php if(isset($custom_fields['invoice']['Port of Loading'])) { echo $custom_fields['invoice']['Port of Loading']; }?></FONT></TD>
			</TR>
		<TR>
			<TD STYLE="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=3 HEIGHT=17 ALIGN=LEFT><FONT SIZE=3.5><B><I><U><?php
				if( $row16['currency']!='INR') echo	'CONSIGNEE';
				else echo 'BILLING ADDRESS';
			?></I></U></B></TD>
			<TD STYLE="border-right: 1px solid #000000;" ALIGN=LEFT><FONT FACE="Arial Unicode MS"></FONT></TD>
			<TD COLSPAN=2 ALIGN=LEFT></TD>
			</TR>
		<TR>
			<TD STYLE="border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=3 HEIGHT=20 ALIGN=LEFT><BR><?php _htmlsc(format_client($invoice)); ?></TD>
			<TD STYLE="border-right: 1px solid #000000;" ALIGN=LEFT><FONT FACE="Arial Unicode MS"></FONT></TD>
			<TD STYLE="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=2 ROWSPAN=1 ALIGN=CENTER VALIGN=TOP><B>Port of Discharge</B></TD>
			<TD STYLE="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=3 ROWSPAN=1 ALIGN=CENTER VALIGN=TOP><B>Place of Delivery</B></TD>
			</TR>
		<TR>
			<TD STYLE="border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=3 HEIGHT=20 ALIGN=LEFT><?php 			
				if ($invoice->client_address_1) {
					echo  ($invoice->client_address_1);
				}?></TD>
			<TD STYLE="border-right: 1px solid #000000;" ALIGN=LEFT><FONT FACE="Arial Unicode MS"></FONT></TD>
			<TD STYLE="border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=2 ALIGN=CENTER><FONT FACE="Arial Unicode MS"><?php if(isset($custom_fields['invoice']['Port of Discharge'])){ echo $custom_fields['invoice']['Port of Discharge']; } ?></FONT></TD>
			<TD STYLE="border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=3 ALIGN=CENTER><FONT FACE="Arial Unicode MS"><?php if(isset($custom_fields['invoice']['Place of Delivery'])){ 
			echo ($custom_fields['invoice']['Place of Delivery']);
			}else{
				echo '';
			} ?></FONT></TD>
			
			</TR>
		<TR>
			<TD STYLE="border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=3 HEIGHT=20 ALIGN=LEFT><?php
				if ($invoice->client_address_2) {
					echo ($invoice->client_address_2);
				}?><FONT FACE="Arial Unicode MS"></FONT></TD>
			<TD STYLE="border-right: 1px solid #000000" ALIGN=LEFT><FONT FACE="Arial Unicode MS"></FONT></TD>
			<TD STYLE="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=2 ROWSPAN=1 ALIGN=CENTER VALIGN=MIDDLE><FONT SIZE=3.5></FONT></TD>
			<TD STYLE="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=3 ROWSPAN=1 ALIGN=CENTER VALIGN=MIDDLE><FONT SIZE=3.5></FONT></TD>
			</TR>
		
		<TR>
			<TD STYLE="border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=3 HEIGHT=20 ALIGN=LEFT><FONT FACE="Arial Unicode MS"><?php
				if ($invoice->client_city) {
					echo ($invoice->client_city) . ' ';
				}
				?>	</FONT></TD>
			<TD STYLE="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=2 ALIGN=CENTER><B> Country of Origin of Goods</B></TD>
			<TD STYLE="border-top: 1px solid #000000; border-left: 1px solid #000000" COLSPAN=2 ALIGN=CENTER VALIGN=MIDDLE><B>Payment Terms<B></FONT></TD>
			<TD STYLE="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=3 ALIGN=CENTER VALIGN=MIDDLE><B>Country of Final Destination<B></FONT></TD>
			</TR>
		<TR>
			<TD STYLE="border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=3 HEIGHT=19 ALIGN=LEFT><FONT FACE="Arial Unicode MS">
<?php
					if ($invoice->client_state) {
						echo ($invoice->client_state) . ' ';
					}
					if ($invoice->client_zip) {
						echo ($invoice->client_zip);
					}
				?><br><?php
					if ($invoice->client_country) {
						echo ($invoice->client_country) . ' ';
					}
					
				?></TD>
			<TD STYLE="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=2 ROWSPAN=2 ALIGN=CENTER VALIGN=MIDDLE>INDIA</TD>
			<TD STYLE="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=2 ROWSPAN=2 ALIGN=CENTER VALIGN=MIDDLE><?php if(isset($custom_fields['invoice']['Payment Terms'])){ echo $custom_fields['invoice']['Payment Terms']; } ?></TD>
			<TD STYLE="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=3 ROWSPAN=2 ALIGN=CENTER VALIGN=MIDDLE><?php
			
					if ($invoice->client_country=='IN') {
						echo 'INDIA'; 
					}
					elseif ($invoice->client_country=='US') {
						echo 'USA'; 
					}
					elseif ($invoice->client_country=='DE') {
						echo 'GERMANY'; 
					}
					else{
						echo '';
					}
				?></TD>
			</TR>
		<TR>
			<TD STYLE="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=3 HEIGHT=17 ALIGN=LEFT><BR></TD>
			</TR>
		<TR>
			<TD STYLE="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=2 ROWSPAN=2 HEIGHT=34 ALIGN=CENTER><B>Marks &amp; No./ <BR>Container No.</B></TD>
			<TD STYLE="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ROWSPAN=2 ALIGN=CENTER VALIGN=MIDDLE><B>No. &amp; Kind <BR>Of  Packages</B></TD>
			<TD STYLE="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ROWSPAN=2 ALIGN=CENTER VALIGN=MIDDLE><B>Description of Goods</B></TD>
			<TD STYLE="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ROWSPAN=2 ALIGN=CENTER VALIGN=MIDDLE><B>Part No.</B></TD>
			<TD STYLE="border-top: 1px solid #000000; border-left: 1px solid #000000;" ROWSPAN=2 ALIGN=CENTER VALIGN=MIDDLE><B>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Purchase order No.<BR>  &nbsp;&nbsp;&nbsp;&nbsp; &amp; Date</B></TD>
			<TD STYLE="border-top: 1px solid #000000; border-right: 1px solid #000000" ROWSPAN=2 ALIGN=CENTER VALIGN=MIDDLE><B><font color="#fff">Line Ref.</font></B></TD>
			<TD STYLE="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ROWSPAN=2 ALIGN=CENTER VALIGN=MIDDLE><B>Quantity in <BR>Nos.</B></TD>
			<TD STYLE="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=2 ALIGN=CENTER SDNUM="1033;0;0.00"><B>Remarks</B></TD>
			</TR>
		<TR>
			<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER SDNUM="1033;0;0.00"><B>Nt. Wt.in Kgs</B></TD>
			<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER SDNUM="1033;0;0.00"><B>Gr. Wt.in Kgs</B></TD>
		</TR>
		<TR> 
			<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" COLSPAN=2 HEIGHT=81 ALIGN=CENTER VALIGN=MIDDLE SDNUM="1033;0;MM/DD/YY"><FONT SIZE=3.5><?php 
			if(isset($custom_fields['invoice']['Marks&Number of Package'])){
			echo substr($custom_fields['invoice']['Marks&Number of Package'],0,7);
			}
			else{
				echo '';
			}?></FONT></TD>
			<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE><FONT SIZE=3.5><?php 
			if(isset($custom_fields['invoice']['Marks&Number of Package'])){
			if($custom_fields['invoice']['Marks&Number of Package']!='01 - 01    01 Nos. C/B')
			{
    $mark=str_replace("C/B","<BR>Corrugated Box",$custom_fields['invoice']['Marks&Number of Package']);
			echo substr($mark ,8);
			}
else{
	$mark=str_replace("s. C/B","<BR>Corrugated Box",$custom_fields['invoice']['Marks&Number of Package']);
			echo substr($mark ,8);
}	
			}		?></FONT></TD>
			<TD STYLE="border-top: 1px solid #000000;  border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE><FONT SIZE=3.5><?php

	$sql111=mysqli_query($con,"
							SELECT inv_item_amount.item_subtotal,inv_item_amount.item_tax_total,inv_item_amount.item_discount,inv_item_amount.item_total,
							inv_item.item_description,inv_item.item_name,inv_item.item_quantity,inv_item.item_price,
							tax_rates.tax_rate_name
							FROM `ip_invoice_items` as inv_item 
							JOIN `ip_invoice_item_amounts` as inv_item_amount ON inv_item_amount.item_id=inv_item.item_id
							left JOIN `ip_tax_rates` as tax_rates ON tax_rates.tax_rate_id=inv_item.item_tax_rate_id					

							WHERE  inv_item.invoice_id =".$invoice_id." ORDER BY inv_item.item_id asc");
	while($row111 = mysqli_fetch_array($sql111))
	{
		if(isset($row111["item_name"])) {echo $row111["item_name"].'<BR><BR><BR>';
		}
  }
    ?></FONT></TD>
			<TD STYLE="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE><FONT SIZE=3.5><?php
			
			$sql1113=mysqli_query($con,"
							SELECT inv_item_amount.item_subtotal,inv_item_amount.item_tax_total,inv_item_amount.item_discount,inv_item_amount.item_total,
							inv_item.item_description,inv_item.item_name,inv_item.item_quantity,inv_item.item_price,
							tax_rates.tax_rate_name
							FROM `ip_invoice_items` as inv_item 
							JOIN `ip_invoice_item_amounts` as inv_item_amount ON inv_item_amount.item_id=inv_item.item_id
							left JOIN `ip_tax_rates` as tax_rates ON tax_rates.tax_rate_id=inv_item.item_tax_rate_id					

							WHERE  inv_item.invoice_id =".$invoice_id." ORDER BY inv_item.item_id asc");
while($row1113 = mysqli_fetch_array($sql1113))
	{
	if(isset($row1113["item_description"])) { echo $row1113["item_description"].'<BR>'.'<BR>';} } ?></FONT></TD>
			<TD STYLE="border-top: 1px solid #000000; border-left: 1px solid #000000;" ALIGN=CENTER VALIGN=MIDDLE><FONT SIZE=3.5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php if(isset($row23["con_order_no"])) { echo $row23['con_order_no'];} ?><BR>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php if(isset($row3["con_order_date"])) { echo $row3['con_order_date'];} ?><BR></FONT></TD>
			<TD STYLE="border-top: 1px solid #000000;  border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDVAL="40" SDNUM="1033;"><FONT SIZE=3.5><font color="#fff">Line Ref.</font></FONT></TD>
			<TD STYLE="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDVAL="75" SDNUM="1033;"><FONT SIZE=3.5><?php

	$sql112=mysqli_query($con,"
							SELECT inv_item_amount.item_subtotal,inv_item_amount.item_tax_total,inv_item_amount.item_discount,inv_item_amount.item_total,
							inv_item.item_description,inv_item.item_name,inv_item.item_quantity,inv_item.item_price,
							tax_rates.tax_rate_name
							FROM `ip_invoice_items` as inv_item 
							JOIN `ip_invoice_item_amounts` as inv_item_amount ON inv_item_amount.item_id=inv_item.item_id
							left JOIN `ip_tax_rates` as tax_rates ON tax_rates.tax_rate_id=inv_item.item_tax_rate_id					

							WHERE  inv_item.invoice_id =".$invoice_id." ORDER BY inv_item.item_id asc");
	while($row112 = mysqli_fetch_array($sql112))
	{
 echo $row112["item_quantity"].'<BR>'.'<BR>'; 
    }?></FONT></TD>
			<TD STYLE="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDVAL="36" SDNUM="1033;0;0.00"><FONT SIZE=3.5><?php if(isset($custom_fields['invoice']['Net Weight'])) {echo $custom_fields['invoice']['Net Weight'];  ?> Kgs <?php } ?></FONT></TD>
			<TD STYLE="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDVAL="41.5" SDNUM="1033;0;0.00"><FONT SIZE=3.5><?php if($row9['gross_weight']!='') { echo $row9['gross_weight'];?> Kgs <?php } ?></FONT></TD>
		</TR>
		<TR>
			<TD STYLE="border-top: 1px solid #000000; border-left: 1px solid #000000;border-right: 1px solid #000000;" COLSPAN=3 HEIGHT=19 ALIGN=LEFT>Total Number of packing :  <?php
			if(isset($custom_fields['invoice']['Marks&Number of Package']))
			{
			if($custom_fields['invoice']['Marks&Number of Package']!='01 - 01    01 Nos. C/B')
			{
    $mark=str_replace("C/B","<BR>Corrugated Box",$custom_fields['invoice']['Marks&Number of Package']);
			echo substr($mark ,8);
			}
			else{
				$mark=str_replace("s. C/B","<BR>Corrugated Box",$custom_fields['invoice']['Marks&Number of Package']);
			echo substr($mark ,8);
		
			}
			}			?></TD>
			<TD STYLE="border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE><BR></TD>
			<TD STYLE="border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE><BR></TD>
			<TD STYLE="border-left: 1px solid #000000;" ALIGN=CENTER VALIGN=MIDDLE><BR></TD>
			<TD STYLE=" border-right: 1px solid #000000" ALIGN=CENTER><BR></TD>
			<TD STYLE="border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER><BR></TD>
			<TD STYLE="border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER SDNUM="1033;0;0.00"><BR></TD>
			<TD STYLE="border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER><BR></TD>
		</TR>
		<TR>
			<TD STYLE="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=3 HEIGHT=19 ALIGN=LEFT>DIMENSION OF BOXES  &nbsp;&nbsp;&nbsp;:  <?php if(isset($custom_fields['invoice']['Dimension Of Boxes'])) {
				$str_arr = str_replace(",","<BR>",$custom_fields['invoice']['Dimension Of Boxes']); 
               echo $str_arr;
				
				//echo $custom_fields['invoice']['Dimension Of Boxes'];  ?>  <?php } ?></TD>
			<TD STYLE="border-left: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE></TD>
			<TD STYLE="border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE><BR></TD>
			<TD STYLE="border-left: 1px solid #000000;" ALIGN=CENTER VALIGN=MIDDLE><?php
			if(isset ($custom_fields['invoice']['Mode of Shipment'])){
			 
			echo $custom_fields['invoice']['Mode of Shipment'];
			}?><BR></TD>
			<TD STYLE=" border-right: 1px solid #000000" ALIGN=CENTER><BR></TD>
			<TD STYLE="border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER SDNUM="1033;0;0.00"><BR></TD>
			<TD STYLE="border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER SDNUM="1033;0;0.00"><BR></TD>
			<TD STYLE="border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER><BR></TD>
		</TR>
		<TR>
			<TD STYLE="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=3 HEIGHT=20 ALIGN=LEFT> NET WEIGHT : <?php if(isset($custom_fields['invoice']['Net Weight'])) {echo $custom_fields['invoice']['Net Weight'];  ?> Kgs <?php } ?></TD>
			<TD STYLE="border-bottom: 1px solid #000000; border-left: 1px solid #000000" ALIGN=LEFT><BR></TD>
			<TD STYLE="border-bottom: 1px solid #000000; border-left: 1px solid #000000" ALIGN=LEFT><BR></TD>
			<TD STYLE="border-bottom: 1px solid #000000; border-left: 1px solid #000000; " ALIGN=LEFT><BR></TD>
			<TD STYLE="border-bottom: 1px solid #000000;  border-right: 1px solid #000000" ALIGN=LEFT><BR></TD>
			<TD STYLE="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER SDVAL="75" SDNUM="1033;"><FONT SIZE=3.5><?php

	$sql112=mysqli_query($con,"
							SELECT inv_item_amount.item_subtotal,inv_item_amount.item_tax_total,inv_item_amount.item_discount,inv_item_amount.item_total,
							inv_item.item_description,inv_item.item_name,inv_item.item_quantity,inv_item.item_price,
							tax_rates.tax_rate_name
							FROM `ip_invoice_items` as inv_item 
							JOIN `ip_invoice_item_amounts` as inv_item_amount ON inv_item_amount.item_id=inv_item.item_id
							left JOIN `ip_tax_rates` as tax_rates ON tax_rates.tax_rate_id=inv_item.item_tax_rate_id					

							WHERE  inv_item.invoice_id =".$invoice_id." ORDER BY inv_item.item_id asc");
							$totalqty=0;
	while($row112 = mysqli_fetch_array($sql112))
	{
		$totalqty=$totalqty+$row112["item_quantity"];
    }
echo $totalqty; 
 	
	?></FONT></TD>
			<TD STYLE="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER SDVAL="36" SDNUM="1033;0;0.00"><FONT SIZE=3.5><?php if(isset($custom_fields['invoice']['Net Weight'])) {echo $custom_fields['invoice']['Net Weight'];  ?> Kgs <?php } ?></FONT></TD>
			<TD STYLE="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER SDVAL="41.5" SDNUM="1033;0;0.00"><FONT SIZE=3.5><?php if($row9['gross_weight']!='') { echo $row9['gross_weight'];?> Kgs <?php } ?></FONT></TD>
		</TR>
		<TR>
			<TD STYLE="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=3 HEIGHT=17 ALIGN=LEFT> GROSS WEIGHT : <?php if($row9['gross_weight']!='') {  echo $row9['gross_weight'];?> Kgs <?php } ?></TD>
			<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=4 ROWSPAN=6 ALIGN=CENTER VALIGN=MIDDLE><B></B></TD>
			<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000;" COLSPAN=3 ROWSPAN=6 ALIGN=CENTER><BR><BR><BR><BR>Signature &amp; Date</TD>
			</TR>
		<TR>
			<TD STYLE="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=3 HEIGHT=17 ALIGN=LEFT><B><U>EXPORTER STATUTORY DETAILS</U></B></TD>
			</TR>
		<TR>
			<TD STYLE="border-left: 1px solid #000000" HEIGHT=22 ALIGN=LEFT>GST No.</TD>
			<TD STYLE="border-right: 1px solid #000000" COLSPAN=2 ALIGN=LEFT>33AAACM4623Q1ZB</TD>
			</TR>
		<TR>
			<TD STYLE="border-left: 1px solid #000000" HEIGHT=23 ALIGN=LEFT>VAT No.</TD>
			<TD STYLE="border-right: 1px solid #000000" COLSPAN=2 ALIGN=LEFT SDVAL="33190920905" SDNUM="1033;">33190920905</TD>
			</TR>
		<TR>
			<TD STYLE="border-left: 1px solid #000000" HEIGHT=24 ALIGN=LEFT>IEC No: </TD>
			<TD STYLE="border-right: 1px solid #000000" COLSPAN=2 ALIGN=LEFT SDVAL="403034019" SDNUM="1033;">403034019</TD>
			</TR>
		<TR>
			<TD STYLE="border-bottom: 1px solid #000000; border-left: 1px solid #000000" HEIGHT=22 ALIGN=LEFT VALIGN=TOP>PAN No:</TD>
			<TD STYLE="border-bottom: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=2 ALIGN=LEFT VALIGN=TOP>AAACM 4623 Q</TD>
			</TR>
		
	</TBODY>
</TABLE>
<?php 
}
mysqli_close($con);

?>

</body>
</html>
html>
