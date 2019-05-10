<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ImageController
{
    /**
     * @Route("/upload")
     */
    public function uploadAction(Request $request)
    {
        $file = $request->files->get('file');
        $status = array('status' => "success","fileUploaded" => false);
        if(!is_null($file)){
            $filename = $file->getClientOriginalName();
            $path = "/shop-frontend/public/images/";
            $file->move($path, $filename);
            $status = ['status' => "success","fileUploaded" => true];
        }

        return new JsonResponse($status);
    }
}