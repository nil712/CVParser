<?php namespace Nilesh\ResumeParser;

use Illuminate\Support\ServiceProvider;
use Nilesh\ResumeParser\ResumeParser;

class ResumeParserServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function getResumeData($fileurl)
    {
        
        $filename = $fileurl;  //File that resides on your server
        $byteArr = file_get_contents($filename); 
        $key = "YourKey";
        $password = "Password";
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
