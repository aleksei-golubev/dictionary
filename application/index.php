<?php
require_once('conf/app_conf.php');
require_once('functions/base.php');
?>


<html>
    <head>
        <title>Dictionary</title>
    </head>
    <body>
        <h1>Dictionary</h1>
        <table>
            <tr>
                <td>
                    <?php include('template/topicList.php'); ?>
                </td>
                <td>
                    <?php include('template/wordList.php'); ?>
                </td>
            </tr>
        </table>
    </body>
</html>