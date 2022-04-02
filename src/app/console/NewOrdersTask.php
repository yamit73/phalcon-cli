<?php
namespace App\Console;

use Phalcon\Cli\Task;
use Orders;
class NewOrdersTask extends Task
{
    /**
     * Function to get newly created orders
     *
     * @return void
     */
    public function mainAction()
    {
        $orders=$this->modelsManager
                     ->createQuery(
                         'SELECT Orders.* FROM Orders WHERE DATE(date) = DATE(NOW())'
                     )->execute();
        echo"orders:  ";
        echo (json_encode($orders));
    }
}