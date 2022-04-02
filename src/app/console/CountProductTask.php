<?php
namespace App\Console;

use Phalcon\Cli\Task;
use Products;
class CountProductTask extends Task
{
    /**
     * Function to get count of all product whick stock is <10
     *
     * @return void
     */
    public function mainAction()
    {
        $products=Products::find('stock<10');
        echo count($products);
    }
}