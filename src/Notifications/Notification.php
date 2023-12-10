<?php

namespace Observer\Notifications;

abstract class Notification {
    protected $notifications = [];

    protected function pushNotification(String $notification) {
        $this->notifications[] = $notification;
    }

    public function getNotifications() {
        return $this->notifications;
    }
}