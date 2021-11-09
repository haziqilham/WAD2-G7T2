<?php

require_once 'common.php';

class PostDAO {

    public function getAll() {
        // STEP 1
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();

        // STEP 2
        $sql = "SELECT
                    id,
                    reply_id,
                    date,
                    username,
                    reply
                FROM replies"; // SELECT * FROM post; // This will also work
        $stmt = $conn->prepare($sql);

        // STEP 3
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        // STEP 4
        $posts = []; // Indexed Array of Post objects
        while( $row = $stmt->fetch() ) {
            $posts[] =
                new Post(
                    $row['id'],
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

    public function get($id) {
        // STEP 1
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();
        //var_dump(id);

        // STEP 2
        $sql = "SELECT
                    *
                FROM threads
                WHERE 
                    id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        // STEP 3
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        // STEP 4
        $post_object = null;
        if( $row = $stmt->fetch() ) {
            $post_object = 
                new Post(
                    $row['id'],
                    $row['reply_id'],
                    $row['date'],
                    $row['username'],
                    $row['threadName'],
                    $row['content']);
        }

        // STEP 5
        $stmt = null;
        $conn = null;

        // STEP 6
        return $post_object;
    }

    // public function update($id, $subject, $entry, $mood) {

    //     // STEP 1
    //     $connMgr = new ConnectionManager();
    //     $conn = $connMgr->connect();

    //     // STEP 2
    //     $sql = "UPDATE
    //                 threads
    //             SET
    //                 update_timestamp = CURRENT_TIMESTAMP,
    //                 subject = :subject,
    //                 entry = :entry,
    //                 mood = :mood
    //             WHERE 
    //                 id = :id";
    //     $stmt = $conn->prepare($sql);
    //     $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    //     $stmt->bindParam(':subject', $subject, PDO::PARAM_STR);
    //     $stmt->bindParam(':entry', $entry, PDO::PARAM_STR);
    //     $stmt->bindParam(':mood', $mood, PDO::PARAM_STR);

    //     //STEP 3
    //     $status = $stmt->execute();
        
    //     // STEP 4
    //     $stmt = null;
    //     $conn = null;

    //     // STEP 5
    //     return $status;
    // }

    // public function delete($id) {
    //     // STEP 1
    //     $connMgr = new ConnectionManager();
    //     $conn = $connMgr->connect();

    //     // STEP 2
    //     $sql = "DELETE FROM
    //                 threads
    //             WHERE 
    //                 id = :id";
    //     $stmt = $conn->prepare($sql);
    //     $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    //     //STEP 3
    //     $status = $stmt->execute();
        
    //     // STEP 4
    //     $stmt = null;
    //     $conn = null;

    //     // STEP 5
    //     return $status;
    // }

    // public function add($subject, $entry, $mood) {
    //     // STEP 1
    //     $connMgr = new ConnectionManager();
    //     $conn = $connMgr->connect();

    //     // STEP 2
    //     $sql = "INSERT INTO threads
    //                 (
    //                     date, 
    //                     username, 
    //                     threadName, 
    //                     content
    //                 )
    //             VALUES
    //                 (
    //                     CURRENT_TIMESTAMP,
    //                     :username,
    //                     :threadName,
    //                     :content
    //                 )";
    //     $stmt = $conn->prepare($sql);
    //     $stmt->bindParam(':subject', $subject, PDO::PARAM_STR);
    //     $stmt->bindParam(':entry', $entry, PDO::PARAM_STR);
    //     $stmt->bindParam(':mood', $mood, PDO::PARAM_STR);

    //     //STEP 3
    //     $status = $stmt->execute();
        
    //     // STEP 4
    //     $stmt = null;
    //     $conn = null;

    //     // STEP 5
    //     return $status;
    // }
}

?>