<?php

// require '../phpDebug/src/Debug/Debug.php';   			// if not using composer

// $debug = new \bdk\Debug(array(
//     'collect' => true,
//     'output' => true,
// ));

// loading class
include("../class/Database.php");

$database = new Database();
$db = $database->getConnection();

$email=filter_input(INPUT_POST,"email");
$website=filter_input(INPUT_POST,"website");

$url=explode(".",$website);
array_shift($url);
$new_url=implode(".",$url);



$file_handle = fopen('wip/site.php', 'w');
fwrite($file_handle, '<?php');
fwrite($file_handle, "\n");
fwrite($file_handle, '$site=array("'.$website.'","'.$new_url.'");');
fwrite($file_handle, "\n");
fwrite($file_handle, '?>');

chmod('wip/site.php',0777);


if(copy("source/mini-cms-church.zip","wip/mini-cms-church-$website.zip")){
    $zip = new ZipArchive;
    if ($zip->open("wip/mini-cms-church-$website.zip") === TRUE) {
        $zip->addFile('wip/site.php', 'admin/core/site.php');
        $zip->close();
        rename("wip/mini-cms-church-$website.zip","download/mini-cms-church-$website.zip");
        chmod("download/mini-cms-church-$website.zip",0777);
        unlink("wip/site.php");

        // insert in db
        $query="INSERT INTO mcc 
            SET 
            email = :email,
            website = :website";
        $stmt = $db->prepare($query);

        $stmt->bindParam(':email', $email);    
        $stmt->bindParam(':website', $website);    

        if($stmt->execute()){
            $from="info@dmweblab.com";
            $to="info@dmweblab.com";

            $subject = "New MCC download";
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            // Create email headers
            $headers .= 'MCC new download: '.$website."\r\n".
            'Reply-To: '.$from."\r\n" .
            'X-Mailer: PHP/' . phpversion();
        
            $output='<html><body>';
            $output.='<p>MCC new donwload</p>';
            $output.='<br>';
            $output.='Scaricato un nuovo pacchetto MCC';
            $output.='<br>';
            $output.='Mail: '.$email;
            $output.='<br>';
            $output.='Website: '.$website;
            $output.='<br>';
            $output.='</body></html>';
            
        
            if (mail ($to, $subject, $output, $headers)) {
                print_r("ok");
                exit;
            } else {
                print_r("ko");
                exit;
            }	

            header("Location: ../../mcc_download.php?site=$website");
            exit;
        }else{
            header("Location: ../../mcc.php?msg=regMccErr");
            exit;
        }
    } else {
        header("Location: ../../mcc.php?msg=regMccErr&err=zip");
        exit;
    }
}else{
    header("Location: ../../mcc.php?msg=regMccErr&err=copy");
    exit;
}


exit;
?>