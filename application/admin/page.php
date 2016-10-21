<?php require_once('check_auth.php'); ?>

<link type="text/css" rel="stylesheet" href="/admin/css/main.css" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<script src="/admin/js/admin.js"></script>
<div class="row">
    <div class="col s10 offset-s1 card-panel">
        <div id="topicList">
            <h3>Topics</h3>
            <div class="collection">
                <?php include("topic.php"); ?>
            </div>
            
            <div class="row">
                <div class="input-field">
                    <a class="waves-effect waves-light btn" id="addNewTopic">Add new topic</a>
                </div>
            </div>
        </div>
        <div id="topicContent" style="display:none;"  data-topic-id="">
            <h4 class='topic-name'></h4>
            <div class='topic-description'></div>
            <div class="row">
                <div class="input-field">
                    <a class="waves-effect waves-light btn" id="backToTopicList">Back to topic list</a>
                    <a class="waves-effect waves-light btn" id="editTopicInfo">Edit topic info</a>
                </div>
            </div>
            
            <div class="row">
            <table class="responsive-table highlight" id="wordList">
                <thead>
                    <tr>
                        <th>Word</th>
                        <th>Definition</th>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
            </div>
            
            <div class="row">
                <div class="input-field">
                    <a class="waves-effect waves-light btn red modal-trigger" id="deleteCurrentTopic" href="#deleteTopicModal">Delete this topic</a>
                </div>
            </div>
        </div>
    </div>
</div>


<div id="topicInfoModal" class="modal modal-fixed-footer">
    <div class="modal-content">
        <h4>Topic Info</h4>
        <form class="col s12">
            <input type="hidden" id="topicId" value="" />
            <div class="row">
                <div class="input-field col s12">
                  <input id="topicName" type="text" class="validate">
                  <label for="topicName">Topic</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <textarea class="materialize-textarea" id="topicDescription"></textarea>
                    <label for="topicDescription">Description</label>
                </div>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat">Cancel</a>
        <a href="#!" class="modal-action waves-effect waves-green btn-flat" id="saveTopic">Save</a>
    </div>
</div>

<div id="deleteTopicModal" class="modal">
    <div class="modal-content">
        <h4>Delete topic</h4>
        <div>
            Are you shure that you want to delete this topic?
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat">Cancel</a>
        <a href="#!" class="modal-action waves-effect waves-light btn-flat red" style="color:white;" id="deleteTopic">DELETE</a>
    </div>
</div>