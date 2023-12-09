<?php
namespace Observer\Observers;
interface Observer {
    public function update(String $message);
}