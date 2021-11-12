<?php
    require_once 'common.php';
    $dao = new PostDAO();
    $posts = $dao->getAll(); // Get an Indexed Array of Post objects

    $items = [];
    foreach( $posts as $post_object ) {
        $item = [];
        $item["id"] = $post_object->getID();
        $item['date'] = $post_object->getDate();
        $item["username"] = $post_object->getUsername();
        $item["threadName"] = $post_object->getthreadName();
        $item["content"] = $post_object->getContent();
        $items[] = $item;
    }
    // make posts into json and return json data
    $postJSON = json_encode($items);
    echo $postJSON;
?>

