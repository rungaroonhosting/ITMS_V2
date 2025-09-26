<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Incident extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'code','title','description','severity','status',
        'reporter_id','assignee_id','opened_at','resolved_at'
    ];

    public function reporter(){ return $this->belongsTo(User::class,'reporter_id'); }
    public function assignee(){ return $this->belongsTo(User::class,'assignee_id'); }
}
