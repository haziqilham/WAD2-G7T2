<?php

//require_once 'common.php';

class PostDAO {

    public function getAll() {
        // STEP 1
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();        
        // STEP 2
        $sql = "SELECT
                    sid, sname
                FROM school"; // SELECT * FROM post; // This will also work
        $stmt = $conn->prepare($sql);

        // STEP 3
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        // STEP 4
        $posts = []; // Indexed Array of Post objects
        while( $row = $stmt->fetch() ) {
            $posts[] =
                new Post(
                    $row['sid'],
                    $row['sname']);
        }

        // STEP 5
        $stmt = null;
        $conn = null;

        // STEP 6
        return $posts;
    }

    public function getNotes($cid) {
        // STEP 1
        //var_dump($cid);
        //echo $cid;
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();        
        // STEP 2
        $sql = "SELECT
                    *
                FROM items where cid = '$cid'"; // SELECT * FROM post; // This will also work
        $stmt = $conn->prepare($sql);

        // STEP 3
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        // STEP 4
        $posts = []; // Indexed Array of Post objects
        while( $row = $stmt->fetch() ) {
            $posts[] =
                new Post3(
                    $row['nid'],
                    $row['cid'],
                    $row['username'],
                    $row['item'],
                    $row['info']);
        }

        // STEP 5
        $stmt = null;
        $conn = null;

        // STEP 6
        return $posts;
    }

    public function get($id) {
        // STEP 1
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();

        // STEP 2
        $sql = "SELECT
                    *
                FROM replies 
                WHERE 
                    id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        // STEP 3
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        // STEP 4
        $posts = [];
        while( $row = $stmt->fetch() ) {
            $posts[] =
                new Post2(
                    $row['id'],
                    $row['likes'],
                    $row['reply_id'],
                    $row['date'],
                    $row['username'],
                    $row['reply']);
        }
        // STEP 5
        $stmt = null;
        $conn = null;

        // STEP 6
        return $posts;
    }

    public function likes($rid) {

        // STEP 1
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();

        // STEP 2
        $sql = "UPDATE
                    replies
                SET
                    likes = likes + 1
                    
                WHERE 
                    reply_id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        
        

        //STEP 3
        $status = $stmt->execute();
        
        // STEP 4
        $stmt = null;
        $conn = null;

        // STEP 5
        return $status;
    }

    public function delete($id) {
        // STEP 1
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();

        // STEP 2
        $sql = "DELETE FROM
                    threads
                WHERE 
                    id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        //STEP 3
        $status = $stmt->execute();
        
        // STEP 4
        $stmt = null;
        $conn = null;

        // STEP 5
        return $status;
    }

    public function add($subject, $entry, $mood) {
        // STEP 1
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();

        // STEP 2
        $sql = "INSERT INTO threads
                    (
                        date, 
                        username, 
                        threadName, 
                        content
                    )
                VALUES
                    (
                        CURRENT_TIMESTAMP,
                        :username,
                        :threadName,
                        :content
                    )";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':subject', $subject, PDO::PARAM_STR);
        $stmt->bindParam(':entry', $entry, PDO::PARAM_STR);
        $stmt->bindParam(':mood', $mood, PDO::PARAM_STR);

        //STEP 3
        $status = $stmt->execute();
        
        // STEP 4
        $stmt = null;
        $conn = null;

        // STEP 5
        return $status;
    }
}

?>