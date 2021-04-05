<?php

namespace App\Modules\ServiceManagement\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use App\Modules\ServiceManagement\Repositories\ServiceManagementInterface;

class ServiceManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */

    protected $service_management;
    
    public function __construct(ServiceManagementInterface $service_management) 
    {
        $this->service_management = $service_management;
    }

    public function index()
    {
        $data['service_info'] = $this->service_management->findAll($limit= 50);  

        return view('servicemanagement::servicemanagement.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $data['is_edit'] = false;
        $data['category'] = $this->service_management->getListCategory(); 
        return view('servicemanagement::servicemanagement.create',$data);
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
           if ($request->hasFile('cover_image')) {
               $data['cover_image'] = $this->service_management->upload($data['cover_image']);
           }
           $this->service_management->save($data);
           toastr()->success('Service Created Successfully');

       }catch(\Throwable $e){
           toastr()->error($e->getMessage());
       }
       
       return redirect(route('servicemanagement.index'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('servicemanagement::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $data['is_edit'] = true;
        $data['service_info'] = $this->service_management->find($id);
        $data['category'] = $this->service_management->getListCategory(); 
        return view('servicemanagement::servicemanagement.edit',$data);
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

            if ($request->hasFile('cover_image')) {
                $data['cover_image'] = $this->service_management->upload($data['cover_image']);
            }

            $this->service_management->update($id,$data);

            toastr()->success('Service Updated Successfully');
            
        }catch(\Throwable $e){
           toastr()->error($e->getMessage());
        }
        
        return redirect(route('servicemanagement.index'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        try{
            $this->service_management->delete($id);
             toastr()->success('Service Deleted Successfully');
        }catch(\Throwable $e){
            toastr()->error($e->getMessage());
        }
      return redirect(route('servicemanagement.index'));
    }
    
}
