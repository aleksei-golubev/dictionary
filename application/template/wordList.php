<?php
function getTopicToShow() {
    if (isset($_REQUEST['tid'])) {
        $topicId = intval($_REQUEST['tid']);
        
        $topic = getTopicById($topicId);
        
        if ($topic == false) {
            $topic = getLastTopic();
        }
    } else {
        $topic = getLastTopic();
    }
    
    return $topic;
}

function showTopicWithWords() {
    $topic = getTopicToShow();
    
    echo "<h2>".$topic['topic']."</h2>";
    echo "<p>".$topic['description']."</p>";
    
    $words = getWordsByTopicId($topic['id']);
    
    if (sizeof($words) > 0) {
        echo "<ul>";
        
        foreach ($words as $word) {
            echo "<li><strong>".$word['word']."</strong>&nbsp;&mdash; ".$word['definition']."</li>";
        }
        
        echo "</ul>";
    }
}

showTopicWithWords();
