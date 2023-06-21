<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PositionModel extends Model
{
    use HasFactory;

    protected $table = 'position';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'position_name',
        'created_at',
        'updated_at',
    ];

    public function GetDataPosition()
    {
        $tbl_position = PositionModel::select('id', 'position_name')->get();
        return $tbl_position;
    }

}
