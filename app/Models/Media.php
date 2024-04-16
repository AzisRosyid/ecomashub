<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = [
        'type',
        'provider',
        'content'
    ];

    public function url()
    {
        if ($this->provider == 'Google Drive') {
            if ($this->type == 'Gambar') {
                return "https://drive.google.com/thumbnail?id=" . $this->content;
            } else if ($this->type == 'File') {
                return "https://drive.google.com/file/d/" . $this->content . '/view';
            }
        }
        return $this->content;
    }

    use HasFactory;
}
