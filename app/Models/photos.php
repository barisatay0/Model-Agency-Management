<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class photos extends Model
{
    use HasFactory;
    protected $table = 'photos';
    protected $primaryKey = 'photoid';

protected $fillable = [
    'modelid',
    'photopath',
    'photocategory',
    'photoorder',
];

}
