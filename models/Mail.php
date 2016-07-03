<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models;

/**
 * Description of Mail
 *
 * @author Рустям
 */
class Mail {

    private $to;
    private $from;
    private $subject;
    private $message;

    public function setTo($to) {
        $this->to = $to;
        return $this;
    }

    public function setFrom($from) {
        $this->from = $from;
        return $this;
    }

    public function setSubject($subject) {
        $this->subject = $subject;
        return $this;
    }

    public function setMessage($message) {
        $this->message = $message;
        return $this;
    }

    public function send() {
        $headers = $this->createHeaders();
        return mail($this->to, $this->subject, $this->message, $headers);
    }

    private function createHeaders() {
        $header = "MIME-Version: 1.0\r\n";
        $header .= "Content-type: text/html; charset=utf-8\r\n";
        $header .= "From: " . $this->from;
        return $header;
    }

}
