<?php

class Post {
    private $sid;
    private $sName;


    public function __construct($sid, $sName) {
        $this->sid = $sid;
        $this->sName = $sName;
    }

    public function getSID() {
        return $this->sid;
    }

    public function getsName() {
        return $this->sName;
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

class Post3 {
    private $nid;
    private $cid;
    private $username;
    private $item;
    private $info;


    public function __construct($nid, $cid, $username, $item, $info) {
        $this->nid = $nid;
        $this->cid = $cid;
        $this->username = $username;
        $this->item = $item;
        $this->info = $info;
    }

    public function getNID() {
        return $this->nid;
    }

    public function getCID() {
        return $this->cid;
    }
    public function getUsername() {
        return $this->username;
    }
    public function getItem() {
        return $this->item;
    }
    public function getInfo() {
        return $this->info;
    }

}

?>