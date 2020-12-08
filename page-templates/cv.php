<?php
/**
 * Template Name: Curriculum Vita
 */

$xml = simplexml_load_string(file_get_contents("https://ws.byu.edu/services/facultyProfile/faculty/{$_REQUEST['netid']}/profile/pci/?applicationKey=MbYvtX83a1nkzh0fHyl5iCefbiJ7b2fL"));
$json = json_encode($xml);
$array = json_decode($json,TRUE);
$mimetypes=array("pdf"=>"application/pdf","doc"=>"application/msword","docx"=>"application/vnd.openxmlformats-officedocument.wordprocessingml.document");
$ext = pathinfo($array['Record']['PCI']['UPLOAD_VITA'], PATHINFO_EXTENSION);
$cvbody=file_get_contents("https://fp-vita.byu.edu/vita/".str_replace(" ","%20",$array['Record']['PCI']['UPLOAD_VITA']));
header('Content-type: '.$mimetypes[$ext]);
header('Content-Transfer-Encoding: binary');
header('Content-Disposition: inline; filename="'.$_REQUEST['netid'].'.'.$ext.'"');
echo $cvbody;
?>
