<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ExportInvoice implements WithHeadings, WithStyles, FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */

    public function __construct($result)
    {
        $this->result = $result;
    }

    public function view(): View
    {
        return view('admin.Invoice.invoiceExport', [
            'result' => $this->result
        ]);
    }

    public function headings(): array
    {
        return ['Inv No', 'Customer Name', 'Address', 'Services', 'Inv Date', 'Inv Total Amt', 'Payment Id', 'Payment Status'];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1    => ['font' => ['bold' => true]],
        ];
    }
}
