<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'original_name',
        'path',
        'mime_type',
        'size',
        'folder_id',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function folder(): BelongsTo
    {
        return $this->belongsTo(Folder::class);
    }
    public function shares()
    {
        return $this->hasMany(Share::class);
    }

    public function sharedWith()
    {
        return $this->belongsTo(User::class, 'shares', 'file_id', 'user_id');
    }
}
