<?php
     // Developers:By  andreasf and  louispap 
     // Novenber 2012 
    
     $DoMaiN = 'cs.ucy.ac.cy';
     //----------------------------------------------------------------------------
     
     //Open HelpDesk mail INBOX folder at mailbox-------------------------------------------------
     $INBOX_mailbox = imap_open("{mail.cs.ucy.ac.cy:143/novalidate-cert}Inbox","helpdesk", "Yp%7ab6");
     //-------------------------------------------------------------------------------------------
     //Open HelpDesk mail BACKUP folder at mailbox -----------------------------------------------
     $BACKUP_mailbox = imap_open("{mail.cs.ucy.ac.cy:143/novalidate-cert}Backup","helpdesk","Yp%7ab6");     
     //-------------------------------------------------------------------------------------------
     //Open HelpDesk mail Handled folder at mailbox----------------------------------------------- 
     $HANDLED_mailbox = imap_open("{mail.cs.ucy.ac.cy:143/novalidate-cert}Handled","helpdesk","Yp%7ab6"); 
     //-------------------------------------------------------------------------------------------
     //Open HelpDesk mail Spam folder at mailbox-------------------------------------------------- 
     $SPAM_mailbox = imap_open("{mail.cs.ucy.ac.cy:143/novalidate-cert}Spam","helpdesk","Yp%7ab6"); 
     //-------------------------------------------------------------------------------------------
	 
     //Connection with db---------------------------
     require ('../configs/config.inc.php');
     require ('../Libs/common.lib.php');
     connectDB();
     //---------------------------------------------
	 
     //-------------------------------
	 //variavles for InsertDb function
     $done=1;
     $urgent=0;
     $private=0;
     //-------------------------------
 
	 // This function adds a new record in the problems table-----------------------------------------------------------------------------------------------------------------------------------
	 function InsertInDb($name,$email,$subject,$descr,$urgent,$private,$done)
	 {

	  $today = date("Y-m-d");
          $wra = date('H:i:s');
	  //$month = date("m"); nl2br($descr)

	  $mySQL="INSERT INTO problems (indate, intime, name, email, subject, descr, urgency, private) VALUES ('$today', '$wra','".$name."','".$email."','".addslashes($subject)."','".$descr."','".$urgent."', '".$private."') ";
      mysql_query($mySQL);
      error();
     } 
     //----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	 
	 //This function correct the single,double quote problem------------------------------------------------------------------------------------------------------------------------------------ 
	 //function Correct($string)
	 //{
	  
	 // $tmp=str_replace("\"","\"\"",$string);
	 // $string=str_replace("'","''",$tmp);
	 
	 // }
	 //----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	 
	 if( ($INBOX_mailbox == false ) || ($BACKUP_mailbox == false) ||  ($HANDLED_mailbox == false)  ||  ($SPAM_mailbox == false) ){
          
		  echo "[Can't open HelpDesk  mailbox] \n";
          echo imap_last_error();
     }
     else{
            echo "Handle helpdesk new mail..";

	
            //check number of messages 
            $num = imap_num_msg($INBOX_mailbox);//INBOX of HelpDesk ->  messages total num
              
            if($num >0){ 
   
                            $email = imap_fetchheader($INBOX_mailbox, $num);//email header
                            
			    $lines = explode("\n", $email);                 
                   
                            //data we are looking  
                            $from =""; //username of sender
                            $subject =""; 
                            $splittingheaders = true;
   
                            for($i=0; $i < count($lines); $i++){
                               if($splittingheaders) {
                                    $headers .=$lines[$i]. "\n";

                                    //look out for special headers
                                    if (preg_match("/^Subject: (.*)/", $lines[$i], $matches)){
                                        $subject = $matches[1];
                                    }
     
                                    if (preg_match("/^From: (.*)/", $lines[$i], $matches)){
                                        $from = $matches[1];
                                    }
                                    
				    if (preg_match("/^X-CSatUCY-From: (.*)/", $lines[$i], $matches)){
                                        $sender = $matches[1];
                                    }
									
                               }
                            }
                             
							 
							$domain=strstr($sender,'@');//Filtering emails by @cs.ucy.ac.cy domain -> $domain=@cs.ucy.ac.cy
							
							if(strcmp($domain,$DoMaiN)){ 
												        $cp = imap_mail_copy($INBOX_mailbox,$num,Backup);
												        if($cp == true){       
														    		    
																		$mv = imap_mail_move($INBOX_mailbox,$num,Handled);

															    	    $descr = imap_qprint(imap_body($INBOX_mailbox,$num)); //body of the message
																	
//Se periptwsh pou einai mime email elegxo an h kwdikopoihsh einai ellinika iso-8859-7 
//gia na kanw convert otan apomonosw to body se utf-8 pou xreiazetai h mysql 
//echo $descr;
$utf8_flag=true;
if ( strstr($descr, 'This is a multi-part message in MIME format.') != false){
	if((stristr($descr, 'ISO-8859-7')) != false){
		$utf8_flag=false;
	}
}
																		//$descr = imap_fetchbody($INBOX_mailbox,$num,"1");
//echo "<br>++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++<br>";

//Apomonono to tmhma pou brisketai anamesa sta html tags otan einai mime email opou edw einai to text body pou theloume
//An den einai mime email den tha exei html tags kai den tha ginei allagh
if(($descr_temp = stristr($descr, '<html', false)) != false){
	$descr = $descr_temp;
}
if(($descr_temp = stristr($descr, '</html>', true)) != false){
	$descr = $descr_temp;
}
//echo $descr;

//echo "<br>++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++<br>";

//Diagrafetai kathe allo html tag kai menei katharo keimeno tou body tou eimai an htan mime
$descr = strip_tags($descr);
//echo $descr;

//echo "<br>++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++<br>";

//An htan mime kai h kwdikopoihsh htan elinika iso-8859-7 twra pou exw plain text allazw ti kwdikopoihsh se utf-8 pou xreiazetai h mysql
if( $utf8_flag == false ){
	$descr = iconv("ISO-8859-7", "UTF-8", $descr);	
}
//echo $descr;

//echo "<br>++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++<br>";

//Diagrafw tous kenous xaraktires stin arxi kai sto telos an yparxoun
$descr=trim($descr);
//echo $descr;
//echo $subject."<br>";
//echo $from."<br>";
//echo $sender."<br>";
																		//Need code to store in HelpDesk db
																		$subject = imap_utf8($subject);
																		$from = trim ($from);//onoma
																		$sender = trim ($sender);//email
//echo "<br>++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++<br>";
//echo $subject."<br>";
//echo $from."<br>";
//echo $sender."<br>";

//antikathistw ta \n tou plain text me to html tag <br> gia na parousiazetai swsta sto helpdesk
$descr = nl2br($descr);
//prosthetei back slashes sto string ekei opou yparxoun " gia na mhn xaloun to string sto sql query 
$descr = addslashes($descr);
//echo $descr;
$headers = 'From: support@cs.ucy.ac.cy'. "\r\n" .
           'Reply-To: support@cs.ucy.ac.cy'  . "\r\n" .
		   'Return-Path: support@cs.ucy.ac.cy'  . "\r\n" .
		   'Content-Type: text/html; charset=UTF-8'.  "\r\n" .
		   'X-CSatUCY-From: support@cs.ucy.ac.cy' . "\r\n" .
           'X-Mailer: PHP/' . phpversion();
		   


$subj="New Helpdesk Request via email from:" .$from;
$body="New Helpdesk Request via email from:" .$from."with the subject: ".$subject;

InsertInDb($from,$sender,$subject,$descr,$urgent,$private,$done);
//mail('support@cs.ucy.ac.cy', 'HelpDesk Request','New HelpDesk Request');
mail('support@cs.ucy.ac.cy', $subj, $body, $headers);
imap_expunge($INBOX_mailbox);
										    	        } 
						   }
						   else{ //Additional field for filtering emails by @cs.ucy.ac.cy domain (may not necessary)
							     $mv = imap_mail_move($INBOX_mailbox,$num,Spam);
								 $subject = imap_utf8($subject);
								 //mail('support@cs.ucy.ac.cy','Notification', 'Spaming emails at HelpDesk email account');      
								 mail('support@cs.ucy.ac.cy', 'Notification', 'Spaming emails at HelpDesk email account', $headers);

								 imap_expunge($INBOX_mailbox);	
						   }
            
			}           
            
			//Close imap connections
			imap_close($INBOX_mailbox);
			imap_close($BACKUP_mailbox);
			imap_close($HANDLED_mailbox);
			imap_close($SPAM_mailbox);
			
     }
	 
?>
