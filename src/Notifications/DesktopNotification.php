<?php
namespace Observer\Notifications;
use Observer\Observers\Observer;

class DesktopNotification implements Observer {
    public function __construct() {

    }
    public function update(String $message) {
        echo "[Desktop] Novo e-mail: $message" . PHP_EOL;
        return;
    }
}