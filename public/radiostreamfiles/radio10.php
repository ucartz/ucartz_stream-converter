<?php header("Content-Type: audio/mpeg");
                    $f=fopen("http://91.121.86.167:8183//stream","r"); 
                    if(!$f) exit;
                    while(!feof($f)){
                        echo fread($f,128);
                        flush();
                    }
                    fclose($f);
                    ?>