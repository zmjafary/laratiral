<?php
   
namespace App\Http\Controllers;
use App\Services\ExcelService;
use App\Imports\ExcelImport;
use App\Http\Requests\UploadExcel;

class ExcelController extends Controller
{
    public function __construct(ExcelService $excelService)
    {
        $this->excelService = $excelService;
    }

    public function index()
    {
        return view('excel.index');
    }

    public function import(UploadExcel $request)
    {
        $this->excelService->importExcel($request);

        return back();
    }

    public function vueApi()
    {
        return [
            'headings' => $this->excelService->getHeadings(),
            'headingData' => $this->excelService->getHeadingData()
        ];
    }
}