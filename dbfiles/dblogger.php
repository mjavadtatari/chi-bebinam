<?php

function logTheMessage($department, $status, $message)
{
    $log_line = date('Y-m-d H:i:s') . ' [' . $department . '][' . $status . ']: ' . $message;
    if (is_file('db.log')) {
        file_put_contents('db.log', "\n" . $log_line, FILE_APPEND);
    } else {
        file_put_contents('db.log', $log_line, FILE_APPEND);
    }
}