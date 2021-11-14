<?php

class Post {
    private $id;
    private $date;
    private $username;
    private $threadName;
    private $content;

    public function __construct($id, $date, $username, $threadName, $content) {
        $this->id = $id;
        $this->date = $date;
        $this->username = $username;
        $this->threadName = $threadName;
        $this->content = $content;
    }

    public function getID() {
        return $this->id;
    }

    public function getDate() {
        return $this->date;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getThreadName() {
        return $this->threadName;
    }

    public function getContent() {
        return $this->content;
    }
}

class Post2 {
    private $id;
    private $likes;
    private $reply_id;
    private $date;
    private $username;
    private $reply;

    public function __construct($id, $likes, $reply_id, $date, $username, $reply) {
        $this->id = $id;
        $this->likes = $likes;
        $this->reply_id = $reply_id;
        $this->date = $date;
        $this->username = $username;
        $this->reply = $reply;
    }

    public function getID() {
        return $this->id;
    }

    public function getLikes() {
        return $this->likes;
    }
    public function getRID() {
        return $this->reply_id;
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