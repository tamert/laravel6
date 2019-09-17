<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Post extends Model
{
    protected $table = 'post';

    protected $fillable = ["title","body","user_id"];

    public $timestamps = true;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comment() {
        return $this->hasMany(Comment::class, "post_id","id");
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user() {
        return $this->hasOne(User::class, "id","user_id");
    }

}
