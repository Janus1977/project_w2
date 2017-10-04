<?php
    session_start();

    function nombre($n) {
        return str_pad(mt_rand(0,pow(10,$n)-1),$n,'0',STR_PAD_LEFT);
    }

    function imageSimple($mot) {
        $largeur = strlen($mot) * 10;
        $hauteur = 20;
        $img = imagecreate($largeur, $hauteur);
        $blanc = imagecolorallocate($img, 255, 255, 255);
        $noir = imagecolorallocate($img, 0, 0, 0);
        $milieuHauteur = ($hauteur / 2) - 8;
        imagestring($img, 6, strlen($mot) /2 , $milieuHauteur, $mot, $noir);
        imagerectangle($img, 1, 1, $largeur - 1, $hauteur - 1, $noir); // La bordure
        imagepng($img);
        imagedestroy($img);
    }

    function imageBarree($mot) {
        $largeur = strlen($mot) * 10;
        $hauteur = 20;
        $img = imagecreate($largeur, $hauteur);
        $blanc = imagecolorallocate($img, 255, 255, 255);
        $noir = imagecolorallocate($img, 0, 0, 0);
        $milieuHauteur = ($hauteur / 2) - 8;
        imagestring($img, 6, strlen($mot) /2 , $milieuHauteur, $mot, $noir);
        imagerectangle($img, 1, 1, $largeur - 1, $hauteur - 1, $noir); // La bordure
        imageline($img, 2, $milieuHauteur + 8, $largeur - 2, $milieuHauteur + 8, $noir);
        imageline($img, 2,mt_rand(2,$hauteur), $largeur - 2, mt_rand(2,$hauteur), $noir);
        imagepng($img);
        imagedestroy($img);

    }

    function imagePolicee($mot,$font) {
        $size = 32;
        $marge = 5;
        $box = imagettfbbox($size, 0, $font, $mot);
        $largeur = $box[2] - $box[0];
        $hauteur = $box[1] - $box[7];
        $img = imagecreate($largeur+$marge*2, $hauteur+$marge*2);
        $blanc = imagecolorallocate($img, 255, 255, 255);
        $noir = imagecolorallocate($img, 0, 0, 0);
        imagettftext($img, $size, 0,$marge,$hauteur+$marge, $noir, $font, $mot);

        imagepng($img);
        imagedestroy($img);
    }

    function imagePoliceeBarree($mot,$font) {
        $size = 32;
        $marge = 5;

        $box = imagettfbbox($size, 0, $font, $mot);
        $largeur = $box[2] - $box[0];
        $hauteur = $box[1] - $box[7];
        $img = imagecreate($largeur+$marge*2, $hauteur+$marge*2);
        $blanc = imagecolorallocate($img, 255, 255, 255);
        $noir = imagecolorallocate($img, 0, 0, 0);

        imagettftext($img, $size, 0,$marge,$hauteur+$marge, $noir, $font, $mot);
        imageline($img, 2,mt_rand(2,$hauteur), $largeur+$marge, mt_rand(2,$hauteur), $noir);
        imageline($img, 2,mt_rand(2,$hauteur), $largeur+$marge, mt_rand(2,$hauteur), $noir);
        
        imagepng($img);
        imagedestroy($img);
    }

    function imageConvoluee($mot,$font) {
        $size = 32;
        $marge = 5;

        $matrix_blur = array(
            array(1,2,1),
            array(2,4,2),
            array(1,2,1));

        $box = imagettfbbox($size, 0,$font, $mot);
        $largeur = $box[2] - $box[0];
        $hauteur = $box[1] - $box[7];
        $img = imagecreate($largeur+$marge*2, $hauteur+$marge*2);
        $blanc = imagecolorallocate($img, 255, 255, 255);
        $noir = imagecolorallocate($img, 0, 0, 0);
        imagettftext($img, $size, 0,$marge,$hauteur+$marge, $noir,$font, $mot);
        imageconvolution($img, $matrix_blur,16,0);
        imagepng($img);
        imagedestroy($img);
    }

    function imageConvolueeBarree($mot,$font) {
        $size = 32;
        $marge = 5;

        $matrix_blur = array(
            array(1,2,1),
            array(2,4,2),
            array(1,2,1));

        $box = imagettfbbox($size, 0,$font, $mot);
        $largeur = $box[2] - $box[0];
        $hauteur = $box[1] - $box[7];
        $img = imagecreate($largeur+$marge*2, $hauteur+$marge*2);
        $blanc = imagecolorallocate($img, 255, 255, 255);
        $noir = imagecolorallocate($img, 0, 0, 0);
        imagettftext($img, $size, 0,$marge,$hauteur+$marge, $noir,$font, $mot);
        imageline($img, 2,mt_rand(2,$hauteur), $largeur+$marge, mt_rand(2,$hauteur), $noir);
        imageline($img, 2,mt_rand(2,$hauteur), $largeur+$marge, mt_rand(2,$hauteur), $noir);
        imageconvolution($img, $matrix_blur,16,0);
        imagepng($img);
        imagedestroy($img);
    }

    function imageComplexe($mot,$font) {
        $size = 32;
        $marge = 15;

        $matrix_blur = array(
            array(1,1,1),
            array(1,1,1),
            array(1,1,1));
        $box = imagettfbbox($size, 0, $font, $mot);
        $largeur = $box[2] - $box[0];
        $hauteur = $box[1] - $box[7];
        $largeur_lettre = round($largeur/strlen($mot));
        $img = imagecreate($largeur+$marge, $hauteur+$marge);
        $blanc = imagecolorallocate($img, 255, 255, 255);
        $noir = imagecolorallocate($img, 0, 0, 0);
        $couleur = array(
            imagecolorallocate($img, 0x99, 0x00, 0x66),
            imagecolorallocate($img, 0xCC, 0x00, 0x00),
            imagecolorallocate($img, 0x00, 0x00, 0xCC),
            imagecolorallocate($img, 0x00, 0x00, 0xCC),
            imagecolorallocate($img, 0xBB, 0x88, 0x77));

        for($i = 0; $i < strlen($mot);++$i) {
            $l = $mot[$i];
            $angle = mt_rand(-35,35);
            imagettftext($img,mt_rand($size-7,$size),$angle,($i*$largeur_lettre)+$marge, $hauteur+mt_rand(0,$marge/2),$couleur[array_rand($couleur)], $font, $l);
        }

        imageline($img, 2,mt_rand(2,$hauteur), $largeur+$marge, mt_rand(2,$hauteur), $noir);
        imageline($img, 2,mt_rand(2,$hauteur), $largeur+$marge, mt_rand(2,$hauteur), $noir);

        imageconvolution($img, $matrix_blur,9,0);
        imageconvolution($img, $matrix_blur,9,0);

        imagepng($img);
        imagedestroy($img);
    }

