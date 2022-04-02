<?php

// declare(strict_types=1);

namespace App\Console;

use Phalcon\Cli\Task;

class RemoveACLTask extends Task
{
    public function mainAction()
    {
        unlink(APP_PATH.'/security/acl.cache');
    }
}