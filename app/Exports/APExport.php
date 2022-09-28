<?php

namespace App\Exports;

use App\Models\Dashboard;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class APExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return ["NO", "APMAC", "APSN", "APTYPE", "APNAME", "LOCATION", "TREG", "WITEL"];
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return collect(Dashboard::getAllAPDown());
    }
}
