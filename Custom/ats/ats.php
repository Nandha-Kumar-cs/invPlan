
<?php include '../config.php';
$result1=mysqli_query($con,"SELECT * FROM `ip_ats` a left join ip_po p on a.po_id=p.id LEFT JOIN ip_clients c on c.client_name=p.customer WHERE a.id=".$_GET['ats_id'].";");
	$row1 = mysqli_fetch_array($result1);
	//echo json_encode($row1);

	$result2=mysqli_query($con,"SELECT * FROM `ip_client_custom` WHERE `client_custom_fieldid` = 70 AND `client_id` = ".$row1['client_id'].";");
	//echo "SELECT * FROM `ip_client_custom` WHERE `client_custom_fieldid` = 70 AND `client_id` = ".$row1['client_id'].";";
	$row2 = mysqli_fetch_array($result2);
	$result2=mysqli_query($con,"SELECT * FROM `ip_client_custom` WHERE `client_custom_fieldid` = 71 AND `client_id` = ".$row1['client_id'].";");
	$row3 = mysqli_fetch_array($result2);
	$date=date_create($row1['ats_date']);
$ats_date1= date_format($date,"dmY");
$ats_year= date_format($date,"Y");
$ats_date2= date_format($date,"d-M-y");
	
?>
<html xmlns:v="urn:schemas-microsoft-com:vml"
xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:x="urn:schemas-microsoft-com:office:excel"
xmlns="http://www.w3.org/TR/REC-html40">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv=Content-Type content="text/html; charset=windows-1252">
<meta name=ProgId content=Excel.Sheet>
<meta name=Generator content="Microsoft Excel 15">
<link rel=File-List
href="ats/filelist.xml">
<style id="514888005-R0, 3&amp;4 Basket Outer SCIR_4957_Styles">
<!--table
	{mso-displayed-decimal-separator:"\.";
	mso-displayed-thousand-separator:"\,";}
.font54957
	{color:black;
	font-size:7.0pt;
	font-weight:400;
	font-style:italic;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;}
.xl154957
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl644957
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.5pt;
	font-weight:700;
	font-style:italic;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl654957
	{color:black;
	font-size:10.5pt;
	font-weight:700;
	font-style:italic;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;
	padding-left:48px;
	mso-char-indent-count:4;}
.xl664957
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:12.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl674957
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:justify;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl684957
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl694957
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:12.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Times New Roman", serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:justify;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl704957
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:12.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Times New Roman", serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:justify;
	vertical-align:middle;
	border-top:none;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl714957
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	border-top:none;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl724957
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:italic;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border:.5pt solid windowtext;
	background:#DDDDDD;
	mso-pattern:black none;
	white-space:normal;}
.xl734957
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	background:#D9D9D9;
	mso-pattern:black none;
	white-space:nowrap;}
.xl744957
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.5pt;
	font-weight:700;
	font-style:italic;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl754957
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:8.0pt;
	font-weight:400;
	font-style:italic;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl764957
	{padding:0px;
	mso-ignore:padding;
	color:#212529;
	font-size:8.0pt;
	font-weight:400;
	font-style:italic;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl774957
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:8.0pt;
	font-weight:400;
	font-style:italic;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl784957
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:"Medium Date";
	text-align:right;
	vertical-align:bottom;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	background:#D9D9D9;
	mso-pattern:black none;
	white-space:nowrap;}
.xl794957
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	background:#D9D9D9;
	mso-pattern:black none;
	white-space:nowrap;}
.xl804957
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:8.0pt;
	font-weight:400;
	font-style:italic;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:"_ * \#\,\#\#0_ \;_ * \\-\#\,\#\#0_ \;_ * \0022-\0022??_ \;_ \@_ ";
	text-align:center;
	vertical-align:middle;
	border:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl814957
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl824957
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:bottom;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	background:#D9D9D9;
	mso-pattern:black none;
	white-space:nowrap;}
.xl834957
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:bottom;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	background:#D9D9D9;
	mso-pattern:black none;
	white-space:nowrap;}
.xl844957
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:right;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl854957
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.5pt;
	font-weight:700;
	font-style:italic;
	text-decoration:underline;
	text-underline-style:single;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl864957
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:7.0pt;
	font-weight:400;
	font-style:italic;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl874957
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:7.0pt;
	font-weight:400;
	font-style:italic;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl884957
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:italic;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	background:#DDDDDD;
	mso-pattern:black none;
	white-space:normal;}
.xl894957
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:italic;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	background:#DDDDDD;
	mso-pattern:black none;
	white-space:normal;}
.xl904957
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:8.0pt;
	font-weight:400;
	font-style:italic;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl914957
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:8.0pt;
	font-weight:400;
	font-style:italic;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl924957
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:italic;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:0;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:1.0pt solid windowtext;
	background:#D9D9D9;
	mso-pattern:black none;
	white-space:normal;}
.xl934957
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:italic;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:0;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	background:#D9D9D9;
	mso-pattern:black none;
	white-space:normal;}
.xl944957
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:italic;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:0;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	background:#D9D9D9;
	mso-pattern:black none;
	white-space:normal;}
.xl954957
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:italic;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:0;
	text-align:center;
	vertical-align:middle;
	border:.5pt solid windowtext;
	background:#F2F2F2;
	mso-pattern:black none;
	white-space:normal;}
.xl964957
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:italic;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:0;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	background:#F2F2F2;
	mso-pattern:black none;
	white-space:normal;}
.xl974957
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:9.0pt;
	font-weight:400;
	font-style:italic;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:0;
	text-align:center;
	vertical-align:middle;
	border:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl984957
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:9.0pt;
	font-weight:400;
	font-style:italic;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:0;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl994957
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:italic;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:0;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:1.0pt solid windowtext;
	background:#F2F2F2;
	mso-pattern:black none;
	white-space:normal;}
.xl1004957
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:italic;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:0;
	text-align:center;
	vertical-align:middle;
	border:.5pt solid windowtext;
	background:#F2F2F2;
	mso-pattern:black none;
	white-space:normal;}
.xl1014957
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:9.0pt;
	font-weight:400;
	font-style:italic;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:0;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:1.0pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl1024957
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:9.0pt;
	font-weight:400;
	font-style:italic;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:0;
	text-align:center;
	vertical-align:middle;
	border:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl1034957
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:7.0pt;
	font-weight:400;
	font-style:italic;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl1044957
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:7.0pt;
	font-weight:400;
	font-style:italic;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl1054957
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:8.0pt;
	font-weight:700;
	font-style:italic;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:1.0pt solid windowtext;
	background:#CCCCCC;
	mso-pattern:black none;
	white-space:normal;}
.xl1064957
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:8.0pt;
	font-weight:700;
	font-style:italic;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border:.5pt solid windowtext;
	background:#CCCCCC;
	mso-pattern:black none;
	white-space:normal;}
.xl1074957
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:8.0pt;
	font-weight:700;
	font-style:italic;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	background:#CCCCCC;
	mso-pattern:black none;
	white-space:normal;}
.xl1084957
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:7.0pt;
	font-weight:400;
	font-style:italic;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border:.5pt solid windowtext;
	background:#E4E4E4;
	mso-pattern:black none;
	white-space:normal;}
.xl1094957
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:7.0pt;
	font-weight:400;
	font-style:italic;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	background:#E4E4E4;
	mso-pattern:black none;
	white-space:normal;}
.xl1104957
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:7.0pt;
	font-weight:400;
	font-style:italic;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:1.0pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl1114957
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:7.0pt;
	font-weight:400;
	font-style:italic;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:1.0pt solid windowtext;
	background:#E4E4E4;
	mso-pattern:black none;
	white-space:normal;}
.xl1124957
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:7.0pt;
	font-weight:700;
	font-style:italic;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:none;
	border-left:1.0pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl1134957
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:7.0pt;
	font-weight:700;
	font-style:italic;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl1144957
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:7.0pt;
	font-weight:700;
	font-style:italic;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl1154957
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:7.0pt;
	font-weight:700;
	font-style:italic;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:1.0pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl1164957
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:7.0pt;
	font-weight:700;
	font-style:italic;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl1174957
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:7.0pt;
	font-weight:700;
	font-style:italic;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl1184957
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:9.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:1.0pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl1194957
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:9.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl1204957
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl1214957
	{padding:0px;
	mso-ignore:padding;
	color:red;
	font-size:9.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Times New Roman", serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl1224957
	{padding:0px;
	mso-ignore:padding;
	color:red;
	font-size:9.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl1234957
	{padding:0px;
	mso-ignore:padding;
	color:#212529;
	font-size:8.0pt;
	font-weight:400;
	font-style:italic;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl1244957
	{padding:0px;
	mso-ignore:padding;
	color:#212529;
	font-size:8.0pt;
	font-weight:400;
	font-style:italic;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl1254957
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:8.0pt;
	font-weight:700;
	font-style:italic;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border:.5pt solid windowtext;
	background:#E4E4E4;
	mso-pattern:black none;
	white-space:normal;}
.xl1264957
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:8.0pt;
	font-weight:700;
	font-style:italic;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	background:#E4E4E4;
	mso-pattern:black none;
	white-space:normal;}
.xl1274957
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:7.0pt;
	font-weight:400;
	font-style:italic;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:1.0pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl1284957
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:9.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:1.0pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl1294957
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:9.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl1304957
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:8.0pt;
	font-weight:700;
	font-style:italic;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:1.0pt solid windowtext;
	background:#E4E4E4;
	mso-pattern:black none;
	white-space:normal;}
.xl1314957
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:8.0pt;
	font-weight:700;
	font-style:italic;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:1.0pt solid windowtext;
	background:#CCCCCC;
	mso-pattern:black none;
	white-space:normal;}
.xl1324957
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:8.0pt;
	font-weight:700;
	font-style:italic;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	background:#CCCCCC;
	mso-pattern:black none;
	white-space:normal;}
.xl1334957
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:8.0pt;
	font-weight:700;
	font-style:italic;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	background:#CCCCCC;
	mso-pattern:black none;
	white-space:normal;}
-->
</style>
</head>

<body>


<div id="514888005-R0, 3&amp;4 Basket Outer SCIR_4957" align=center
x:publishsource="Excel">

