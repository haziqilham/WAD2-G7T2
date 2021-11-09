<?php

class Post {
    private $id;
    private $rid;
    private $date;
    private $username;
    private $reply;

    public function __construct($id, $rid, $date, $username, $reply) {
        $this->id = $id;
        $this->rid = $rid;
        $this->date = $date;
        $this->username = $username;
        $this->reply = $reply;
    }

    public function getID() {
        return $this->id;
    }

    public function getRID() {
        return $this->rid;
    }
    public function getDate() {
        return $this->date;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getReply() {
        return $this->reply;
    }

}

?>