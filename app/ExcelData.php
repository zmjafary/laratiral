<?php

namespace App;

use App\ExcelHeading;

use Illuminate\Database\Eloquent\Model;

class ExcelData extends Model
{
	protected $table = 'excel_data';

    protected $fillable = [
        'value', 'column_number', 'heading_id'
    ];

    public function excelHeading()
    {
        return $this->belongsTo(ExcelHeading::class, 'heading_id');
    }
}
