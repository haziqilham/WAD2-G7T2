<?php

require_once 'common.php';
$dao = new PostDAO();
$posts = $dao->getAll(); // Get an Indexed Array of Post objects


$items = [];
foreach( $posts as $post_object ) {
    //var_dump($posts);
    $item = [];
    $item["sid"] = $post_object->getSID();
    $item['sname'] = $post_object->getsName();

    $items[] = $item;
}
// make posts into json and return json data
$postJSON = json_encode($items);
echo $postJSON;
?>

