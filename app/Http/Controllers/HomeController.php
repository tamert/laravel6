<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Home;
use App\Http\Services\HomeServices;

class HomeController extends Controller
{

    /**
     * @var Home
     */
    protected $homeServices;

    /**
     * HomeController constructor.
     * @param Home $homeServices
     */
    public function __construct(HomeServices $homeServices) {
        $this->homeServices =  $homeServices;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke()
    {
        return $this->homeServices->index();
    }

    public function add(Request $request) {
        return $this->homeServices->add($request->get('title'));
    }


}
