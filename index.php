<?php
require 'vendor/autoload.php';

use Observer\Integrations\EmailIntegration;
use Observer\Notifications\{DesktopNotification, MobileNotification};
use Observer\Observers;

$emailIntegration = new EmailIntegration();
$emailIntegration->addObserver(new DesktopNotification());
$emailIntegration->addObserver(new MobileNotification());
$emailIntegration->checkMail();
