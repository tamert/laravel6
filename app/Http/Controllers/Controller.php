<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
/**
 * @OA\SecurityScheme(
 *     type="oauth2",
 *     name="petstore_auth",
 *     securityScheme="bearerAuth",
 *     @OA\Flow(
 *         flow="password",
 *         authorizationUrl="http://localhost:8000/api/authorizations",
 *         scopes={
 *             "write:pets": "modify pets in your account",
 *             "read:pets": "read your pets",
 *         }
 *     )
 * )
 */

/**
 * @OA\OpenApi(
 *     @OA\Info(
 *         version="1.0.0",
 *         title=" API",
 *         description="Vargonen Demo Blog",
 *         @OA\Contact(
 *             email="farerock@gmail.com"
 *         )
 *     ),
 *     @OA\Server(
 *         description="Api Host",
 *         url="http://localhost/api/"
 *     ),
 *     @OA\PathItem(
 *         path="http://localhost/api/"
 *     ),
 * )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
