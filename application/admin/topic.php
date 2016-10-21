<?php require_once('check_auth.php'); ?>

<?php
function showTopicList() {
    $topics = getTopics();
    
    foreach ($topics as $topic) {
        echo "<a data-topic-id=\"".$topic['id']."\" class=\"collection-item topic-list-item\"><span class='topic-name'>".$topic['topic']."</span><br/><span class='topic-description'>".$topic['description']."</a>";
    }
}

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        showTopicList();
        break;
    case 'PUT':
        parse_str(file_get_contents("php://input"), $_PUT);
        editTopic($_PUT['topic_id'], $_PUT['topic_name'], $_PUT['topic_description']);
        break;
    case 'POST':
        newTopic($_POST['topic_name'], $_POST['topic_description']);
        break;
    case 'DELETE':
        parse_str(file_get_contents("php://input"), $_DELETE);
        deleteTopic($_DELETE['topic_id']);
        break;
}
?>
