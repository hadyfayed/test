<?php

use Webmozart\PathUtil\Path;

if (!function_exists('base_path')) {
    function base_path($path = '')
    {
        //var_dump(Path::canonicalize(__DIR__ . '/../../' . ($path ? DIRECTORY_SEPARATOR . $path : $path)));
        return Path::canonicalize(__DIR__ . '/../../' . ($path ? DIRECTORY_SEPARATOR . $path : $path));
    }
}
if (!function_exists('markdown')) {
    function markDown($markdown, $isFile = false)
    {
        $Parsedown = new Parsedown();
        if ($isFile === true) {
            $md = fopen(base_path($markdown).'.md', "r") or die("Unable to open file!");
            return $Parsedown->text(fread($md, filesize(base_path($markdown).'.md')));
        }
        return $Parsedown->text($markdown);
    }
}
