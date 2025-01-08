<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'tbl_posts'; // Nama tabel di database

    protected $fillable = [
        'title', 'slug', 'user_id', 'content', 'image', 'hits', 'aktif', 'status', 'created_at', 'updated_at'
    ]; // Kolom yang dapat diisi menggunakan mass assignment

    /**
     * Relasi dengan tabel user (contoh relasi one-to-many).
     * Sesuaikan dengan model User jika ada.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

