<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    const APROBADO = 'APROBADO';
    const PENDIENTE = 'PENDIENTE'; //default
    const RECHAZADO = 'RECHAZADO';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'publication_id', 'content', 'status', 'user_id',
    ];

    public function publication()
    {
        return $this->belongsTo(Publication::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
