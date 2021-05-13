<?php

namespace App\Modules\Configuration\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use App\Modules\Configuration\Repositories\ConfigurationInterface;
use App\Modules\Spec\Repositories\SpecInterface;
use Maatwebsite\Excel\Facades\Excel;

class ConfigurationController extends Controller
{
    protected $configuration;
    protected $spec;
    
    public function __construct(ConfigurationInterface $configuration,SpecInterface $spec)
    {
        $this->configuration = $configuration;
        $this->spec = $spec;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $data['spec'] = $this->spec->findAll();  
        return view('configuration::configuration.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(Request $request)
    {
        $data = $request->all();
        $data['spec_id']= $spec_id = $data['spec_id'];
        $data['spec'] = $this->spec->find($spec_id);  
        $data['is_edit'] = false;
        return view('configuration::configuration.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $data = $request->all(); 

        $config_value = explode(',', $data['config_value']);

        try{

            $configData = array(
                'spec_id' => $data['spec_id'],
                'title' => $data['title']
            );

            $configInfo = $this->configuration->save($configData);
            $config_id = $configInfo->id;

                $countname = sizeof($config_value);
                for($i = 0; $i < $countname; $i++){
                    
                    if($data['config_value']){  

                         $configValdata['configuration_id'] = $config_id;
                         $configValdata['config_value'] = $config_value[$i];

                         $this->configuration->saveConfigVal($configValdata);
                    }
                }

            toastr()->success('Configuration Created Successfully');
        }catch(\Throwable $e){
            toastr($e->getMessage())->error();
        }
        
        return redirect(route('configuration.index'));
        
    }

    public function excelStore(Request $request)
    {
      
        try{
            Excel::import(new FeatureImport, $request->excelfile);

            toastr()->success('Feature Excel Uploaded Successfully');
        }catch(\Throwable $e){
            toastr()->error($e->getMessage());
        }
        
        return redirect(route('configuration.index'));
        
    }


    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function view(Request $request)
    {
        $input = $request->all();
        $data['spec_id'] = $spec_id = $input['spec_id'];
        $data['spec'] = $this->spec->find($spec_id);  

        $data['configInfo'] = $this->configuration->findAllBySpecId($spec_id);  
        return view('configuration::configuration.view',$data);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('configuration::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request)
    {

        $data = $request->all(); 

        $config_value = explode(',', $data['config_value']);

        try{

            $config_id = $data['config_id'];

                $countname = sizeof($config_value);  
                for($i = 0; $i < $countname; $i++){
                    
                    if($data['config_value']){  

                         $configValdata['configuration_id'] = $config_id;
                         $configValdata['config_value'] = $config_value[$i];

                         $this->configuration->saveConfigVal($configValdata);
                    }
                }

            toastr()->success('Configuration Inserted Successfully');
        }catch(\Throwable $e){  
            toastr($e->getMessage())->error();
        }
        
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }

     /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function deleteVal($id)
    {
         try{
            $this->configuration->deleteVal($id);
             toastr()->success('Features Deleted Successfully');
        }catch(\Throwable $e){
            toastr($e->getMessage())->error();
        }
        return redirect()->back();
    }
}
