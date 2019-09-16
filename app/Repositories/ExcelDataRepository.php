<?php

namespace App\Repositories;

use App\ExcelData;

class ExcelDataRepository
{
  protected $excelData;

  public function __construct(ExcelData $excelData)
  {
    $this->excelData = $excelData;
  }
  
  public function all()
  {
    return $this->excelData->all();
  }

  public function create($attributes)
  {
    return $this->excelData->create($attributes);
  }

  public function delete()
  {
    return $this->excelData->whereNotNull('id')->delete();
  }
}