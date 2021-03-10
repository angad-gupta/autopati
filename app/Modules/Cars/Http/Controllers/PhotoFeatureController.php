<?php

namespace App\Modules\Cars\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use App\Modules\Cars\Repositories\CarInterface;

class PhotoFeatureController extends Controller
{
    protected $cars;
    
    public function __construct(CarInterface $cars)
    {
        $this->cars = $cars;
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $input = $request->all();

         try{

            if ($request->hasFile('feature_image')) {
                $input['feature_image'] = $this->cars->uploadFeature($input['feature_image']);
            }

            $this->cars->saveFeature($input);
            toastr()->success('Car Feature Created Successfully');
        }catch(\Throwable $e){
            toastr()->error($e->getMessage());
        }
        
        return redirect()->back();

    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function storeGallery(Request $request)
    {
        $input = $request->all(); 

         $folder_files = $request->file('car_images');

         try{

            $gallery = array(

                'car_id' => $input['car_id'],
                'gallery_title' => $input['gallery_title']

            );
            $galleryData = $this->cars->saveGallery($gallery);
            $gallery_id = $galleryData->id;

            if($request->hasfile('car_images')){

            $carImage = $this->cars->uploadMultiImages($folder_files, 'car_images');

            foreach ($carImage as $image) {

                $ImageData =
                    [
                        'car_gallery_id' => $gallery_id,
                        'car_image_path' => $image,
                    ];
                 $this->cars->saveGalleryImage($ImageData);
            }
             toastr()->success('Files Uploaded Successfully');
         }

        }catch(\Throwable $e){
            toastr()->error($e->getMessage());
        }
        
        return redirect()->back();

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('cars::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('cars::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        try{
            $this->cars->deleteFeature($id);
             toastr()->success('Car Feature Deleted Successfully');
        }catch(\Throwable $e){
            toastr($e->getMessage())->error();
        }
        return redirect()->back();
    }

    public function deleteGalleryImage(Request $request){
        $input = $request->all();
        $gallery_image_id = $input['gallery_image_id'];
        try{
            $this->cars->deletegalleryImage($gallery_image_id);
             toastr()->success('Car Feature Deleted Successfully');
        }catch(\Throwable $e){
            toastr($e->getMessage())->error();
        }
        return redirect()->back();
    }
}
