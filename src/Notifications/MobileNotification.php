<?php
namespace Observer\Notifications;

use Observer\Observers\Observer;
use Observer\Notifications\Notification;

class MobileNotification extends Notification implements Observer {
    public function __construct() {

    }
    public function update(String $message) {
        $this->pushNotification($message);
        echo "[Celular] Novo e-mail: $message" . PHP_EOL;
        return;
    }
}