<h3>Topics</h3>
<?php
function showTopicList() {
    $topics = getTopics();

    echo "<ul>";

    foreach ($topics as $topic) {
        echo "<li><a href='/index.php?tid=".$topic['id']."'>".$topic['topic']."</a></li>";
    }

    echo "</ul>";
}
showTopicList();
?>
