<?php

namespace App\Exports;

use App\Models\Dashboard;
use Maatwebsite\Excel\Concerns\FromCollection;

class DashboardExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Dashboard::all();
    }
}
