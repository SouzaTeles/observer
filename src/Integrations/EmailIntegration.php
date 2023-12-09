<?php
namespace Observer\Integrations;
use Observer\Observers;

class EmailIntegration {
    private $observers = [];

    public function addObserver($observer) {
        $this->observers[] = $observer;
    }

    private function notifyObservers(String $message) {
        foreach ($this->observers as $observer) {
            $observer->update($message);
        }
    }

    public function checkMail() {
        $mailSubject = "Assunto teste";
        $this->notifyObservers($mailSubject);
    }
}