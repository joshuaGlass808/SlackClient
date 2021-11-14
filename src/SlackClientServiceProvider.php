<?php

namespace Jlg;

use Jlg\SlackClientService;
use Illuminate\Support\ServiceProvider;

class SlackClientServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // Compatibility purposes.
    }

    public function register(): void 
    {
        $this->app->bind(
            'SlackClient',
            fn (): SlackClientService => new SlackClientService
        );
    }
}	
