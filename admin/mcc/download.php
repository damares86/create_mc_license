<?php

$file=filter_input(INPUT_GET,"filename");

$fileList = glob('download/mini-cms-church-'.$file.'.zip');
    foreach($fileList as $filename){

      if(is_file($filename)){
        $zip = $filename;
        // $fp=fopen('download.log','a');
        // fwrite($fp,"\n");
        // fwrite($fp,$user." ".$product." ".$file." ".date("d/m/Y-H:i:s"));
        // fclose($fp);
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($zip).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($zip));
        readfile($zip);
        unlink($zip);

      }   
    }