<?php

namespace App\Http\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';

    protected $fillable = ["body","post_id","user_id"];

    public $timestamps = true;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function post() {
        return $this->hasOne(Comment::class, "id","post_id");
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

}
