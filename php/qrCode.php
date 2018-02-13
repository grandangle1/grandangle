<?php

 include('../phpqrcode/qrlib.php'); 
     
// outputs image directly into browser, as PNG stream 
//QRcode::png('PHP QR Code :)');


    // how to save PNG codes to server 
     
    $tempDir = "../img/"; 
     
    $codeContents = 'www.wikipedia.com'; 
     
    // we need to generate filename somehow,  
    // with md5 or with database ID used to obtains $codeContents... 
    $fileName = '005_file_'.md5($codeContents).'.png'; 
     
    $pngAbsoluteFilePath = $tempDir.$fileName; 
    $urlRelativeFilePath = "../img/".$fileName; 
     
    // generating 
    if (!file_exists($pngAbsoluteFilePath)) { 
        QRcode::png($codeContents, $pngAbsoluteFilePath); 
        echo 'File generated!'; 
        echo '<hr />'; 
    } else { 
        echo 'File already generated! We can use this cached file to speed up site on common codes!'; 
        echo '<hr />'; 
    } 
     
    echo 'Server PNG File: '.$pngAbsoluteFilePath; 
    echo '<hr />'; 
     
    // displaying 
    echo '<img src="'.$urlRelativeFilePath.'" />'; 