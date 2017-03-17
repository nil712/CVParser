<?php
namespace Nilesh\ResumeParser;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ResumeParser extends Controller
{
	

  public function getResumeData($fileurl)
  {
      $filename = $fileurl;  //File that resides on your server
        $byteArr = file_get_contents($filename); 
        $key = "13e96442-e3b6-e611-80f8-00155db0737b";
        $password = "Letsdoit@123";
        $atservices_wsdl = "http://www.cvparseapi.com/cvparseapi.asmx?WSDL";

        try {
          $atservices_client = new \SoapClient($atservices_wsdl);

          //The names f, fileName, YourKey, Password must match exactly what the service expects (this is case sensitive)
          $args = array('f' => $byteArr,
          'fileName' => $filename,
          'YourKey' => $key,
          'Password' => $password
          );


          $myXMLData = $atservices_client->ParseResumeNTG($args);
          return $myXMLData;

        } catch (Exception $e) {
          return $e->getMessage();
        }
  }
}
