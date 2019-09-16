<?php

namespace App;

use App\ExcelData;

use Illuminate\Database\Eloquent\Model;

class ExcelHeading extends Model
{
    protected $fillable = [
        'value', 'column_number'
    ];

	public function excelData()
    {
        return $this->hasMany(ExcelData::class);
    }
}
