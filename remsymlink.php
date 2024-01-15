<?php

$linkfile="/home/dp1qg0ezvifa/public_html/slycoderLaravel/public/storage";

if(file_exists($linkfile)) {
    if(is_link($linkfile)) {
        unlink($linkfile);
    } else {
        exit("$linkfile exists but not symbolic link\n");
    }
}

?>