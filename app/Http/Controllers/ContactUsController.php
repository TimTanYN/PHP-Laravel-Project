<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function indexs() {
          $xml = simplexml_load_file(resource_path('views/movie/contact_us.xml'));
        $xsl = simplexml_load_file(resource_path('views/movie/contact_us.xsl'));

        $processor = new \XSLTProcessor();
        $processor->importStylesheet($xsl);

        $output = $processor->transformToXml($xml);

        return response($output)->header('Content-Type', 'text/html');
    }
    
    function info(){
        return view('movie.info');
    }
}
