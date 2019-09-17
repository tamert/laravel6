<?php


namespace App\Http\Repositories;
use App\Http\Models\Comment;
use Illuminate\Support\Facades\Auth;


class CommentRepository extends BaseRepository
{
    /**
     * @var Comment
     */
    protected $commentModel;

    /**
     * CommentRepository constructor.
     * @param Comment $commentModel
     */
    public function __construct(Comment $commentModel)
    {
        $this->commentModel =  $commentModel;
    }

    /**
     * @return Comment[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAllPostComment($postId) {
        return $this->commentModel->where('post_id', $postId)->get();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function get($id) {
        return $this->commentModel->where("id", $id)->first();
    }

    /**
     * @param $body
     * @param $postId
     * @return mixed
     */
    public function add($body, $postId) {
        return $this->commentModel->firstOrCreate([
            'post_id' => $postId,
            'body' => $body,
            'user_id' => Auth::user()->id
        ]);
    }

}
