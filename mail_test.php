<?php
require_once 'Mail/Swift/lib/swift_required.php';
include("database_connection.php");
include("core.inc.php");

function getReferenceDate($app_id)
{

		$query = "SELECT `*` FROM `pos` WHERE EmpPosID = '".$id."'";
	
			if($query_run = mysql_query($query) or die("error"))
			{
				if($query_result = @mysql_result($query_run, 0, 'date'));
				{
				return $query_result;
				}
			}
	
	
	
}


function send_mail_reference($to,$from,$application_id){
	$to_fn = getFN($to);
	$to_name = getName($to);
	$to_mail = getMail($to);
	
	$from_fn = getFN($from);
	$from_name = getName($from);
	$date = $application_id;
	//$date = getReferenceDate($application_id);
	
$transport = Swift_SmtpTransport::newInstance('mail.simpur.net.bn', 465, "ssl")
  ->setUsername('hrms@dst-group.org')
  ->setPassword('hr@dm1n');

$mailer = Swift_Mailer::newInstance($transport);


  $body='
  <p><strong><u>REFERENCE LETTER APPLICATION</u></strong></p>
  <p>Dear '.$to_name.',</p>
  <p>The reference letter application submitted by <strong>'.$from_name.'</strong> on <strong>'.$date.'</strong> is pending for your approval.</p>
 
		<br/><br/>
		<i>This is an auto generated email sent to you from HRMS. Please do not reply to this email.</i>
		<br/>
			<p>Regards,<br/>
			HRMS Administrator<br/>
			DST</p>';


$message = Swift_Message::newInstance('Reference Letter Application')
  ->setFrom(array('hrms@dst-group.org' => 'HRMS Administrator'))
  ->setTo(array($to_mail))
  ->setBody('');
$message->addPart($body, 'text/html');

$result = $mailer->send($message);
}


function send_collection_reference($to,$from){
	$to_fn = getFN($to);
	$to_name = getName($to);
	$to_mail = getMail($to);
	
	$from_fn = getFN($from);
	$from_name = getName($from);
	$date = $application_id;
	//$date = getReferenceDate($application_id);
	
$transport = Swift_SmtpTransport::newInstance('mail.simpur.net.bn', 465, "ssl")
  ->setUsername('hrms@dst-group.org')
  ->setPassword('hr@dm1n');

$mailer = Swift_Mailer::newInstance($transport);


  $body='
  <p><strong><u>REFERENCE LETTER COLLECTION</u></strong></p>
  <p>Dear '.$to_name.',</p>
  <p>Kindly be informed, your Reference Letter is ready to be collected  from '.$from_name.' at <strong>Group Human Resources, Level 9, DST Headquarters.</strong></p>
  <table border = "1" cellpadding = "10px" width="100%">
  <tr>
	<th>Days</th>
	<th>Time</th>
	<th>Lunch Break</th>
  </tr>
  <tr>
	<td>Monday to Thursday</td>
	<td>8.00 AM TO 12.00 PM<br/>13.30 PM TO 17.15 PM</td>
	<td>12.00 PM to 13.30 PM</td>
  </tr>
  <tr>
	<td>Friday</td>
	<td>8.00 AM TO 12.00 PM<br/>14.15 PM TO 17.15 PM</td>
	<td>12.00 PM to 14.15 PM</td>
  </tr>
  <tr>
	<td colspan = "3">Close during Weekend and Public Holiday</td>
	
  </tr>
  </table>
 
		<br/><br/>
		<i>This is an auto generated email sent to you from HRMS. Please do not reply to this email.</i>
		<br/>
			<p>Regards,<br/>
			HRMS Administrator<br/>
			DST</p>';


$message = Swift_Message::newInstance('Reference Letter Collection')
  ->setFrom(array('hrms@dst-group.org' => 'HRMS Administrator'))
  ->setTo(array($to_mail))
  ->setBody('');
$message->addPart($body, 'text/html');

$result = $mailer->send($message);
}



