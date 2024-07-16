<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
         $xml = new \DOMDocument();
        $xml->load(resource_path('views/movie/faq.xml'));

        $xsl = new \DOMDocument();
        $xsl->load(resource_path('views/movie/faq.xsl'));

        $processor = new \XSLTProcessor();
        $processor->importStylesheet($xsl);

        $html = $processor->transformToXML($xml);

        return response($html)->header('Content-Type', 'text/html');
    }
}
