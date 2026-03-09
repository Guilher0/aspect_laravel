<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'module_id',
        'key',
        'base64_data',
        'alt_text',
    ];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }
}
