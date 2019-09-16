<?php

namespace App\Imports;
// use App\Services\ExcelService;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ExcelImport implements ToCollection
{
    public function __construct()
    {
        $this->excelService = app('App\Services\ExcelService');
    }

    public function collection(Collection $rows)
    {
        $headings = $rows[0];

        foreach ($headings as $index => $heading) 
        {
           $this->excelService->createHeading(['value' => $heading, 'column_number' => $index]);
        }

        foreach ($rows as $index => $row) 
        {   
            if($index != 0)
            {
                foreach ($row as $colNo => $data) {
                    $heading = $this->excelService->getHeading($colNo);

                    $this->excelService->createHeadingData(['value' => $data, 'column_number' => $colNo, 'heading_id' => $heading->id]);
                } 
            }                      
        }
    }
}