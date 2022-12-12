<?php


function A($aaa){
    $a=hash('sha256',$aaa);
    $a=hash('sha512',$a);
    $a=hash('sha256',$a);
    $a=hash('sha512',$a);
    $a=hash('sha512',$a);
    echo $a;
}
A('Mm0123456789');