<table border=0 cellpadding=0 cellspacing=0 width=626 style='border-collapse:
 collapse;table-layout:fixed;width:469pt'>
 <col width=32 style='mso-width-source:userset;mso-width-alt:1137;width:24pt'>
 <col width=57 style='mso-width-source:userset;mso-width-alt:2019;width:43pt'>
 <col width=56 style='mso-width-source:userset;mso-width-alt:1991;width:42pt'>
 <col width=84 style='mso-width-source:userset;mso-width-alt:2986;width:63pt'>
 <col width=158 style='mso-width-source:userset;mso-width-alt:5632;width:119pt'>
 <col width=90 style='mso-width-source:userset;mso-width-alt:3185;width:67pt'>
 <col width=75 style='mso-width-source:userset;mso-width-alt:2673;width:56pt'>
 <col width=74 style='mso-width-source:userset;mso-width-alt:2616;width:55pt'>
 <tr height=19 style='height:14.4pt'>
  <td colspan=8 height=19 width=626 style='height:14.4pt;width:469pt'
  align=left valign=top><![if !vml]><span style='mso-ignore:vglayout;
  position:absolute;z-index:1;margin-left:493px;margin-top:6px;width:119px;
  height:95px'><img width=119 height=95
  src="ats/514888005-R0,%203&amp;4%20Basket%20Outer%20SCIR_4957_image002.png"
  v:shapes="Picture_x0020_44"></span><![endif]><span style='mso-ignore:vglayout2'>
  <table cellpadding=0 cellspacing=0>
   <tr>
    <td colspan=8 height=19 class=xl854957 width=626 style='height:14.4pt;
    width:469pt'><a name="RANGE!A1:H49"></a></td>
   </tr>
  </table>
  </span></td>
 </tr>
 <tr height=19 style='height:14.4pt'>
  <td height=19 class=xl154957 style='height:14.4pt'></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
 </tr>
 <tr height=19 style='height:14.4pt'>
  <td height=19 class=xl154957 style='height:14.4pt'></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
 </tr>
 <tr height=19 style='height:14.4pt'>
  <td colspan=8 height=19 class=xl854957 style='height:14.4pt'>CERTIFICATE OF
  CONFORMANCE</td>
 </tr>
 <tr height=19 style='height:14.4pt'>
  <td height=19 class=xl154957 style='height:14.4pt'></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
 </tr>
 <tr height=19 style='height:14.4pt'>
  <td height=19 class=xl154957 style='height:14.4pt'></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
 </tr>
 <tr height=17 style='mso-height-source:userset;height:13.05pt'>
  <td colspan=5 height=17 class=xl824957 style='height:13.05pt'>Ref :
  MDPL/<?php echo $row2['client_custom_fieldvalue']; ?>/<?php echo $ats_date1; ?>-1-SCIR/<?php echo $ats_year; ?></td>
  <td class=xl734957>&nbsp;</td>
  <td class=xl784957>Dated :</td>
  <td class=xl794957><?php echo $ats_date2; ?></td>
 </tr>
 <tr height=17 style='mso-height-source:userset;height:13.05pt'>
  <td height=17 class=xl154957 style='height:13.05pt'></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
 </tr>
 <tr height=17 style='mso-height-source:userset;height:13.05pt'>
  <td height=17 class=xl644957 style='height:13.05pt'>To,</td>
  <td class=xl644957></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
  <td colspan=2 class=xl844957><?php echo $row2['client_custom_fieldvalue']; ?> Vendor Code :</td>
  <td class=xl814957><?php echo $row3['client_custom_fieldvalue']; ?></td>
 </tr>
 <tr height=17 style='mso-height-source:userset;height:13.05pt'>
  <td height=17 class=xl654957 colspan=4 style='height:13.05pt'><?php echo $row1['client_name']; ?></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
 </tr>
 <tr height=17 style='mso-height-source:userset;height:13.05pt'>
  <td height=17 class=xl654957 colspan=4 style='height:13.05pt'><?php echo $row1['client_address_1']; ?></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
 </tr>
 <tr height=17 style='mso-height-source:userset;height:13.05pt'>
  <td height=17 class=xl654957 colspan=4 style='height:13.05pt'><?php echo $row1['client_address_2']; ?></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
 </tr>
 <tr height=17 style='mso-height-source:userset;height:13.05pt'>
  <td height=17 class=xl654957 colspan=3 style='height:13.05pt'><?php echo $row1['client_state']; ?></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
 </tr>
 <tr height=17 style='mso-height-source:userset;height:13.05pt'>
  <td height=17 class=xl664957 style='height:13.05pt'></td>
  <td class=xl664957></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
 </tr>
 <tr height=33 style='mso-height-source:userset;height:24.6pt'>
  <td colspan=8 height=33 class=xl1204957 width=626 style='height:24.6pt;
  width:469pt'>This is to certify that the following parts have been made to your drawing &amp; specification and as per
  you purchase orders mentioned below.</td>
 </tr>
 <tr height=17 style='mso-height-source:userset;height:13.05pt'>
  <td height=17 class=xl674957 style='height:13.05pt'></td>
  <td class=xl674957></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
 </tr>
 <tr height=17 style='mso-height-source:userset;height:13.05pt'>
  <td colspan=2 height=17 class=xl884957 width=89 style='border-right:.5pt solid black;
  height:13.05pt;width:67pt'>PO Number</td>
  <td class=xl724957 width=56 style='border-left:none;width:42pt'>PO line</td>
  <td class=xl724957 width=84 style='border-left:none;width:63pt'>Supply
  Qty. </td>
  <td colspan=2 class=xl884957 width=248 style='border-right:.5pt solid black;
  border-left:none;width:186pt'>Part Name</td>
  <td class=xl724957 width=75 style='border-left:none;width:56pt'>Part No</td>
  <td class=xl724957 width=74 style='border-left:none;width:55pt'>Rev.No</td>
 </tr>
 <tr height=17 style='mso-height-source:userset;height:13.05pt'>
  <td colspan=2 height=17 class=xl1234957 width=89 style='border-right:.5pt solid black;
  height:13.05pt;width:67pt'><?php echo $row1['pono'];?></td>
  <td class=xl764957 width=56 style='border-top:none;border-left:none;
  width:42pt'><?php echo $row1['lineno'];?></td>
  <td class=xl754957 width=84 style='border-top:none;border-left:none;
  width:63pt'><?php echo $row1['quantity'];?> Nos</td>
  <td colspan=2 class=xl904957 width=248 style='border-right:.5pt solid black;
  border-left:none;width:186pt'>Basket Outer Assy 3-4 E Strainer</td>
  <td class=xl774957 width=75 style='border-top:none;border-left:none;
  width:56pt'>514888005</td>
  <td class=xl804957 width=74 style='border-top:none;border-left:none;
  width:55pt'> 00 </td>
 </tr>
 <tr height=17 style='mso-height-source:userset;height:13.05pt'>
  <td height=17 class=xl674957 style='height:13.05pt'></td>
  <td class=xl674957></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
 </tr>
 <tr height=17 style='mso-height-source:userset;height:13.05pt'>
  <td colspan=8 height=17 class=xl924957 width=626 style='border-right:1.0pt solid black;
  height:13.05pt;width:469pt'>Compliance on Material of Construction</td>
 </tr>
 <tr height=17 style='mso-height-source:userset;height:13.05pt'>
  <td colspan=3 height=17 class=xl994957 width=145 style='height:13.05pt;
  width:109pt'>Item</td>
  <td colspan=2 class=xl954957 width=242 style='border-left:none;width:182pt'>Specification</td>
  <td colspan=3 class=xl954957 width=239 style='border-right:1.0pt solid black;
  border-left:none;width:178pt'>Material of Construction</td>
 </tr>
 <tr height=17 style='mso-height-source:userset;height:13.05pt'>
  <td colspan=3 height=17 class=xl1014957 width=145 style='height:13.05pt;
  width:109pt'>Top Ring</td>
  <td colspan=2 class=xl974957 width=242 style='border-left:none;width:182pt'>304
  STAINLESS STEEL 1.2 mm Thick</td>
  <td colspan=3 class=xl974957 width=239 style='border-right:1.0pt solid black;
  border-left:none;width:178pt'>304 STAINLESS STEEL 1.2 mm Thick</td>
 </tr>
 <tr height=17 style='mso-height-source:userset;height:13.05pt'>
  <td colspan=3 height=17 class=xl1184957 style='height:13.05pt'>Bottom Flange</td>
  <td colspan=2 class=xl974957 width=242 style='border-left:none;width:182pt'>304
  STAINLESS STEEL 1.2 mm Thick</td>
  <td colspan=3 class=xl974957 width=239 style='border-right:1.0pt solid black;
  border-left:none;width:178pt'>304 STAINLESS STEEL 1.2 mm Thick</td>
 </tr>
 <tr height=17 style='mso-height-source:userset;height:13.05pt'>
  <td colspan=3 height=17 class=xl1284957 style='height:13.05pt'>Screen</td>
  <td colspan=2 class=xl974957 width=242 style='border-left:none;width:182pt'>304
  STAINLESS STEEL 1.2 mm Thick</td>
  <td colspan=3 class=xl974957 width=239 style='border-right:1.0pt solid black;
  border-left:none;width:178pt'>304 STAINLESS STEEL 1.2 mm Thick</td>
 </tr>
 <tr height=17 style='mso-height-source:userset;height:13.05pt'>
  <td height=17 class=xl674957 style='height:13.05pt'></td>
  <td class=xl674957></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
 </tr>
 <tr height=16 style='mso-height-source:userset;height:12.0pt'>
  <td colspan=8 height=16 class=xl1314957 width=626 style='border-right:1.0pt solid black;
  height:12.0pt;width:469pt'>Compliance Note on Test Procedure</td>
 </tr>
 <tr height=16 style='mso-height-source:userset;height:12.0pt'>
  <td colspan=4 height=16 class=xl1304957 width=229 style='height:12.0pt;
  width:172pt'>Specification</td>
  <td colspan=4 class=xl1254957 width=397 style='border-right:1.0pt solid black;
  border-left:none;width:297pt'>Compliance Statement</td>
 </tr>
 <tr height=32 style='mso-height-source:userset;height:24.0pt'>
  <td colspan=4 rowspan=2 height=80 class=xl1124957 width=229 style='border-right:
  .5pt solid black;border-bottom:.5pt solid black;height:60.0pt;width:172pt'>NOTE:
  1. <font class="font54957">FOR
  0.030&quot; [0.76] FLATNESS SPEC. 100% INSPECTION REQUIRED FROM MANUFACTURING
  FACILITY WITH CERTIFICATE OF CONFORMANCE FOR EACH SHIPMENT.</font></td>
  <td colspan=4 rowspan=2 class=xl864957 width=397 style='border-right:1.0pt solid black;
  width:297pt'>Flatness Spec : 100% inspection has been carried out as per test
  procedure mentioned in drawing 514888005-R0, with 0.030" feeler gage.</td>
 </tr>
 <tr height=48 style='mso-height-source:userset;height:36.0pt'>
 </tr>
 <tr height=32 style='mso-height-source:userset;height:24.0pt'>
  <td colspan=8 height=32 class=xl1054957 width=626 style='border-right:1.0pt solid black;
  height:24.0pt;width:469pt'>Inspection Report</td>
 </tr>
 <tr height=16 style='mso-height-source:userset;height:12.0pt'>
  <td colspan=2 height=16 class=xl1114957 width=89 style='height:12.0pt;
  width:67pt'>Sl. No </td>
  <td colspan=2 class=xl1084957 width=140 style='border-left:none;width:105pt'>Characteristic
  Inspected:</td>
  <td colspan=4 class=xl1084957 width=397 style='border-right:1.0pt solid black;
  border-left:none;width:297pt'>Result</td>
 </tr>
 <tr height=16 style='mso-height-source:userset;height:12.0pt'>
  <td colspan=2 height=16 class=xl1104957 width=89 style='height:12.0pt;
  width:67pt'>1</td>
  <td colspan=2 class=xl864957 width=140 style='border-left:none;width:105pt'>Height
  8.800" &#177; 0.060 </td>
  <td colspan=4 class=xl864957 width=397 style='border-right:1.0pt solid black;
  border-left:none;width:297pt'>100% Parts Pass - Measured and in the range of
  8.79" - 8.84"</td>
 </tr>
 <tr height=16 style='mso-height-source:userset;height:12.0pt'>
  <td colspan=2 rowspan=2 height=32 class=xl1104957 width=89 style='height:
  24.0pt;width:67pt'>2</td>
  <td colspan=2 rowspan=2 class=xl864957 width=140 style='width:105pt'>Flatness
  0.030"</td>
  <td colspan=4 class=xl864957 width=397 style='border-right:1.0pt solid black;
  border-left:none;width:297pt'>100% Parts Checked with 0.030" feeler Gauge and</td>
 </tr>
 <tr height=16 style='mso-height-source:userset;height:12.0pt'>
  <td colspan=4 height=16 class=xl864957 width=397 style='border-right:1.0pt solid black;
  height:12.0pt;border-left:none;width:297pt'>Feeler Gauge does not enter</td>
 </tr>
 <tr height=16 style='mso-height-source:userset;height:12.0pt'>
  <td colspan=2 height=16 class=xl1104957 width=89 style='height:12.0pt;
  width:67pt'>3</td>
  <td colspan=2 class=xl864957 width=140 style='border-left:none;width:105pt'> Basket I.D &#248; 5.09" &#177; 0.03&quot;</td>
  <td colspan=4 class=xl864957 width=397 style='border-right:1.0pt solid black;
  border-left:none;width:297pt'>10% Parts tested , Pass - Min 5.10" - Max 5.12"</td>
 </tr>
 <tr height=16 style='mso-height-source:userset;height:12.0pt'>
  <td colspan=2 height=16 class=xl1104957 width=89 style='height:12.0pt;
  width:67pt'>4</td>
  <td colspan=2 class=xl864957 width=140 style='border-left:none;width:105pt'>Top
  Ring OD &#248; 6.00" &#177; 0.03&quot;</td>
  <td colspan=4 class=xl864957 width=397 style='border-right:1.0pt solid black;
  border-left:none;width:297pt'>10% Parts tested , Pass - Min 5.98" - Max 6.02"</td>
 </tr>
 <tr height=16 style='mso-height-source:userset;height:12.0pt'>
  <td colspan=2 height=16 class=xl1104957 width=89 style='height:12.0pt;
  width:67pt'>5</td>
  <td colspan=2 class=xl864957 width=140 style='border-left:none;width:105pt'>Bottom
  Ring OD &#248;5.19"&#177;0.03"</td>
  <td colspan=4 class=xl864957 width=397 style='border-right:1.0pt solid black;
  border-left:none;width:297pt'>10% Parts tested , Pass - 5.20" (FORMED PART)</td>
 </tr>
 <tr height=16 style='mso-height-source:userset;height:12.0pt'>
  <td colspan=2 height=16 class=xl1104957 width=89 style='height:12.0pt;
  width:67pt'>6</td>
  <td colspan=2 class=xl864957 width=140 style='border-left:none;width:105pt'>&#248;
  0.26" &#177; 0.03&quot;</td>
  <td colspan=4 class=xl864957 width=397 style='border-right:1.0pt solid black;
  border-left:none;width:297pt'>10% Parts tested , Pass - 0.26" (PUNCHED HOLE)</td>
 </tr>
 <tr height=16 style='mso-height-source:userset;height:12.0pt'>
  <td colspan=2 rowspan=2 height=32 class=xl1104957 width=89 style='border-bottom:
  1.0pt solid black;height:24.0pt;width:67pt'>7</td>
  <td colspan=2 rowspan=2 class=xl864957 width=140 style='border-bottom:1.0pt solid black;
  width:105pt'>0.030" Feeler clearance On Flange</td>
  <td colspan=4 class=xl864957 width=397 style='border-right:1.0pt solid black;
  border-left:none;width:297pt'>100% Parts Checked with 0.030" feeler Gauge
  and </td>
 </tr>
 <tr height=16 style='mso-height-source:userset;height:12.0pt'>
  <td colspan=4 height=16 class=xl1034957 width=397 style='border-right:1.0pt solid black;
  height:12.0pt;border-left:none;width:297pt'>Feeler Gauge does not enter</td>
 </tr>
 <tr height=17 style='mso-height-source:userset;height:13.05pt'>
  <td height=17 class=xl684957 style='height:13.05pt'></td>
  <td class=xl684957>&#347;</td>
  <td class=xl154957></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
 </tr>
 <tr height=17 style='mso-height-source:userset;height:13.05pt'>
  <td colspan=5 height=17 width=387 style='height:13.05pt;width:291pt'
  align=left valign=top><!--[if gte vml 1]><v:shape id="Picture_x0020_46"
   o:spid="_x0000_s1027" type="#_x0000_t75" style='position:absolute;
   margin-left:177pt;margin-top:12pt;width:58.2pt;height:55.2pt;z-index:3;
   visibility:visible' o:gfxdata="UEsDBBQABgAIAAAAIQBamK3CDAEAABgCAAATAAAAW0NvbnRlbnRfVHlwZXNdLnhtbJSRwU7DMAyG
