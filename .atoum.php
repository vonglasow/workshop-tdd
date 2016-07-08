<?php
use \mageekguy\atoum;
use \mageekguy\atoum\reports;
use \mageekguy\atoum\reports\coverage;
use \mageekguy\atoum\writers\std;

// Load Extensions
$extension = new reports\extension($script);
$extension->addToRunner($runner);

// Declare Notifier
$images = __DIR__.'/vendor/atoum/atoum/resources/images/logo';
$notifier = new \mageekguy\atoum\report\fields\runner\result\notifier\image\libnotify();
$notifier
    ->setSuccessImage($images . DIRECTORY_SEPARATOR . 'success.png')
    ->setFailureImage($images . DIRECTORY_SEPARATOR . 'failure.png');

// Load Notifier
$report = $script->addDefaultReport();
$report->addField($notifier, array(atoum\runner::runStop));

// Load Autoloop extension
$extension = new mageekguy\atoum\autoloop\extension($script);
$extension
    ->setWatchedFiles(array(__DIR__))
    ->addToRunner($runner);

// Load Coverage extension
$coverage = new coverage\html();
$coverage->addWriter(new std\out());
$coverage->setOutPutDirectory(__DIR__ . '/coverage/atoum');
$runner->addReport($coverage);
$script->enableBranchAndPathCoverage();
