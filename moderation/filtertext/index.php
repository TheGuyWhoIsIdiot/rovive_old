<?php

header('Content-Type: application/json');

function FilterText(string $text) 
{
    $badlist = array_filter(explode(",", file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/badwords.txt")));
    $filterCount = count($badlist);

    for ($i = 0; $i < $filterCount; $i++) {
        $text = preg_replace_callback('/(' . $badlist[$i] . ')/i', function($matches) {
            return str_repeat('#', strlen($matches[0]));
        }, $text);
    }

    return $text;
}

// Check if required POST data is set
if (isset($_POST['text'])) {
    $text = $_POST['text'];

    $textog = FilterText($text);

    $return = json_encode([
        "success" => true,
        "data" => [
            "white" => $text,
            "black" => $textog
        ]
    ], JSON_UNESCAPED_SLASHES);

    echo $return;
}