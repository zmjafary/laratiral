<?php

namespace App\Repositories;

use App\ExcelHeading;

class ExcelHeadingRepository
{
  protected $excelHeading;

  public function __construct(ExcelHeading $excelHeading)
  {
    $this->excelHeading = $excelHeading;
  }
  
  public function all()
  {
    return $this->excelHeading->all();
  }

  public function findByCol($column_number)
  {
    return $this->excelHeading->where('column_number', $column_number)->first();
  }

  public function create($attributes)
  {
    return $this->excelHeading->create($attributes);
  }

  public function delete()
  {
    return $this->excelHeading->whereNotNull('id')->delete();
  }
}