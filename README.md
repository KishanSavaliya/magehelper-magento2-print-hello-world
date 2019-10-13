# MageHelper Print Hello World Simple module

We will learn here, how to create new simple "Hello World" module in Magento 2 step by step.

We can create new module in `app/code/` directory, previously in Magento 1 there were three code pools which are local, community and core but that has been removed now.

In this blog post we will see how to create a new module, create a route and display `hello world` using Magento 2 Controller and you can download this module as well for practice.

### Step - 1 - Create a directory for the module

- In Magento 2, module name divided into two parts i.e Vendor_Module (for e.g Magento_Theme, Magento_Catalog)
- We will create `MageHelper_PrintHelloWorld` here, So `MageHelper` is vendor name and `PrintHelloWorld` is name of this module.
- So first create your namespace directory (`MageHelper`) and move into that directory.
- Then create module name directory (`PrintHelloWorld`)

Now Go to : `app/code/MageHelper/PrintHelloWorld`

### Step - 2 - Create module.xml file to declare new module.

- Magento 2 looks for configuration information for each module in that module’s etc directory. so we need to add module.xml file here in our module `app/code/MageHelper/PrintHelloWorld/etc/module.xml` and it's content for our module is :

~~~ xml
<?xml version="1.0"?>
<!--
/**
 * MageHelper Print Hello World Simple module
 *
 * @package      MageHelper_PrintHelloWorld
 * @author       Kishan Savaliya <kishansavaliyakb@gmail.com>
 */
-->
<config xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="urn:magento:framework:Module/etc/module.xsd">
	<module name="MageHelper_PrintHelloWorld" setup_version="1.0.0" />
</config>
~~~

In this file, we register a module with name `MageHelper_PrintHelloWorld` and the version is `1.0.0`.

### Step - 3 - create registration.php

- All Magento 2 module must be registered in the Magento system through the magento `ComponentRegistrar` class. This file will be placed in module's root directory.

In this step, we need to create this file:

~~~
app/code/MageHelper/PrintHelloWorld/registration.php
~~~

And it’s content for our module is:

~~~ php
<?php
/**
 * MageHelper Print Hello World Simple module
 *
 * @package      MageHelper_PrintHelloWorld
 * @author       Kishan Savaliya <kishansavaliyakb@gmail.com>
 */
\Magento\Framework\Component\ComponentRegistrar::register(
    \Magento\Framework\Component\ComponentRegistrar::MODULE,
    'MageHelper_PrintHelloWorld',
    __DIR__
);
~~~

### Step - 4 - Enable `MageHelper_PrintHelloWorld` module.

- By finish above step, you have created an empty module. Now we will enable it in Magento environment.
- Before enable the module, we must check to make sure Magento has recognize our module or not by enter the following at the command line:

~~~ 
php bin/magento module:status
~~~

If you follow above step, you will see this in the result:

~~~
List of disabled modules:
MageHelper_PrintHelloWorld
~~~

This means the module has recognized by the system but it is still disabled. Run this command to enable it:

~~~
php bin/magento module:enable MageHelper_PrintHelloWorld
~~~

The module has enabled successfully if you saw this result:

~~~
The following modules has been enabled:
- MageHelper_PrintHelloWorld
~~~

This’s the first time you enable this module so Magento require to check and upgrade module database. We need to run this command:

~~~
php bin/magento setup:upgrade
~~~

### Step - 5 - Create Router for frontend

In the Magento system, a request URL has the following format:

~~~
[your_base_url]/<router_name>/<controller_name>/<action_name>
~~~

The Router is used to assign a URL to a corresponding controller and action. In this module. We will create router for frontend so we need to add this file: 

~~~
app/code/MageHelper/PrintHelloWorld/etc/frontend/routes.xml
~~~

And content for this file:

~~~ xml
<?xml version="1.0"?>
<!--
/**
 * MageHelper Print Hello World Simple module
 *
 * @package      MageHelper_PrintHelloWorld
 * @author       Kishan Savaliya <kishansavaliyakb@gmail.com>
 */
-->
<config xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="urn:magento:framework:App/etc/routes.xsd">
    <router id="standard">
        <route id="magehelper" frontName="magehelper">
            <module name="MageHelper_PrintHelloWorld" />
        </route>
    </router>
</config>
~~~

After define the route, the URL path to our module of frontend will be: `http://example.com/magehelper/*`

### Step - 6 - Create Controllers and Actions

- Now we will create our controller and action to print "Hello World" Text.
- For that we need to first assume what will be our controller and action name ? So we will use "Hello" as our controller name and "World" is for our action name, because we are creating this module to print simple "Hello World" text. Otherwise we will keep controller and action name as per our requirements.
- So now our URL is `http://example.com/magehelper/hello/world`
- Before running this URL in web browser, we need to create following directory as controller and action

~~~
app/code/MageHelper/PrintHelloWorld/Controller/Hello/World.php 
~~~

And content for this file :

~~~ php
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
~~~

- After creating Controller and Action file, please do run flush and clear cache commands.

### Step - 7 - Output

- Run following URL in web browser to check output.

