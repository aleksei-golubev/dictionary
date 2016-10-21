<?php require_once('check_auth.php'); ?>

<?php
function showWordList() {
    $topicId = $_GET['topic_id'];
    $words = getWordsByTopicId($topicId);

    foreach ($words as $key=>$word) {
        echo "<tr data-word-id=\"".$word['id']."\"><td><strong>".$word['word']."</stong></td><td>".$word['definition']."</td>";
        echo "<td><i class=\"small material-icons edit-buton\">mode_edit</i><i class=\"small material-icons delete-button\">delete</i></td></tr>";
    }
}

showWordList();
?>
