<?php

namespace App\Modules\VehicleModel\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use App\Modules\VehicleModel\Repositories\VehicleModelInterface;
use App\Modules\Brand\Repositories\BrandInterface;

class VehicleModelController extends Controller
{

    protected $brand;
    protected $vehiclemodel;
    
    public function __construct(BrandInterface $brand, VehicleModelInterface $vehiclemodel) 
    {
        $this->brand = $brand;
        $this->vehiclemodel = $vehiclemodel;
    }


    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    { 
        $search = $request->all();
        $data['model_info'] = $this->vehiclemodel->findAll($limit= 50,$search);  
        $data['brand_name'] = $this->brand->getList(); 
        $data['model_name'] = $this->vehiclemodel->getUniqueModel(); 
        return view('vehiclemodel::vehiclemodel.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $data['is_edit'] = false;
        $data['brand'] = $this->brand->getList(); 
        return view('vehiclemodel::vehiclemodel.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {

        $data = $request->all();  

        $variant_name = explode(',', $data['variant_name']);

        try{

            $modelData = array(
                'brand_id' => $data['brand_id'],
                'model_name' => $data['model_name']
            );

            $modelInfo = $this->vehiclemodel->save($modelData);
            $vehicle_model_id = $modelInfo->id;

                $countname = sizeof($variant_name);  
                for($i = 0; $i < $countname; $i++){
                    
                    if($data['variant_name']){ 

                         $variantdata['vehicle_model_id'] = $vehicle_model_id;
                         $variantdata['variant_name'] = $variant_name[$i];

                         $this->vehiclemodel->saveVariant($variantdata);
                    }
                }

            toastr()->success('Model and Variants Created Successfully');
        }catch(\Throwable $e){
            toastr()->error($e->getMessage());
        }
        
        return redirect(route('vehiclemodel.index'));

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('vehiclemodel::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $data['is_edit'] = true;
        $data['brand'] = $this->brand->getList();
        $data['vehiclemodel_info'] = $this->vehiclemodel->find($id);
        return view('vehiclemodel::vehiclemodel.edit',$data);
    }

    public function updateVar(Request $request){

        $data = $request->all();  

        $variant_name = explode(',', $data['variant_name']);

        try{

            $vehicle_model_id = $data['model_id'];

                $countname = sizeof($variant_name);  
                for($i = 0; $i < $countname; $i++){
                    
                    if($data['variant_name']){ 

                         $variantdata['vehicle_model_id'] = $vehicle_model_id;
                         $variantdata['variant_name'] = $variant_name[$i];

                         $this->vehiclemodel->saveVariant($variantdata);
                    }
                }

            toastr()->success('Variants Added Successfully');
        }catch(\Throwable $e){
            toastr()->error($e->getMessage());
        }
        
        return redirect()->back();

    }
    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request)
    {
       $data = $request->all();
        
        $id = $data['model_id'];
        try{

            $this->vehiclemodel->update($id,$data);
            toastr()->success('Model Title Updated Successfully');
            
        }catch(\Throwable $e){
           toastr()->error($e->getMessage());
        }
        
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    { 
        try{
            $this->vehiclemodel->delete($id);
            $this->vehiclemodel->deletevariantById($id);
             toastr()->success('Branch Deleted Successfully');
        }catch(\Throwable $e){
            toastr()->error($e->getMessage());
        }
      return redirect(route('vehiclemodel.index'));
    }    

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function deleteVar($id)
    {
        try{
            $this->vehiclemodel->deletevariant($id);
             toastr()->success('Variant Deleted Successfully');
        }catch(\Throwable $e){
             toastr()->error($e->getMessage());
        }
        return redirect()->back();
    }

}
