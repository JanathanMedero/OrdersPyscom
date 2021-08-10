<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['equipment_id', 'complete_maintenance', 'preventive_maintenance', 'bios', 'virus', 'software_reinstallation', 'special_software', 'clean', 'printer_cleaning', 'head_maintenance', 'hardware','technical_name'];

    use HasFactory;

}
