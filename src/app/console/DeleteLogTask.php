<?php

// declare(strict_types=1);

namespace App\Console;

use Phalcon\Cli\Task;

class DeleteLogTask extends Task
{
    public function mainAction()
    {
        $files = glob(APP_PATH.'/logs/*');
        foreach($files as $file){
            if(is_file($file)) {
                unlink($file);
            }
        }
    }
}