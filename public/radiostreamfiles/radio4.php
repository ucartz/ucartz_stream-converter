<?php header("Content-Type: audio/mpeg");
                    $f=fopen("http://centova57.instainternet.com:8083//stream","r"); 
                    if(!$f) exit;
                    while(!feof($f)){
                        echo fread($f,128);
                        flush();
                    }
                    fclose($f);
                    ?>