<?php

namespace Jlg\Test;

use Jlg\SlackClientServiceProvider;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            SlackClientServiceProvider::class
        ];
    }
}
