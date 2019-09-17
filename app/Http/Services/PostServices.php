<?php


namespace App\Http\Services;
use App\Http\Repositories\PostRepository;
use Illuminate\Http\Response;


class PostServices
{

    /**
     * @var PostRepository
     */
    protected $postRepository;

    /**
     * HomeServices constructor.
     * @param PostRepository $postRepository
     */
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function index() {

        $items = $this->postRepository->getAll();

        return response()->json($items, Response::HTTP_OK);
    }

    public function get($id) {

        $items = $this->postRepository->get($id);

        return response()->json($items, Response::HTTP_OK);

    }

}