70i8Q5QralM4IITW7kDhCBMaDxAlbhvROFGcle3tSdZNgokh7Rjb3+8vyWK5tSObIJBxWPPbsuIM
UDltsK/5x/qleOCMokQtR4dQ8x0QXzbXV4v1zgOxRCPVfIjRPwpBagArqXQeMHU6F6yM6Rh64aX6
lD2Iu6q6F8phBIxFzBm8WbTQyc0Y2fM2lWcTjz1nT/NcXlVzYzOf6+JPIsBIJ4j0fjRKxnQ3MaE+
8SoOTmUi9zM0GE83SfzMhtz57fRzwYF7S48ZjAa2kiG+SpvMhQ4kvFFxEyBNlf/nZFFLhes6o6Bs
A61m8ih2boF2XxhgujS9Tdg7TMd0sf/X5hsAAP//AwBQSwMEFAAGAAgAAAAhAAjDGKTUAAAAkwEA
AAsAAABfcmVscy8ucmVsc6SQwWrDMAyG74O+g9F9cdrDGKNOb4NeSwu7GltJzGLLSG7avv1M2WAZ
ve2oX+j7xL/dXeOkZmQJlAysmxYUJkc+pMHA6fj+/ApKik3eTpTQwA0Fdt3qaXvAyZZ6JGPIoiol
iYGxlPymtbgRo5WGMqa66YmjLXXkQWfrPu2AetO2L5p/M6BbMNXeG+C934A63nI1/2HH4JiE+tI4
ipr6PrhHVO3pkg44V4rlAYsBz3IPGeemPgf6sXf9T28OrpwZP6phof7Oq/nHrhdVdl8AAAD//wMA
UEsDBBQABgAIAAAAIQDU/WA7LgIAAPYFAAASAAAAZHJzL3BpY3R1cmV4bWwueG1srFTbitswEH0v
9B+E3rtWHMXJmthL2LClsO2Gsv0ARZZjUVkyknLZv+/IchICXVjqvkkz43OO5sx4+XBqFToI66TR
BZ7cEYyE5qaSelfgX69PXxYYOc90xZTRosBvwuGH8vOn5amyOdO8MRYBhHY5BArceN/lSeJ4I1rm
7kwnNGRrY1vm4Wp3SWXZEcBblaSEZInrrGCVa4Tw65jBZY/tj+ZRKLWKFKKSfuUKDBpCdKiprWlj
NTeqpMskiArHHgEOL3VdZvcpSS+pEOmz1hxLOonxcD4HQ8FkllJCLrn+mx77SujNheQ94gXJsun8
Hebsgn7DPJtO6d+Iz3Sd5LFeHzaSb+wg4sdhY5GsCkznGGnWglGQ9nsrEM1wcq2K37AccJ4N/+0G
79g/ONcyqYHMPDZM78TKdYJ7mKDAFn0AUZGuv94I3irZPUkFRrE8nEfLiCP4oQE0dS25WBu+b4X2
cQqtUMzDBrhGdg4jm4t2K6Cd9ls1wYjDAnhoaWel9uF9LHeW/4T3jtUdsbwVnjdjsYKsGnoadAUP
QGQEHvy49jxsietgYrbH76aCh7G9N7BSLD/Vtv0fOqDH6FTgNKWLWZpi9FbgOb0nNCOxfeLkEYeC
+XROpzPocCggE0L7PEgPQoKgzjr/VZjRolAAAj+hN/1D2eHZDV06UwQ6bcJUju1A76rSY2GugqKd
Sg9OBu+GI+zxsNxKwjSvmWehODh88wMdYvGHXf4BAAD//wMAUEsDBAoAAAAAAAAAIQBbS8g3kWAA
AJFgAAAUAAAAZHJzL21lZGlhL2ltYWdlMS5wbmeJUE5HDQoaCgAAAA1JSERSAAAA3AAAANEIAgAA
ACimSwgAAAABc1JHQgCuzhzpAAAABGdBTUEAALGPC/xhBQAAAAlwSFlzAAAh1QAAIdUBBJy0nQAA
YCZJREFUeF7tXQd4FUUXlQ6hiKAg0gRUei+hI9KL0hULIoKAiOCvKIrSey9Sk5DQO4QSegslAUIN
CUkICQQS0nuv+p+XmdyZt2/fvpeQ0OR854Ps7Lytd2funblz72v/vsIrPGd4JZSv8NzhlVC+wnOH
V0KZbcTFpfj4RDg5Pdq3z2PTJldb2xvW1tfXrr1qZXUNf2/ceGvXLndHxweenmGRkYn8N6+QHbwS
ShX4+0efOuW7cuWV7793aN/e9s03F5QoMado0ZkFC07Pl2/aa69ljwUKTC9SZKaFxew33pjXpMna
IUP2zp17wd7e08MjND09g5/yFSS8Esp/k5JSnZ0fLVrk1KGDHeSmYMEZCqnKU5YsOeeDD5b//PMx
B4e7jx/H/vMPv6r/Mv6jQhkYGLtrl1uzZusgEwopebYsXHjGO+8snjr1rLt7yD//VQn9DwllVFTS
yZM+lpbWxYvPVoiCmcyff7qFxSy0phUqLHr33aW1av1dv/4q9MiWllZt2qxv2dK6adO1DRqsrl17
ZfXqyyBbZcvOL1Fido6bXvT7FSsunj//op9f9H9KQF9+oYyPT1mx4nK5cgsUr1yDkNoyZeZ/+KHd
rFmOFy/6eXqGwrI5edJ3/frrkyef+eqrvW3b2tSosbxy5SWQzrffXli+/EIcH8Qf2HznHZ3I1q79
d/fum0eNOjR//oXt229fveoPJfLGjUCYRIMG7URNNNIQO8WpjbFo0Vm9e28NCYn7L0jnyyyUM2Y4
li1rrix+8sm2s2fvo1u/eTNw2DD7999f8dZbCwoXnqmoliuE0KMdrVdv1YIFFx8/joGw/vrr8cKF
zRLQQoVmoFWOjU3mN/ky4iUUykOHvKpWXWrSTK5RY9m+fXcgE1ZW12BiV6q0GP1sDozrJye0Apj2
UAYGD959/rzflSv+n366S1HHkPjJ0KH2GRkvYcP58ghlWlrGZ5/tLlJEq22rVm2ZtfU19MUQRNja
xYrNeiZSqE18G9AK0MWfPfvg6FHvfv22KyrIhEDXr7/63LkH/Cm8FHgZhPLAAa8PPlihIV7Nm6/b
u9fj+vXHX365F5pc/vzKCiZZvvwCKIjffXdw8uTT0FA3b3Y9eNALrdqtW0Ewkz08wu7eDfPyCrtz
J9TNLeTatcenT/vu2XMHOuiiRU4TJhyHGtqihRUsa8VhTRI/wYc0ZcppKKOjRx/SuEeoBOPGHX45
Bj5fbKHEWy9TZp7i9RDbtbOFLF644DdkiE4WFXuNsXHjtT//fHTXLnc3t+CIiMT4+ORfvzrd6d2t
jSzWO5/05yc2haCA+HEDT6ybc935VEBcTAorhImSkpIGdRD2ysWLD9etu4qPBFaR4gJUiQ8Jlvi0
aWch8WPGOBizkKBx4gOAbcfO+ILihRRKKFLLll0yJmevvz53zpzzaLdg+Zoji23b2s6ade7q1YDI
yEToAPwcEmrlW1frNR2X/3WFF5nCh5W2sJ8w8lIjSExMhZgeOOAJaatefbni8gyJzh3qh6Pjg5Yt
rRW7GCHBPXtu8feP4Sd40fCCCSW6p6lTz0DHV7wGRjSNHh4hR4/eq1p1iWKXTHSCaA4huHhtCXEp
dktcB7feb1nG7lPLffw0+qiT34rJ1ojuh3mRJmKikkkcGVOS0/k+M4CmFM3h0KH7KlfWuovChWcO
GrTLxSXgf/87ZmExS7GXsWnTdffuRfDjvjh4YYTyn3/+Wbnyiqpahj7r999P+vlF/fTT0WLFjA6M
4819/PHWu3fDU1OFiGSk/yNLzyn7+3yHBMuyG9jedhU28SJNjO59hA7I6HU7nO8zgqTEVB+PSMMx
SAjo/v0edeuuVNyLTDSc9vaesNmrVl2q2MXYqpVNSEg8P+KLgBdDKA8fvqvaGKBwzRqXsLD4Tp02
KHYRLSxm9++/4/593SsPC1Zx21EIUHycUiHrXXcX7TU5do0KVJm46PdLfLcRHN3lg2pNStrOHu8U
FZ7ESyUkJaWePOlTvbrRoa6iRXWPwssrFIaRYhcjPkjoCfxwzzeed6F88CCyTJn5iucLonU8ceIe
nnLDhqsVu4g1aiy7d0/XREFQ3K+HNi1l63j4ITusDFl6wJZlNygk7/ehZ2ivSaGcM/4iVSa2e9tE
E9u/yV65futym5IS0/g+fUDr3bfPw9jIFwygP/887e8fXbPm34pdIAQa2vPzP7T5/AolXn/DhmsU
j5XxypUA9Gt16qxSlBP//vtyQkIKE6DggLjW5Taylx0XrTIR0rCoDUkD49I/9QyaC8cf0a70VBNj
LnUKcgUUbPfOZvqb7zaCeoWsqSZjYoJWq4Zbw+f64Yd2ihtnhGgOH74/PDwBOqViF1i8+Gxf3+da
0XxOhXLu3AsFC6qMeuzf75mcnNamzXrVXgxKlYuLv8KCnjr6HL1pVYPDsgxXGWWGBSXw3TrrSvTI
MZFa83sXTwjxham+cvo12jTW8jFQNaJ2fUJCQurmzbdUnwY6ExiFDx9GocdQ7ALbt7d9bpvM504o
Hz+OUbU6lyxxgjh+/vlu1SE6S0trb+9w1b6107tb6U2rVpg8UkgtsXFxG7kulft4RvIiNTQusZ5q
piSnpSan0+ad66G8kgHOHvKjasTkJKVQdnt/R4sydnN/dkpJUX5aKNm92121Ty9Vau7Wra4w59FA
Knahvo3NdX6I5wnPl1AOHWpv+NF/++3+mJik6dMdocsrdoE9emx59ChaQ9NrXFwICi/Sh+etMKog
85cvTvEaklAu/v0yLzJA4KNYqvZJg12skEoGtdjLSgzxcT1hSBEVjXpoYDztqpN/XfcPtu+y9lB8
Y2lp6QcPer3xhspsQqVKiy9degTpNHy8tWr9HRHxfC3beF6EEu2c4dOsUGGRl1eYo+MD1Qfds+fW
oKA4/vt//5UHemTUK8SVvPpFrHmRAeh9OzroNVp33fhQTv3CXOdr+eYGVmKIHjV30A9Ds3p/UhY1
zl43Sw3tUEnooKn6zWHX97bTLkZckmrDj0751Clf1YmuDh1so6ISP/tst6Icnc9z1WQ+F0I5c+Y5
xWMCFy1yio9PUdXlYQD5+AhVHerX78PO1s637vRBFb8Eeos/9DnGiwxAdW67hIzodpg2IS5sNhmW
OxWynygQH5tCFZq9bkfi0qXGNipPUzOS0MtTBRhY9Lf8jUWEJFI5cdyA43y3GjIyMjZtumXYoUNT
X7Hisrt7SNmyyjGNDh3sjH3YTxnPWCijo5OqV1eq4VAQ8UGvWeNi6Dnx9tsLYXrzH6N1TEmf94sz
ujN6VdtWufN9WaBd++y8eJEBqM7MsRfQ0tQrLCzoL9rsh4R928WBSvhv9PFD32NU4eguH176779L
Jgk5C36sMoLtdNKfKoRIfXS6ZK71qLWTyonXLgTy3VnYu94T3wbfyASE7K+/TufPr9TC8Rg9PUMn
TjyhKC9efNbt20H8x88Oz1IoL170U1gtBQvOuHDB7/HjWDw1uRyELbl79x3+yyzA0Dbs16aMPs93
Z4LK3a8aNTWok/2w8lZsBjwQ2iHofNrfZsFN2jScH4fU0l4wOjKJWkrXKyFUvm218oMBhnQ4SBXQ
Kkt/8yOEBSdQYdf3xc0qLCGcERoCyqf/cEGhj6LDUfV/+/TTXdB/DB/1b78dp+t/Jng2Qol7/uGH
w4pnUaXKkoSE1IULLyrKwb59t9NLUgBPb0wf0Uox9m+yhz3W+PhUKow2PppDo0JNS65nJdO+P08/
BM8feUh/Gw7WLJ/sQnsZ6xRY1/btTZ/U3wXDiAr7Nt7DfyCBtFWoH7hmqkzjNR9W5oomKjQpadRo
w5dAu+guZMAcLF16ruLBwjYPDY3/7rsDivIaNZY9Qy+4ZyOUhvMNq1e74JUYTpEVLjzD39/Esins
3WPrSa+E8cPKW7Dr6rlAKlFV6RiGd+O9M148K8ExGxTl4gI2LSl0yoc+0awOwXDo2xj5DyTQLkh2
sjSExG5Z9u2Axkx/f9luP/s54VPLfbR39cxrvFQfOObmzbcUTxicNeucu3uworBEidnPSsV8BkKp
ULGhej96FHX6tK/hqr+NG2+ZP8BrOLLTrJSt9TzR7WocasUU0dSRMhcbrXT2Ydy/+S6rwODqEqyo
oEHFh3H9YhDtCglMCJcMGlaB+ms0vdERoi2866r08KBdYLLmwHtMTFLTpmsVj/r991fExaU0aqQ3
hQZl1NX1GaiYT1Uob98Ohmoo33a3bpvwOaJ3lgvBypWXREaq+CVoIzQooW4B8W5AtHzsjyYlVHo0
wjmpd5Z1tf2b7lI5ccYPF/juTMgD5rusPaaOPi9b3AoG++vZOmjwaFdG+j9+96LZ36zBlpvJfRu8
Jn3rSJuK8fPbLkJzVe27FUCTeeKEj+KZ49VAy1+x4opcmC+fbhiE/+xp4ekJ5a5d7oqR2zlzzkNx
MXRrnT9fZwLzn2UTEKnukjVA7FJjO6+hBlkh89Wfs+nbaDftYhzYXAyDP/bTM4lYnwugRYyPSwl6
FAdxXzvnOlX4fegZVoGBNATLTC+QO9dD2Wad/FbY27GK8BT+J+MfmsGvU8CKTsQwsIXou4/uFra/
NqKikgz1KLyUc+f8FIUjRx7gv3kqeEpCaW19XXGfx4/7wMouWVJv7gt6DPPrUSAqImm3jYft4lvO
p/wV78MQEPSfBp2gl8Q4ftAJvtsIqOaJvb68KBOQcggB7QXrFtRJDEOfBkJk99qqDznhA6M6Ld6w
46W4zjRha08ZeQ4lV84GsE2cIsg/jvbutPLAXmr1h350MPMAHJBX2gVmy6EY14YmQH4FYJ8+24KD
Y/Eu5MLPPttl8snnFp6GUC5Z4izfXvHiswMDY+3tPRQNJ25bZVY3Of3L9gfoiYPoiPfaemo/IOy1
krRJsHc9Pu9nDFRzwQRnXpSFW5eVWiMrT04SdgmomIORUTdrVgnMyOBqpdtV0ec+9NEtXTh9gJsy
sJx61eZjk/gk0tIyAh8JGUXry47AcOuyOA4z71Th7RbhfCrAxfFxQpzS/8jHJwJmuPwuoD5FRCTW
qqXnXNy799anI5Z5LpTTpp2Vb6xChUUJCSmTJp2SC0Fr62uGN3zXLbxRMaVfGeOX7Q6Y/HCvnRem
N6g9xkFzfX0a7uZFEsYN0Gt62ZlXzbze6k3epQ75UK/1UqD7B2IGMi6Gj0x9/4kYyWJjnwe2ePMS
qeWznn8Du9bMEjqAYkyqZZZjPOiu5vax5W+3Zq+L0QOwR60dd26E8d2ZSE5OU1g5Fhazw8LiFeq+
paV1jjUr85G3Qjl69CH5ltjo18iRB+XCAgWmwwDiP5BwaFvWGzLCz1ruMymXveqIuRDDKRAZ8qAP
L5IAK6RxcZuOVbaO6n0UoiOfFu1l8OO4lCStTnPxH2Je58whP1bYQPLjZCVbV7lTCRGnxq4WZeyo
hFVmwPOkchBdOd+RCQhQF4PJBeKkb88pHuC33+6XXw14/37k4MF6c+X16q2ixj6PkIdCOXOmo3wz
kEg8o+7dN8uFpUvPjTNYfoAn9dcIYWkyQmgaWShbzb3GZw4ZLp/hWhrYRtP9u3+zPVSTF+Ue7rlH
UEs8JmsKnk43bQw359fOFs0h49o5umYSoJK+DfVG4LetFnKs0DXxtNGb015VDutySCGXO3e6yS8I
KtaDB1E//nhELmzceK3J5uBJkFdCaWV1Tb6Npk11t9Gqld6S0Lp1Vxr2BajWp5GQD7B+EevQQO50
c0HyomXU9tAG5MppaUbbs+2r3esVsmpTfuOKKS68KFeBlxgVngSF5EDmMKenqxhVfXiPj8bP+9mZ
ChlZt47+mkqunn/MKjM0Ly1aUB8PPX/yUT2FZwljgyI2+LBpcSbj/J+VOrSPT7hC3b95M3DBAj17
qFMn5aKRXESeCKWz8yP5Bnr1goL8T506elpzv37bDe8KnZGsIYETh55RdBY0mMfYqZputloDPWsJ
fe7Qtnu81AC4GHwhefn96yE8JOHP4WfZVdGnIo9EgvN+4cvNFv4m5ioVHyGVgxmS0nzvToS8C98b
zojbAyDoK6ZclffGGKwSgZWj8Ia5ePGhoqEZOtSe185t5L5Q3roVJF96s2a6qZTmza3kwrFjDxu+
//DQhAaZLgXE/ZvuGlYDZK0fDHgQy3eoQR5KbFNuIy99PgCD/frFILrHH/Qn8ckyk53n5b5l1rgL
VP5dryO8NBOyigwmxOuJMs4oT8r/8vlJvkNCRESCwl3mxo1AxUDKlCl6w665hVwWyujoJPlOatRY
jnaud++tVAJOnqx+J/iC6TGBE748bazdwjOVzckPK2/mO9SAynWkaR4z1748E4zufZSuc+7/RK9K
HW7/JnoKZb0sZw5QXjwkz16Cvl5RfIcEPBZSc0Feqo+EhNRSpUSIkfz5pwcExPzwgwOVgGg+ee3c
Q24KJeRP9iotU2ZeSko6GkUqAfGpaXSRq2eKJrB2Pq2RP2/3cKoJGg5wyhjZU0QHOK4/Nv5cAYIS
EZL499Sr9Qtb02xnZJiYEHeQ1A/ZpY1NSxJavCEUzcGt7HFYvkMfA5qJdb3GVHPIpexbVKjQjLCw
hEGDdlIJ6OurtW4pB8g1ocSd164ttEYLi9mJiWkLFuj5ocEeN/aAGNA3MadAxq87ag3+NZO8wQ9u
9ualaogI1b2/ztW23bwk+srnGXIfvWPtHbpNuRf+YxhXScElf4iVQ/gtlYPRxl0IZEf36Aij1ZKT
02S5tLCYlZCQItusBQtOz92QWrkmlMOG2dNVogePikrat8+DSsDhw82aPz13VPhGgKGBRuONyP6z
X7RVunIp4HzKX37TLxBcHB9/1tKe3SYvyoTsLxcbLWRi04rbVN62vJYOPbKX6EC0lw5DK5N9uMqW
nZ+amg7djEoqVVqci4OXuSOU9vZ68nf3bnhgYKxc0q3bZvObqJZvCgP8o6o6y53v0AeKac4XKiYv
fUkRE5W8y1o3A84ge5DULSDm4oFvOh2iXW7Gne0Bp5P+vbMmF5I1B/+BkJA4eSV+ixZWSUlpsrbW
ufPG3OqEckEo8RnRlYGrVl2ByVKsmFgOW7Pm39m63McP9VxvFMNvMtqU57N84AvRL+cWZN8l+416
MwiyCciGObURHpI4/xflUKUqvL31xi8nTz4VFBQrlyxfbnT9cbbwpEIJUZBdJFu21C0klcN/vfnm
/Bz0m73r6S2VMnYEecU0L8ob4O3GxaVERCSeP++3cOHFL77Y3aGDXbNm6+rW1WUneffdZVWqLMVd
V6u27P33lzdosNrS0qpHj82jRx+ys7vp6RkGZQYWQy5+NjDXaPhMXmIGUBQaWEu8KPdw+bLeCPSt
W4H79t2RS2AG8apPgCcVStkQK158Fp776NF6U9tQk3nV7EChrW9Ydpvv0AfZOhreMTkGnu+UKWcs
La3feisb6U40mD//dEgtNJlsedQbA46w28ajQyXlcBgJZVtTUbVyhl9+OSbfVGJiKj5R2oQ58eS3
9kRCee9eBF0NGBeXfPmyv1zi5aXnipItLPj1Enu4jIa3Gh4ixkRQmZc+GTw8Qj//fG+VKksM12bk
LtHrFS48s2nTdVOnnn2SpTCG6+m6Z8VEqFdIT9fMLaDdqV9fRLp74415KKlRYwWV9Ou3g1fNKXIu
lJCSQoWE5uvs/Aj2l6xhrFjxRBoGji8v6B7W2YHvyAQeRCMpHkvO2mPC/v0eH320UdaDnybx0PBq
hw3bf/9+Lgz4TRkl1mEqluFmC5dOBUC+m5RY36HSFrvFrrw0E/iKZBfgL77YEx+fQpsg2iZeNUfI
uVC2amVDF9Gtm66ngC5FJV26bHpyDerMIbF+D4wM4yFvEuJTLaXx4R/6Gg19oY07d0L69dtuvixW
qLCoY8cN33/vsHixs63tjX37PE6fvn/jRqCbW8idO6E42u3bwVeu+B87dm/nTre1a6/OmOH45Zd7
mzZdayz8syHLlJk3efJpDccRk5BjdYwfqOJvv+VvN/6XccghORk7VtmSJrXoYWHxcgN082bghQti
EQUUlScJ0JpDoVSMAeHT2bLFlTbxmp/kscpoIcXp61FT1y+43wiltdJgk5K28sMyB2jR0YqXL69c
hK9guXILvv7a3srqKgQuPDzhCe8ILykoKM7R8cGsWefwxSqmlRXES4UVhc6H/zibaFxc+PhtWSVE
EN0LC0pjuEpYxuWsVRkKti63UTaqHBy86IKLFsUbz5A9ghs0WMPrZR85EUqIoPxMfX0jYmOTaRN8
/DjX8hIovF12rL0jr0eB2hQbpTXqq0BCQsrEiScMg+IR0Y2OGHEAJnZeByLDK/T3j4HF06nTRrnJ
UbBq1SX29ibWfhjCxyOSHhHYs9bOTctvr5pxrVXWAHC9QtYaU7jyVJmCverslC+mTZv1dKnoQ3BT
cuLAgwc9eb1sIidC2bPnFjrxyJG6mUA5iMDEiSouJ08CYytWW5XbqBqZVxX4bL75xh4tEF2nzMqV
F//11+lcUelyACjE6PQ/+WSbsexPZcrMhz6QLdGcaND/Kjikg9EJNrnaneuhF074N7IQ6rvsWI0+
R77mkyd9AwNjaBMtV8468WwL5aNH0XTWggV19r+d3Q0qKVVqTnY/a5NQePwz9mu8hzy7tJGUlDZ2
7GHV1ggPFKait7eJ1A1PDeiCTp70qVVLJVw5+NZbC44fv2f+4x3RXQTlMqSjA1+VoQBaO6pD/s7x
cSmyS5GsL8njLQUKzMBL+emno1QCRYXXyw6yJ5R4IrIvEzpuaFq0CcbFZaMzNR9/Dtfzfp349Rlz
3g3qLF9+WVUcX3997vbtt598RC2PABV2yJC9qnpnxYqLfH1VkpuoYqeVhyxMjA2L2XgZBNggyKFj
Vk27ykv13VKt5t7kpZno1Uu4JqIXRYmc6AitGKtmPrInlPICjnbtdNPNHTrYUknehVLAO6AnophV
UwXqe3qGGcZzAvFRXbrkn9uteZ4AHzweqapotm693sxRMOiOMLcbl1gP67Bx8fXofBU9DJ6Vt7ve
RC49alB+UF2z9KhGFjaKr0KWwocPo+Xu9PXX52TXVyN7QklnAvHI5FlvNEgaDY/1/JvDuzqM/vjo
0klXZK9983Finy8eh+etMHPkSTU/HMTxxo0Xw3VNBp7zmjUuinsBoR8vXWrulAHuGm9H9d7Z0rMg
fxETWW5cZWe5ZVJwOUVQpBs3HtOFwVhESceOItrt3r3KGI7ayIZQyusvra110YjlEdTgYHFXMkb1
OqLoQerkX9enwW6TC74UwAMNCzY9rwqtyzBJHsztc+cePLedtTlISkqdPVsl3nGdOiufZEIIYDMU
dQpYRYZxl8oR3cWKs0nfOrJCQF5iahiHQ1aFoRqlpKTRZv78Wg2WIcwVypSUdFLO8I7RINvZ3aSz
du2q4reHn7SrIIJ4K1i3kNV2tSCiT4IePcSwABHfD5R3XuMFR1RUUv/+ymBghQrNWL8+hxHL3bOi
F4HolFmhwkuL5Eke/jR09cdDprVmEBUI5dKlYkHPvHl6UcG0Ya5Q9u+/g07AJpHk4RV8x6yaDDm1
kTHO/Tl31FC00+XKKd0mhgzZFxOT7dBtzz9u3w6uUEGZkHnQoF056ArGDzxO7+LSaTE3KMd437BU
N8eI/pqCz6BZVT3X3LliGe4PPzigDiX0gGZs/uyDWUIpN8XQzFAiu4pA42HVZPzYX9yt7jbyW3Wu
pj7caLNQz5TLAQ4c8JT9T8FixWZdvSpCo798gDIzfbpePBywWrWlsbHZG/3oJsXPkPuTK2cfU3md
AtxX9Z47n8jAy2XVFEA12e0Xppg8zzd1qrlLH80Sys6dN9KhPT1DocRQV47Xb6g+y2udaudb57DN
m80fpKdlXDodYJjh67ZLCPthDmD4br78cs9L019rw88vqlKlxfK9Fy48I1vDrh8Zz3wlL5V87McX
MR/ZeQ+bGn4e7u4hdDGGw0NmjhiYFsqEBOEAUrHiYlz699+LCEFHj6qs2Gr79ia6H7drSo/8tNT0
bzqJ6PMg7t9Qsk0CP/nyy710JSD6CEdHlawlLzHS0zPQccsPAe2F+U46w6WsF4pRETmQ+8yxF3np
v/9qjHEyQEjoYiIjE8+evU+bI0ZorQQkmBZKeXgFqhueAm1CxTaUJXlKYPIoXdhFQ+BX8mI80Hbx
Lb7PbMgTr2CZMvNerKzWuYjt292o72Lcv9+seefD23QpnRkVMR3QHNIuc6IDE7y8wugy2rbV/VDO
zWWOZmlCKKGr0uGqV1+Gkq5dRYQqLy+VdUmrpCyZ2gE8e0gBVRobjMdqADUtLfVGIps3tzKWPuI/
An//mEKF9MbCDh40PcsA0CtoVW6j4hXQLpAXmQfZDouMTLhxI5A2164Vs0TGYEIox48X85gBATEZ
GaKZLFtWffFNp3e5QdO8tJ22mKHRpXsGzY9d0aaNcOUEv/iCJyj5jyMuLllh8JnTj/88+CS9glnj
RDcdFyP8MkFeah7kWZUmTXS/lT1KTb4rLaHEm6aRp9dfn4vNv/46TYc2ljO6blYw5k/qmwieC0wc
eppu2/WySpRKQ8gzreC0aWdfSSQhKSn17bf1RovkBG2qgLql8PCPCE30douwlCJiDu9+mNc2Gy1a
iK4MZomDw13axN+8khFoCeXhw+JAaIFRQooLTApjkiAJpUpIXAVkN2n7TSauFZg8WXwV4Ny5518J
pAKpqenly4sh2/z5p8Pa4PuM4IaziawrkFFe1WyEhsbTNYwadRANB7XibFkPr6cGLaGUl+DgINu3
36ZNje+PhBKfGi/SBN354R1G4/QxwNKnCwD/+OPUqzZSFcnJafIKzGLFZpmcilwxVS84oMz2FbMR
SEKGPJ2BC5g06SRthodrmaRGhRKGNh2CKaclS3KnNRjdGpMHcoAAc9REquzooBdfXoGwsHg5YuKY
MYf4jldQQ2KiXsC0Dz5YYVKwDJP5gU1L2SZnJ92EDE/PULqAZcsu4QJos107LXPeqFD26CGsbIi5
n18kbc6fL9RhQ0z+7hzd0k+fmvBCl8cdgh6pu3QAuB95DBa29qs20iTCwxNku8ecz9jp5KPWUpsy
rMshRVrc7IK8B4sXn41X1ratGMXTaLyNCiWpj3XrrsQmPjU6nMIhT4HIcBHmBrx1Sct8mfOTE9VU
RHqQIXtavPnmAo12+hVkuLnpZVw0c1D98YPYe3cioiNywV/bxkbkT4JlDNKmvb0IjaSAulD6+Igf
s3R0tPnpp6Ztajlfdu186/yyYnorAOGmcKbd3jeaEezwYaFKQm2PyUr58QrmYP16IRYFC854+hOw
1Lo1b64bG6IFzVWrLmUVDKEulK+/zltdHBGbsokDq4rV0YAcpI/RMFMYNvtIUZqC/dVDRCclCV8Q
8OpVvTD0r2AOmjZdRw+wevVlT1nz6dZtE50dn8TPPwtXHmNfiIpQ4qLpZxMm6PxB3nqL550tVmym
mbc0sJnIFsj4eSv7yLCkjHSdC3RsdJKcPF7DTpddR4cO3cdLXyGbkJ13jhwxPfSWiwgKEhYzG6Gk
zQMH1OecVITy1Clf+hn6SiiktDljhvBD1gZkt5GFcDMh1ilgRWNGxIgQdZdyR8cHdOoCushJT7vr
eWnw4IGwU9H7PU2lHJJAXpVsppqsH9hhrI4CKkJZt+4q9pv8+afhiHLfbXK4S0ZycrocfNsYD20z
Ghm6QAF+XjAqKm+jA7z0GD5crGbp1GkDL30qUHTZK1Zcok3VheEqQkma6Tff6LpL0kyLFp3JKpiP
1JT0z1uLlNaGXDLJaBCsMWOEg9z48Ud56Ss8AehVgoGBWnlechdyZ+vk9DAhIZU2HRxUmiSlUKak
iN8zKaZNOzueko2w185LIyY5A9rak/b360v2OGMjC5vzR42OluNXdF5QexDqFczEtWtizSGUdV76
VEChcipVWoxN+jzat1eJC64Uyk8/FR6j2Dx5UuiXEHBWh8BysH1UZcvVc1q5OAE02rcuB8/92Xls
v+OTv3M8fdBPsUZTAUtLkQzq1q0gXvoKTwx5vPnOnZw7/GcXEyeKOUbYBv37i1i7vIYEpVCSCLdo
oQtO3KEDX70L8w2tF6tDoGYvwC/XIloBERGJ7KRgpUpLDM/7CjlGcrIYYmOeX3xHHiMgQMQYevQo
Wo5nabi4TymUVHX3bt36V5pu7tVLGb85JiqZhFJjMiYHkNexP3yoki3rFZ4En38uokE/zcaSQn2M
HatzhCPRgiXNKhD0hNLTUziy45NKk+IEhYUpdUeH7bo1RIy8KDcgL7eoXHkJL32F3ANUqbx4winJ
6WFBCdedgpb9deWrdgeGdlJOtVNQ6nLlFqCFJv+6t96az2tkQU8op049w+qBaNevXQuQNpXtPCVR
wx+8KDcgB9406Qj4CjlDz57C2yZnDzk1NSM+NuWGc/CSP64M6XBQdg0j8qpZsLYWSXDT04XDeL58
SunSE8o33+QzNwUK6NRPfEZsE2QVZNAY+APv3OxhKcZBxYqLXmmTeQR5IT/MBl6qCbyLG07BCyde
/qr9ATm2twb5L7OAI9BJg4PjoDnQpsKG1hNKEgiWmpQ2v/tOJcAmnTtbI+rauHpVtM0eHjnPLPEK
JtG6tVjnZGwOmqHb+9t18bylAMpmkv9eAs2G7NihiwFLF3Dpkp77kp5QUqX4zFhbtHn27H1WgRAo
hZtp8YbdzB8vhDzOheWt8iq4V81knkJ2BDt7VmuxfG8pg1a2mGzg4k2+6BUqLMQmyeiff55iFRiE
UMrj7BkZGVA1aNMwVNAY/XTpjK3LbZz3s7P//ZxPFdAZ//gjl2NUv4IhKFcQ2gJepAY5AqAxdnlv
28+fn9qw9Paty8H1szKZRmRl8yD8+utxesXYpDaobt1VrAKDEMr580V0IrRSW7eKKW/D+XvtSe12
72xeMOHSg7vZ0zXljBPmp+p95BPjdjX0oU/0q5Y1u8CXTw9cY87M01UvtTrYveaOH/qKVkkRjKVJ
CR4gXRGLFbhyRcSihtYnB6LmNTIhhLJWLZ6tu2JF3UTQV1/xiCgWFrNYBRl0QdrsUHHLwt8u31fL
zG+IevW4IwhzneelRhATlfz70DNNS4oA8Q0tbCZ+fcYw6UGHypvRhINXzr4Mvph/T3Fht9O3senF
otqQc3poDFgmJaZ+/8nR9Qtv3boUFBQQRwooPXlFm9WrDo8xYbtIGfVEDgGErlheB8ZrZEII5Rtv
cIeiwYN1d0vL4WrUWM4qECJCRfyqGT9caFNeRA4yxvYVNy/89ZLfPbRn/CAKQArJEWT0aBOrSXzu
RDYoImIlymxkYRMcoKfdUlb7i8fNjbDzPAMKErudXElHSX6WHTtm22+IXQaosJPGDTzByod1VnmP
9JaPHdMlFWB/g3LfKISSaq9ceQWbZHovWaLMu3toqzddECvx9Yic/sMFStNijJmxstkvlJCXCWuP
nMkzSapsWNRa/nZfCaUGevfmkR0yw0KZ6J0UYJcBRobrva9lf17RuEL6DKA8yEIZECBmqoVQ0m7W
ktOm4VxO9w+40/iIHsrACeipZ469YCw70LgBKlnZGHbtcqczaj8cOaSbZdkN+zfeveL4ePEfV+pI
vsPY5LVfOqH8e+rVtuU3gf2a7OFFTwAXFzEGl5JibtgchobFeGelCG2yds4NVo5GihdJoJRLnTvr
oj9TMig2rc3AhVIOEsQiBys2ZdTOivJx37gpA8tj9jinelmGGONl41pdlSo8RTgbtzcGOXPtp5b7
5I9bF2xDGkujxvIlE8pcB73o7KYcplmc0Z8c4UWZGJcVLxcWDy+SQI4Nb76pm10sVYorjd98Y88q
AFwoAwNj2T6QqQi0aWh6s1OCJr8t/PbR/Zi5/+M9jqF8E2iFsnbCso+qiiCfhlkm6BsF0cuzQoVQ
RkUkLZp4+a8Rjs6njMroY7/Y+b9e+nO44x5brwyDYG44b3RkMiMrcTrhP/k7xyWTrkRGKB1eFDUj
QhLm/+I8+btzF44Z9SU9ffDBrHEXJ33rOP+XSzeclW57ifGp7IB0g08I8pNYsCB7ob5xkfS06c2i
maCpvsbFVYRy8WIRCB2bDRpw67Z6dWG6cKGUm3FIkjwNxSoQ7rqJAQLztZD0tAwNKweg07m5aa0T
p1Or5mdNS82AJF27EJiUmEbnkoUSn4ec2rH1W7p0grxeJnBHn7WypwpgvYJWNgv1rMigR3FsV7PX
7ZKT0lqWlTTpfOtmS4HLADLIcG2/fHlK1MxMEp+iP5jidNK/QVYKeSLam+AAEaYhd3VK4J13+GDh
e+8pLVptXHcKoou0LLNhx1r3nevuNCslxkNg3fKqEm7dCqJ3jc3PPuP+u2XLCrcMLpQHDoiMpJmb
nvKmDIhs4MPYpZOufNF2Py/KDdDptEco6YZdHE24FRNIKEf1Pko/J379oV5s2V51dyoqMG5fLTLB
kFA2LWnbvLSK9iw7A5BQ/vWdXtI0xgFNhS8LHqz8wcisX9j6n6z+KteFcswYB3r4vMg8pKWK3GSq
PLrLl1eVgNuUTzd1Ko8OXqyYGHnkQrl8uVjLg005zj6rkKeQp7w0RnGjI0TsjXAzcuowkFCCMIbQ
6SyeeFleUcnr/fvvhWOPqPDLdgfWzr7RKSskOMQlPSsELQklY686O1FzaKdDVCLn4pSHrqCLzx7v
BFIJSPf7eWveQqMaWvQ1s65/1lK02bh3Vi3XhVJeMsqLzMawzkbTP+IujL1KOh26KQqhAS2C7yah
HDtW73Pp1GkD+7tEidmsQp5C/iQ0VAJY2XTPGpmBFZCFMjSIjyT434+hQorCRR3xsM6H6DLaVuDG
vsM2HhROFso+DXezmvgXUsIK5WDMslDSeibHIw+pMCGOT+FCuFmJ62U+jo1jUmbzS6d5mLtcF0p/
f+ETnl0DHGLX2EKpbzDeMh5tlE4XF5dy9Og92kQjyiuw/7p2FWEMsPnmm3zkvHbtp7G8iFZ/li49
lxep4fxR0ZKlai7xkUFC2T0zhz2BDhUXo1MYMjJEWGESFMAl60sgtV0WSnmgfqUUV5tkmoTyYymE
LJ4+1YyJEupKUmKql2s4/RboXJ2HRd7yN88ln+tCKc+y5CDfa2xU8if1RaQTsEuNbV63tIL10+nC
wxNcXUW0I3qnXCgbN17DdrA0OcWL8yhyOUuNm13QEG6VKlqO0Ggt6M6TjGfNUICE0maBXsKeOvl5
Dx6bKRYQCLYJwsIlhgWLQSj2Q1ko5Qb71P77VG4olDACWAlD7ayzGxrR+C1k/dBW78FS971hKV8z
kOtCidOxhw/m2Kv63p1IKD/njz586GN6tRad7vHjGH9/kVqUTHgulDRMWLOmrmmkuHvffpub1owx
UAKKevX0vEUUkKc3KbOLSZBQOh7Wy3BNGSNZWxUTpRcsTpWsf5GFUlabbkrxcA2F0uOW3iggDfXL
QhkdmTT5u3Nyti9i3rWUAM3eBRtJsJm7IO8kX99IOTo6OXZwoaTUnx9+qPNDprmgn38+xirkKd57
bzk7XZs2KiNbMuglnTqg4gIIURjS/oDnzTDSTgASygv6g+cKoQwJimebGmTjR7JQyie67SLCehkK
pTysAxgKZajUJIMwrZq+bkseJzvW8sB5eSGUBQpwKXk6adpIury9w/FVs79BipbBhZLq9eunC8lH
m7/9ZnRiMFuQtTRDVKrE112wHFUaYO8D7NtIxUfG7VpW+st868jpmIRSMaOjEMq4GDGlfnyvrypZ
u5gzoVSk4DUUSqrZsJjN0Z33oBjgIF1r8Bnd3TZ5KJSFCnGhPH1a6c2dFyDpcnPTm9BWCiVNQQ4a
tFPe/PPP06xCzhAfmzK237GGRW3qFdSKvUsJDdgnoYFuWdPuoGE4AzILMvdyBcVMoZRjCmun5MkL
ocRHyzZBOel0+4o86ar9Rh4qLU+FErYwL8pLULwrFtiR/Q3SSh2lUA4cqCeUkyebm+RRFXg37AmC
8vtTgDyQ+/TZxouMIFJSKztU3iLPx2xd6Ua7mpcWi6HMFEpcKs3pyzOQa2Zdtyyz4dsuDlbzuZ2U
F0J550YY2wTpt/iDLnK3Dc8glqdCefz4UxXKK1d0z5n9DSqFklpUJha0qT0TbQ7YEwTDQoxadtR9
d+umMjGlQK/aIk9ZkxLrJ359Zvlkl08a6I1KRIaLOWgzhRIY8uEBVoJdzDEZ10ySOuELvo4kL4Qy
yF8ck1Icz/xRTC6z/MZAngql4WKsnCE2Onnbave+jfYs/VO4axFIKF1ddTP77G9Q2X2XKcOz51la
WmGThPKXX9ST6KoCT3bD0tsKPwlycHIwHvKvTh0+K9+ihe7s2khKTKPRHFX+8rneKiTzhTJKmjEC
W7+1UXY7ojH2vBBK1JfnGHvV3tkaZ8/aBH/owy3OvDF0uPXt4aGS19B8eLlGLJp4mabBwN3WKiki
Sbq8vMJgcbO/QRrm40L5/vvc/q1aVTdSSENCo0c7sAqGUCz3piS9EaF6LeLkkTxZRLsKRoc8KWIR
G5AyCZyi1Zsqq9/BrzocyNCPrWq+UAKHd4iwHzJP7BPTuHlk6NjMv8lKiHUKrNtp5cH+blNe530I
5IVQkn+3oe+sSaQkp18+EzB+0Ak9x5QsnldzhqKG2ccnIiwsgf0NKoeEaKSwSJEZ2KTAbb17b2UV
ZPw1wrHN2zqZoEcP1MtKm39AP3GY/Kp4kQEGDOAxuN55R2tZnQwYwhuX3u5SfRtrYBpZ2Hxcb9eZ
g37yJTF8armvf+M94E1nvYmvgc32svK4WGFYAJ63wvs13t24uG4sBs18vyZ7PG7oDTGGBSWwH4Ky
UHq7R1A5XcanlvasROGePYDOnjmfxLB9zZ025XQPtkFR66/aH4jKVEJYNZAFbLJb7Mo2vzPwsM4Z
5EGZ6Gil650x4Bvbv+nuZ63sKZWCKr1uq6Qqo9P5+8fcvy9CDFMAAS6UAwbsoH3YJNfLhg3XsAoy
6JRJkp04OMvj66sOen43KcnCqlX4iRHGjTvCTie7ipgJiEVKkrnz4NmCsavNa+RutDCTiIkRw9ds
vb8x4FH7349Z9peLHK9eg2gvyJFUBp0uNDTh8mWxvpEeOBfK338Xqy2xCd2O/Q1dk1WQQR3fPQ/x
Hfh5R9HV8KIskLYUaCQFxM6dYi2E3Pa8wlPAvXumXbR8PCJ/+uwEmQfaRCczrIvDKfv7xny66XSx
scl794p11dS9cKG0tb1B+7A5erQI7cwqyCB/ltG9hR887ocuSyFY7d/hg23L/nThRfqQ13o+q/bp
Pws5pj0vMsDInofp5aoS7U6LN2zXzLqOppT/xjjodJDav/++zP4uXFinNzJwoTx+XHgQYXPDBj0Z
VeDAZuVqRgBiTrZqUoKet8SEL3j+ZKh9vMgAdLrwcD2D4BXyGnKYO15kgJ611X2fwbH9jp878ig1
JcNQmzcGOh1+8fPPPGaG7CTJhdLdXYTAQjsnx2xhFWQEB6ibn5ZluP21cZleGEzZXDV26XQ6J6dH
vOgVngoogUiHDirhxxmaSEEfwG7v77CadzPYP047Rrgq5OQp2OzZkyc4LFduAasAcKGMihJSmJbp
Yk2bhlKkaxSzrk/OU/vHt2dZ4UdVlTY71TemxdMcUv/+el6Pr5DXoBcNzZ4XGaCh/soh6GNOJ/XG
18yHnK0Rm+++y93TmjUTvS4XSoCqstke2lRVVxsU5YN/cpLuK2e5P2zdAlYKUabc+2FB6r2zHFKa
F71C3kNeWh0YaFQdlBeREj9psMswWpBJkLZQvLiuvyb3tIkTheuPilCeO6fzO6RNWCGsggxyNh7V
S9g66MrpimGv/JPxj9vV0BljzneoxNcJgMYS51y8+JDOqBj9foW8w65dbvTYNUxMvNltq+/Q2gyZ
I7o5GGtoVFGzJs9r2Lq1DTZpabWzs1DbhFDS7mnTzmKTHD+3beOzrjIObLnLrql+EWtZTaRrHdb5
kBx9ilingPoQumyA+/pG8tJXyGNQLtFSpeYa0fYFEuJSfxvCbVYFp4w8l6g5xkmgpnHs2MOQHPY3
GBIiJpOEUJYvv5DtZl4R9GNLS13uEgVwA3RBTCgjQhP3b7orT+AaozFbh76Kjz824Sv0CrkCvAia
9TZ/iYGfd1TvrDFBBWH9mBz5z5ePnxGNNBpg9jdIc4yAEMpWrXi8YQuLWbjcXr34upmSJXWrdgxB
l2L+EH/Tkrbo7g0jWzC0b2/LzognJRv1r5BHkCPxyQ2VOTh7yK/Z6yrLNhoUsT6yy9fY65PzjYSE
xMkhMHiNTAihVIytr1x5hTZVz0EBW02ycfH1M8deuKs2DSrD1VXETng1WvkU0LkzX0gN8qLsAEKy
fLKLqsdWqzc3ul0NMewS3dzEyCOaRhoPyp/fiFDiEPSD9PQMeTxJVQUe01cl4IRMyzJ26xfejI1O
Nrw4Y6Az9uljwgVdFdO+P9/ijQ218q3r13iPsXXHx/b4siDenatvo9VYhvC6Hf55m/2181u1LLth
9viLZt+BDot/v9ym3Mba+dd9amkPU4+X6iM9/Z+JX59pVsq2bgGrYZ0OPfI1avmmpqT/+uXpJsVt
oY5/1f5AkH+ure2ip838FXOGxIRUXJX83onkAEWQAwlBKigbyUcf6cVnE0IJ0A+Ytwht3rihEiPF
0UGsqJc5uPX+Q9vuQe01XxYJ9etzx0owWz04Xiq5KREX/HqJ784ClAdFnU/qq6z1WT1TrOBmbFHa
LjXZtNtHWmqGoQfXot+VAw4PvKPIf4C4ZvZ1vluC84kAGk0jHtiaC1nkjx71pked3Xhrhrh7O8yw
N082WAZdowaPA8gyItMFLFum96b0hJLU3jFjdDFYyc1uyhSVRRHx0rISfMT/++yUy7nHZppgxib+
794VKc/OnDHXCxriK4dhkRnwQLRA++w8FXsZZ4/Tizb2WEp8IbPre6bNL0VwLOJdN7E4H58qOVMq
ePG43mwWbEdVwxGFSWppsrOFqlW5t3+hQjNyZQwOb2G3jafsFm3YKhUuzD0pFyy4KLvM+fjoqXZ6
QtmwIU9UBnHE5uuv8wmoUqXUA1e0q7B5zk9O970iszXdFPI4vlExG19P9XEf8gAtU2aemW3twOY8
9xm4fMrVzSvcaA3DwOa6lOUMNC3RpvzGnVYeH0uZOGSbsU8DXl6vsPXm5bdHS2GxoIrwSmrAW6Ga
w7s6QDeg8JydqgmBRq9N1Zb+eWXF1Kv0InWBrKRblhvd9QtvrZ55nWrO/VkZXjlbiIgQrrW5m0s9
IS71rxE8lBcvkkAn9fOLlmMYKUJL6AnlunUiURkesew/oioeOeig794OZ2OwzUurz7TKGQMePYrm
pcYheycd3eXDCr3dI6iQlYRLq6rjY3V+tRBEKqFornLwljtZvr1NSvCOacZYvTB/CiyYcIlVwyfH
dA955Q3p5ZT6fH+WN7TrFeEHHR7CLTxdDNisQjw0Vmi3+DYVspKcoUYNvtAANMxH8+R46BNtmBzx
xAkfOimextdf72N/Fywo/IMY9IRSDjweFZUor59ISBAO0jnG+aMP5f7ImJ1BJ2XBXrUh1npL3iH4
WsYNOLF29vVzR7g7vv0mL6rGSgCKVI3Wi5XIqyUp+t6MsRdYSeu3Nmp8hp2r8QW+vw/VzT4wUE8d
GqiTNrwMtgnKIV8aZk3b/vXdOVayds51VpIZKJ6fNToi6ZfPT6PV1Ij4ahIhIeIt9+iRa2sqTKJt
2/XspCz7R6lSPDRQo0ZKR3I9oQRYPXDpUp3uSWrl//73pI38nvVKlQ4CqtrWyonw2Xp1Dcz8kUsM
yIvU0O19PpLap4GwbKaOOs8Km2TFSdtpzdfEgKwEgL5BhRqdA8kffQkAJZVZ9JvuecIgZZsgq8BA
cQCpvF/jPWzzEykyVq6gTh2emwYMC3t6Q2+kULL0I3QNLi7KsBxKoSxdmi9rfOcdXTadmjV5In1z
pqE0sHyKStaqDhXVl5LFxYk4YGXLzteQA6DVW1zx+qbTIai2h7ffm/njxQObvWX3JQDtDatGjSKw
x1Z8J6zkO8mblZUwUKHGxVAn8EhydO2SFR+hS6adFB2pLpRjs+KEUzlpwHZLXJMS0nau85j148VT
+x884WIJb2/hZ16r1tMIqccgO0O6ugbduxdOm4axypRCOW+eXt4x2dEoZ4lBcZAJX6pPmPrfN6oy
yqEJnZyMhgcH6OUtn+wiWwZ18q8LkIJgwWph5dZS7DV3qetnJa3L8SN0qKS3Ap2qGXPxl5VReS0Y
jeE1LaXToVOSRfRbeQhCjqbHlBAyks46PKQFmWAji/UUQDW7wLsgF0EwPl7LbstdrF7tQueFIDVu
vJb9nT+/iJVKUAolQD9WjFaePq0SLVgbeAqft1EfJQF5JSMgzQE0NoQEKBJQKJiY5QNPi+7sN3ix
EiBY6pdZSbOS3KZB78lKGKhafJy6bp0QLwbI5MBJ33/MjXcIEyuh0SsfDzH+ULcg/y3I2kLD4Umi
LlGQ8QeigZkzHemRytkYVOF3LyrAL0ajZ8gWyJW4SBHdCCUNPn75pUqyeBWhzJ+fX3f9+rrAfJRq
lKXHMx/44jtW0fPDk7/4vo1MpIGZNo1Hwwa//NJo5XoF9YRyt7XnhqXCRP0mK+kVveNDW0VMhIhQ
ZezJpllCObC53sOiasxyN0R8rLpQUmZVmOSsZEhW29mwmHVoUDze+vhBPEUXIxNKGtUC6xW2OrjF
e8nvPGkSuHKGLvd1toDXQc8TNNbkEwa22IcTje59xDA/Rg5A5923z0Oec791S5n+AlARyj59ttFv
8MgmTjxBm2TemgTuuXlpvaSilm/YHZQW97g4mog6h3MVKsS/J9DY8JDcUvp58zoP7oqllexTJ6HE
282sokNIoLKlJKHsL4XIB6ia0ZZSmkrQbymzhDKrpUxMEDVBw6kdQ6Gk+TrZWGQl5oPSGoNbtqi4
IypAJ6pf2HqT/voWY6Do3QrIs4vQIMePF6N+bJmDAipC6eUlplXu34+Mjxdmx8GDou/TAFogtpif
+HG9XdAkaFkjqNEjE27cCKRTFyo0Iz1d5QZkz1PqavAtUX/N2jZ699vXioi6972Uy4LpQ+pZSz0W
teHUGYOcKkFuTYd14QH65UxHJ+0fUGXGKVlxRED25ZMtD0WZ/QrALqqmsOS0MXv2OXqS77671GSf
vGY2H5Aitq+42f26VlCXsOAEfEjTvj9v+GZhrbJT48PAq7Gw4F6R5cuLdTkyVIQSYL8BWYQMCwse
kUhe3WMMXq7hiq9/RLfD7EFTSfPXRVQ0AtQy/pcE8mcD27ZVCamKFogOy4syQfFS7mW67JM9NE+a
C5GDtLASKBVss0FR3tsyUDWNvoLqREp5rnvU4uG42pTjcVcY7t2JGNrpYOvyG9EkO5/2h1lNP2cV
6GPDEVgJgxQV21wz5eHDKHqGYGioaZeOH/qK0QCZo3odMabA0DiDYoWWbHevWeMih1hnAa4MoS6U
FHEKhGhPnnyGNrVH0Z1O+Cuma/8acQ5HwK6zDn5UeO+Oco7xpP39RhZ8IkRGcnIa+cCDLJmpjE+y
ZgVBXpQJkkJXF91IJ7kLjOwpop0smMDj8qBzZyVyoDNWAsRK8VTZvaiCOlwY9bxIpw/wb2Zsf61Q
YXL2LlbS7HXeZnf/QF8os1pQQx8cVaCDojYFXLhQa1JKxg2noA5Z0TFlQl/auMxV8aagrVEFSqPB
8N13B+nseJu9enF3NdDYF64ulHKX7eYWggaZNufOPc8rGWC3jRh5Zlwreb60zoySw6h4tRuWurLy
FVOv8iIJco4qUDGcvtdOTNXIRyVdk0XkoThbaIFYBaBHTd6MDf2I20M+npGsBGQlwA6rO6yknv7c
tAKkj66aLqwQavAo5nlqSnpwQLzHzTDZIbBdBf76YfSwEkpQjM+JlTDQN29Mu1WgXTvR1WiHlFeF
zYKbqu4jH1XZelvnMcmrrZklunvF0CEZ2lAb5M3WrVX6PQZ1oQRocUKZMrq5PnLOAFVfDAoVzmP7
NwuTAhYclUMUeGkmKHMjo2rvIE+I588/LSpKDNTJ0y00yIKviApZqjkIAZWQ0kN+yjutuKIpWyHU
P3apwTsm6CGsRBVfdeBmNfov9ojQErASkOLz0kJQdB2sRH44QVmRbeRcO1FZA5OB0gp6VSdXBeTn
li9fDueKoVYN76YeIWN076NREbqnRMrS1x31Ikk5ONylC4CFcOGCWB6o6g/JYFQoKegUGBeX4uQk
DnfyJPd7UOBUlv6Or/nqeb1Tyn33mayXgTcnz2SA+ChhOLO9ClSowJcQgeiP0BHwHdJrhiL40Cc6
IiSBmkC0l6yOTj6y2pjJIx2jI5LXL7rFNkH5aDT307vuLmiHzif9qZq3u1Z6GJyaauJ+0UIPyhxV
AfG58kr//ju8C8/SBdMnyD8uMiyJ4k9AAZA/eFYItim/KTggLiggrmVWRvUWRtxZZOzbJ5YSgLdu
mZs4UBXQguSk1jLRmtLf8dLEAQBThp0900HunypVuL8cqOEvZ1Qo0QjT7yGgKKEBy9KljTqVtXjD
FlaOPJXC0La8uB825IHmqm9DvfC7eHMhj41OxaI+BdsEa9RYThrJ4Z0+8nFknj0k0pQM6XhQsZcR
r5zXyMSmZWKYUyYsDHLRMAZSZBXcslK4nsjxQhTcukovHMCcn/QS5skMyUpeZgzy8hdw0iS9QLLG
4OsVaezNMtgudjXmugq2eEPPfg0IEKmRJ048ISuBv/yilXXEqFACsoKMS50wQSRsDAxUj5+WlJiq
6nRI112vsK7NwJ23y0ovx1i/iHWiZqpQICxMuLeA7767jJ7gqN5Kl3JQkRAcf8vjR0SFDoRfkMks
85GvaT+6gAciux6x2evrFa3CwGbCAZQ4vJuDQiCw2T2ryZc5c+wFRU0FvL3FzDLYvr2tdn0CPjwc
nG8YAdSGEd3UUzIe2aln4lSuLNrFTBOHL0UEtf3ltITy0SORDcrW9gZujDZZwF8zceaQ6Ltdr4RA
a2ykH1Tuw0qbTU4wMNy8KUYuwXr1VrOnjWuzljoR8O9pVw3fRFJS2jAps2f3mtvD9eMOM6ANJgci
sHGJ9a6XhVKvDT/vaLmbg71CLToBJRTihhEtkGE1AIVyglF0JrttPLUlzMcnQp6hrVBhEenQ2uhd
n49joIXmRUaAC/B2j2hpEExZdhaRF/L3778D10BXVbv2Su1b0BJK/JLiTBcuPAOb3btvZptgrJHx
KkN8KEXICArQuZ3TJjiw2R7zEy0CmzbdpGsAa9ZcQSo/DNuw4ITw4IQUzfU00HtCAxNiIk2saEtK
SAsLSoDOpyouGsBhoVCGBiXIUzuGwF5cBi7YpN9+cpLuSiJCEk0aN5cuPSLzFixRYo6Zxs3R3b7y
S8HD4TuMIyM9Y/NykZFjRHe9SOQdO4qlkpGRiQsWXKRNk5HVtYQSkH3RT53yhdlLm+YEzQfwidB1
o/eUZ8/AcQOOG0qGy7nHN52Dko0vQ5F9l8Dy5Rc+TYeX5xa7d4vYs2CJErPNTwAKoSd7cepoPrRs
En73xJSYrLbFxIhmsm5dtItiMKdgQV3rxusZgQmhBOjobAXaBx9wD0vQnPySF44L61XB2eOcDK8v
OEAM8fSstfPwjnuqDdWSJU50GWCpUnMUi4/+a5g/X/gcgkWLzsru2nk07Wg1Ghdfr53bSkaPmtx1
upXOJ1/86v33hZAEBMQsXixelrGhGxmmhZJy14Pnz/vJjWXlyqb9hihftoIbstKyyoD8NS2ljEDU
utxGN2mOhCC34ow7driZ+Ym/TMBDk20IsEyZeREROXEph3Jl/rrypEQRzZ5WRwGy70Tz5la4PBo2
KVZsljm6kGmhlFVUC4vZOChFRAd9fEwEo6Lrlnlqv0q6T2DSt3whnCFtFt4ylLcjR+7KSj04YsQB
M/X6lwOPH8dQECjGqlWXysOueQc5vzmZOGgU5MHI0ND4hQuFNrlx4y1WTRumhRIYP14MpO/de0e/
sVyi0TidOaR0h4FOeeuK+rIbbzexBFGVf6tNQrq6BtPiD8ZKlRb7+5uOvP2iA4/d1lZPtwYbNFjz
1L5JGl8bk5V4Crh9WySV79x5Y0ZGBrnnwgLTGDCXYZZQAnQmEI1lu3Z8ZRqI6+CVDOByLpBECsRt
RGQtIVUAnxrdJAjZXfzHlR61titC1Vxx5GthZSQmplJ2R+KSJc4vcVeekJBKAcmIY8eKWKF5DTlk
Q3QknwXFA6dl+2Bycio6Lto00+8RMFco1669SkefMcMRJbQJanydnatz5/N6haxocYIhvtafbvFy
5RN6yUlpg6RYA6CxEU2KlkREvwYtm+9+WYAXb2cn0iQwQodxcDD3lecWnE/5Nyxm0+rNDfTx//WX
8CYbO/ZwUpJYol2ihG5ZLatmEuYKZeZHIAbAUlLSRo4ULkkas1hsnUDbtzdpjMbJa2XAgc30ZmKA
GT+IdbTff2J0se/mzbfokojDhu03R7l+IRAQEK3QIEGYNTlIX5cryEj/xzOr+QBIv8cfaDssLYXt
cflyNhaqmyuUALRJOkfLljbp6SLkJqgxAA5dUB7rV4Vintdwsb28UlHjaDExyfJ4BCOMvvXrr5v/
pT6HSEpKHTSIJwuUOWHC8efkk6OQ+uChQ16enqG0aXKdtALZEEqAohqA3t5hR46IyF3Q6nilHAHX
PEWa2QMvn9FbxBMbLTxtTx9UN94Z8JLmzDlPF0YsV27B9u0v3phRfHzKmDGHZF0t63YWZjfp7Lq5
N75se4Bv5CpOnhQhWZjtS0sgwHv3sjeEnD2hlINWvv76HJy7alX5+3jSEHUTh4rgT7Xyrbt5Sc+E
Im/Tbu+bjl4ZHBxHcUJkvvXWgsWLnZ7OoMkTwts7vH//HXJ3xIjOcdasc9m1sv/3GfcaDnig7kzz
JKDpaNDfP0aeVOzSZVN224HsCSXw0UdiThNvVw5MwzQJXs88jOxxxEXfoB4/SHhY2i7SW3RHvuuN
LfQW0Gjg+PF7b74pVvER8aaha967p+Uf+ayQkZFx7pxf8+Y8RL6C+NKCgrIXNxXi+2mWZyfYMfdy
MjN06iREYvjwA/IcIwjzg9czG9kWSnSOpM+CsbFJI0cKs79GjeXm94+oyVa+ThxyJk3yH4Mpg8LO
1bj/NuHDytyxQ5FiQo4UZQi840WLnChZtIJ1667asOFmTIxwZc9r4AE+9os9f/TR9jV3rl8MlO/R
1zfyxx+PlCwpdCSZ7723/NKlbKdji4pIkheiMF46bWJ9s/mQY6kVLToLlkbDhmuoxNb2Bq+XHWRb
KAG8RTrr++/rpFBeLGFlZe46eXm1Uad39ZbAff3hQcN1EfWyFknWk9bZAM1L27pdC9X+FtBaQNGU
r1PBjz7auGOHW17HWh/R7XADKSID2Lvurgf3I6dPPyuH51MQ4piD8CSA371oefSXCEUoPTueWcaA
N1iwoFB2L13y37zZlTbLl1+YMyMsJ0IJvPWWUGOtra/JnpcgGnBeTxNyVIlfvzzNS40AUkWVW72p
FyKbraVa/Ptlcx7B5s233n5bOaois3791dOmnYXxyDKv5S4o1CVY12Ld+6+twR+VX1MOFzDmzz+9
U6eN7u4m4s4Zg5O0kAOEdMouWiumqGcUzhbQz9DV9uu3Q15NC+b4C8+hUMbF6ekNuJo//zxFmzDS
zZlQkuPvWM0TcadUYbeEr3gE5XkttNNUPtAgUKcx3LjxuH17W0MbQkE0UaNGHdq27XZAQExSUlpa
WjZytRLwk9TUdIj49euPm5cT7ibsFNVfW1XzNR7tiYh+EP14dhV0As64QXpcYPPSdokJqbqowVKh
YbizbGHrVtEospCTFSsuppJff9VaUqyNHAolIA+7sIEoeVz3s89UAtwrkJIs3Ey+6aTnImoIqglG
Sav9o8KTqHyUlH/cHOCaV6688sYbRvt0Q1pYzGrd2mb0aAe0pvjt9u23oVQ5Oj64cOHh+fN+Z88+
OHToLtSbxYudJ048OXjwnlq1eNY3xpKvzaOrZSX5XpueT6rQvv36a9cCcGH8EnMERZi7ru9tZ6Y6
Dis3libDOWlANnDBBw8if/9dhPeBjJo5za2KnAsl7rBMGR7MEkRLqWg+0VHyqkYgP6N6haw03sQv
X5yiRwnKNd2uidjMVvNyolYD0dGJ8+Zd0NDqcov5X5te9rVFhV+bKQsi2LnzxsOHvZOSUp9MGnVW
VJ8GPMgH49j+x+UQbXL0Q/ChGQuPDIEmvFgxMQaERlEeKwSjNYPDm0TOhRJITEyVL8XLK2znTj3n
5/v3TTi2yQHHdll78FJ93LoUTHXApX/qBcnYJUVA8Lj5pKk3oIfs3+81aNAOeew3jwiFbMKE466u
wbk4aBoXLSKlg6tmXFN86tj86F0RCs+yjEr8HJOQHb0rVlyERlGeVYGNwevlFE8klACugK6mcOGZ
aWnp6LippFChGdrDVMlJogcHr5xVDlW4X9f7stGyKgaAvs+KtQdmK+aTSQQHx128+HDKlDMdO26Q
V53njPnz6yLnDhiwc+1alzt3QuJNLd3MMX4adJI9jRP77qu2uwpPg+N7smfXy2FYwJiYpAYNeFIR
EPKq0eOZiScVSqB6ddHrVa68GD1IlSpC4a1Wban23IPNfL1ViLN+vBgcoIvaGBGSuHiSiMjIeFh/
EScg5xTKVuaU7ALtmb9/9I0bgQcOeC5YcAGN3Ndf7+vZc0ubNutbtrRp0cLK0tK6VSubDh3sYIeO
GnXwr79OQ+k8e/a+h0doaKjujviBchuKx4vNBkVttDsNeY0sFCd5kFgbBw540ZsFb98O/u03oUoW
LDg9x8aZjFwQSkhhsWJihfiwYfvx/uR5J7w27VfyeZv99IwYVePYDu+qYgzJ43A9au2IUFsyC+Sd
TGQX8bEpUEjm/3oJdob252oSYUEJA5ru/WuEzpNQRnysicEsdGjyEzYzK8/ly4/onYJLljjLU96g
k1O2x/ZVkQtCCShWv+/d6yHnDgPRbWmLRa+6IniaKrvX3KE6DKmoBp7Yp9If/dD32JyfnM0ZyMxr
WM29QZeqGv3QTGxaLiJ5mBNXSAGreXodlBynXRUwD+SZvO7dNwcFxZJXOThnjtHIZ9lF7gglsH69
nms+hFKe+AF//PGIhlhCZOXcXgqO6mV0rEdRk3H8wBMpSbwfwZEpxvNHVbdkK41/XuCRrwg5RL7M
OUBzSW/Za5cTD9+G0gL8fo33aLQaUD9k+atUaXFCQoo8cwulJRf7olwTSuDjj0VcajAyMmHqVOGK
DM6fbyLeiNMJ//bvbKIlEHUKWHWsusX5pFH/ULR89FihSNHfYJOStoH+cbJEMtbOl7eqpzmgi9m5
ToQVzi5O2t+n42QOqPFy8+EpRaID73uphxZLTEyV1bMSJWYnJaXJs2LFi896Qj1EgdwUSkAeGoDa
m5CQOnz4fioBly+/bPKTQoXAh7FBj2JN1rx2UawBengvelQvZcQ6OW0jCImkkbnMSCy59nFnC7Xy
ratX0OrrjgdP7M3JjDaBYlWC5oQ6MkTX9/jCbbBuQZWh4qSkVHldXqFCM2JjU2rWFDMC6NPjzIuU
aT5yWShTUtJkd9RMt5EMOdgLOGnSSV77iTH3f8JfPS5GF4bl9AHl+kmZIQHc6cs3MzhqizK2153U
IxznKVKS0zW0W1hCPp4RTif999l5LZ/s8scwkVRPgdlS/N/mpXMy4hgfK1ynQfuNemoAVFV5kBxE
79e+vZ1ccvWqylK+J0QuCyWgiI1WtepSvABLS2u5cORIvdCaOcbgliJJD73mmKhk6I5UzohmIOSx
WMjSLSsrHvjMrR/0m5OGO7Ysu6FRMRvDsLkUYtMQ+AjlmsZGHrTxv8/4uCY4OSszJAA9Uo69CN65
E0JZPhmPHBFxcXMRuS+UgMIYr1t3Fb65pk313A4+/TQXUg5SVGZQ7nqGfKi3NrJBEeuIEL0XRgFU
21cUmcXMieqU6/hxgF4SHVVqqBlyjF0Nc1ADaanp7EvYusqdzhMQECMP6oGXLj0aM+aQXLJiBTQx
Xj93kSdCCcjZnMFatf5OTc3o0kUktwM7drR7QgWZ2pUOkmx910NPs2xcXJk3Tp63pA4LzxcH6Vxt
64VjuTPYZhI448dZ0fe0qfGU0DrKNbMVv46wZaXbJWml3rVrARSPivHq1YAhQ/TayD/+yDUdzBB5
JZTAtm0iXThYpcoSWG19+26XC9G5ywHMswvS9CGI2ESL8m1W3hrGVm9tpGDjhD5ZeUlAmrQ8sU8Y
s52rbXsKfbqcGY2x9Vsbe9XZ+UWb/b8NOWP5hli9qT1cIK/zXDpJmT0ju7C11VtUDgvBwyN0wAC9
hZSDB+/WaLyfHHkolMCyZZfkmylffmFiol7UBBAfpbF8KtpAq0AvY9NyXbiskT314vmic09SC39A
fTe6dVaCty5bsnUL6i23yCPIwT/GDTjOslgQBkuzXNrhNuVY63UKWj1J5zNmjIP8aiCRPj4RcvJW
sF+/7XkpkDrkrVACing3sMdhCU2YcFwuBLdscc3uxxfkL4KHB/jFjtDPYNC5+jbVkHZeruFU5/xR
nh9XkR0R7SsrB/o12nP2kF/ujsMBzqcC6HRff6hi9v0opSjQdjTBc2uclVUclLONm4/k5LTmzUXs
ALBkyTnh4QmtW+sFh/n8c60x9txCngslsGePiGIA5ss3zdMzdOdON3naChw16mC2pstuOgfRm/jm
I71eW9f/GgmyiP6RqjENLC5Gz90LlHPgsZIWpe0U+S6eEP2bCRVC1WqePkasgg8LNjELtW21O1Vu
WMwmu2Lz6FGUYvVS1apLgoPjKPUsI14Q/0Ee42kIJaCwe8DNm2/hthWDDng0ISHmrh9VTWwP9mlo
1OkdXzlVa1dBlxQC70+ebWOcMpJP4x7bIxRNb7fcDMoqZwpU1V9XS+mSfDxNuKUCVBmkZDwMPh6R
q4xkvcUDsbJShvns1Wurj0+4PK8IonPjv8l7PCWhBNzdRZA4RiiXGRkZcnZVRjs7E+t1GOQ2jziw
2V6N/sXjhvDO3GvriRKH7SI9I/HcYZ7opGPWol4wd3twUijrF1HPYma/UWRSu37RtM7982Ax3Njl
PRGs4c/hPOSn4VlwR5QMnjh79rndu/V6NnDevAvZbX2fBE9PKIGAgBjFWEO9eqvwaBSBaEHoNya7
csMWbkR3B22rWa/vzrS7aVCpdn7dJCT7OyYzth0ujG2Cn9Tflbtvhc5lbCbmytnHdPbTB0Q2IGOA
MUT1wbjYFLerIY2Li0d09Zze1Mv1648LF9brpkB0aGPHilikjEeP3tP4zvMCT1UoAVjf77+vtxTG
wmL21asB+DoVKqaFxSztODC+npGUHQwcN+iEyWdHldE+YfPbrsLX1euW8E5IyhxFunD0EZUoAhs9
IXCddOQ25fRSSxFkm3q3jfpCEQUGSOl5oFXT34wU6yYtLf2rr/bKjxp8770V9+9H4F+5sECBac8k
kvzTFkoAjdknnyibxnHjjgYFxb33nnLplqWltUb4bjQPbGByyijTCQ3uSH33mYMPAh+JsJ8DmurS
ptAma27lwBImo8ZlF3RkfFe8SB9ypIYlf5g1+igPRyi4fuFNli7t1Ckf2WmG8ddfT+zf7yk7LYDV
qi3LuzUb2ngGQskgx0BirFFjOfp3OcclcckSJw2RMxZBXYF+jUTWPfTdcgomdHaJ0iJ0Vp825eki
Yxg9enTHTHh66lRVk5CXuhr7nKjCT5+aNX2SEJ9qmKMOigeb9Me3LceBYoSAOjs/GjRol6K8W7fN
uT4KZj6emVACTk4PFXFz8uefDqscj0levMtYvfoyjTjWJoEXT3IAu/vQNmHf2CzQLQUOCRTLqbB5
dJfI93jbSJB2Gb/++utrmbh3T7mKSBV61reR0Suq0K+J6QXajg5+CiUbp9i6WjedjXtfvdpFTpvO
2LGj3fXrgW+9pTQ0ly59xpG5n6VQAikpaW3aKAP2NWiw+uHDqO+/15v+Z+zbd3toaE6i1t6Vxsy3
rXEn45fsjN3WnqwEvTY2ZZ1Mo81ITORDjKdOnWJCGRvLh2PS07WmYTpUEq4kSUbSWFEFRcpvBWKi
kod3VTqS9m+yh4Uiv3DBz1DsSpeeu3evx6hReusSwbffXvjggenhp7zGMxZKhlWrrhhGUJk06ZS3
d7gcH5b4228nYmOz59Ej292yL7qPJ1fkaYpy/KAT0CCpQq/aO1kFVbRr127cuHEQTR8fHyaUkMXQ
0NA+ffr8/fffvJIafpCuwdiwPFUAeZEBLp4Q1hhjg6I2e9frVAgfn3A5wDNx6FD7kyd9ixYVzuSM
n366y/y0TnmK50IogaioJMO4UwULTnNxCYD2KYf2Ii5ceDHR7IXeijfH+Hnb/Xy3Lim0HSvcvMIN
tjbVuWywFJ2APq5gwYIQxHz58h0+fJgJJWSR/fHBBx9odIJ3bgqrq0kJ9SyzVAHkRQbwdtfL8zK4
pX1yUlpwcFyXLhsVjwvEE/bwCP3wQz0vXRAmjvmpG54CnhehZJgw4bhiYAjs2HFDWJiKks44deqZ
ZFMRJjxu6C1GIcr9Mo0uOZ30JwFV1FEgLi6OyZ8xaMfTkV1ATuz1NZRLefUwL1JD/czYgjBxTu+/
7+sb2bKlnj81IxTKefMurlhxWVEOtmxpk4O4pnmK50sogYSEFEVQKBCSOnbs4fv3I+Vo1kQ88W++
sdcYv1Cs1GHcv0XPa5rWQctDRW0zpyKNwcPDo0uXLm+88QaXQQlFihTp2rVrcrKWjjF55Dk6EThu
4HG3q6G+npEeN8MuHn+0b4NXvULCGOK/UcOFYw+HdDzo7Owvp/qSOXjw7iNHvA2HygsWnO7o+ODZ
2jSqeO6EEsBj2rv3jmLuB8RjRZd95sx9w5lJxs6dN6rGpv+slQiuzNj8dWWPSbsObLlLf98wY34P
x4mKisqfPz8TxypVqkRHR5vzpmF01y3IT2SSxo6XkfHPoUN3DfOYMKJ7OXHCp1IlEbCEOGTIvlyJ
ZpEXeB6FkiEhIbVfPz2PYMZSpebY2d3ctcvdWOzTihUXW1tfT9Q3af18oj9vLTwUI0KVnsW0q1M1
Ef/JnMW4sGzKlSsHcSxQoACTy+HDh5vZ/Mhz8do0jKzi6xuB/sHCQj1sdtu26x0c7spRfoiVKy+B
BcmP8lzi+RVKBk/PsPr1RQxtIkRz3rwLeO6GWXMYYc5377755k09w/a+V9QXbQ/8/s0Zvp0FeZqb
2NWMHBRAkyZNmCwuWbKkZMmS7G/YPXy3KVy/EGQ4iW9IcqlMSkrbscNNXuSqYN++27dvv92woYo4
Fi8+e+PGW9ruAc8DnnehZDh+HH2QisKELv5//zt65Mhdxao0mWXKzB8+fL+ra5CGyeLrpVtxq+CV
s6YXj7q7uzMpBBISEvbu3cv+LlOmjJmNJZCWlgEN8vtPjn394cEhHQ78NuT031Ov2m+6e+l0gJdr
eMjj+NSU9KiopH37PGA4GxqCjLCgR406uHmzq2L+mrFgwRk//3zsue2vFXgxhBLAO8ZXbixsJDoy
6PIDB+40HH4jFi0686uv9l69GmBoEsnzN0QNIZZx8uRJdNxt27bF37hI/F2tWjVtE8dM4GghIfGb
N98ynF+QWaHCoj/+OLVu3TXVhwMr8Isv9pgZhf45wQsjlAx4T0uXXkLjp3j0jOjUtm93W7LEuXJl
FdVeZuPGa2fOdPT0DGUCunyy0l/4o6p62Sq04eXlRRM5U6ZM0Z7LMYnw8IRjx+6NGHFANQMQEWZf
ly6bbG1vQOYUuxjRjfTrtyNnE2DPFi+YUBLQTxnOnhHxRi9ceDB48O4SJdTtAJmwBn78/kiLt21r
vraWhFJjzDx3kZGREReX7OMTgRZx5MiDxpLoENF9w9b+88/Ta9a4GPr7MBYpMvPbb/c/YZz9Z4gX
VSgZzp69rzoPyVio0HQ0h+jW+/ffqVh3YYwVX1sO0QTX21w/d84vICAarzY1VSvKiplAGw99AFpd
fHwqrLfDh72XLnU2NiNgSPTC77yzGHrhtm23mzQxqkCj+Zww4TjOxc/6YuLFFkoAL8DPL0pOiq/K
//3vmJPTw88/360I/KDKCq+pCHqVKks6dLDDESZMOAEVAsIBwTp/3s/Z+dHly/4uLgFXrgRcuuTv
5PTozJn79vaednY3Zs8+P2aMQ58+25s3t7KwMKrsarNatWX4tNCOliunPgTGWKbMvFWrrrzo4sjw
wgslITExddEip7JllT5vMosVm9WqlbW19XWwZ88txrq/Z8733luGrhz64pAhe0uVmmvM4mbs3Xvr
48emI9S9QHh5hJJw9254164btV8kiJfdsqU1+tDFi52HDbNv2HBNjhuzJ2f58gvat18/atTB1auv
DBy46+23F5m8/ho1lsOqS0rKeSzg5xYvoVAyQBeEUtily0ZztElIQIUKiyCjP/zgsGLF5fHjj/To
saVRozUVKy4uUkTFQelJiOYZ8mRpaf3JJ9t+++0E9IrOnTeixEytt1atlcuXX0LTyO/zZcRLK5QE
2CgXLz4cMGBn6dJaPbsh0ZR+8MHf7dvbDhiwY/ToQ7/8cuz330/++OORr7/e16/fjk6dNrZosa5u
3VWGrFNnJWSuS5dNAwZs/+Yb+/Hjj/7009ERIw707bsdR6tff3W5cgtMNoQyYeU0aLDa1vZmXucz
fU7w8gulDJi9aAjRIipiPzyHLFRoBppPCPTZsw9g/vMb+G/gvyWUMnx8IpYsce7Y0Q4KnJldZ54y
f37djChaWTSrEMQnyW34ouO/K5QKQEatrK4NHWr/wQcr0NHDTs9WD5tdFi48s2TJOeXLL+zde9us
WeecnB7+l6VQgVdCaRT//PPP3bthO3e6TZp0+tNPd3fsuKFRo7XVqi1F11+8+GxILdpXyFbhwjPQ
1TLib5SgHHtRB2JXqdLievVWt227/uOPt6EJtLG57uISYNJV/j+OV0L5Cs8Z/v33//agCNPbovVN
AAAAAElFTkSuQmCCUEsDBBQABgAIAAAAIQDTka0uFAEAAIoBAAAPAAAAZHJzL2Rvd25yZXYueG1s
bJBNTsMwEIX3SNzBGiR21G6aJlGIU1UIUFeV2nIAkzg/amxHttsETs8UiiIkdp438z2/mWw1qo6c
pXWt0RzmMwZE6sKUra45vB1eHhIgzgtdis5oyeFDOljltzeZSEsz6J08731N0ES7VHBovO9TSl3R
SCXczPRSY68yVgmPpa1pacWA5qqjAWMRVaLV+EMjevnUyOK4PykOx619DsO2YZv+IF579R6fWB1z
fn83rh+BeDn6afhKb0oOYQyXXXAPyDHg2K110RhLqp107Sem/9EraxSxZkBgDqQwHT7gImyrykmP
Y8sgZHgJbP1KUbJMGNCLrTdXOPoXXi4W4V82YXEcfMN0CpVnWEwnzL8AAAD//wMAUEsDBBQABgAI
AAAAIQCqJg6+vAAAACEBAAAdAAAAZHJzL19yZWxzL3BpY3R1cmV4bWwueG1sLnJlbHOEj0FqwzAQ
RfeF3EHMPpadRSjFsjeh4G1IDjBIY1nEGglJLfXtI8gmgUCX8z//PaYf//wqfillF1hB17QgiHUw
jq2C6+V7/wkiF2SDa2BSsFGGcdh99GdasdRRXlzMolI4K1hKiV9SZr2Qx9yESFybOSSPpZ7Jyoj6
hpbkoW2PMj0zYHhhiskoSJPpQFy2WM3/s8M8O02noH88cXmjkM5XdwVislQUeDIOH2HXRLYgh16+
PDbcAQAA//8DAFBLAQItABQABgAIAAAAIQBamK3CDAEAABgCAAATAAAAAAAAAAAAAAAAAAAAAABb
Q29udGVudF9UeXBlc10ueG1sUEsBAi0AFAAGAAgAAAAhAAjDGKTUAAAAkwEAAAsAAAAAAAAAAAAA
AAAAPQEAAF9yZWxzLy5yZWxzUEsBAi0AFAAGAAgAAAAhANT9YDsuAgAA9gUAABIAAAAAAAAAAAAA
AAAAOgIAAGRycy9waWN0dXJleG1sLnhtbFBLAQItAAoAAAAAAAAAIQBbS8g3kWAAAJFgAAAUAAAA
AAAAAAAAAAAAAJgEAABkcnMvbWVkaWEvaW1hZ2UxLnBuZ1BLAQItABQABgAIAAAAIQDTka0uFAEA
AIoBAAAPAAAAAAAAAAAAAAAAAFtlAABkcnMvZG93bnJldi54bWxQSwECLQAUAAYACAAAACEAqiYO
vrwAAAAhAQAAHQAAAAAAAAAAAAAAAACcZgAAZHJzL19yZWxzL3BpY3R1cmV4bWwueG1sLnJlbHNQ
SwUGAAAAAAYABgCEAQAAk2cAAAAA
">
   <v:imagedata src="ats/514888005-R0,%203&amp;4%20Basket%20Outer%20SCIR_4957_image003.png"
    o:title=""/>
   <x:ClientData ObjectType="Pict">
    <x:SizeWithCells/>
    <x:CF>Bitmap</x:CF>
    <x:AutoPict/>
   </x:ClientData>
  </v:shape><![endif]--><![if !vml]><span style='mso-ignore:vglayout;
  position:absolute;z-index:3;margin-left:236px;margin-top:15px;width:78px;
  height:74px'><img width=78 height=74
  src="ats/514888005-R0,%203&amp;4%20Basket%20Outer%20SCIR_4957_image004.png"
  v:shapes="Picture_x0020_46"></span><![endif]><span style='mso-ignore:vglayout2'>
  <table cellpadding=0 cellspacing=0>
   <tr>
    <td colspan=5 height=17 class=xl744957 width=387 style='height:13.05pt;
    width:291pt'>For MAGNETO DYNAMICS
    PVT. LTD.,</td>
   </tr>
  </table>
  </span></td>
  <td class=xl744957></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
 </tr>
 <tr height=17 style='mso-height-source:userset;height:13.05pt'>
  <td height=17 class=xl694957 style='height:13.05pt'></td>
  <td align=left valign=top><!--[if gte vml 1]><v:shape id="graphics2" o:spid="_x0000_s1026"
   type="#_x0000_t75" style='position:absolute;margin-left:0;margin-top:3pt;
   width:69.6pt;height:29.4pt;z-index:2;visibility:visible' o:gfxdata="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
