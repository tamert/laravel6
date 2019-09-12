<?php


namespace App\Http\Services;
use App\Http\Repositories\HomeRepository;


class HomeServices
{

    /**
     * @var HomeRepository
     */
    protected $homeRepository;

    /**
     * HomeServices constructor.
     * @param HomeRepository $homeRepository
     */
    public function __construct(HomeRepository $homeRepository)
    {
        $this->homeRepository = $homeRepository;
    }

    public function index() {
        $items = $this->homeRepository->getAll();
        return view('home', ["items" => $items]);
    }

    public function add($title) {
        if($this->homeRepository->insert($title)) {
            return redirect()->back()->with('message', 'IT WORKS!');
        }
    }

}
