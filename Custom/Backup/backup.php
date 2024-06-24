<?


require_once 'PHPMailerAutoload.php';
include 'config.php';
EXPORT_TABLES(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_NAME,false,false);


function EXPORT_TABLES($host,$user,$pass,$name,       $tables=false, $backup_name=false){
    global $Send_email; 
    set_time_limit(3000); $mysqli = new mysqli($host,$user,$pass,$name); $mysqli->select_db($name); $mysqli->query("SET NAMES 'utf8'");
    $queryTables = $mysqli->query('SHOW TABLES'); while($row = $queryTables->fetch_row()) { $target_tables[] = $row[0]; }   if($tables !== false) { $target_tables = array_intersect( $target_tables, $tables); } 
    $content = "SET SQL_MODE = \"NO_AUTO_VALUE_ON_ZERO\";\r\nSET time_zone = \"+00:00\";\r\n\r\n\r\n/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;\r\n/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;\r\n/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;\r\n/*!40101 SET NAMES utf8 */;\r\n--\r\n-- Database: `".$name."`\r\n--\r\n\r\n\r\n";
    foreach($target_tables as $table){
        if (empty($table)){ continue; } 
        $result = $mysqli->query('SELECT * FROM `'.$table.'`');     $fields_amount=$result->field_count;  $rows_num=$mysqli->affected_rows;     $res = $mysqli->query('SHOW CREATE TABLE '.$table); $TableMLine=$res->fetch_row(); 
        $content .= "\n\n".$TableMLine[1].";\n\n";
        for ($i = 0, $st_counter = 0; $i < $fields_amount;   $i++, $st_counter=0) {
            while($row = $result->fetch_row())  { //when started (and every after 100 command cycle):
                if ($st_counter%100 == 0 || $st_counter == 0 )  {$content .= "\nINSERT INTO ".$table." VALUES";}
                    $content .= "\n(";    for($j=0; $j<$fields_amount; $j++){ $row[$j] = str_replace("\n","\\n", addslashes($row[$j]) ); if (isset($row[$j])){$content .= '"'.$row[$j].'"' ;}  else{$content .= '""';}     if ($j<($fields_amount-1)){$content.= ',';}   }        $content .=")";
                //every after 100 command cycle [or at last line] ....p.s. but should be inserted 1 cycle eariler
                if ( (($st_counter+1)%100==0 && $st_counter!=0) || $st_counter+1==$rows_num) {$content .= ";";} else {$content .= ",";} $st_counter=$st_counter+1;
            }
        } $content .="\n\n\n";
    }
    $content .= "\r\n\r\n/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;\r\n/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;\r\n/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;";
    $backup_name = $backup_name ? $backup_name : date('Y-m-d')."_".date('H-i-s')." - ".$name.".sql";
    ob_get_clean();
    echo $content;

    $filename = $backup_name;
	
	
	
	
	
	
	
	
	$zip = new ZipArchive();
	$filename1 = "./dbbackup/".$filename.'.zip';

	if ($zip->open($filename1, ZipArchive::CREATE)!==TRUE) {
		exit("cannot open <$filename1>\n");
	}

	$zip->addFromString($backup_name, $content);
	echo "numfiles: " . $zip->numFiles . "\n";	
	echo "status:" . $zip->status . "\n";
	$zip->close();
	
	
	if((filesize("./dbbackup/".$filename.'.zip')/1000000)<10)
	{
		echo "------".sendEmail($Send_email, "Magdyn Invoice Backup", "Attached file contains the DB Backup<br>", true, "./dbbackup/".$filename.'.zip',$filename,$content)."##########";
    }
	else
	{
		$message="<a href='".$baseurl."Custom/Backup/dbbackup/".$filename.".zip'>Click here to download backup</a>";
		echo "------".sendEmail($Send_email, "DB Backup-Link", $message, true, false,$filename,$content)."##########";

	}
    }




function sendEmail($email, $subject, $message, $no_reply = false, $att_name,$filename ,$Content)
	{
		try{
		global $gsValues;
		echo $email;
		$signature = "\r\n\r\n".$gsValues['EMAIL_SIGNATURE'];
		$message .= $signature;
		$message = str_replace("\\n", "\n", $message); 
		//echo $message;
		$mail = new PHPMailer();
		$today = date("Y_m_d H_i_s");
		$archive_name=$att_name;


		if ($gsValues['EMAIL_SMTP'] == 'true')
		{
			$mail->IsSMTP(); // telling to use SMTP
			$mail->Host       = $gsValues['EMAIL_SMTP_HOST'];
			$mail->Port       = $gsValues['EMAIL_SMTP_PORT'];
			$mail->SMTPDebug  = 0;
			$mail->SMTPAuth   = $gsValues['EMAIL_SMTP_AUTH'];
			$mail->SMTPSecure = $gsValues['EMAIL_SMTP_SECURE'];
			$mail->Username   = $gsValues['EMAIL_SMTP_USERNAME'];
			$mail->Password   = $gsValues['EMAIL_SMTP_PASSWORD'];
		}
		
		$email_from = $gsValues['EMAIL'];
		
		if ($no_reply != false)
		{
			if ($gsValues['EMAIL_NO_REPLY'] != '')
			{
				$email_from = $gsValues['EMAIL_NO_REPLY'];
			}	
		}
		
		$mail->From = $email_from;
		$mail->FromName = $gsValues['NAME'];		
		$mail->SetFrom($email_from, $gsValues['NAME']);
		$mail->AddReplyTo($email_from, $gsValues['NAME']);
		
		// multiple emails
		$email = explode(",", $email);
		for ($i = 0; $i < count($email); ++$i)
		{
			if ($i > 4)
			{
				break;
			}
			
			$email[$i] = trim($email[$i]);
			$mail->AddAddress($email[$i], '');
		}
		
		if ($att_name != false)
		{
			$mail->AddAttachment( $att_name, $filename.".zip");
		}
		
		
		
		$mail->Subject = $subject;
		$mail->Body = $message;
		$mail->IsHTML(true);
		if(!$mail->Send())
		{
			//echo hi;
			return false;
		}
		else
		{
			//echo "hello";
			return true;
		}
		}
		catch (Exception $e) {
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
	}
 


mysqli_close($con);




?>