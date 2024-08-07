<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2//EN">

<HTML>
<HEAD>
	
	<META HTTP-EQUIV="CONTENT-TYPE" CONTENT="text/html; charset=windows-1252">
	<TITLE></TITLE>
	<META NAME="GENERATOR" CONTENT="OpenOffice 4.1.4  (Win32)">
	<META NAME="AUTHOR" CONTENT="DSR">
	<META NAME="CREATED" CONTENT="20070416;12051000">
	<META NAME="CHANGED" CONTENT="20181031;16100231">
	<META NAME="Info 1" CONTENT="">
	<META NAME="Info 2" CONTENT="">
	<META NAME="Info 3" CONTENT="">
	<META NAME="Info 4" CONTENT="">
	
	<STYLE>
		<!-- 
		BODY,DIV,TABLE,THEAD,TBODY,TFOOT,TR,TH,TD,P { font-family:"Arial"; font-size:x-small }
		 -->
	</STYLE>
	
</HEAD>

<BODY TEXT="#000000">
<TABLE FRAME=VOID CELLSPACING=0 COLS=13 RULES=NONE BORDER=0>
	<COLGROUP><COL WIDTH=13><COL WIDTH=107><COL WIDTH=121><COL WIDTH=17><COL WIDTH=198><COL WIDTH=13><COL WIDTH=216><COL WIDTH=17><COL WIDTH=115><COL WIDTH=98><COL WIDTH=17><COL WIDTH=114><COL WIDTH=18></COLGROUP>
	<TBODY>
		<TR>
			<TD STYLE="border-top: 3px solid #000000; border-left: 3px solid #000000; border-right: 3px solid #000000" COLSPAN=13 WIDTH=1063 HEIGHT=53 ALIGN=CENTER VALIGN=MIDDLE><B><I><FONT FACE="Microsoft Sans Serif" SIZE=7 COLOR="#000000">INVOICE</FONT></I></B></TD>
			</TR>
		<TR>
			<TD STYLE="border-bottom: 1px solid #000000; border-left: 3px solid #000000" COLSPAN=12 HEIGHT=27 ALIGN=RIGHT SDVAL="0" SDNUM="16393;"><FONT SIZE=3>0</FONT></TD>
			<TD STYLE="border-bottom: 1px solid #000000; border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		<TR>
			<TD STYLE="border-top: 1px solid #000000; border-left: 3px solid #000000" HEIGHT=30 ALIGN=LEFT></TD>
			<TD STYLE="border-top: 1px solid #000000" ALIGN=LEFT><B><I><U><FONT SIZE=6>EXPORTER</FONT></U></I></B></TD>
			<TD STYLE="border-top: 1px solid #000000" ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-top: 1px solid #000000" ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-top: 1px solid #000000; border-right: 1px solid #000000" ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-top: 1px solid #000000; border-left: 1px solid #000000" ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-top: 1px solid #000000" ALIGN=LEFT><B><I><FONT SIZE=4>Invoice No.</FONT></I></B></TD>
			<TD STYLE="border-top: 1px solid #000000" ALIGN=LEFT><B><I><FONT SIZE=4>:</FONT></I></B></TD>
			<TD STYLE="border-top: 1px solid #000000" ALIGN=LEFT SDVAL="0" SDNUM="16393;"><B><FONT SIZE=4><?php echo  $invoice->invoice_number; ?></FONT></B></TD>
			<TD STYLE="border-top: 1px solid #000000" ALIGN=LEFT><B><I><FONT SIZE=4>Date</FONT></I></B></TD>
			<TD STYLE="border-top: 1px solid #000000" ALIGN=LEFT><B><I><FONT SIZE=4>:</FONT></I></B></TD>
			<TD STYLE="border-top: 1px solid #000000" ALIGN=LEFT SDVAL="0" SDNUM="16393;"><B><FONT SIZE=4><?php echo date_from_mysql($invoice->invoice_date_created, true); ?></FONT></B></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		<TR>
			<TD STYLE="border-left: 3px solid #000000" HEIGHT=34 ALIGN=LEFT><BR></TD>
			<TD STYLE="border-bottom: 3px solid #000000; border-right: 1px solid #000000" COLSPAN=4 ROWSPAN=6 ALIGN=LEFT VALIGN=MIDDLE><B><I><FONT FACE="Arial Black" SIZE=5><?php _htmlsc($invoice->user_company); ?></B>
			<BR>
			<?php 
				if ($invoice->user_address_1) {
					echo  htmlsc($invoice->user_address_1) ;
				} 
			?>
			<BR>
			<?php
				if ($invoice->user_address_2) {
					echo  htmlsc($invoice->user_address_2) ;
				}
			?>
			<BR>
			<?php
				if ($invoice->user_city || $invoice->user_state || $invoice->user_zip) {
					
				if ($invoice->user_city) {
					echo htmlsc($invoice->user_city) . ' ';
				}
			?>
			<BR>
			<?php   
				if ($invoice->user_state) {
					echo htmlsc($invoice->user_state) . ' ';
				}
			?>
			<BR>
			<?php
				if ($invoice->user_zip) {
					echo htmlsc($invoice->user_zip);
				}
				}
			?>
			<BR> 
			<?php 	if ($invoice->user_phone) {
				echo  trans('Phone:') ;
				echo htmlsc($invoice->user_phone) ;
				}
			?>
			<BR><?php _trans('Tin No.');
                         echo $custom_fields['user']['Tin No.'] ?> <?php _trans('CST No.');
			echo $custom_fields['user']['CST No.'];?><BR><?php
				//echo '<pre>';
                                   _trans('PAN No.');
				//var_dump($custom_fields['user']['User PAN NO']);
				echo $custom_fields['user']['User PAN NO'];
				 
				//echo '</pre>';
                          
			?> IEC Code No.<?php echo $custom_fields['user']['IEC Code No.'];?></FONT></I></TD>
			<TD STYLE="border-left: 1px solid #000000" ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD ALIGN=LEFT><B><I><FONT SIZE=4>D.C. No.</FONT></I></B></TD>
			<TD ALIGN=LEFT><B><I><FONT SIZE=4>:</FONT></I></B></TD>
			<TD ALIGN=LEFT SDVAL="0" SDNUM="16393;"><FONT SIZE=4><?php
				//echo '<pre>';
				if ($custom_fields['invoice']['D.C.No']) {
				 echo $custom_fields['invoice']['D.C.No'] ;
				}				  
				//echo '</pre>';
			?></FONT></TD>
			<TD ALIGN=LEFT><B><I><FONT SIZE=4>Date</FONT></I></B></TD>
			<TD ALIGN=LEFT><B><I><FONT SIZE=4>:</FONT></I></B></TD>
			<TD ALIGN=LEFT SDVAL="0" SDNUM="16393;"><FONT SIZE=4><?php echo date_from_mysql($invoice->invoice_date_due, true); ?></FONT></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		<TR>
			<TD STYLE="border-left: 3px solid #000000" HEIGHT=26 ALIGN=LEFT><BR></TD>
			<TD STYLE="border-left: 1px solid #000000" ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD ALIGN=LEFT><B><I><FONT SIZE=4>Packing Slip No.</FONT></I></B></TD>
			<TD ALIGN=LEFT><B><I><FONT SIZE=4>:</FONT></I></B></TD>
			<TD ALIGN=LEFT SDVAL="0" SDNUM="16393;"><FONT SIZE=4><?php
				//echo '<pre>';
				if ($custom_fields['invoice']['Packing Slip No']) {
				 echo $custom_fields['invoice']['Packing Slip No'] ;
				}				  
				//echo '</pre>';
			?></FONT></TD>
			<TD ALIGN=LEFT><B><I><FONT SIZE=4>Date</FONT></I></B></TD>
			<TD ALIGN=LEFT><B><I><FONT SIZE=4>:</FONT></I></B></TD>
			<TD ALIGN=LEFT SDVAL="0" SDNUM="16393;"><FONT SIZE=4><?php echo date_from_mysql($invoice->invoice_date_created, true); ?></FONT></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		<TR>
			<TD STYLE="border-left: 3px solid #000000" HEIGHT=35 ALIGN=LEFT><BR></TD>
			<TD STYLE="border-left: 1px solid #000000" ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD ALIGN=LEFT><B><I><FONT SIZE=4>Consignee Order No.</FONT></I></B></TD>
			<TD ALIGN=LEFT><B><I><FONT SIZE=4>:</FONT></I></B></TD>
			<TD COLSPAN=4 ALIGN=LEFT SDVAL="0" SDNUM="16393;"><FONT SIZE=4><?php
				//echo '<pre>';
				if ($custom_fields['invoice']['Consignee Order No']) {
				 echo $custom_fields['invoice']['Consignee Order No'] ;
				}				  
				//echo '</pre>';
			?></FONT></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		<TR>
			<TD STYLE="border-left: 3px solid #000000" HEIGHT=34 ALIGN=LEFT><BR></TD>
			<TD STYLE="border-left: 1px solid #000000" ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD ALIGN=LEFT VALIGN=BOTTOM><B><I><FONT SIZE=4>Consignee Order date</FONT></I></B></TD>
			<TD ALIGN=LEFT><B><I><FONT SIZE=4>:</FONT></I></B></TD>
			<TD COLSPAN=4 ALIGN=LEFT SDVAL="0" SDNUM="16393;"><FONT SIZE=4><?php
				//echo '<pre>';
				if ($custom_fields['invoice']['Consignee Order Date']) {
				 echo $custom_fields['invoice']['Consignee Order Date'] ;
				}				  
				//echo '</pre>';
			?></FONT></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		<TR>
			<TD STYLE="border-left: 3px solid #000000" HEIGHT=34 ALIGN=LEFT><BR></TD>
			<TD STYLE="border-left: 1px solid #000000" ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD ALIGN=LEFT><B><I><FONT SIZE=4>Reference</FONT></I></B></TD>
			<TD ALIGN=LEFT><B><I><FONT SIZE=4>:</FONT></I></B></TD>
			<TD COLSPAN=4 ALIGN=LEFT SDVAL="0" SDNUM="16393;"><FONT SIZE=4><?php
				//echo '<pre>';
				if ($custom_fields['invoice']['Reference Name']) {
				echo $custom_fields['invoice']['Reference Name'] ;
				 //var_dump($custom_fields['invoice']['Reference Name']);
				}				  
				//echo '</pre>';
			?></FONT></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		<TR>
			<TD STYLE="border-bottom: 3px solid #000000; border-left: 3px solid #000000" HEIGHT=36 ALIGN=LEFT><BR></TD>
			<TD STYLE="border-bottom: 3px solid #000000; border-left: 1px solid #000000" ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-bottom: 3px solid #000000" ALIGN=LEFT><B><I><FONT SIZE=4>Payment Terms</FONT></I></B></TD>
			<TD STYLE="border-bottom: 3px solid #000000" ALIGN=LEFT><B><I><FONT SIZE=4>:</FONT></I></B></TD>
			<TD STYLE="border-bottom: 3px solid #000000" COLSPAN=4 ALIGN=LEFT SDVAL="0" SDNUM="16393;"><FONT SIZE=4><?php
				//echo '<pre>';
				if ($custom_fields['invoice']['Payment Terms']) {
				echo $custom_fields['invoice']['Payment Terms'] ;
				//var_dump($custom_fields['invoice']['Payment Terms']);
				}				  
				//echo '</pre>';
			?></FONT></TD>
			<TD STYLE="border-bottom: 3px solid #000000; border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		<TR>
			<TD STYLE="border-top: 1px solid #000000; border-left: 3px solid #000000" HEIGHT=40 ALIGN=LEFT><BR></TD>
			<TD STYLE="border-top: 1px solid #000000" ALIGN=LEFT><B><I><U><FONT SIZE=3>BILL To </FONT></U></I></B></TD>
			<TD STYLE="border-top: 1px solid #000000" ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-top: 1px solid #000000" ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-top: 1px solid #000000; border-right: 1px solid #000000" ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-top: 1px solid #000000" ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-top: 1px solid #000000" ALIGN=LEFT><B><I><U><FONT SIZE=3>SHIP TO</FONT></U></I></B></TD>
			<TD STYLE="border-top: 1px solid #000000" ALIGN=LEFT><B><I><U><FONT SIZE=3><BR></FONT></U></I></B></TD>
			<TD STYLE="border-top: 1px solid #000000" COLSPAN=4 ALIGN=LEFT><B><FONT SIZE=4><BR></FONT></B></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		<TR>
			<TD STYLE="border-left: 3px solid #000000" HEIGHT=24 ALIGN=LEFT><BR></TD>
			<TD STYLE="border-right: 1px solid #000000" COLSPAN=4 ALIGN=LEFT VALIGN=MIDDLE SDVAL="0" SDNUM="16393;"><B><FONT SIZE=3><?php echo _htmlsc(format_client($invoice)); ?></FONT></B></TD>
			<TD ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD COLSPAN=3 ALIGN=LEFT VALIGN=MIDDLE SDVAL="0" SDNUM="16393;"><B><FONT SIZE=4><?php echo _htmlsc(format_client($invoice)); ?></FONT></B></TD>
			<TD ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		<TR>
			<TD STYLE="border-left: 3px solid #000000" HEIGHT=25 ALIGN=LEFT><BR></TD>
			<TD ALIGN=LEFT SDVAL="0" SDNUM="16393;"><FONT SIZE=4><?php
				if($invoice->client_address_1) {
					echo  htmlsc($invoice->client_address_1) ;
				}
			?></FONT></TD>
			<TD ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-right: 1px solid #000000" ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD ALIGN=LEFT SDVAL="0" SDNUM="16393;"><FONT SIZE=4><?php
				if($invoice->client_address_1) {
					echo  htmlsc($invoice->client_address_1) ;
				}
			?></FONT></TD>
			<TD ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		<TR>
			<TD STYLE="border-left: 3px solid #000000" HEIGHT=26 ALIGN=LEFT><BR></TD>
			<TD ALIGN=left SDVAL="0" SDNUM="16393;"><FONT SIZE=3><?php 
				if ($invoice->client_address_2) {
					echo  htmlsc($invoice->client_address_2) ;
				}
			?></FONT></TD>
			<TD ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-right: 1px solid #000000" ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD ALIGN=left SDVAL="0" SDNUM="16393;"><FONT SIZE=3><?php 
				if ($invoice->client_address_2) {
					echo  htmlsc($invoice->client_address_2) ;
				}
			?></FONT></TD>
			<TD ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		<TR>
			<TD STYLE="border-left: 3px solid #000000" HEIGHT=24 ALIGN=LEFT><BR></TD>
			<TD ALIGN=left SDVAL="0" SDNUM="16393;"><FONT SIZE=3><?php
				 
					if ($invoice->client_city) {
						echo htmlsc($invoice->client_city) . ' ';
					}
			?></FONT></TD>
			<TD ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-right: 1px solid #000000" ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD ALIGN=left SDVAL="0" SDNUM="16393;"><FONT SIZE=3><?php
				
					if ($invoice->client_city) {
						echo htmlsc($invoice->client_city) . ' ';
					}
			?></FONT></TD>
			<TD ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		<TR>
			<TD STYLE="border-left: 3px solid #000000" HEIGHT=26 ALIGN=LEFT><BR></TD>
			<TD ALIGN=left SDVAL="0" SDNUM="16393;"><FONT SIZE=3><?php 
				if ($invoice->client_state) {
					echo htmlsc($invoice->client_state) . ' ';
				}
			?></FONT></TD>
			<TD ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-right: 1px solid #000000" ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD ALIGN=left SDVAL="0" SDNUM="16393;"><FONT SIZE=3><?php 
				if ($invoice->client_state) {
					echo htmlsc($invoice->client_state) . ' ';
				}
			?></FONT></TD>
			<TD ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		<TR>
			<TD STYLE="border-bottom: 1px solid #000000; border-left: 3px solid #000000" HEIGHT=25 ALIGN=LEFT><BR></TD>
			<TD STYLE="border-bottom: 1px solid #000000" ALIGN=left SDVAL="0" SDNUM="16393;"><FONT SIZE=3><?php
				if ($invoice->client_zip) {
					echo htmlsc($invoice->client_zip);
				}
				
			?></FONT></TD>
			<TD STYLE="border-bottom: 1px solid #000000" ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-bottom: 1px solid #000000" ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-bottom: 1px solid #000000; border-right: 1px solid #000000" ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-bottom: 1px solid #000000" ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-bottom: 1px solid #000000" ALIGN=left SDVAL="0" SDNUM="16393;"><FONT SIZE=3><?php
				if ($invoice->client_zip) {
					echo htmlsc($invoice->client_zip);
				}
				
			?>
			<BR>
			</FONT></TD>
			<TD STYLE="border-bottom: 1px solid #000000" ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-bottom: 1px solid #000000" ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-bottom: 1px solid #000000" ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-bottom: 1px solid #000000" ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-bottom: 1px solid #000000" ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		<TR>
			<TD STYLE="border-top: 1px solid #000000; border-left: 3px solid #000000" HEIGHT=25 ALIGN=LEFT><BR></TD>
			<TD STYLE="border-top: 1px solid #000000" ALIGN=LEFT><B><I><FONT SIZE=3>Mode of Shipment</FONT></I></B></TD>
			<TD STYLE="border-top: 1px solid #000000" ALIGN=LEFT><B><I><FONT SIZE=3><BR></FONT></I></B></TD>
			<TD STYLE="border-top: 1px solid #000000" ALIGN=LEFT><B><I><FONT SIZE=3>:</FONT></I></B></TD>
			<TD STYLE="border-top: 1px solid #000000; border-right: 1px solid #000000" ALIGN=left SDVAL="0" SDNUM="16393;"><B><?php
				//echo '<pre>';
				if ($custom_fields['invoice']['Mode of Shipment']) {
				 echo $custom_fields['invoice']['Mode of Shipment'] ;
				}				  
				//echo '</pre>';
			?></B></TD>
			<TD STYLE="border-top: 1px solid #000000" ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-top: 1px solid #000000" ALIGN=LEFT><B><I><FONT SIZE=3>Our Certificate of LUT No.</FONT></I></B></TD>
			<TD STYLE="border-top: 1px solid #000000" ALIGN=LEFT><B><I><FONT SIZE=3>:</FONT></I></B></TD>
			<TD STYLE="border-top: 1px solid #000000" COLSPAN=4 ALIGN=LEFT><B><I><?php
                                 if ($custom_fields['invoice']['Our Certificate of LUT No.']) {
				 echo $custom_fields['invoice']['Our Certificate of LUT No.'] ;
				} ?></I></B></TD>
			<TD STYLE="border-top: 1px solid #000000; border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		<TR>
			<TD STYLE="border-left: 3px solid #000000" HEIGHT=26 ALIGN=LEFT><BR></TD>
			<TD ALIGN=LEFT><B><I><FONT SIZE=3>Shipment Ref No.</FONT></I></B></TD>
			<TD ALIGN=LEFT><B><I><FONT SIZE=3><BR></FONT></I></B></TD>
			<TD ALIGN=LEFT><B><I><FONT SIZE=3>:</FONT></I></B></TD>
			<TD STYLE="border-right: 1px solid #000000" ALIGN=LEFT><FONT SIZE=3><?php
				//echo '<pre>';
				if ($custom_fields['invoice']['Shipment Ref No.']) {
				  //var_dump($custom_fields['invoice']['Shipment Ref No.']);
				  echo $custom_fields['invoice']['Shipment Ref No.'];
				
				}
				//echo '</pre>'['Shipment Ref No.'];
			?><BR></FONT></TD>
			<TD ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD ALIGN=LEFT><B><I><FONT SIZE=4>Consignee Tax No.</FONT></I></B></TD>
			<TD ALIGN=LEFT><B><I><FONT SIZE=4>:</FONT></I></B></TD>
			<TD COLSPAN=4 ALIGN=left SDVAL="0" SDNUM="16393;"><B><I><FONT SIZE=4><?php
				//echo '<pre>';
				if($custom_fields['invoice']['Consignee Tax No.']) {
				  echo	$custom_fields['invoice']['Consignee Tax No.'] ;
				}
				//echo '</pre>';
			?></FONT></I></B></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		<TR>
			<TD STYLE="border-left: 3px solid #000000" HEIGHT=27 ALIGN=LEFT><BR></TD>
			<TD ALIGN=LEFT><B><I><FONT SIZE=4>Port of Loading</FONT></I></B></TD>
			<TD ALIGN=LEFT><B><I><FONT SIZE=3><BR></FONT></I></B></TD>
			<TD ALIGN=LEFT><B><I><FONT SIZE=4>:</FONT></I></B></TD>
			<TD STYLE="border-right: 1px solid #000000" ALIGN=left SDVAL="0" SDNUM="16393;"><FONT SIZE=4><?php
				//echo '<pre>';
				if($custom_fields['invoice']['Port of Loading']) {
				  echo	$custom_fields['invoice']['Port of Loading'] ;
				}
				//echo '</pre>';
			?></FONT></TD>
			<TD ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD ALIGN=LEFT><B><I><FONT SIZE=4>Gross Weight</FONT></I></B></TD>
			<TD ALIGN=LEFT><B><I><FONT SIZE=4>:</FONT></I></B></TD>
			<TD COLSPAN=4 ALIGN=left SDVAL="0" SDNUM="16393;"><B><I><FONT SIZE=4><?php
				//echo '<pre>';
				if($custom_fields['invoice']['Gross Weight']) {
				  echo	$custom_fields['invoice']['Gross Weight'] ;
				}
				//echo '</pre>';
			?></FONT></I></B></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		<TR>
			<TD STYLE="border-bottom: 1px solid #000000; border-left: 3px solid #000000" HEIGHT=30 ALIGN=LEFT><BR></TD>
			<TD STYLE="border-bottom: 1px solid #000000" ALIGN=LEFT><B><I><FONT SIZE=4>Port of Discharge</FONT></I></B></TD>
			<TD STYLE="border-bottom: 1px solid #000000" ALIGN=LEFT><B><I><FONT SIZE=3><BR></FONT></I></B></TD>
			<TD STYLE="border-bottom: 1px solid #000000" ALIGN=LEFT><B><I><FONT SIZE=4>:</FONT></I></B></TD>
			<TD STYLE="border-bottom: 1px solid #000000; border-right: 1px solid #000000" ALIGN=left SDVAL="0" SDNUM="16393;"><FONT SIZE=4><?php
				//echo '<pre>';
				if($custom_fields['invoice']['Port of Discharge']) {
				  echo	$custom_fields['invoice']['Port of Discharge'] ;
				}
				//echo '</pre>';
			?></FONT></TD>
			<TD STYLE="border-bottom: 1px solid #000000" ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-bottom: 1px solid #000000" ALIGN=LEFT><B><I><FONT SIZE=4>FOB Value INR</FONT></I></B></TD>
			<TD STYLE="border-bottom: 1px solid #000000" ALIGN=LEFT><B><I><FONT SIZE=4>:</FONT></I></B></TD>
			<TD STYLE="border-bottom: 1px solid #000000" COLSPAN=4 ALIGN=LEFT SDVAL="0" SDNUM="16393;"><B><I><FONT SIZE=4><?php
			        //echo '<pre>';
				if ($custom_fields['invoice']['FOB Value']) {
					echo  $custom_fields['invoice']['FOB Value'];
				}
				//echo '</pre>';
				?></FONT></I></B></TD>
			<TD STYLE="border-bottom: 1px solid #000000; border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		<TR>
			<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 3px solid #000000" HEIGHT=65 ALIGN=LEFT><BR></TD>
			<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE><B><I><FONT SIZE=3>Serial No.</FONT></I></B></TD>
			<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE><B><I><FONT SIZE=3>Marks &amp; Number of Package</FONT></I></B></TD>
			<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=5 ALIGN=CENTER VALIGN=MIDDLE><B><I><FONT SIZE=3>Description of Goods</FONT></I></B></TD>
			<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE><B><I><FONT SIZE=3>Total Quantity in Nos.</FONT></I></B></TD>
			<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=2 ALIGN=CENTER VALIGN=MIDDLE><B><I><FONT SIZE=3>Rate per Nos.<BR>in USD</FONT></I></B></TD>
			<TD STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE><B><I><FONT SIZE=3>Total Amount<BR>in USD</FONT></I></B></TD>
			<TD STYLE="border-bottom: 1px solid #000000; border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		<TR>	
			<?php
			foreach ($items as $item) { ?>
			<TD STYLE="border-left: 3px solid #000000" HEIGHT=20 ALIGN=LEFT><BR></TD>
			<TD STYLE="border-right: 1px solid #000000" ALIGN=CENTER VALIGN=TOP><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-right: 1px solid #000000" ALIGN=CENTER VALIGN=TOP><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-left: 1px solid #000000" ALIGN=CENTER VALIGN=TOP><FONT SIZE=3><BR></FONT></TD>
			<TD COLSPAN=3 ALIGN=CENTER VALIGN=TOP><FONT SIZE=4><B><?php _htmlsc($item->item_name); ?></B></FONT></TD>
			<TD STYLE="border-right: 1px solid #000000" ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD ALIGN=CENTER VALIGN=TOP><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-left: 1px solid #000000" ALIGN=CENTER VALIGN=TOP SDNUM="16393;0;#,###.00"><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-right: 1px solid #000000" ALIGN=CENTER VALIGN=TOP SDNUM="16393;0;#,###.00"><FONT SIZE=3><BR></FONT></TD>
			<TD ALIGN=CENTER VALIGN=TOP SDNUM="16393;0;#,###.00"><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
			
		<TR>
			<TD STYLE="border-left: 3px solid #000000" HEIGHT=29 ALIGN=LEFT><BR></TD>
			<TD STYLE="border-right: 1px solid #000000" ROWSPAN=2 ALIGN=CENTER VALIGN=MIDDLE SDVAL="1" SDNUM="16393;"><FONT SIZE=4>1</FONT></TD>
			<TD STYLE="border-right: 1px solid #000000" ROWSPAN=2 ALIGN=CENTER VALIGN=MIDDLE><FONT SIZE=4><?php
			        //echo '<pre>';
				if ($custom_fields['invoice']['Marks&Number of Package']) {
					echo  $custom_fields['invoice']['Marks&Number of Package'];
				}
				//echo '</pre>';
				?></FONT></TD>
			<TD STYLE="border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=5 ALIGN=CENTER SDVAL="0" SDNUM="16393;"><B><FONT SIZE=3><?php echo nl2br(htmlsc($item->item_description)); ?></FONT></B></TD>
			<TD ROWSPAN=2 ALIGN=CENTER VALIGN=MIDDLE><FONT SIZE=4><?php 
			echo format_amount($item->item_quantity); ?>
                    <?php //if ($item->item_product_unit) :{ ?>
                        <!--<br>-->
		    <small><?php _htmlsc($item->item_product_unit);?></FONT></TD>
			<TD STYLE="border-left: 1px solid #000000" ROWSPAN=2 ALIGN=RIGHT VALIGN=MIDDLE SDVAL="16.9" SDNUM="16393;0;#,##0.00"><FONT SIZE=3><?php echo $item->item_price; ?></FONT></TD>
			<TD STYLE="border-right: 1px solid #000000" ALIGN=RIGHT VALIGN=MIDDLE SDNUM="16393;0;#,##0.00"><FONT SIZE=3><BR></FONT></TD>
			<TD ROWSPAN=2 ALIGN=RIGHT VALIGN=MIDDLE SDVAL="2535" SDNUM="16393;0;#,###.00"><FONT SIZE=4><?php echo $item->item_total; ?></FONT></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		<TR>
			<TD STYLE="border-left: 3px solid #000000" HEIGHT=30 ALIGN=LEFT><BR></TD>
			<TD STYLE="border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=5 ALIGN=CENTER SDVAL="0" SDNUM="16393;"><FONT SIZE=3></FONT></TD>
			<TD STYLE="border-right: 1px solid #000000" ALIGN=RIGHT SDNUM="16393;0;#,##0.00"><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		<TR>
			<TD STYLE="border-left: 3px solid #000000" HEIGHT=29 ALIGN=LEFT><BR></TD>
			<TD STYLE="border-right: 1px solid #000000" ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-right: 1px solid #000000" ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-left: 1px solid #000000" COLSPAN=5 ALIGN=CENTER SDVAL="0" SDNUM="16393;"><FONT SIZE=3></FONT></TD>
			<TD STYLE="border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=LEFT><BR></TD>
			<TD STYLE="border-left: 1px solid #000000" ALIGN=RIGHT SDNUM="16393;0;#,##0.00"><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-right: 1px solid #000000" ALIGN=RIGHT SDNUM="16393;0;#,##0.00"><FONT SIZE=3><BR></FONT></TD>
			<TD ALIGN=RIGHT><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		<TR>
			<TD STYLE="border-left: 3px solid #000000" HEIGHT=29 ALIGN=LEFT><BR></TD>
			<TD STYLE="border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-right: 1px solid #000000" ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=5 ALIGN=CENTER><B><FONT SIZE=3><BR></FONT></B></TD>
			<TD ALIGN=CENTER VALIGN=MIDDLE><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-left: 1px solid #000000" ALIGN=RIGHT VALIGN=MIDDLE SDNUM="16393;0;#,##0.00"><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-right: 1px solid #000000" ALIGN=RIGHT VALIGN=MIDDLE SDNUM="16393;0;#,##0.00"><FONT SIZE=3><BR></FONT></TD>
			<TD ALIGN=RIGHT VALIGN=MIDDLE SDNUM="16393;0;#,###.00"><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		<TR>
			<TD STYLE="border-left: 3px solid #000000" HEIGHT=29 ALIGN=LEFT><BR></TD>
			<TD STYLE="border-right: 1px solid #000000" ROWSPAN=2 ALIGN=CENTER VALIGN=MIDDLE><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-right: 1px solid #000000" ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=5 ALIGN=CENTER><FONT SIZE=3></FONT></TD>
			<TD ROWSPAN=2 ALIGN=CENTER VALIGN=MIDDLE><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-left: 1px solid #000000" ROWSPAN=2 ALIGN=RIGHT VALIGN=MIDDLE SDNUM="16393;0;#,##0.00"><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDNUM="16393;0;#,##0.00"><FONT SIZE=3><BR></FONT></TD>
			<TD ROWSPAN=2 ALIGN=RIGHT VALIGN=MIDDLE SDNUM="16393;0;#,###.00"><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		<TR>
			<TD STYLE="border-left: 3px solid #000000" HEIGHT=29 ALIGN=LEFT><BR></TD>
			<TD STYLE="border-right: 1px solid #000000" ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=5 ALIGN=CENTER><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE SDNUM="16393;0;#,##0.00"><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		<TR>
			<TD STYLE="border-left: 3px solid #000000" HEIGHT=28 ALIGN=LEFT><BR></TD>
			<TD STYLE="border-right: 1px solid #000000" ALIGN=CENTER VALIGN=MIDDLE><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-right: 1px solid #000000" ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=5 ALIGN=RIGHT><FONT SIZE=3>IGST @ 18%</FONT></TD>
			<TD ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-left: 1px solid #000000" ALIGN=RIGHT SDNUM="16393;0;#,##0.00"><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-right: 1px solid #000000" ALIGN=RIGHT SDNUM="16393;0;#,##0.00"><FONT SIZE=3><BR></FONT></TD>
			<TD ALIGN=RIGHT><FONT SIZE=3>NIL</FONT></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		<TR>
			<TD STYLE="border-left: 3px solid #000000" HEIGHT=29 ALIGN=LEFT><BR></TD>
			<TD STYLE="border-right: 1px solid #000000" ROWSPAN=2 ALIGN=CENTER VALIGN=MIDDLE><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-right: 1px solid #000000" ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=5 ALIGN=RIGHT><B><FONT SIZE=3><?php
				//echo '<pre>';
				_trans('Exempted:');
				if($custom_fields['invoice']['Exempted']) {
				  echo	$custom_fields['invoice']['Exempted'] ;
				}
				//echo '</pre>';
			?></FONT></B></TD>
			<TD ROWSPAN=2 ALIGN=CENTER VALIGN=MIDDLE><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-left: 1px solid #000000" ROWSPAN=2 ALIGN=RIGHT VALIGN=MIDDLE SDNUM="16393;0;#,##0.00"><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-right: 1px solid #000000" ALIGN=RIGHT VALIGN=MIDDLE SDNUM="16393;0;#,##0.00"><FONT SIZE=3><BR></FONT></TD>
			<TD ROWSPAN=2 ALIGN=RIGHT VALIGN=MIDDLE SDNUM="16393;0;#,###.00"><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		<TR>
			<TD STYLE="border-left: 3px solid #000000" HEIGHT=29 ALIGN=LEFT><BR></TD>
			<TD STYLE="border-right: 1px solid #000000" ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-left: 1px solid #000000; border-right: 1px solid #000000" COLSPAN=5 ALIGN=CENTER><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-right: 1px solid #000000" ALIGN=RIGHT SDNUM="16393;0;#,##0.00"><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		<TR>
			<TD STYLE="border-left: 3px solid #000000" HEIGHT=20 ALIGN=LEFT><BR></TD>
			<TD STYLE="border-right: 1px solid #000000" ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-left: 1px solid #000000" ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD COLSPAN=3 ALIGN=CENTER><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-right: 1px solid #000000" ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-left: 1px solid #000000" ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-right: 1px solid #000000" ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		<TR>
			<TD STYLE="border-left: 3px solid #000000" HEIGHT=20 ALIGN=LEFT><BR></TD>
			<TD STYLE="border-right: 1px solid #000000" ALIGN=LEFT><BR></TD>
			<TD STYLE="border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=LEFT><BR></TD>
			<TD STYLE="border-left: 1px solid #000000" ALIGN=LEFT><BR></TD>
			<TD COLSPAN=3 ALIGN=CENTER><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-right: 1px solid #000000" ALIGN=LEFT><BR></TD>
			<TD STYLE="border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=LEFT><BR></TD>
			<TD STYLE="border-left: 1px solid #000000" ALIGN=LEFT><BR></TD>
			<TD STYLE="border-right: 1px solid #000000" ALIGN=LEFT><BR></TD>
			<TD ALIGN=LEFT><BR></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		<TR>
			<TD STYLE="border-left: 3px solid #000000" HEIGHT=17 ALIGN=LEFT><BR></TD>
			<TD STYLE="border-right: 1px solid #000000" ALIGN=LEFT><BR></TD>
			<TD STYLE="border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=LEFT><BR></TD>
			<TD STYLE="border-left: 1px solid #000000" ALIGN=LEFT><BR></TD>
			<TD ALIGN=LEFT><BR></TD>
			<TD ALIGN=LEFT><BR></TD>
			<TD ALIGN=LEFT><BR></TD>
			<TD STYLE="border-right: 1px solid #000000" ALIGN=LEFT><BR></TD>
			<TD STYLE="border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=LEFT><BR></TD>
			<TD STYLE="border-left: 1px solid #000000" ALIGN=LEFT><BR></TD>
			<TD STYLE="border-right: 1px solid #000000" ALIGN=LEFT><BR></TD>
			<TD ALIGN=LEFT><BR></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		
		<TR>
			<TD STYLE="border-left: 3px solid #000000" HEIGHT=17 ALIGN=LEFT><BR></TD>
			<TD STYLE="border-right: 1px solid #000000" ALIGN=LEFT><BR></TD>
			<TD STYLE="border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=LEFT><BR></TD>
			<TD STYLE="border-left: 1px solid #000000" ALIGN=LEFT><BR></TD>
			<TD ALIGN=LEFT><BR></TD>
			<TD ALIGN=LEFT><BR></TD>
			<TD ALIGN=LEFT><BR></TD>
			<TD STYLE="border-right: 1px solid #000000" ALIGN=LEFT><BR></TD>
			<TD STYLE="border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=LEFT><BR></TD>
			<TD STYLE="border-left: 1px solid #000000" ALIGN=LEFT><BR></TD>
			<TD STYLE="border-right: 1px solid #000000" ALIGN=LEFT><BR></TD>
			<TD ALIGN=LEFT><BR></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		<TR>
			<TD STYLE="border-left: 3px solid #000000" HEIGHT=22 ALIGN=LEFT><BR></TD>
			<TD STYLE="border-right: 1px solid #000000" ALIGN=LEFT><BR></TD>
			<TD STYLE="border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=LEFT><BR></TD>
			<TD STYLE="border-left: 1px solid #000000" ALIGN=LEFT><BR></TD>
			<TD COLSPAN=3 ALIGN=CENTER><B><FONT SIZE=3><?php
				//echo '<pre>';
				_trans('ITCHS Code No.');
				if($custom_fields['invoice']['ITCHS Code No.']) {
				  echo	$custom_fields['invoice']['ITCHS Code No.'] ;
				}
				//echo '</pre>';
			?> </FONT></B></TD>
			<TD STYLE="border-right: 1px solid #000000" ALIGN=LEFT><BR></TD>
			<TD STYLE="border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=LEFT><BR></TD>
			<TD STYLE="border-left: 1px solid #000000" ALIGN=LEFT><BR></TD>
			<TD STYLE="border-right: 1px solid #000000" ALIGN=LEFT><BR></TD>
			<TD ALIGN=LEFT><BR></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		<TR>
			<TD STYLE="border-left: 3px solid #000000" HEIGHT=17 ALIGN=LEFT><BR></TD>
			<TD STYLE="border-right: 1px solid #000000" ALIGN=LEFT><BR></TD>
			<TD STYLE="border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=LEFT><BR></TD>
			<TD STYLE="border-left: 1px solid #000000" ALIGN=LEFT><BR></TD>
			<TD ALIGN=LEFT><BR></TD>
			<TD ALIGN=LEFT><BR></TD>
			<TD ALIGN=LEFT><BR></TD>
			<TD STYLE="border-right: 1px solid #000000" ALIGN=LEFT><BR></TD>
			<TD STYLE="border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=LEFT><BR></TD>
			<TD STYLE="border-left: 1px solid #000000" ALIGN=LEFT><BR></TD>
			<TD STYLE="border-right: 1px solid #000000" ALIGN=LEFT><BR></TD>
			<TD ALIGN=LEFT><BR></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		<TR>
			<TD STYLE="border-left: 3px solid #000000" HEIGHT=17 ALIGN=LEFT><BR></TD>
			<TD STYLE="border-right: 1px solid #000000" ALIGN=LEFT><BR></TD>
			<TD STYLE="border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=LEFT><BR></TD>
			<TD STYLE="border-left: 1px solid #000000" ALIGN=LEFT><BR></TD>
			<TD ALIGN=LEFT><?php
				//echo '<pre>';
				_trans('FOB in USD');
				 echo $item->item_total; 
				//echo '</pre>';
			?></TD>
			<TD ALIGN=LEFT><BR></TD>
			<TD ALIGN=LEFT><BR></TD>
			<TD STYLE="border-right: 1px solid #000000" ALIGN=LEFT><BR></TD>
			<TD STYLE="border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=LEFT><BR></TD>
			<TD STYLE="border-left: 1px solid #000000" ALIGN=LEFT><BR></TD>
			<TD STYLE="border-right: 1px solid #000000" ALIGN=LEFT><BR></TD>
			<TD ALIGN=LEFT><BR></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		<TR>
			<TD STYLE="border-left: 3px solid #000000" HEIGHT=17 ALIGN=LEFT><BR></TD>
			<TD STYLE="border-right: 1px solid #000000" ALIGN=LEFT><BR></TD>
			<TD STYLE="border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=LEFT><BR></TD>
			<TD STYLE="border-left: 1px solid #000000" ALIGN=LEFT><BR></TD>
			<TD ALIGN=left SDVAL="0" SDNUM="16393;"><?php
				//echo '<pre>';
				_trans('Gross weight:');
				if($custom_fields['invoice']['Gross Weight']) {
				  echo	$custom_fields['invoice']['Gross Weight'] ;
				}
				//echo '</pre>';
			?></TD>
			<TD ALIGN=LEFT><BR></TD>
			<TD ALIGN=LEFT><BR></TD>
			<TD STYLE="border-right: 1px solid #000000" ALIGN=LEFT><BR></TD>
			<TD STYLE="border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=LEFT><BR></TD>
			<TD STYLE="border-left: 1px solid #000000" ALIGN=LEFT><BR></TD>
			<TD STYLE="border-right: 1px solid #000000" ALIGN=LEFT><BR></TD>
			<TD ALIGN=LEFT><BR></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		<TR>
			<TD STYLE="border-bottom: 3px solid #000000; border-left: 3px solid #000000" HEIGHT=25 ALIGN=LEFT><BR></TD>
			<TD STYLE="border-bottom: 3px solid #000000; border-right: 1px solid #000000" ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-bottom: 3px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-bottom: 3px solid #000000; border-left: 1px solid #000000" ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-bottom: 3px solid #000000" ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-bottom: 3px solid #000000" ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-bottom: 3px solid #000000" ALIGN=RIGHT><B><FONT SIZE=3>TOTAL in USD =</FONT></B></TD>
			<TD STYLE="border-bottom: 3px solid #000000; border-right: 1px solid #000000" ALIGN=RIGHT><B><FONT SIZE=3><BR></FONT></B></TD>
			<TD STYLE="border-bottom: 3px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-bottom: 3px solid #000000; border-left: 1px solid #000000" ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-bottom: 3px solid #000000; border-right: 1px solid #000000" ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-bottom: 3px solid #000000" ALIGN=RIGHT SDVAL="2535" SDNUM="16393;0;#,###.00"><B><FONT SIZE=3><?php
				//echo '<pre>';
				
				 echo $item->item_total; 
				//echo '</pre>';
			?></FONT></B></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		<?php }?>
		<TR>
			<TD STYLE="border-left: 3px solid #000000" HEIGHT=35 ALIGN=LEFT><BR></TD>
			<TD ALIGN=LEFT><B><I><FONT SIZE=3>E.&amp;O.E.</FONT></I></B></TD>
			<TD STYLE="border-top: 1px solid #000000" ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-top: 1px solid #000000" ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-top: 1px solid #000000; border-right: 3px solid #000000" ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-top: 3px solid #000000" COLSPAN=6 ALIGN=LEFT><B><I><FONT SIZE=3>Declaration:</FONT></I></B></TD>
			<TD STYLE="border-top: 3px solid #000000; border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		<TR>
			<TD STYLE="border-left: 3px solid #000000" HEIGHT=20 ALIGN=LEFT><BR></TD>
			<TD ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD COLSPAN=6 ROWSPAN=4 ALIGN=JUSTIFY VALIGN=MIDDLE><B><I><FONT SIZE=3>We certify that the particulars given above are true and correct and the amount indicated represent the price actually charged and that there is no additional flow of consideration directly or indirectly from the Buyer.</FONT></I></B></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		<TR>
			<TD STYLE="border-left: 3px solid #000000" HEIGHT=29 ALIGN=LEFT><BR></TD>
			<TD ALIGN=LEFT><B><I><FONT SIZE=3>Delivery to :</FONT></I></B></TD>
			<TD ALIGN=left SDVAL="0" SDNUM="16393;"><FONT SIZE=3>
			<?php
				 echo $custom_fields['invoice']['Delivery to'];
				 
				
			?></FONT></TD>
			<TD ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
			<TD ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		<TR>
			<TD STYLE="border-left: 3px solid #000000" HEIGHT=20 ALIGN=LEFT><BR></TD>
			<TD ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		<TR>
			<TD STYLE="border-left: 3px solid #000000" HEIGHT=24 ALIGN=LEFT><BR></TD>
			<TD ALIGN=LEFT><B><I><FONT SIZE=3>Value in words</FONT></I></B></TD>
			<TD ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		<TR>
			<TD STYLE="border-left: 3px solid #000000" HEIGHT=30 ALIGN=LEFT><BR></TD>
			<TD ALIGN=RIGHT SDVAL="0" SDNUM="16393;"><FONT SIZE=3><?php	
				if ($custom_fields['invoice']['Value in Words']) {
				 echo $custom_fields['invoice']['Value in Words'] ;
				}				  
				?></FONT></TD>
			<TD ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD ALIGN=LEFT><B><I><FONT SIZE=3>For MAGNETO DYNAMICS PRIVATE LIMITED</FONT></I></B></TD>
			<TD ALIGN=LEFT><B><I><FONT SIZE=3><BR></FONT></I></B></TD>
			<TD ALIGN=LEFT><B><I><FONT SIZE=3><BR></FONT></I></B></TD>
			<TD ALIGN=LEFT><B><I><FONT SIZE=3><BR></FONT></I></B></TD>
			<TD ALIGN=LEFT><B><I><FONT SIZE=3><BR></FONT></I></B></TD>
			<TD ALIGN=LEFT><B><I><FONT SIZE=3><BR></FONT></I></B></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		<TR>
			<TD STYLE="border-left: 3px solid #000000" HEIGHT=27 ALIGN=LEFT><BR></TD>
			<TD STYLE="border-right: 3px solid #000000" COLSPAN=4 ALIGN=RIGHT SDVAL="0" SDNUM="16393;"><FONT SIZE=3></FONT></TD>
			<TD ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD ALIGN=LEFT><B><I><FONT SIZE=3><BR></FONT></I></B></TD>
			<TD ALIGN=LEFT><B><I><FONT SIZE=3><BR></FONT></I></B></TD>
			<TD ALIGN=LEFT><B><I><FONT SIZE=3><BR></FONT></I></B></TD>
			<TD ALIGN=LEFT><B><I><FONT SIZE=3><BR></FONT></I></B></TD>
			<TD ALIGN=LEFT><B><I><FONT SIZE=3><BR></FONT></I></B></TD>
			<TD ALIGN=LEFT><B><I><FONT SIZE=3><BR></FONT></I></B></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		<TR>
			<TD STYLE="border-left: 3px solid #000000" HEIGHT=20 ALIGN=LEFT><BR></TD>
			<TD ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD COLSPAN=3 ROWSPAN=3 ALIGN=LEFT><B><I><FONT SIZE=3><BR></FONT></I></B></TD>
			<TD ALIGN=LEFT><B><I><FONT SIZE=3><BR></FONT></I></B></TD>
			<TD ALIGN=LEFT><B><I><FONT SIZE=3><BR></FONT></I></B></TD>
			<TD ALIGN=LEFT><B><I><FONT SIZE=3><BR></FONT></I></B></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		<TR>
			<TD STYLE="border-left: 3px solid #000000" HEIGHT=20 ALIGN=LEFT><BR></TD>
			<TD ALIGN=LEFT><B><FONT SIZE=3></FONT></B></TD>
			<TD ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD ALIGN=LEFT><B><I><FONT SIZE=3><BR></FONT></I></B></TD>
			<TD ALIGN=LEFT><B><I><FONT SIZE=3><BR></FONT></I></B></TD>
			<TD ALIGN=LEFT><B><I><FONT SIZE=3><BR></FONT></I></B></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		<TR>
			<TD STYLE="border-left: 3px solid #000000" HEIGHT=31 ALIGN=LEFT><BR></TD>
			<TD ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD ALIGN=LEFT><B><I><FONT SIZE=3><BR></FONT></I></B></TD>
			<TD ALIGN=LEFT><B><I><FONT SIZE=3><BR></FONT></I></B></TD>
			<TD ALIGN=LEFT><B><I><FONT SIZE=3><BR></FONT></I></B></TD>
			<TD STYLE="border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		<TR>
			<TD STYLE="border-bottom: 3px solid #000000; border-left: 3px solid #000000" HEIGHT=31 ALIGN=LEFT><BR></TD>
			<TD STYLE="border-bottom: 3px solid #000000" ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-bottom: 3px solid #000000" ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-bottom: 3px solid #000000" ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-bottom: 3px solid #000000; border-right: 3px solid #000000" ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-bottom: 3px solid #000000" ALIGN=LEFT><FONT SIZE=3><BR></FONT></TD>
			<TD STYLE="border-bottom: 3px solid #000000" ALIGN=LEFT><B><I><FONT SIZE=3>DIRECTOR / MANAGER  ACCOUNTS</FONT></I></B></TD>
			<TD STYLE="border-bottom: 3px solid #000000" ALIGN=LEFT><B><I><FONT SIZE=3><BR></FONT></I></B></TD>
			<TD STYLE="border-bottom: 3px solid #000000" ALIGN=LEFT><B><I><FONT SIZE=3><BR></FONT></I></B></TD>
			<TD STYLE="border-bottom: 3px solid #000000" ALIGN=LEFT><B><I><FONT SIZE=3><BR></FONT></I></B></TD>
			<TD STYLE="border-bottom: 3px solid #000000" ALIGN=LEFT><B><I><FONT SIZE=3><BR></FONT></I></B></TD>
			<TD STYLE="border-bottom: 3px solid #000000" ALIGN=LEFT><B><I><FONT SIZE=3><BR></FONT></I></B></TD>
			<TD STYLE="border-bottom: 3px solid #000000; border-right: 3px solid #000000" ALIGN=LEFT><BR></TD>
		</TR>
		
	</TBODY>
</TABLE>
<!-- ************************************************************************** -->
</BODY>

</HTML>
