<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class PdfController extends Controller
{
    public function quotePdf(Quote $quote)
    {
        $customPaper = array(0, 0, 1012.507086613695, 809.9999999996175);

        // Streaming PDF
        // $pdf = App::make('dompdf.wrapper');
        // $pdf->loadHTML('<h1>Test</h1>');
        // return $pdf->stream();

        // Downloading PDF
        // $pdf = App::make('dompdf.wrapper');
        // $pdf->loadHTML('<h1>Test</h1>');
        // return $pdf->download();

        // $pdf = Pdf::loadView('pdf.quote');
        // return $pdf->stream();

        // $pdf = Pdf::loadView('pdf.quote', compact('quote'));
        // return $pdf->stream();
        return Pdf::loadView('pdf.quote', compact('quote'))->setPaper($customPaper, 'landscape')->save('my_stored_file.pdf')->stream(date('Q-his') . ".pdf");
    }
}
