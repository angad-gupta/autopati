<?php

namespace App\Modules\Home\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use App\Modules\Cars\Repositories\CarInterface;
use App\Modules\Spec\Repositories\SpecInterface;

class HomeController extends Controller
{

    protected $cars;
    protected $spec;
    
    public function __construct(CarInterface $cars, SpecInterface $spec) 
    {
        $this->cars = $cars;
        $this->spec = $spec;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('home::home.index');
    }

    public function carDetail($car_id)
    {
        $data['car'] = $this->cars->find($car_id);
        $data['photo_feature'] = $this->cars->getPhotoFeatures($car_id);
        $data['photo_gallery'] = $this->cars->getPhotoGallery($car_id);
        $data['car_spec'] = $this->spec->getAllCarSpec();
        $data['car_color'] = $this->cars->getColorByCarId($car_id);
        $data['views'] = $this->cars->countViews($car_id);

        return view('home::home.detail',$data);
    }
}
