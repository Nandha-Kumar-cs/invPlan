<?php
include 'config.php';
$pono=$_POST['po_id'];
$type=$_GET['type'];
$arr= array();
$data        = array();
	
	$result= mysqli_query($con, "SELECT `id`, `pono`, `podate`, `porxdate`, `customer`, `customerloc`, `buyername`, `lineno`, `product_sku`,`product_name`, 
		`quantity`, `unitprice`, `currency`, `po_rx_date`, `locationcode`, `creationdate`, `Oldline`, `amndline`, `comment`, `mode`, `magdyn_commited_date`
		 FROM `ip_po` as po join `ip_products` prod on prod.product_id=po.partid WHERE `pono`='$pono'");
		while($row = mysqli_fetch_array($result))
		{
			$dat['poid']=$row['id'];
			$dat['pono']=$row['pono'];
			$dat['podate']=date("d-M-Y",strtotime($row['podate']));
			$dat['porxdate']=date("d-M-Y",strtotime($row['porxdate']));
			$dat['customer']=$row['customer'];
			$dat['customerloc']=$row['customerloc'];
			$dat['buyername']=$row['buyername'];
			$dat['lineno']=$row['lineno'];
			$dat['product_sku']=$row['product_sku']."-".$row['product_name'];
			$dat['quantity']=$row['quantity'];
			$dat['unitprice']=$row['unitprice'];
			$dat['currency']=$row['currency'];
			$dat['po_rx_date']=date("d-M-Y",strtotime($row['po_rx_date']));
			$dat['locationcode']=$row['locationcode'];
			$dat['magdyn_commited_date']=date("d-M-Y",strtotime($row['magdyn_commited_date']));
			$dat['comment']=$row['comment'];
			$dat['mode']=$row['mode'];
			$history1="";
			$result2= mysqli_query($con, "SELECT `id`, `pono`,`po_id`, `ackno`,`podate`, `porxdate`, `customer`, `customerloc`, `buyername`, 
			`lineno`, `product_sku`,`product_name`, 
			`quantity`, `unitprice`, `currency`, `po_rx_date`, `locationcode`, `creationdate`, `Oldline`, `amndline`, 
			`comment`, `mode`, `magdyn_commited_date`,`transaction_date`
			 FROM `ip_po_amnd` as po join `ip_products` prod on prod.product_id=po.partid WHERE `po_id`='$row[id]' order by `id` desc");
			 
			 
				while($row2 = mysqli_fetch_array($result2))
				{
					//echo "hi".$row2['po_id'];
					$history2="";
					$history2.= '<div class="panel panel-default">';
				//  <div class="panel-body">Panel Content</div>
				//</div>';

					$history2.=   '<div class="panel-heading"><label  style="margin-left:-1vw;">Line No : '.$row2["lineno"].'</label>&nbsp;&nbsp;<img style="width:1vw;height:3vh;" src="../../Custom/images/calendar.svg">'.date("d-M-Y h:i",strtotime($row2["transaction_date"])).'</img></div>';
					
					
					
					$result4= mysqli_query($con, "SELECT `id`, `pono`, `ackno`,`podate`, `porxdate`, `customer`, `customerloc`, `buyername`, 
					`lineno`, `product_sku`,`product_name`, 
					`quantity`, `unitprice`, `currency`, `po_rx_date`, `locationcode`, `creationdate`, `Oldline`, `amndline`, 
					`comment`, `mode`, `magdyn_commited_date`
					 FROM `ip_po_amnd` as po join `ip_products` prod on prod.product_id=po.partid WHERE `id`>'$row2[id]' and `po_id`='$row[id]' order by `id` asc");
					$row4 = mysqli_fetch_array($result4);
					
					
					
					$result3= mysqli_query($con, "SELECT `id`, `pono`, `ackno`,`podate`, `porxdate`, `customer`, `customerloc`, `buyername`, 
					`lineno`, `product_sku`,`product_name`, 
					`quantity`, `unitprice`, `currency`, `po_rx_date`, `locationcode`, `creationdate`, `Oldline`, `amndline`, 
					`comment`, `mode`, `magdyn_commited_date`,`transaction_date`
					 FROM `ip_po_amnd` as po join `ip_products` prod on prod.product_id=po.partid WHERE `id`='$row2[id]'");
					 
					$row3 = mysqli_fetch_array($result3);
					$history="";
					
					if($row4['pono']=="")
					{
						
						
						$result4= mysqli_query($con, "SELECT `id`, `pono`, `ackno`,`podate`, `porxdate`, `customer`, `customerloc`, `buyername`, 
					`lineno`, `product_sku`,`product_name`, 
					`quantity`, `unitprice`, `currency`, `po_rx_date`, `locationcode`, `creationdate`, 
					`comment`, `mode`, `magdyn_commited_date`
					 FROM `ip_po` as po join `ip_products` prod on prod.product_id=po.partid WHERE `id`='$row[id]'");
					$row4 = mysqli_fetch_array($result4);
					
					}
					
					if($row3['podate']!=$row4['podate']) 
						$history.= '  <div class="panel-body">Podate - '.$row3["podate"].'-->'.$row4["podate"].'  </div>';	
					if($row3['customer']!=$row4['customer']) 
						$history.= '  <div class="panel-body">Customer - '.$row3["customer"].'-->'.$row4["customer"].'  </div>';

					
					if($row3['customerloc']!=$row4['customerloc']) 
						$history.= '  <div class="panel-body">Customer Loc - '.$row3["customerloc"].'-->'.$row4["customerloc"].'  </div>';
					
					if($row3['buyername']!=$row4['buyername']) 
						$history.= '  <div class="panel-body">Buyername - '.$row3["buyername"].'-->'.$row4["buyername"].'  </div>';
					
					if($row3['lineno']!=$row4['lineno']) 
						$history.= '  <div class="panel-body">Line No - '.$row3["lineno"].'-->'.$row4["lineno"].'  </div>';
					
					if($row3['product_sku']!=$row4['product_sku']) 
						$history.= '  <div class="panel-body">Partno - '.$row3["product_sku"].'-->'.$row4["product_sku"].'  </div>';
					
					if($row3['product_name']!=$row4['product_name']) 
						$history.= '  <div class="panel-body">Product Name - '.$row3["product_name"].'-->'.$row4["product_name"].'  </div>';
										
					if($row3['quantity']!=$row4['quantity']) 
						$history.= '  <div class="panel-body">Quantity - '.$row3["quantity"].'-->'.$row4["quantity"].'  </div>';
					
					if($row3['unitprice']!=$row4['unitprice']) 
						$history.= '  <div class="panel-body">Unit Price - '.$row3["unitprice"].'-->'.$row4["unitprice"].'  </div>';
					
					if($row3['currency']!=$row4['currency']) 
						$history.= '  <div class="panel-body">Currency - '.$row3["currency"].'-->'.$row4["currency"].'  </div>';
					
					if($row3['po_rx_date']!=$row4['po_rx_date']) 
						$history.= '  <div class="panel-body">Magdyn Comm Date - '.$row3["po_rx_date"].'-->'.$row4["po_rx_date"].'  </div>';
					
					if($row3['locationcode']!=$row4['locationcode']) 
						$history.= '  <div class="panel-body">Location Code - '.$row3["locationcode"].'-->'.$row4["locationcode"].'  </div>';
					
					if($row3['mode']!=$row4['mode']) 
						$history.= '  <div class="panel-body">Mode - '.$row3["mode"].'-->'.$row4["mode"].'  </div>';
					
					if($history=="")$history2="";
					else
					{
						$history2.=$history;
					//$history2.= '<span class="float-left">'.$row2["product_sku"].'<font color="red">'.$row2["product_sku"].' -</font> '.$row2["product_name"].'</span>';
					//$history2.= '<br></a>';
						//$history2.= '</div>';
						$history2.= '</div>';
						 $history1.=$history2;
						
					}
				}
				
			$dat['history']=$history1;
			array_push($arr, $dat);			
		}    
		echo json_encode($arr);
mysqli_close($con);


?>