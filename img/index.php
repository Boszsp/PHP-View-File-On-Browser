<?php

if (isset($_GET["src"])) {
    $pathName = strtolower(parse_url(
        json_encode($_GET["src"])
    )["path"]);
    if (
       str_ends_with($pathName, ".webp") ||str_ends_with($pathName, ".png") ||
       str_ends_with($pathName, ".jpg") || str_ends_with($pathName, ".jpeg") ||
       str_ends_with($pathName, ".gif") ||str_ends_with($pathName, ".svg")
    ) {
        header("Content-type:image/apng,avif,webp,png,jpg,jpeg,gif,svg+xml");
        $res = file_get_contents($_GET["src"]);
        echo $res;
        exit(0);
    } else {
        header("location: ..");
        exit(0);
    }
}
header("location: ..");
exit(0);
