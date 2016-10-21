(function() {
    function showError(message) {
         Materialize.toast(message, 3000, 'rounded');
    }

    function fillTopicElements(fromDOM, topicObject) {
        if (fromDOM) {
            $("#topicContent").attr("data-topic-id", topicObject.attr('data-topic-id'));
            $("#topicContent").find(".topic-name").text(topicObject.find(".topic-name").text());
            $("#topicContent").find(".topic-description").text(topicObject.find(".topic-description").text());
        } else {
            $("#topicContent").attr("data-topic-id", topicObject.id);
            $("#topicContent").find(".topic-name").text(topicObject.topicName);
            $("#topicContent").find(".topic-description").text(topicObject.topicDescription);
        }
    }
    
    function clearTopicElements() {
        $("#topicContent").attr("data-topic-id", "");
        $("#topicContent").find(".topic-name").text("");
        $("#topicContent").find(".topic-description").text("");
    }
    
    function setTopicListItemClick() {
        $(".topic-list-item").click(function() {
            var self = this;
            $.get(
                '/admin/words.php',
                {
                    topic_id: $(self).attr('data-topic-id')
                }
            ).done(function(data) {
                $("#wordList>tbody").html(data);
                $("#topicList").hide();
                fillTopicElements(true, $(self));
                $("#topicContent").show();
            }).fail(function() {
                showError("Error loading words for this topic");
            });
        });
        
        $('.modal-trigger').leanModal();
    }

    setTopicListItemClick();
    
    $("#backToTopicList").click(function() {
        $.get(
            '/admin/topic.php'
        ).done(function(data) {
            $("#topicList>.collection").html(data);
            $("#topicContent").hide();
            clearTopicElements();
            $("#topicList").show();
            setTopicListItemClick();
        }).fail(function() {
            showError("Error loagin topic list");
        });
    });
    
    function fillTopicInfoModalForm() {
        $("#topicId").val($("#topicContent").attr("data-topic-id"));
        $("#topicName").val($("#topicContent").find(".topic-name").text());
        $("#topicDescription").val($("#topicContent").find(".topic-description").text());
    }
    
    function clearTopicInfoModalForm() {
        $("#topicId").val("");
        $("#topicName").val("");
        $("#topicDescription").val("");
    }
    
    $("#addNewTopic").click(function() {
        clearTopicInfoModalForm();
        $("#topicInfoModal").openModal();
    });
    
    $("#editTopicInfo").click(function() {
        fillTopicInfoModalForm();
        $("#topicInfoModal").openModal();
    });
    
    $("#saveTopic").click(function() {
        var topicId = $("#topicId").val();
        var topicName = $("#topicName").val();
        var topicDescription = $("#topicDescription").val();

        if (topicId) {
            $.ajax({
                url: '/admin/topic.php',
                type: 'PUT',
                data: {
                    topic_id: topicId,
                    topic_name: topicName,
                    topic_description: topicDescription
                }
            }).done(function(data) {
                fillTopicElements(false, {
                    topicId: topicId,
                    topicName: topicName,
                    topicDescription: topicDescription
                });
                
                $("#topicInfoModal").closeModal();
            }).fail(function() {
                showError("Error saving topic info");
            });
        } else {
            $.post(
                '/admin/topic.php',
                {
                    topic_name: topicName,
                    topic_description: topicDescription
                }
            ).done(function() {
                 $("#backToTopicList").click();
                 $("#topicInfoModal").closeModal();
            }).fail(function() {
                showError("Error creating new topic");
            });
        }
    });
    
    $("#deleteTopic").click(function() {
        var topicId = $("#topicContent").attr("data-topic-id");
        console.log(topicId);
        $.ajax ({
            url: '/admin/topic.php',
            type: 'DELETE',
            data: {
                topic_id: topicId,
            }
        }).done(function(data) {
            $("#backToTopicList").click();
            $("#deleteTopicModal").closeModal();
        }).fail(function() {
            showError("Error deleting this topic");
        });
    });
    
    
})();