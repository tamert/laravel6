<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\PostServices;

class PostController extends Controller
{

    /**
     * @var PostServices
     */
    protected $postServices;

    /**
     * PostController constructor.
     * @param PostServices $postServices
     */
    public function __construct(PostServices $postServices) {
        $this->postServices =  $postServices;
    }


    /**
     * @OA\Get(path="/",
     *   tags={"post"},
     *   summary="Post",
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke()
    {
        return $this->postServices->index();
    }

    /**
     * @OA\Get(path="/{id}",
     *   tags={"post"},
     *   summary="Post",
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
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        return $this->postServices->get($id);
    }


}
