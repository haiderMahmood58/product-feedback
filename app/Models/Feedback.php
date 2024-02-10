<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Feedback extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'description', 'category'];

    public static $categories = ['bug', 'feature', 'improvement', 'other'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    protected static function boot() {
        parent::boot();

        static::creating(function ($feedback) {
            $feedback->user_id = Auth::id();
        });
    }
}
