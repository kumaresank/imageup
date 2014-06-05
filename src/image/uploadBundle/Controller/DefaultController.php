<?php

namespace image\uploadBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('imageuploadBundle:Default:index.html.html');
    }

     public function uploadAction(Request $request)
    {
         if ($request->getMethod() == 'POST')
         {
   $targ_w_150 = $targ_h_150 = 150; 
   $targ_w_128 = $targ_h_128 = 128;
   $targ_w_64 = $targ_h_64 = 64;
   $x = trim($request->get('x'),"px");
   $y = trim($request->get('y'),"px");
   $w = trim($request->get('w'),"px");
   $h = trim($request->get('h'),"px"); 
   $src = $request->files->get('image');
   list($width, $height) = getimagesize($src);
   $img_r = imagecreatefromjpeg($src);
   $rsize = ImageCreateTrueColor( 300, 300);
   imagecopyresampled($rsize,$img_r,0,0,0,0, 300,300,$width,$height);
   header('Content-type: image/jpeg'); 
   //imagejpeg($rsize,null,100);
   imagejpeg($rsize,'tmp.jpeg',100);
   $rsize_r = imagecreatefromjpeg('tmp.jpeg');
   $dst_r_150 = ImageCreateTrueColor( $targ_w_150, $targ_h_150);
   $dst_r_128 = ImageCreateTrueColor( $targ_w_128, $targ_h_128);
   $dst_r_64 = ImageCreateTrueColor( $targ_w_64, $targ_h_64);
   imagecopyresampled($dst_r_150,$rsize_r,0,0,$x,$y, $targ_w_150,$targ_h_150,$w,$h); 
   imagecopyresampled($dst_r_128,$rsize_r,0,0,$x,$y, $targ_w_128,$targ_h_128,$w,$h); 
   imagecopyresampled($dst_r_64,$rsize_r,0,0,$x,$y, $targ_w_64,$targ_h_64,$w,$h); 
   //imagecopyresampled($dst_r,$rsize_r,0,0,50,50, $targ_w,$targ_h,200,200); 
   $data = "";
   imagejpeg($dst_r_150,'images/profile_150.jpeg',100); 
   imagejpeg($dst_r_128,'images/profile_128.jpeg',100);
   imagejpeg($dst_r_64,'images/profile_64.jpeg',100);
   return $data;
    }
  }
}
