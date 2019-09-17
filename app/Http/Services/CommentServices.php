<?php


namespace App\Http\Services;
use Illuminate\Http\Response;
use App\Http\Repositories\CommentRepository;

class CommentServices
{

    /**
     * @var CommentRepository
     */
    protected $commentRepository;

    /**
     * HomeServices constructor.
     * @param CommentRepository $commentRepository
     */
    public function __construct(CommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    public function index() {

        $items = $this->commentRepository->getAll();

        return response()->json($items, Response::HTTP_OK);

    }

    public function add($body, $postId) {

        try{
            $i = $this->commentRepository->add($body, $postId);
            return response()->json($i, Response::HTTP_OK);
        }
        catch (Illuminate\Database\QueryException $e){
            return response()->json($e->errorInfo, Response::HTTP_BAD_REQUEST);
        }

    }

}