function image($mot)
{
    $size = 32;
    $marge = 15;
    $font = 'fonts/angelina.ttf';

    $matrix_blur = array(
        array(1,1,1),
        array(1,1,1),
        array(1,1,1));

    $box = imagettfbbox($size, 0, $font, $mot);
    $largeur = $box[2] - $box[0];
    $hauteur = $box[1] - $box[7];
    $largeur_lettre = round($largeur/strlen($mot));

    $img = imagecreate($largeur+$marge, $hauteur+$marge);
    $blanc = imagecolorallocate($img, 255, 255, 255);
    $noir = imagecolorallocate($img, 0, 0, 0);

    $couleur = array(
        imagecolorallocate($img, 0x99, 0x00, 0x66),
        imagecolorallocate($img, 0xCC, 0x00, 0x00),
        imagecolorallocate($img, 0x00, 0x00, 0xCC),
        imagecolorallocate($img, 0x00, 0x00, 0xCC),
        imagecolorallocate($img, 0xBB, 0x88, 0x77));

    for($i = 0; $i < strlen($mot);++$i)
    {
        $l = $mot[$i];
        $angle = mt_rand(-35,35);
        imagettftext($img,mt_rand($size-7,$size),$angle,($i*$largeur_lettre)+$marge, $hauteur+mt_rand(0,$marge/2),$couleur[array_rand($couleur)], $font, $l);
    }

    imageline($img, 2,mt_rand(2,$hauteur), $largeur+$marge, mt_rand(2,$hauteur), $noir);
    imageline($img, 2,mt_rand(2,$hauteur), $largeur+$marge, mt_rand(2,$hauteur), $noir);

    imageconvolution($img, $matrix_blur,9,0);
    imageconvolution($img, $matrix_blur,9,0);

    imagepng($img);
    imagedestroy($img);
}

    function captcha() {
        if (empty($_SESSION['inscription']['tentatives'])) {
            $_SESSION['inscription']['tentatives'] = 1;
        } else {
            if ($_SESSION['inscription']['tentatives'] < 6) {
                $_SESSION['inscription']['tentatives'] += 1;
            }
        }

        $mot = nombre(mt_rand(3,8)).' '.nombre(mt_rand(3,8));
        $_SESSION['inscription']['captcha'] = $mot;
        
        $listeFontes = array();
        foreach (glob("fonts/*.ttf") as $filename) {
            $listeFontes[] = $filename;
        }
        shuffle($listeFontes);
        $font = $listeFontes[(mt_rand(0,(sizeof($listeFontes) - 1)))];

        switch (mt_rand(4,6)) {
            case 4 : {
                imagePoliceeBarree($mot,$font);
                break;
            }
            case 5 : {
                imageConvolueeBarree($mot,$font);
                break;
            }
            case 6 : {
                imageComplexe($mot,$font);
                break;
            }
        }

    }

    header("Content-type: image/png");
    captcha();
?>