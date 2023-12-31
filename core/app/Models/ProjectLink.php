<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectLink extends Model
{
    use HasFactory;


    public function social()
    {
        return $this->belongsTo(SocialLink::class, 'sociallink_id','id');
    }
}
