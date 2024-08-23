<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    function salesReport(Request $request)
    {
        $user_id = $this->getUserId($request);
        $fromDate = date('Y-m-d', strtotime($request->fromDate));
        $toDate = date('Y-m-d', strtotime($request->toDate));

        $total = Invoice::where('user_id', $user_id)->whereBetween('created_at', [$fromDate, $toDate])->sum('total');
        $vat = Invoice::where('user_id', $user_id)->whereBetween('created_at', [$fromDate, $toDate])->sum('vat');
        $discount = Invoice::where('user_id', $user_id)->whereBetween('created_at', [$fromDate, $toDate])->sum('discount');
        $payable = Invoice::where('user_id', $user_id)->whereBetween('created_at', [$fromDate, $toDate])->sum('payable');
        $invoices = Invoice::where('user_id', $user_id)->whereBetween('created_at', [$fromDate, $toDate])->with('customer')->get();

        $report = [
            'total' => $total,
            'vat' => $vat,
            'discount' => $discount,
            'payable' => $payable,
            'invoices' => $invoices,
            'fromDate' => $fromDate,
            'toDate' => $toDate
        ];

        $pdf = Pdf::loadView('reports.sales-report', $report);
        return $pdf->download('sales-report.pdf');

        // for buffer string
        //$pdfContent = $pdf->download('invoice.pdf')->getOriginalContent();
        //$base64Pdf = base64_encode($pdfContent);
        //return $base64Pdf;
    }
}