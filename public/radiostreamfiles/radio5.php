<?php header("Content-Type: audio/mpeg");
                    $f=fopen("http://198.245.61.103:8113//stream","r"); 
                    if(!$f) exit;
                    while(!feof($f)){
                        echo fread($f,128);
                        flush();
                    }
                    fclose($f);
                    ?>