AAYABgCEAQAAnxkAAAAA
">
   <v:imagedata src="ats/514888005-R0,%203&amp;4%20Basket%20Outer%20SCIR_4957_image005.png"
    o:title=""/>
   <o:lock v:ext="edit" aspectratio="f"/>
   <x:ClientData ObjectType="Pict">
    <x:SizeWithCells/>
    <x:CF>Bitmap</x:CF>
    <x:AutoPict/>
   </x:ClientData>
  </v:shape><![endif]--><![if !vml]><span style='mso-ignore:vglayout;
  position:absolute;z-index:2;margin-left:0px;margin-top:5px;width:93px;
  height:39px'><img width=93 height=39
  src="ats/514888005-R0,%203&amp;4%20Basket%20Outer%20SCIR_4957_image006.png"
  v:shapes="graphics2"></span><![endif]><span style='mso-ignore:vglayout2'>
  <table cellpadding=0 cellspacing=0>
   <tr>
    <td height=17 class=xl694957 width=57 style='height:13.05pt;width:43pt'></td>
   </tr>
  </table>
  </span></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
 </tr>
 <tr height=17 style='mso-height-source:userset;height:13.05pt'>
  <td height=17 class=xl694957 style='height:13.05pt'></td>
  <td class=xl694957></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
 </tr>
 <tr height=17 style='mso-height-source:userset;height:13.05pt'>
  <td height=17 class=xl694957 style='height:13.05pt'></td>
  <td class=xl694957></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
 </tr>
 <tr height=17 style='mso-height-source:userset;height:13.05pt'>
  <td colspan=4 height=17 class=xl744957 style='height:13.05pt'>[ R. SURESH
  KUMAR ] - Director</td>
  <td class=xl154957></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
  <td class=xl154957></td>
 </tr>
 <tr height=22 style='height:16.2pt'>
  <td height=22 class=xl704957 style='height:16.2pt'>&nbsp;</td>
  <td class=xl704957>&nbsp;</td>
  <td class=xl714957>&nbsp;</td>
  <td class=xl714957>&nbsp;</td>
  <td class=xl714957>&nbsp;</td>
  <td class=xl714957>&nbsp;</td>
  <td class=xl714957>&nbsp;</td>
  <td class=xl714957>&nbsp;</td>
 </tr>
 <tr height=19 style='height:14.4pt'>
  <td colspan=8 height=19 class=xl1224957 style='height:14.4pt'>Regd. Office :
  Plot No. 7,8 &amp; 9, Venkateswara Nagar Main Road, Perungudi, Chennai 600
  096 , India.</td>
 </tr>
 <tr height=19 style='height:14.4pt'>
  <td colspan=8 height=19 class=xl1214957 style='height:14.4pt'>GSTN:
  33AAACM4623Q1ZB. Email : rsk@magdyn.com Phone No. +91-9962096002</td>
 </tr>
 <![if supportMisalignedColumns]>
 <tr height=0 style='display:none'>
  <td width=32 style='width:24pt'></td>
  <td width=57 style='width:43pt'></td>
  <td width=56 style='width:42pt'></td>
  <td width=84 style='width:63pt'></td>
  <td width=158 style='width:119pt'></td>
  <td width=90 style='width:67pt'></td>
  <td width=75 style='width:56pt'></td>
  <td width=74 style='width:55pt'></td>
 </tr>
 <![endif]>
</table>

</div>


<!----------------------------->
<!--END OF OUTPUT FROM EXCEL PUBLISH AS WEB PAGE WIZARD-->
<!----------------------------->
</body>

</html>
