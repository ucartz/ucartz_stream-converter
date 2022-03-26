<?php

namespace RadioStream;

use Illuminate\Database\Eloquent\Model;

class SoftwareManagement extends Model
{
    protected $fillable = [
        'name', 'photo','status',
    ];
    protected $table = 'software_management';
    protected $primaryKey = 'id';
}
