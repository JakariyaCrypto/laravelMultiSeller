<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Models\backend\admin\Banner;
 use Barryvdh\DomPDF\Facade\PDF;

class PdfController extends Controller
{
    public function pdfView()
    {
    	$banners = Banner::all();
    	return view('backend/admin/banner/pdf_convert',compact('banners'));
    }

    public function pdfGenerate()
    {
    	$banners = Banner::all();
    	$pdf = PDF::loadView('backend.admin.banner.pdf_convert', compact('banners'));
    	return $pdf->download('invoice.pdf');
    }
}
