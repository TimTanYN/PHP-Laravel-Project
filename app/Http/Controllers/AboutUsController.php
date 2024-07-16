<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use XSLTProcessor;

class AboutUsController extends Controller
{
    public function show()
    {
        // Load XML and XSL files
          $xml = simplexml_load_file(resource_path('views/aboutUs/aboutUs.xml'));
        $xsl = simplexml_load_file(resource_path('views/aboutUs/aboutUs.xsl'));
    

        // Create an XSLT processor
        $processor = new \XSLTProcessor();
        $processor->importStylesheet($xsl);

        $output = $processor->transformToXml($xml);

        return response($output)->header('Content-Type', 'text/html');
    }
}

