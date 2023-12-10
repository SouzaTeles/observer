<?php

use Observer\Integrations\EmailIntegration;
use Observer\Notifications\DesktopNotification;
use Observer\Notifications\MobileNotification;
use PHPUnit\Framework\TestCase;

class NotificationsTest extends TestCase {
    public function testDesktopNotificationsIsArray() {
        $desktopNotification = new DesktopNotification();
        $desktopNotification->getNotifications();
        $this->assertIsArray($desktopNotification->getNotifications());
    }

    public function testDesktopNotificationsIsEmpty() {
        $desktopNotification = new DesktopNotification();
        $desktopNotification->getNotifications();
        $this->assertEmpty($desktopNotification->getNotifications());
    }

    public function testDesktopNotificationsIsArrayAfterCheckEmail() {
        $desktopNotification = new DesktopNotification();
        $emailIntegration = new EmailIntegration();
        $emailIntegration->addObserver($desktopNotification);
        $emailIntegration->checkMail();
        $desktopNotification->getNotifications();
        $this->assertIsArray($desktopNotification->getNotifications());
    }

    public function testDesktopNotificationsIsNotEmptyAfterReciveEmail() {
        $desktopNotification = new DesktopNotification();
        $emailIntegration = new EmailIntegration();
        $emailIntegration->addObserver($desktopNotification);
        $emailIntegration->checkMail();
        $this->assertNotEmpty($desktopNotification->getNotifications());
    }

    public function testDesktopAndMobileNotificationsIsNotEmptyAfterReciveEmail() {
        $desktopNotification = new DesktopNotification();
        $mobileNotification = new MobileNotification();
        $emailIntegration = new EmailIntegration();
        $emailIntegration->addObserver($desktopNotification);
        $emailIntegration->addObserver($mobileNotification);
        $emailIntegration->checkMail();
        $this->assertNotEmpty($desktopNotification->getNotifications());
        $this->assertNotEmpty($mobileNotification->getNotifications());
    }

    public function testDesktopNotificationsExistsAndMobileNotitificaitonNotExistsAfterReciveEmail() {
        $desktopNotification = new DesktopNotification();
        $mobileNotification = new MobileNotification();
        $emailIntegration = new EmailIntegration();
        $emailIntegration->addObserver($desktopNotification);
        $emailIntegration->checkMail();
        $this->assertNotEmpty($desktopNotification->getNotifications());
        $this->assertEmpty($mobileNotification->getNotifications());
    }

    public function testContentOfANotificationIsNotNull() {
        $desktopNotification = new DesktopNotification();
        $emailIntegration = new EmailIntegration();
        $emailIntegration->addObserver($desktopNotification);
        $emailIntegration->checkMail();
        $notifications = $desktopNotification->getNotifications();
        $this->assertNotNull(end($notifications));
    }
}