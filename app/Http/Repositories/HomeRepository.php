<?php


namespace App\Http\Repositories;
use App\Http\Models\Home;


class HomeRepository extends BaseRepository
{
    /**
     * @var Home
     */
    protected $homeModel;

    /**
     * HomeRepository constructor.
     * @param Home $homeModel
     */
    public function __construct(Home $homeModel)
    {
        $this->homeModel =  $homeModel;
    }

    /**
     * @return Home[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAll() {
        return $this->homeModel->all();
    }

    public function insert($title) {
        return $this->homeModel->insertGetId(['title' => $title]);
    }

}
