<?php
/**
 * MageHelper Print Hello World Simple module
 *
 * @package      MageHelper_PrintHelloWorld
 * @author       Kishan Savaliya <kishansavaliyakb@gmail.com>
 */

namespace MageHelper\PrintHelloWorld\Controller\Hello;

class World extends \Magento\Framework\App\Action\Action
{
    public function __construct(
        \Magento\Framework\App\Action\Context $context)
    {
        return parent::__construct($context);
    }
     
    public function execute()
    {
        echo 'Hello World from MageHelper';
        die();
    } 
}