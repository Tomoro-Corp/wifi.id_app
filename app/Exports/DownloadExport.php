<?php

namespace App\Exports;

use App\Models\Dashboard;
use App\Models\Download;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DownloadExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Download::all();
    }
    public function headings(): array

    {

        return ["Idx", "AP_SN", "AP_MAC", "AP_Name", "AP Location", "J00", "J01", "J02", "J03", "J04", "J04", "J05", "J06", "J07", "J08", "J09", "J10", "J11", "J12", "J13", "J14", "J15", "J16", "J17", "J18", "J19", "J20", "J21", "J22", "J23", "Total"];
    }
}
