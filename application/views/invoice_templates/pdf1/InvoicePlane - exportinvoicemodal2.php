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
table {
  border-collapse: collapse;
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
	
	//$sql8=mysqli_query($con,"SELECT  ifnull(`invoice_custom_fieldvalue`,'-')  as con_tax_no FROM `ip_invoice_custom` WHERE `invoice_custom_fieldid`=42 AND `invoice_id`=".$invoice_id."");
	//$row8 = mysqli_fetch_array($sql8); 
	
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
$idx=0; 
for($idx=0;$idx<4;$idx++)
{
?>
<TABLE FRAME=VOID CELLSPACING=0 COLS=13 RULES=NONE BORDER=0>
	<COLGROUP><COL WIDTH=12>
		<COL WIDTH=107>
		<COL WIDTH=121>
		<COL WIDTH=17>
		<COL WIDTH=198>
		<COL WIDTH=13>
		<COL WIDTH=216>
		<COL WIDTH=17>
		<COL WIDTH=115>
		<COL WIDTH=98>
		<COL WIDTH=17>
		<COL WIDTH=114>
		<COL WIDTH=18>
	</COLGROUP>
	
	<TBODY>
		<TR>
		<td STYLE="border-top: 3px solid #000000; border-left: 3px solid #000000; " colspan=6 width=450 align=left>
		<?php
		if($idx==0)echo "(Original)";
		else if($idx==1)echo "(Duplicate)";
		else if($idx==2)echo "(Triplicate)";
		else if($idx==3)echo "(Quadruplicate)";
		
		?></td>
			<TD STYLE="border-top: 3px solid #000000; " WIDTH=200 HEIGHT=53 
			 >
			<B><I><FONT FACE="Microsoft Sans Serif" SIZE=7 COLOR="#000000"><?php
				if( $row16['currency']!='INR') echo	'INVOICE';
				else echo 'TAX INVOICE';
			?></FONT></I></B></td>
			<td STYLE="border-top: 3px solid #000000; border-right: 3px solid #000000; " align=right width=450 colspan=6>
			<img  style="max-width:100px; max-height:100px;align:right;" src="./Custom/images/magdyn_logo.png"></img>
			
			</TD>
		</TR>
		
		<TR>
			<TD STYLE="border-top: 1px solid #000000; border-left: 3px solid #000000"  ALIGN=LEFT><BR></TD>
			<TD STYLE="border-top: 1px solid #000000" COLSPAN=4 ALIGN=LEFT><B><I><U><FONT SIZE=5><?php
				if( $row16['currency']!='INR') echo	'EXPORTER';
				else echo 'CONSIGNOR';
			?></FONT></U></I></B></TD>
			<TD STYLE="border-top: 1px solid #000000; border-left: 1px solid #000000" ALIGN=LEFT><FONT SIZE=5><BR></FONT></TD>
			<TD STYLE="border-top: 1px solid #000000" ALIGN=LEFT><B><I><FONT SIZE=5>Invoice No.</FONT></I></B></TD>
			<TD STYLE="border-top: 1px solid #000000" ALIGN=LEFT><B><I><FONT SIZE=5>:</FONT></I></B></TD>
			<TD STYLE="border-top: 1px solid #000000" ALIGN=LEFT><FONT SIZE=5><?php echo $invoice->invoice_number; ?></FONT></TD>
			<TD STYLE="border-top: 1px solid #000000" ALIGN=LEFT><B><I><FONT SIZE=5>Date</FONT></I></B></TD>
			<TD STYLE="border-top: 1px solid #000000" ALIGN=LEFT><B><I><FONT SIZE=5>:</FONT></I></B></TD>
			<TD STYLE="border-top: 1px solid #000000; border-right: 3px solid #000000" ALIGN=left colspan=2>
			<I><FONT SIZE=5><?php echo date('d-M-Y',strtotime($invoice->invoice_date_created)); ?></FONT></I></TD>
			
		</TR>
		
		<TR>
			<TD STYLE="border-left: 3px solid #000000"  ALIGN=LEFT><BR></TD>
			<TD STYLE=" border-bottom: 3px solid #000000;border-right: 1px solid #000000" COLSPAN=4 ROWSPAN=6 ALIGN=LEFT><B><I>
			<FONT FACE="Arial Black" SIZE=5>MAGNETO DYNAMICS PVT LTD., </B><font>
			<BR><FONT  SIZE=5>Plot No.7, 8 &amp; 9,<BR>Venkateswara Nagar Main Road,
			<BR>Perungudi, Chennai &ndash; 600 096. <BR>Tamil Nadu.  INDIA.<BR>Phone: 044-24960663<BR>GST No. 33AAACM4623Q1ZB  State Code: 33
			<br>REX Registration No. <b>INREX0403034019DG004</b>
			<BR>Tin No.33190920905  CST No.632836/07.03.89<BR>PAN No.AAACM4623Q  IEC Code No.0403034019</FONT></I></TD>
			<TD STYLE="border-left: 1px solid #000000" ALIGN=LEFT><FONT SIZE=5><BR></FONT></TD>
			<TD ALIGN=LEFT><B><I><FONT SIZE=5>D.C. No.</FONT></I></B></TD>
			<TD ALIGN=LEFT><B><I><FONT SIZE=5>:</FONT></I></B></TD>
			<TD ALIGN=LEFT><FONT SIZE=5><?php echo $invoice->invoice_number; ?></FONT></TD>
			<TD ALIGN=LEFT><B><I><FONT SIZE=5>Date</FONT></I></B></TD>
			<TD ALIGN=LEFT><B><I><FONT SIZE=5>:</FONT></I></B></TD>
			<TD  STYLE="border-right: 3px solid #000000" colspan=2 ALIGN=left>
			<I><FONT SIZE=5><?php echo date('d-M-Y',strtotime($invoice->invoice_date_created)); ?></FONT></I></TD>
			
		</TR>
		<TR>
			<TD STYLE="border-left: 3px solid #000000" HEIGHT=26 ALIGN=LEFT><BR></TD>
			<TD STYLE="border-left: 1px solid #000000" ALIGN=LEFT><FONT SIZE=5><BR></FONT></TD>
			<TD ALIGN=LEFT><B><I><FONT SIZE=5>Packing Slip No.</FONT></I></B></TD>
			<TD ALIGN=LEFT><B><I><FONT SIZE=5>:</FONT></I></B></TD>
			<TD ALIGN=LEFT><FONT SIZE=5><?php echo $invoice->invoice_number; ?></FONT></TD>
			<TD ALIGN=LEFT><B><I><FONT SIZE=5>Date</FONT></I></B></TD>
			<TD ALIGN=LEFT><B><I><FONT SIZE=5>:</FONT></I></B></TD>
			<TD  STYLE="border-right: 3px solid #000000"  colspan=2 ALIGN=LEFT><I>
			<FONT SIZE=5><?php echo date('d-M-Y',strtotime($invoice->invoice_date_created)); ?></FONT></I></TD>
			
		</TR>
		
		<TR>
			<TD STYLE="border-left: 3px solid #000000" HEIGHT=35 ALIGN=LEFT><BR></TD>
			<TD STYLE="border-left: 1px solid #000000" ALIGN=LEFT><FONT SIZE=5><BR></FONT></TD>
			<TD ALIGN=LEFT><B><I><FONT SIZE=5>Consignee Order No.</FONT></I></B></TD>
			<TD ALIGN=LEFT><B><I><FONT SIZE=5>:</FONT></I></B></TD>
			<TD COLSPAN=4 ALIGN=LEFT ><I><FONT SIZE=5><?php echo $row23['con_order_no']; ?></FONT></I></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		<TR>
			<TD STYLE="border-left: 3px solid #000000" HEIGHT=34 ALIGN=LEFT><BR></TD>
			<TD STYLE="border-left: 1px solid #000000" ALIGN=LEFT><FONT SIZE=5><BR></FONT></TD>
			<TD ALIGN=LEFT ><B><I><FONT SIZE=5>Consignee Order date</FONT></I></B></TD>
			<TD ALIGN=LEFT><B><I><FONT SIZE=5>:</FONT></I></B></TD>
			<TD COLSPAN=4 ALIGN=LEFT><I><FONT SIZE=5><?php echo $row3['con_order_date']; ?></FONT></I></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		<TR>
			<TD STYLE="border-left: 3px solid #000000" HEIGHT=34 ALIGN=LEFT><BR></TD>
			<TD STYLE="border-left: 1px solid #000000" ALIGN=LEFT><FONT SIZE=5><BR></FONT></TD>
			<TD ALIGN=LEFT><B><I><FONT SIZE=5>Reference</FONT></I></B></TD>
			<TD ALIGN=LEFT><B><I><FONT SIZE=5>:</FONT></I></B></TD>
			<TD COLSPAN=4 ALIGN=LEFT><I><FONT SIZE=5><?php echo $row2['reference']; ?></FONT></I></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		<TR>
			<TD STYLE="border-bottom: 3px solid #000000; border-left: 3px solid #000000" HEIGHT=36 ALIGN=LEFT><BR></TD>
			<TD STYLE="border-left: 1px solid #000000;border-bottom: 3px solid #000000" ALIGN=LEFT><FONT SIZE=5><BR></FONT></TD>
			<TD STYLE="border-bottom: 3px solid #000000" ALIGN=LEFT><B><I><FONT SIZE=5>Payment Terms</FONT></I></B></TD>
			<TD STYLE="border-bottom: 3px solid #000000" ALIGN=LEFT><B><I><FONT SIZE=5>:</FONT></I></B></TD>
			<TD STYLE="border-bottom: 3px solid #000000" COLSPAN=4 ALIGN=LEFT><I><FONT SIZE=5><?php echo $row20['payment_terms']; ?></FONT></I></TD>
			<TD STYLE="border-bottom: 3px solid #000000; border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		
		<TR>
			<TD STYLE="border-top: 1px solid #000000; border-left: 3px solid #000000"  ALIGN=LEFT></TD>
			<TD STYLE="border-top: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=4 ALIGN=LEFT><B><I><U>
			<FONT SIZE=5><?php
				if( $row16['currency']!='INR') echo	'CONSIGNEE';
				else echo 'BILLING ADDRESS';
			?> </FONT></U></I></B></TD>
			<TD STYLE="border-top: 1px solid #000000" ALIGN=LEFT><FONT SIZE=5></FONT></TD>
			<TD STYLE="border-top: 1px solid #000000" COLSPAN=4 ALIGN=LEFT><B><I><U><FONT SIZE=5>	<?php
				if( $row16['currency']!='INR') echo	'SHIP TO';
				else echo 'DELIVERY ADDRESS';
			?></FONT></U></I></B></TD>
			<TD STYLE="border-top: 3px solid #000000;border-right: 3px solid #000000"  colspan=3 ALIGN=LEFT><B><I><U><FONT SIZE=5>	
			<?php if( $row16['currency']=='EURO') echo "ORI-No.:DE2584328" ; ?></FONT></U></I></B></TD>
			
		</TR>		
		<TR>
			<TD STYLE="border-left: 3px solid #000000" ALIGN=LEFT></TD>
			<TD STYLE=" border-right: 1px solid #000000" COLSPAN=4 rowspan=5 ALIGN=LEFT  ><B><FONT SIZE=5>			
				<?php _htmlsc(format_client($invoice)); ?></B><FONT><BR><FONT SIZE=5>
				<?php 			
				if ($invoice->client_address_1) {
					echo  ($invoice->client_address_1);
				}?>
				<br>
				<?php
				if ($invoice->client_address_2) {
					echo ($invoice->client_address_2);
				}?>
				<br>
				<?php
				if ($invoice->client_city) {
					echo ($invoice->client_city) . ' ';
				}
				?>	
				<br>
				<?php
					if ($invoice->client_state) {
						echo ($invoice->client_state) . ' ';
					}
					if ($invoice->client_zip) {
						echo ($invoice->client_zip);
					}
				?><br><?php echo $row21['gstno']; ?>
				</FONT>
			</TD>
			<TD ALIGN=LEFT><FONT SIZE=5></FONT></TD>
			<TD COLSPAN=6 ALIGN=LEFT rowspan=5 valign=top ><FONT SIZE=5><?php	
				echo nl2br($row['invoice_terms']);
				?></FONT>
			</TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT></TD>
		</TR>
		<TR>
			<TD STYLE="border-left: 3px solid #000000" HEIGHT=26 ALIGN=LEFT><BR></TD>
			<TD ALIGN=LEFT><FONT SIZE=5><BR></FONT></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		<TR>
			<TD STYLE="border-left: 3px solid #000000" HEIGHT=24 ALIGN=LEFT><BR></TD>
			
			<TD ALIGN=LEFT><FONT SIZE=5><BR></FONT></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		<TR>
			<TD STYLE="border-left: 3px solid #000000" HEIGHT=26 ALIGN=LEFT><BR></TD>
			
			<TD ALIGN=LEFT><FONT SIZE=5><BR></FONT></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		<TR>
			<TD STYLE="border-bottom: 1px solid #000000; border-left: 3px solid #000000" HEIGHT=25 ALIGN=LEFT><BR></TD>
			
			<TD STYLE="border-bottom: 3px solid #000000" ALIGN=LEFT><FONT SIZE=5><BR></FONT></TD>
			<TD STYLE="border-bottom: 3px solid #000000; border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		<TR>
			<TD STYLE="border-top: 1px solid #000000; border-left: 3px solid #000000" HEIGHT=25 ALIGN=LEFT><BR></TD>
			<TD STYLE="border-top: 1px solid #000000" COLSPAN=2 ALIGN=LEFT><B><I><FONT SIZE=5>Mode of Shipment</FONT></I></B></TD>
			<TD STYLE="border-top: 1px solid #000000" ALIGN=LEFT><B><I><FONT SIZE=5>:</FONT></I></B></TD>
			<TD STYLE="border-top: 1px solid #000000; border-right: 1px solid #000000" ALIGN=LEFT><I><FONT SIZE=5><?php echo $row4['mode_of_shipment']; ?></FONT></I></TD>
			<TD STYLE="border-top: 1px solid #000000" ALIGN=LEFT><FONT SIZE=5><BR></FONT></TD>
			<TD STYLE="border-top: 3px solid #000000" ALIGN=LEFT><B><I><FONT SIZE=5>Our Certificate of LUT No</FONT></I></B></TD>
			<TD STYLE="border-top: 3px solid #000000" ALIGN=LEFT><B><I><FONT SIZE=5>:</FONT></I></B></TD>
			<TD STYLE="border-top: 3px solid #000000" COLSPAN=4 ALIGN=LEFT><FONT SIZE=5>49 / 2017 page No.12 &amp; 13 of LUT Register</FONT></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		<TR>
			<TD STYLE="border-left: 3px solid #000000" HEIGHT=26 ALIGN=LEFT><BR></TD>
			<TD COLSPAN=2 ALIGN=LEFT><B><I><FONT SIZE=5>Shipment Ref No.</FONT></I></B></TD>
			<TD ALIGN=LEFT><B><I><FONT SIZE=5>:</FONT></I></B></TD>
			<TD STYLE="border-right: 1px solid #000000" ALIGN=LEFT><FONT SIZE=5><?php  echo $row15['ref_no']; ?></FONT></TD>
			<TD ALIGN=LEFT><FONT SIZE=5></FONT></TD>
			<TD ALIGN=LEFT><B><I><FONT SIZE=5>Consignee Tax No.</FONT></I></B></TD>
			<TD ALIGN=LEFT><B><I><FONT SIZE=5>:</FONT></I></B></TD>
			<TD COLSPAN=4 ALIGN=LEFT><FONT SIZE=5><?php if( $row16['currency']!='INR') echo "TAX No.18291 04004"; ?></FONT></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>


		<TR>
			<TD STYLE="border-left: 3px solid #000000" HEIGHT=27 ALIGN=LEFT><BR></TD>
			<TD COLSPAN=2 ALIGN=LEFT><B><I><FONT SIZE=5>Port of Loading</FONT></I></B></TD>
			<TD ALIGN=LEFT><B><I><FONT SIZE=5>:</FONT></I></B></TD>
			<TD STYLE="border-right: 1px solid #000000" ALIGN=LEFT><FONT SIZE=5><?php echo $row5['port_of_loading']; ?></FONT></TD>
			<TD ALIGN=LEFT><FONT SIZE=5><BR></FONT></TD>
			<TD ALIGN=LEFT><B><I><FONT SIZE=5>Gross Weight</FONT></I></B></TD>
			<TD ALIGN=LEFT><B><I><FONT SIZE=5>:</FONT></I></B></TD>
			<TD COLSPAN=4 ALIGN=LEFT><FONT SIZE=5><?php echo $row9['gross_weight'];?></FONT></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		<TR>
			<TD STYLE="border-bottom: 1px solid #000000; border-left: 3px solid #000000" HEIGHT=30 ALIGN=LEFT><BR></TD>
			<TD STYLE="border-bottom: 3px solid #000000" COLSPAN=2 ALIGN=LEFT><B><I><FONT SIZE=5>Port of Discharge</FONT></I></B></TD>
			<TD STYLE="border-bottom: 3px solid #000000" ALIGN=LEFT><B><I><FONT SIZE=5>:</FONT></I></B></TD>
			<TD STYLE="border-bottom: 3px solid #000000; border-right: 1px solid #000000" ALIGN=LEFT><FONT SIZE=5><?php echo $row6['port_of_discharge']; ?></FONT></TD>
			<TD STYLE="border-bottom: 3px solid #000000" ALIGN=LEFT><FONT SIZE=5><BR></FONT></TD>
			<TD STYLE="border-bottom: 3px solid #000000" ALIGN=LEFT><B><I><FONT SIZE=5>FOB Value  INR</FONT></I></B></TD>
			<TD STYLE="border-bottom: 3px solid #000000" ALIGN=LEFT><B><I><FONT SIZE=5>:</FONT></I></B></TD>
			<TD STYLE="border-bottom: 3px solid #000000" COLSPAN=4 ALIGN=LEFT SDVAL="173926" SDNUM="1033;"><FONT SIZE=5><?php 
			if($row14['exchange_value']=="-" || $row14['exchange_value']=="" || $row14['exchange_value']==0)
				echo $row['invoice_total'];
			else echo $row['invoice_total']*$row14['exchange_value'];
		?></FONT></TD>
			<TD STYLE="border-bottom: 3px solid #000000; border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		
		<TR>
			<TD STYLE="border-top: 3px solid #000000; border-bottom: 1px solid #000000; border-left: 3px solid #000000" HEIGHT=65 ALIGN=LEFT><BR></TD>
			<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE><B><I><FONT SIZE=5>Serial No.</FONT></I></B></TD>
			<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE><B><I><FONT SIZE=5>Marks &amp; Number of Package</FONT></I></B></TD>
			<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=5 ALIGN=CENTER VALIGN=MIDDLE><B><I><FONT SIZE=5>Description of Goods</FONT></I></B></TD>
			<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE><B><I><FONT SIZE=5>Total<br>Quantity<br>in Nos.</FONT></I></B></TD>
			<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=2 ALIGN=CENTER VALIGN=MIDDLE><B><I><FONT SIZE=5>Rate per Nos.<BR>in <?php echo  $row16['currency']; ?></FONT></I></B></TD>
			<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE><B><I><FONT SIZE=5>Total Amount<BR>in <?php echo  $row16['currency']; ?></FONT></I></B></TD>
			<TD STYLE="border-bottom: 1px solid #000000; border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>





		<?php
		$sno_count=1;
	$sql1=mysqli_query($con,"
							SELECT inv_item_amount.item_subtotal,inv_item_amount.item_tax_total,inv_item_amount.item_discount,inv_item_amount.item_total,
							inv_item.item_description,inv_item.item_name,inv_item.item_quantity,inv_item.item_price,
							tax_rates.tax_rate_name
							FROM `ip_invoice_items` as inv_item 
							JOIN `ip_invoice_item_amounts` as inv_item_amount ON inv_item_amount.item_id=inv_item.item_id
							left JOIN `ip_tax_rates` as tax_rates ON tax_rates.tax_rate_id=inv_item.item_tax_rate_id					

							WHERE  inv_item.invoice_id =".$invoice_id." ORDER BY inv_item.item_id asc");
	while($row1 = mysqli_fetch_array($sql1))
	{		
		echo '<TR>';
			echo '<TD STYLE="border-left: 3px solid #000000" HEIGHT=22 ALIGN=LEFT><BR></TD>';
			echo '<TD STYLE="border-right: 1px solid #000000" ALIGN=CENTER VALIGN=TOP><FONT SIZE=5><BR></FONT></TD>';
			echo '<TD STYLE="border-right: 1px solid #000000" ALIGN=CENTER VALIGN=TOP><FONT SIZE=5><BR></FONT></TD>';
			echo '<TD STYLE=" border-right: 1px solid #000000" COLSPAN=5 ALIGN=CENTER VALIGN=TOP>
			<FONT SIZE=5>'.$row1["item_name"].'</FONT></TD>';
			echo '<TD ALIGN=CENTER VALIGN=TOP><FONT SIZE=5><BR></FONT></TD>';
			echo '<TD STYLE="border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=2 ALIGN=RIGHT VALIGN=MIDDLE ><FONT SIZE=5><BR></FONT></TD>';
			echo '<TD ALIGN=CENTER VALIGN=TOP SDNUM="1033;0;#,###.00"><FONT SIZE=5><BR></FONT></TD>';
			echo '<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>';
		echo '</TR>';


		echo '<TR>';
			echo '<TD STYLE="border-left: 3px solid #000000" HEIGHT=29 ALIGN=LEFT><BR></TD>';
			echo '<TD STYLE="border-right: 1px solid #000000"  ALIGN=CENTER VALIGN=MIDDLE SDVAL="1" SDNUM="1033;"><FONT SIZE=5>'.$sno_count++.'</FONT></TD>';
			
			if($sno_count==2)
			echo '<TD STYLE="border-right: 1px solid #000000"  ALIGN=CENTER VALIGN=MIDDLE><FONT SIZE=5>'.$row10["no_of_packages"].'</FONT></TD>';
			else 
			echo '<TD STYLE="border-right: 1px solid #000000"  ALIGN=CENTER VALIGN=MIDDLE><FONT SIZE=5></FONT></TD>';
			
			echo '<TD STYLE=" border-right: 1px solid #000000" COLSPAN=5 ALIGN=CENTER><B><FONT SIZE=5>'.$row1["item_description"].'</FONT></B></TD>';
			echo '<TD ALIGN=CENTER VALIGN=MIDDLE><FONT SIZE=5>'. $row1["item_quantity"].' Nos</FONT></TD>';
			echo '<TD STYLE="border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=2 ALIGN=RIGHT VALIGN=MIDDLE SDVAL="63.2" 
			SDNUM="1033;0;#,##0.00"><FONT SIZE=5>'. $row1["item_price"].' </FONT></TD>';
			echo '<TD ALIGN=RIGHT VALIGN=MIDDLE SDVAL="2528" SDNUM="1033;0;#,###.00"><FONT SIZE=5>'.$row1["item_subtotal"].'</FONT></TD>';
			echo '<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>';
		echo '</TR>';

			
	}
		?>
	<?php 
	if($sno_count<3)
	{
	?>
	<TR>
			<TD STYLE="border-left: 3px solid #000000" HEIGHT=29 ALIGN=LEFT><BR></TD>
			<TD STYLE="border-right: 1px solid #000000"  ALIGN=CENTER VALIGN=MIDDLE><FONT SIZE=5><BR></FONT></TD>
			<TD STYLE="border-right: 1px solid #000000" ALIGN=LEFT><FONT SIZE=5><BR></FONT></TD>
			<TD STYLE=" border-right: 1px solid #000000" COLSPAN=5 ALIGN=CENTER><FONT SIZE=5><BR></FONT></TD>
			<TD ALIGN=CENTER VALIGN=MIDDLE><FONT SIZE=5><BR></FONT></TD>
			<TD STYLE="border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=2 ALIGN=LEFT><BR></TD>
			<TD ALIGN=RIGHT VALIGN=MIDDLE SDNUM="1033;0;#,###.00"><FONT SIZE=5><BR></FONT></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		<TR>
			<TD STYLE="border-left: 3px solid #000000" HEIGHT=29 ALIGN=LEFT><BR></TD>
			<TD STYLE="border-right: 1px solid #000000"  ALIGN=CENTER VALIGN=MIDDLE><FONT SIZE=5><BR></FONT></TD>
			<TD STYLE="border-right: 1px solid #000000" ALIGN=LEFT><FONT SIZE=5><BR></FONT></TD>
			<TD STYLE=" border-right: 1px solid #000000" COLSPAN=5 ALIGN=CENTER><FONT SIZE=5><BR></FONT></TD>
			<TD ALIGN=CENTER VALIGN=MIDDLE><FONT SIZE=5><BR></FONT></TD>
			<TD STYLE="border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=2 ALIGN=LEFT><BR></TD>
			<TD ALIGN=RIGHT VALIGN=MIDDLE SDNUM="1033;0;#,###.00"><FONT SIZE=5><BR></FONT></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>

	<?php } ?>
		<TR>
			<TD STYLE="border-left: 3px solid #000000" HEIGHT=29 ALIGN=LEFT><BR></TD>
			<TD STYLE="border-right: 1px solid #000000"  ALIGN=CENTER VALIGN=MIDDLE><FONT SIZE=5><BR></FONT></TD>
			<TD STYLE="border-right: 1px solid #000000" ALIGN=LEFT><FONT SIZE=5><BR></FONT></TD>
			<TD STYLE=" border-right: 1px solid #000000" COLSPAN=5 ALIGN=CENTER><FONT SIZE=5><BR></FONT></TD>
			<TD ALIGN=CENTER VALIGN=MIDDLE><FONT SIZE=5><BR></FONT></TD>
			<TD STYLE="border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=2 ALIGN=LEFT><BR></TD>
			<TD ALIGN=RIGHT VALIGN=MIDDLE SDNUM="1033;0;#,###.00"><FONT SIZE=5><BR></FONT></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		<TR>
			<TD STYLE="border-left: 3px solid #000000" HEIGHT=29 ALIGN=LEFT><BR></TD>
			<TD STYLE="border-right: 1px solid #000000"  ALIGN=CENTER VALIGN=MIDDLE><FONT SIZE=5><BR></FONT></TD>
			<TD STYLE="border-right: 1px solid #000000" ALIGN=LEFT><FONT SIZE=5><BR></FONT></TD>
			<TD STYLE=" border-right: 1px solid #000000" COLSPAN=5 ALIGN=CENTER><FONT SIZE=5><BR></FONT></TD>
			<TD ALIGN=CENTER VALIGN=MIDDLE><FONT SIZE=5><BR></FONT></TD>
			<TD STYLE="border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=2 ALIGN=LEFT><BR></TD>
			<TD ALIGN=RIGHT VALIGN=MIDDLE SDNUM="1033;0;#,###.00"><FONT SIZE=5><BR></FONT></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>

		<TR>
			<TD STYLE="border-left: 3px solid #000000" HEIGHT=29 ALIGN=LEFT><BR></TD>
			<TD STYLE="border-right: 1px solid #000000"  ALIGN=CENTER VALIGN=MIDDLE><FONT SIZE=5><BR></FONT></TD>
			<TD STYLE="border-right: 1px solid #000000" ALIGN=LEFT><FONT SIZE=5><BR></FONT></TD>
			<TD STYLE="border-right: 1px solid #000000" COLSPAN=5 ALIGN=CENTER><FONT SIZE=5><BR></FONT></TD>
			<TD ALIGN=CENTER VALIGN=MIDDLE><FONT SIZE=5><BR></FONT></TD>
			<TD STYLE="border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=2 ALIGN=LEFT><BR></TD>
			<TD ALIGN=RIGHT VALIGN=MIDDLE SDNUM="1033;0;#,###.00"><FONT SIZE=5><BR></FONT></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>

		<TR>
			<TD STYLE="border-left: 3px solid #000000" HEIGHT=29 ALIGN=LEFT><BR></TD>
			<TD STYLE="border-right: 1px solid #000000"  ALIGN=CENTER VALIGN=MIDDLE><FONT SIZE=5><BR></FONT></TD>
			<TD STYLE="border-right: 1px solid #000000" ALIGN=LEFT><FONT SIZE=5><BR></FONT></TD>
			<TD STYLE="border-right: 1px solid #000000" COLSPAN=5 ALIGN=CENTER><FONT SIZE=5><BR></FONT></TD>
			<TD ALIGN=CENTER VALIGN=MIDDLE><FONT SIZE=5><BR></FONT></TD>
			<TD STYLE="border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=2 ALIGN=LEFT><BR></TD>
			<TD ALIGN=RIGHT VALIGN=MIDDLE SDNUM="1033;0;#,###.00"><FONT SIZE=5><BR></FONT></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>

		<TR>
			<TD STYLE="border-left: 3px solid #000000" HEIGHT=29 ALIGN=LEFT><BR></TD>
			<TD STYLE="border-right: 1px solid #000000"  ALIGN=CENTER VALIGN=MIDDLE><FONT SIZE=5><BR></FONT></TD>
			<TD STYLE="border-right: 1px solid #000000" ALIGN=LEFT><FONT SIZE=5><BR></FONT></TD>
			<TD STYLE="border-right: 1px solid #000000" COLSPAN=5 ALIGN=CENTER><FONT SIZE=5><BR></FONT></TD>
			<TD ALIGN=CENTER VALIGN=MIDDLE><FONT SIZE=5><BR></FONT></TD>
			<TD STYLE="border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=2 ALIGN=LEFT><BR></TD>
			<TD ALIGN=RIGHT VALIGN=MIDDLE SDNUM="1033;0;#,###.00"><FONT SIZE=5><BR></FONT></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		<TR>
			<TD STYLE="border-left: 3px solid #000000" HEIGHT=29 ALIGN=LEFT><BR></TD>
			<TD STYLE="border-right: 1px solid #000000"  ALIGN=CENTER VALIGN=MIDDLE><FONT SIZE=5><BR></FONT></TD>
			<TD STYLE="border-right: 1px solid #000000" ALIGN=LEFT><FONT SIZE=5><BR></FONT></TD>
			<TD STYLE="border-right: 1px solid #000000" COLSPAN=5 ALIGN=CENTER><FONT SIZE=5><BR></FONT></TD>
			<TD ALIGN=CENTER VALIGN=MIDDLE><FONT SIZE=5><BR></FONT></TD>
			<TD STYLE="border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=2 ALIGN=LEFT><BR></TD>
			<TD ALIGN=RIGHT VALIGN=MIDDLE SDNUM="1033;0;#,###.00"><FONT SIZE=5><BR></FONT></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		<?php if($row22['tax_rate_name']!="GST"){ ?>
		<TR>
			<TD STYLE="border-left: 3px solid #000000" HEIGHT=29 ALIGN=LEFT><BR></TD>
			<TD STYLE="border-right: 1px solid #000000"  ALIGN=CENTER VALIGN=MIDDLE><FONT SIZE=5><BR></FONT></TD>
			<TD STYLE="border-right: 1px solid #000000" ALIGN=LEFT><FONT SIZE=5><BR></FONT></TD>
			<TD STYLE="border-right: 1px solid #000000" COLSPAN=5 ALIGN=CENTER><FONT SIZE=5><?php echo $row22['tax_rate_name']; ?><BR></FONT></TD>
			<TD ALIGN=CENTER VALIGN=MIDDLE><FONT SIZE=5><BR></FONT></TD>
			<TD STYLE="border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=2 ALIGN=LEFT><BR></TD>
			<TD ALIGN=RIGHT VALIGN=MIDDLE SDNUM="1033;0;#,###.00"><FONT SIZE=5><?php echo $row['tax_total']; ?><BR></FONT></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		<?php }  else { ?>
		<TR>
			<TD STYLE="border-left: 3px solid #000000" HEIGHT=29 ALIGN=LEFT><BR></TD>
			<TD STYLE="border-right: 1px solid #000000"  ALIGN=CENTER VALIGN=MIDDLE><FONT SIZE=5><BR></FONT></TD>
			<TD STYLE="border-right: 1px solid #000000" ALIGN=LEFT><FONT SIZE=5><BR></FONT></TD>
			<TD STYLE="border-right: 1px solid #000000" COLSPAN=5 ALIGN=CENTER><FONT SIZE=5>CGST <?php echo " ".($row22['tax_rate_percent']/2)."%"; ?><BR></FONT></TD>
			<TD ALIGN=CENTER VALIGN=MIDDLE><FONT SIZE=5><BR></FONT></TD>
			<TD STYLE="border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=2 ALIGN=LEFT><BR></TD>
			<TD ALIGN=RIGHT VALIGN=MIDDLE SDNUM="1033;0;#,###.00"><FONT SIZE=5><?php echo ($row['tax_total']/2); ?><BR></FONT></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		
		<TR>
			<TD STYLE="border-left: 3px solid #000000" HEIGHT=29 ALIGN=LEFT><BR></TD>
			<TD STYLE="border-right: 1px solid #000000"  ALIGN=CENTER VALIGN=MIDDLE><FONT SIZE=5><BR></FONT></TD>
			<TD STYLE="border-right: 1px solid #000000" ALIGN=LEFT><FONT SIZE=5><BR></FONT></TD>
			<TD STYLE="border-right: 1px solid #000000" COLSPAN=5 ALIGN=CENTER><FONT SIZE=5>SGST <?php echo " ".($row22['tax_rate_percent']/2)."%"; ?><BR></FONT></TD>
			<TD ALIGN=CENTER VALIGN=MIDDLE><FONT SIZE=5><BR></FONT></TD>
			<TD STYLE="border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=2 ALIGN=LEFT><BR></TD>
			<TD ALIGN=RIGHT VALIGN=MIDDLE SDNUM="1033;0;#,###.00"><FONT SIZE=5><?php echo ($row['tax_total']/2); ?><BR></FONT></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		<?php } ?>
		<TR>
			<TD STYLE="border-left: 3px solid #000000" HEIGHT=29 ALIGN=LEFT><BR></TD>
			<TD STYLE="border-right: 1px solid #000000"  ALIGN=CENTER VALIGN=MIDDLE><FONT SIZE=5><BR></FONT></TD>
			<TD STYLE="border-right: 1px solid #000000" ALIGN=LEFT><FONT SIZE=5><BR></FONT></TD>
			<TD STYLE=" border-right: 1px solid #000000" COLSPAN=5 ALIGN=CENTER><FONT SIZE=5><?php echo $row7['gft_des'];?><BR></FONT></TD>
			<TD ALIGN=CENTER VALIGN=MIDDLE><FONT SIZE=5><BR></FONT></TD>
			<TD STYLE="border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=2 ALIGN=LEFT><BR></TD>
			<TD ALIGN=RIGHT VALIGN=MIDDLE SDNUM="1033;0;#,###.00"><FONT SIZE=5><BR></FONT></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		
		<TR>
			<TD STYLE="border-left: 3px solid #000000" HEIGHT=29 ALIGN=LEFT><BR></TD>
			<TD STYLE="border-right: 1px solid #000000"  ALIGN=CENTER VALIGN=MIDDLE><FONT SIZE=5><BR></FONT></TD>
			<TD STYLE="border-right: 1px solid #000000" ALIGN=LEFT><FONT SIZE=5><BR></FONT></TD>
			<TD STYLE=" border-right: 1px solid #000000" COLSPAN=5 ALIGN=CENTER><FONT SIZE=5>
			<?php 
			if($row16['currency']!="INR")
				echo "ITCHS Code No. ".$row17['itchs_code'];
			else echo "HSN Code. ".$row18['hsn_code'];
			?>
			<BR></FONT></TD>
			<TD ALIGN=CENTER VALIGN=MIDDLE><FONT SIZE=5><BR></FONT></TD>
			<TD STYLE="border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=2 ALIGN=LEFT><BR></TD>
			<TD ALIGN=RIGHT VALIGN=MIDDLE SDNUM="1033;0;#,###.00"><FONT SIZE=5><BR></FONT></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		<TR>
			<TD STYLE="border-left: 3px solid #000000" HEIGHT=29 ALIGN=LEFT><BR></TD>
			<TD STYLE="border-right: 1px solid #000000"  ALIGN=CENTER VALIGN=MIDDLE><FONT SIZE=5><BR></FONT></TD>
			<TD STYLE="border-right: 1px solid #000000" ALIGN=LEFT><FONT SIZE=5><BR></FONT></TD>
			<TD STYLE=" border-right: 1px solid #000000" COLSPAN=5 ALIGN=left><FONT SIZE=4>
			<?php if($row16['currency']=="EURO") echo "FOB in USD : "." ".($row13['usd_rate']*$row['invoice_total']); ?>
			<BR></FONT></TD>
			<TD ALIGN=CENTER VALIGN=MIDDLE><FONT SIZE=5><BR></FONT></TD>
			<TD STYLE="border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=2 ALIGN=LEFT><BR></TD>
			<TD ALIGN=RIGHT VALIGN=MIDDLE SDNUM="1033;0;#,###.00"><FONT SIZE=5><BR></FONT></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>


		<TR>
			<TD STYLE="border-left: 3px solid #000000" HEIGHT=29 ALIGN=LEFT><BR></TD>
			<TD STYLE="border-right: 1px solid #000000"  ALIGN=CENTER VALIGN=MIDDLE><FONT SIZE=5><BR></FONT></TD>
			<TD STYLE="border-right: 1px solid #000000" ALIGN=LEFT><FONT SIZE=5><BR></FONT></TD>
			<TD STYLE=" border-right: 1px solid #000000" COLSPAN=5 ALIGN=left><FONT SIZE=4>
			Gross Weight : <?php echo " ".$row9['gross_weight']." Kgs";?><BR></FONT></TD>
			<TD ALIGN=CENTER VALIGN=MIDDLE><FONT SIZE=5><BR></FONT></TD>
			<TD STYLE="border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=2 ALIGN=LEFT><BR></TD>
			<TD ALIGN=RIGHT VALIGN=MIDDLE SDNUM="1033;0;#,###.00"><FONT SIZE=5><BR></FONT></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		<TR>
			<TD STYLE="border-left: 3px solid #000000;border-bottom: 3px solid #000000" HEIGHT=29 ALIGN=LEFT><BR></TD>
			<TD STYLE="border-right: 1px solid #000000;border-bottom: 3px solid #000000"  ALIGN=CENTER VALIGN=MIDDLE><FONT SIZE=5><BR></FONT></TD>
			<TD STYLE="border-right: 1px solid #000000;border-bottom: 3px solid #000000" ALIGN=LEFT><FONT SIZE=5><BR></FONT></TD>
			<TD STYLE=" border-right: 1px solid #000000;border-bottom: 3px solid #000000" COLSPAN=5 ALIGN=RIGHT><FONT SIZE=5>
			TOTAL in <?php echo  $row16['currency']; ?> =<BR></FONT></TD>
			<TD style="border-bottom: 3px solid #000000" ALIGN=CENTER VALIGN=MIDDLE><FONT SIZE=5><BR></FONT></TD>
			<TD STYLE="border-left: 1px solid #000000; border-right: 1px solid #000000;border-bottom: 3px solid #000000" COLSPAN=2 ALIGN=LEFT><BR></TD>
			<TD ALIGN=RIGHT VALIGN=MIDDLE style="border-bottom: 3px solid #000000" ><FONT SIZE=5><?php echo $row['invoice_total']; ?><BR></FONT></TD>
			<TD STYLE="border-right: 3px solid #000000;border-bottom: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>

		<TR>
			<TD STYLE="border-left: 3px solid #000000" HEIGHT=35 ALIGN=LEFT><BR></TD>
			<TD STYLE="border-right: 3px solid #000000" COLSPAN=4 ALIGN=LEFT><B><I><FONT SIZE=5>E.&amp;O.E.</FONT></I></B></TD>
			<TD ALIGN=LEFT><FONT SIZE=5><BR></FONT></TD>
			<TD STYLE="border-top: 3px solid #000000" COLSPAN=6 ALIGN=LEFT><B><I><FONT SIZE=5>Declaration:</FONT></I></B></TD>
			<TD STYLE="border-top: 3px solid #000000; border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>

		<TR>
			<TD STYLE="border-left: 3px solid #000000" HEIGHT=20 ALIGN=LEFT><BR></TD>
			<TD STYLE="border-right: 3px solid #000000" COLSPAN=4 ALIGN=LEFT><FONT SIZE=5><BR></FONT></TD>
			<TD ALIGN=LEFT><FONT SIZE=5><BR></FONT></TD>
			<TD COLSPAN=6 ROWSPAN=4 ALIGN=JUSTIFY VALIGN=MIDDLE><B><I><FONT SIZE=5>We certify that the particulars given above are true and correct and the amount indicated represent the price actually charged and that there is no additional flow of consideration directly or indirectly from the Buyer.</FONT></I></B></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		<TR>
			<TD STYLE="border-left: 3px solid #000000" HEIGHT=29 ALIGN=LEFT><BR></TD>
			<TD   ALIGN=LEFT><B><FONT SIZE=5>Delivery to:</FONT></B></TD>
			<TD COLSPAN=3 STYLE="border-right: 3px solid #000000"  ALIGN=LEFT><FONT SIZE=5><?php echo $row11['delivery_to']; ?></FONT></TD>
			<TD ALIGN=LEFT><FONT SIZE=5><BR></FONT></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		
		<TR>
			<TD STYLE="border-left: 3px solid #000000" HEIGHT=20 ALIGN=LEFT><BR></TD>
			<TD STYLE="border-right: 3px solid #000000" COLSPAN=4 ALIGN=LEFT><FONT SIZE=5><BR></FONT></TD>
			<TD ALIGN=LEFT><FONT SIZE=5><BR></FONT></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		<TR>
			<TD STYLE="border-left: 3px solid #000000" HEIGHT=24 ALIGN=LEFT><BR></TD>
			<TD STYLE="border-right: 3px solid #000000" COLSPAN=4 ALIGN=LEFT><B><I><FONT SIZE=5>Value in words</FONT></I></B></TD>
			<TD ALIGN=LEFT><FONT SIZE=5><BR></FONT></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		
		<TR>
			<TD STYLE="border-left: 3px solid #000000" HEIGHT=30 ALIGN=LEFT><BR></TD>
			<TD STYLE="border-right: 3px solid #000000" COLSPAN=4 ALIGN=LEFT><FONT SIZE=5>
			<?php
				$num=$row['invoice_total'];
				$ones = array(
				0 =>"ZERO",
				1 => "ONE",
				2 => "TWO",
				3 => "THREE",
				4 => "FOUR",
				5 => "FIVE",
				6 => "SIX",
				7 => "SEVEN",
				8 => "EIGHT",
				9 => "NINE",
				10 => "TEN",
				11 => "ELEVEN",
				12 => "TWELVE",
				13 => "THIRTEEN",
				14 => "FOURTEEN",
				15 => "FIFTEEN",
				16 => "SIXTEEN",
				17 => "SEVENTEEN",
				18 => "EIGHTEEN",
				19 => "NINETEEN",
				"014" => "FOURTEEN"
				);
				$tens = array( 
				0 => "ZERO",
				1 => "TEN",
				2 => "TWENTY",
				3 => "THIRTY", 
				4 => "FORTY", 
				5 => "FIFTY", 
				6 => "SIXTY", 
				7 => "SEVENTY", 
				8 => "EIGHTY", 
				9 => "NINETY" 
				); 
				$hundreds = array( 
				"HUNDRED", 
				"THOUSAND", 
				"MILLION", 
				"BILLION", 
				"TRILLION", 
				"QUARDRILLION" 
				); /*limit t quadrillion */
				$num = number_format($num,2,".",","); 
				$num_arr = explode(".",$num); 
				$wholenum = $num_arr[0]; 
				$decnum = $num_arr[1]; 
				$whole_arr = array_reverse(explode(",",$wholenum)); 
				krsort($whole_arr,1); 
				$rettxt = ""; 
				foreach($whole_arr as $key => $i){
					
				while(substr($i,0,1)=="0")
						$i=substr($i,1,5);
				if($i < 20){ 
				/* echo "getting:".$i; */
				$rettxt .= $ones[$i]; 
				}elseif($i < 100){ 
				if(substr($i,0,1)!="0")  $rettxt .= $tens[substr($i,0,1)]; 
				if(substr($i,1,1)!="0") $rettxt .= " ".$ones[substr($i,1,1)]; 
				}else{ 
				if(substr($i,0,1)!="0") $rettxt .= $ones[substr($i,0,1)]." ".$hundreds[0]; 
				if(substr($i,1,1)!="0")$rettxt .= " ".$tens[substr($i,1,1)]; 
				if(substr($i,2,1)!="0")$rettxt .= " ".$ones[substr($i,2,1)]; 
				} 
				if($key > 0){ 
				$rettxt .= " ".$hundreds[$key]." "; 
				}
				}
				if( $row16['currency']=='INR')				
					$rettxt="RUPEES ".$rettxt;
				else if( $row16['currency']=='EURO')				
					$rettxt="EURO ".$rettxt;
				else if( $row16['currency']=='USD')				
					$rettxt="US DOLLAR ".$rettxt;
			
				if($decnum > 0){
					
				if( $row16['currency']=='INR')				
					$rettxt=$rettxt." AND PAISE ";
				else $rettxt=$rettxt." AND CENTS ";
				
				//$rettxt .= " and ";
				if($decnum < 20){
				$rettxt .= $ones[$decnum];
				}elseif($decnum < 100){
				 
				$rettxt .= $tens[substr($decnum,0,1)];
				if(substr($decnum,1,1)!=0)
				$rettxt .= " ".$ones[substr($decnum,1,1)];
				}
				}
				echo  $rettxt." ONLY";
				
			
				?>
			
			</FONT></TD>
			<TD ALIGN=LEFT><FONT SIZE=5><BR></FONT></TD>
			<TD COLSPAN=6 ALIGN=LEFT></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		
		<TR>
			<TD STYLE="border-left: 3px solid #000000" HEIGHT=20 ALIGN=LEFT><BR></TD>
			<TD STYLE="border-right: 3px solid #000000" COLSPAN=4 ALIGN=LEFT><FONT SIZE=5><BR></FONT></TD>
			<TD ALIGN=LEFT colspan=7><FONT SIZE=5><BR></FONT></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		
		<TR>
			<TD STYLE="border-left: 3px solid #000000" HEIGHT=29 ALIGN=LEFT><BR></TD>
			<TD  COLSPAN=3 ALIGN=LEFT><B><FONT SIZE=5></FONT></B></TD>
			<TD STYLE="border-right: 3px solid #000000"  ALIGN=LEFT><FONT SIZE=5><?php //echo $row12['ats_form_no']; ?></FONT></TD>
			<TD ALIGN=LEFT colspan=7><B><I><FONT SIZE=5>For MAGNETO DYNAMICS PRIVATE LIMITED</FONT></I></B></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		
		<TR>
			<TD STYLE="border-left: 3px solid #000000" HEIGHT=29 ALIGN=LEFT><BR></TD>
			<TD  STYLE="border-right: 3px solid #000000" COLSPAN=4 ALIGN=CENTER><B><FONT SIZE=5><br><?php if( $row16['currency']=='EURO') echo "STATEMENT OF ORIGIN"; ?>
			</FONT></B></TD>
			<TD ALIGN=LEFT colspan=7><FONT SIZE=5><BR></FONT></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>

		<TR>
			<TD STYLE="border-left: 3px solid #000000" HEIGHT=29 ALIGN=LEFT><BR></TD>
			<TD  COLSPAN=4 STYLE="border-right: 3px solid #000000;border-bottom: 3px solid #000000" rowspan=5 ALIGN=LEFT><B><FONT SIZE=5><?php if( $row16['currency']=='EURO') echo "REX Registration No.INREX0403034019DG004"; ?><br>
			</b><?php if( $row16['currency']=='EURO') echo '
			The Exporter of the products covered by this document declare that except where otherwise indicated, these products of INDIA preferential origin of the Generalized System of preference of the European Union and that Origin of the Generalized System of preferences of the European Union and that the origgin criterion met is "W 90 26"';
			?></FONT></TD>
			<TD ALIGN=LEFT colspan=7><FONT SIZE=5><BR></FONT></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		
		
		<TR>
			<TD STYLE="border-left: 3px solid #000000" HEIGHT=29 ALIGN=LEFT><BR></TD>			
			<TD ALIGN=LEFT colspan=7><FONT SIZE=5><BR></FONT></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		
		<TR>
			<TD STYLE="border-left: 3px solid #000000" HEIGHT=29 ALIGN=LEFT><BR></TD>			
			<TD ALIGN=LEFT colspan=7><FONT SIZE=5><BR></FONT></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		
		<TR>
			<TD STYLE="border-left: 3px solid #000000" HEIGHT=29 ALIGN=LEFT><BR></TD>			
			<TD ALIGN=LEFT  colspan=7><FONT SIZE=5><BR></FONT></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		
		<TR>
			<TD STYLE="border-left: 3px solid #000000;border-bottom: 3px solid #000000" HEIGHT=29 ALIGN=LEFT><BR></TD>
			<TD STYLE="border-bottom: 3px solid #000000" ALIGN=LEFT><FONT SIZE=5><BR></FONT></TD>
			<TD STYLE="border-bottom: 3px solid #000000" colspan=6 ALIGN=LEFT><B><I><FONT SIZE=5>DIRECTOR / MANAGER  ACCOUNTS</FONT></I></B></TD>

			<TD STYLE="border-right: 3px solid #000000;border-bottom: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>

	</TBODY>
</TABLE>

<?php }
mysqli_close($con);
?>







<header class="clearfix">


</main>

</body>
</html>
