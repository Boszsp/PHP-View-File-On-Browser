<?php

if (isset($_GET["src"])) {
    $pathName = strtolower(parse_url(
        json_encode($_GET["src"])
    )["path"]);
    if (str_ends_with($pathName, ".pdf") || str_ends_with($pathName, ".json")) {
        header("Content-type:application/pdf,json");
        $res = file_get_contents($_GET["src"]);
        echo $res;
        exit(0);
    } else {
        header("location: /");
        exit(0);
    }
}
header("location: /");
exit(0);
