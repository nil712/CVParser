<?php 
namespace Nilesh\ResumeParser;

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
        $this->publishes([
            __DIR__.'/../config/bighelpconfig.php' => config_path('bighelpconfig.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('nilesh-resumeparser',function(){
          return new ResumeParser();
        });
        
    }

    
}
