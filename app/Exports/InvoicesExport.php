<?php
namespace App\Exports;
use App\Employee;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
class InvoicesExport implements FromCollection
{ use Exportable;
    public function collection()
    {
        return Employee::all();
    }
}