<?php
namespace Nilesh\ResumeParser;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ResumeParser extends Controller
{
	function __construct($url = null)
	{
	    if ($url) {
	        $this->url = $url;
	    }

	    
	}

  public function getResumeData($fileurl)
  {
      echo 'so nice';
  }
}
