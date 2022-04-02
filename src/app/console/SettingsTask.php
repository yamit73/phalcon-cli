<?php
namespace App\Console;

use Phalcon\Cli\Task;
use Settings;
class SettingsTask extends Task
{
    public function mainAction()
    {
        echo 'This is the default task and the default action' . PHP_EOL;
        $setting=Settings::findFirst();
    }
    public function updateStockAndPriceAction($stock, $price)
    {
        if ($stock !== '' && $price !== '') {
        $setting=Settings::findFirst();
            //updating settings
            $data['price']=$price;
            $data['stock']=$stock;
            $setting->assign(
                $data,
                [
                    'price',
                    'stock'
                ]
            );
            if ($setting->save()) {
                echo "Updated successfully!";
            } else {
                echo"Not updated: <br>" . implode("<br>", $setting->getMessages());
            }
        } else {
            echo 'please provide stock and price';
        }
    }
}