<?php

require_once 'common.php';
$dao = new PostDAO();
//var_dump($_POST);

$posts = $dao->get($id); // Get an Indexed Array of Post objects

$items = [];
foreach( $posts as $post_object ) {
    $item = [];
    $item["id"] = $post_object->getID();
    $item["reply_id"] = $post_object->getRID();
    $item['date'] = $post_object->getDate();
    $item["username"] = $post_object->getUsername();
    $item["reply"] = $post_object->getReply();
    $items[] = $item;
}
// make posts into json and return json data
$postJSON = json_encode($items);
echo $postJSON;
?>

