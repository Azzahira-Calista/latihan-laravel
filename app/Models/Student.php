<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['nis', 'nama', 'tanggal_lahir', 'kelas_id', 'alamat'];

    protected $guarded = ["id"];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    public function scopeFilter($query, array $filters){
        if(isset($filters['search']) ? $filters['search'] : false){
          return  $query->where('name', 'like', '%' . request('search') . '%');
        }
    }
}
