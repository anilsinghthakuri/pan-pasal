<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companydata extends Model
{
    use HasFactory;
    protected $table = 'companydatas';
    protected $primaryKey = 'company_id';
}
