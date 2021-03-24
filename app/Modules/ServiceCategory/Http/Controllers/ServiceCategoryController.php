<?php

namespace App\Modules\ServiceCategory\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use App\Modules\ServiceCategory\Repositories\ServiceCategoryInterface;

class ServiceCategoryController extends Controller
{
    protected $service_category;
    
    public function __construct(ServiceCategoryInterface $service_category) 
    {
        $this->service_category = $service_category;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */

    public function index(Request $request)
    { 
        $search = $request->all();
        $data['service_category'] = $this->service_category->findAll($limit= 50,$search);  
        return view('servicecategory::servicecategory.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('servicecategory::servicecategory.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $data = $request->all();
        try{
           $this->service_category->save($data);

           toastr()->success('Service Category Created Successfully');
       }catch(\Throwable $e){
           toastr($e->getMessage())->error();
       }
       
       return redirect(route('servicecategory.index'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('servicecategory::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $data['servicecategory_info'] = $this->service_category->find($id);
        return view('servicecategory::servicecategory.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        
        try{

            $this->service_category->update($id,$data);

            toastr()->success('Service Category Updated Successfully');
            
        }catch(\Throwable $e){
           toastr($e->getMessage())->error();
        }
        
        return redirect(route('servicecategory.index'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        try{
            $this->service_category->delete($id);
             toastr()->success('Service Category Deleted Successfully');
        }catch(\Throwable $e){
            toastr($e->getMessage())->error();
        }
      return redirect(route('servicecategory.index'));
    }
}
