<?php header("Content-Type: audio/mpeg");
                    $f=fopen("http://91.121.121.25:8136//stream","r"); 
                    if(!$f) exit;
                    while(!feof($f)){
                        echo fread($f,128);
                        flush();
                    }
                    fclose($f);
                    ?>