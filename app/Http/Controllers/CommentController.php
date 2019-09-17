<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\CommentServices;
use App\Http\Requests\CommentAddRequest;

class CommentController extends Controller
{

    /**
     * @var CommentServices
     */
    protected $commentServices;

    /**
     * CommentController constructor.
     * @param CommentServices $commentServices
     */
    public function __construct(CommentServices $commentServices) {
        $this->commentServices =  $commentServices;
    }


    /**
     * @OA\Patch(path="/add",
     *   tags={"comment"},
     *   summary="Comment",
     *   operationId="permission",
     * @OA\Response(
     *     response=200,
     *     description="",
     *     @OA\Schema(
     *       additionalProperties={
     *         "type":"integer",
     *         "format":"int32"
     *       }
     *     )
     *   ),
     *   security={{
     *     "api_key":{}
     *   }}
     * )
     */
    /**
     * @param CommentAddRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function add(CommentAddRequest $request)
    {
        return $this->commentServices->add($request->get('body'), $request->get('post_id'));
    }


}
