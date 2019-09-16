<?php

namespace App\Services;

use App\Repositories\ExcelHeadingRepository;
use App\Repositories\ExcelDataRepository;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ExcelImport;
use App\Http\Requests\UploadExcel;

class ExcelService
{
  public function __construct(ExcelHeadingRepository $excelHeadingRepository, ExcelDataRepository $excelDataRepository)
  {
    $this->excelHeadingRepository = $excelHeadingRepository;
    $this->excelDataRepository = $excelDataRepository;
  }

  public function getHeadings()
  {
    return $this->excelHeadingRepository->all();
  }

  public function getHeadingData()
  { 
    return $this->excelDataRepository->all();
  }

  public function createHeading($attributes)
  {
    return $this->excelHeadingRepository->create($attributes);
  }

  public function getHeading($column_number)
  {
    return $this->excelHeadingRepository->findByCol($column_number);
  }

  public function createHeadingData($attributes)
  {
    return $this->excelDataRepository->create($attributes);
  }

  public function delete()
  { 
    $this->excelHeadingRepository->delete();
    $this->excelDataRepository->delete();
  }

  public function importExcel(UploadExcel $request)
  {
    $this->delete();

    return Excel::import(new ExcelImport, request()->file('file'));
  }  
}