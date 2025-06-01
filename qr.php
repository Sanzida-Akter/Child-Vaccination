<?php

    include('../phpqrcode/qrlib.php');
    include('connect.php');

    // how to save PNG codes to server
    
    $tempDir = "picture/";
    
    $codeContents = 'Measles';
    
    // we need to generate filename somehow, 
    // with md5 or with database ID used to obtains $codeContents...
    $fileName = 'Measles'.'.png';
    
    $pngAbsoluteFilePath = $tempDir.$fileName;
    $urlRelativeFilePath = $tempDir.$fileName;
    
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
    ?>