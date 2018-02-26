<?php
/**
 * Created by PhpStorm.
 * User: Lavigne Theo
 * Date: 21/02/2018
 * Time: 22:41
 */
namespace App\Entity;

use App\Service\Qr_code_generator;
use Core\Auth\Session;

class OeuvreEntity extends Entity {

    /**
     * url like : img/file_oeuvre/video$57.mp4
     * @return video/image/audio
     */
    public function getFormat() {
        $format = explode("$", $this->urlFile);
        $format = explode("/", $format[0]);

        return end($format);
    }

    /**
     * @param $id oeuvre
     * @param bool $echo if the qr_coce has to be displayed on the page
     * @return string Path to the generated qr_code
     */
    public static function createQrCode($id, $echo = false) {
        $path = str_replace("\\", "/", ROOT."/public/img/qr_code_oeuvre/");
        $url = "index.php?p=guest.oeuvre&id=$id";

        return Qr_code_generator::createQrCode($path, $url, $id, $echo);

    }

    /**
     * return the path to Qrcode of the current oeuvre object
     * @return mixed|string
     */
    public function pathQr() {
        $path = str_replace("\\", "/", ROOT."/public/img/qr_code_oeuvre/");
        $path .= "code_oeuvre$this->idOeuvre.png";
        return $path;
    }

    public function getExtrait() {
        return Session::getSession()->read('langue') == "en" ? substr($this->descrOeuvreEn, 0, 100)."..." : substr($this->descrOeuvreFr, 0, 100)."...";
    }

}