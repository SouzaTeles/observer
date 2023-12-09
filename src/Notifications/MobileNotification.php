<?php
namespace Observer\Notifications;
use Observer\Observers\Observer;

class MobileNotification implements Observer {
    public function __construct() {

    }
    public function update(String $message) {
        echo "[Celular] Novo e-mail: $message" . PHP_EOL;
        return;
    }
}