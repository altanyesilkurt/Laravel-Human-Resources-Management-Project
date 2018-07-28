<?php

namespace App\Exports;


use App\Reports\SmsReport;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Illuminate\Database\Query\Builder;

class SmsReportExport implements FromQuery, WithStrictNullComparison, WithMapping, WithColumnFormatting
{
    use Exportable;
    /**
     * @param mixed $row
     *
     * @return array
     */
    public function map($report): array
    {
        $providerName = null;
        if (!empty($report->smsProvider->name)) {
            $providerName = $report->smsProvider->name;
        }
        if ($report->type == 2)
        {
            $report->type = "install sms credit";
        } else
            $report->type = "send sms";
         if (!is_null($report->status) && $report->status == 0) {
               $report->status= "unsuccessful";
           } elseif ($report->status && $report->status == 1)
               $report->status= "successful";
           else
               $report->status=null;
        return [
            $report->id,
            $report->tenant->name,
            $providerName,
            $report->type,
            $report->to,
            $report->status,
            $report->created_at
        ];
    }
    /**
     * @return Builder
     */
    public function query()
    {
        return (new SmsReport())->getQuery(request());
    }
    public function columnFormats(): array
    {
        return [
            'E' => NumberFormat::FORMAT_NUMBER
        ];
    }
}