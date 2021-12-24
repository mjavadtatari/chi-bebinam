<?php

function getPaginationButtons($total_items, $per_page, $current_page)
{
    $total_pages = ceil($total_items / $per_page);
    $pages = [];
    if ($current_page > 1) {
        $pages[] = ["text" => "قبلی", "number" => $current_page - 1];
    }
    $pages[] = ["text" => "1", "number" => 1];
    if ($current_page - 1 > 3) {
        $pages[] = ["text" => "..."];
    }

    for ($i = $current_page - 2; $i < $current_page + 3; $i++) {
        if ($i < 2 or $i > $total_pages - 1) {
            continue;
        }
        $pages[] = ["text" => strval($i), "number" => $i];
    }
    if ($total_pages - $current_page > 3) {
        $pages[] = ["text" => "..."];
    }
    if($total_pages>1){
        $pages[] = ["text" => strval($total_pages), "number" => $total_pages];
    }
    if ($current_page < $total_pages) {
        $pages[] = ["text" => "بعدی", "number" => $current_page + 1];
    }
    return $pages;
}