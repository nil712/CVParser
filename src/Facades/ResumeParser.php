<?php
namespace Nilesh\ResumeParser\Facades;

use Illuminate\Support\Facades\Facade;


class ResumeParser extends Facade
{
	
	/**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'nilesh-resumeparser';
    }
}
