<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use HasFactory, SoftDeletes;

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
