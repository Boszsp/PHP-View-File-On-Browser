<?php

if (isset($_GET["src"])) {
    $pathName = strtolower(parse_url(
        json_encode($_GET["src"])
    )["path"]);
    if (str_ends_with($pathName, ".pdf") || str_ends_with($pathName, ".json")) {
        header("Content-type:application/pdf,json,vnd.cups-pdf,vnd.sealedmedia.softseal.pdf");
        $res = file_get_contents("https://cdn.discordapp.com/attachments/1207333867732869120/1221317865903231027/Basic-IOS-Configuration.pdf?ex=66311f26&is=662fcda6&hm=d2308bd851c167858842ba24380c6ecb5a741b95dfa211be5d14df62da86e62e&", true);
        echo $res;
    } else {
        header("location: /");
        //exit(0);
    }
}
//header("location: /");
//exit(0);
