<?php
namespace App\Service;

use App\Service\phpqrcode\QRcode;

class Qr_code_generator {

    public static function createQrCode($path, $content, $id, $echo) {
        include('phpqrcode/qrlib.php');

        // outputs image directly into browser, as PNG stream
        //QRcode::png('PHP QR Code :)');

        // we need to generate filename somehow,
        // with md5 or with database ID used to obtains $codeContents...
        $fileName = "code_oeuvre$id.png";

        $pngAbsoluteFilePath = $path.$fileName;

        // generating
        if (!file_exists($pngAbsoluteFilePath)) {
            QRcode::png("http://dev-theo.fr/poo/public/".$content, $pngAbsoluteFilePath);
        }

        // displaying
        if($echo){echo '<img src="img/qr_code_oeuvre/'.$fileName.'"/>';}
        return $path.$fileName;
    }
}

?>

