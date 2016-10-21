<?php
function query($query, $params = []) {
    global $db_conf;

    $mysqli = new mysqli(
        $db_conf['host'],
        $db_conf['user'],
        $db_conf['password'],
        $db_conf['database']
    );
    
    if ($mysqli->connect_errno) {
        echo "Не удалось подключиться к MySQL: " . $mysqli->connect_error;
    }
    
    if (sizeof($params) > 0) {
        $sprintfParams = [$query];
        
        foreach ($params as $param) {
            $sprintfParams[] = $mysqli->real_escape_string($param);
        }
        
        $query = call_user_func_array(sprintf, $sprintfParams);
    }
    
    $res = $mysqli->query($query);
    $mysqli->close();
    
    return $res;
}

function getTopics() {
    $getTopicsQuery = "SELECT * FROM `topic`";
    $res = query($getTopicsQuery);
    
    $topics = [];
    
    while ($row = $res->fetch_assoc()) {
        $topics[] = $row;
    }
    
    return $topics;
}

function getWordsByTopicId($topicId) {
    $wordListByByTopicIdQuery = "SELECT * FROM `word` WHERE `topic_id`= %s";
    $res = query($wordListByByTopicIdQuery, [$topicId]);
    
    $words = [];
    
    while ($row = $res->fetch_assoc()) {
        $words[] = $row;
    }
    
    return $words;
}

function newTopic($topic, $description) {
    $newTopicQuery = "INSERT INTO `topic`(`topic`, `description`) VALUES('%s', '%s');";
    query($newTopicQuery, [$topic, $description]);
}

function editTopic($topicId, $topic, $description) {
    $editTopicQuery = "UPDATE `topic` SET `topic` = '%s', `description` = '%s' WHERE `id` = %s";
    query($editTopicQuery, [$topic, $description, $topicId]);
}

function deleteTopic($topicId) {
    $deleteTopicQuery = "DELETE FROM `topic` WHERE `id` = %s";
    $setTopicToNullForWords = "UPDATE `word` SET `topic_id` = NULL WHERE `topic_id = %s";
    
    query($deleteTopicQuery, [$topicId]);
    query($setTopicToNullForWords, [$topicId]);
}

function newWord($word, $definition, $topicId = null) {
    $newWordQuery = "INSERT INTO `word`(`word`, `definition`, `topic_id`) VALUES('%s', '%s', %s)";
    query($newWordQuery, [$word, $definition, $topicId]);
}

function getLastTopic() {
    $lastTopicQuery = "SELECT * FROM `topic` ORDER BY `id` DESC LIMIT 1";
    $res = query($lastTopicQuery);
    
    if ($row = $res->fetch_assoc()) {
        return $row;
    } else {
        return false;
    }
}

function getTopicById($id) {
    $topicByIdQuery = "SELECT * FROM `topic` WHERE `id`= %s";
    $res = query($topicByIdQuery, [$id]);
    
    if ($row = $res->fetch_assoc()) {
        return $row;
    } else {
        return false;
    }
}