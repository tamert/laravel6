<?php


namespace App\Http\Repositories;
use App\Http\Models\Post;


class PostRepository extends BaseRepository
{
    /**
     * @var Post
     */
    protected $postModel;

    /**
     * PostRepository constructor.
     * @param Post $postModel
     */
    public function __construct(Post $postModel)
    {
        $this->postModel =  $postModel;
    }

    /**
     * @return Post[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAll() {
        return $this->postModel->with('user')->get();
    }

    /**
     * @param $id
     * @return Post|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object|null
     */
    public function get($id) {
        return $this->postModel->with(["comment", "user", "comment.user"])->where("id", $id)->first();
    }


}
