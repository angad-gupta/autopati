<?php

namespace App\Modules\Spec\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use App\Modules\Spec\Repositories\SpecInterface;

class SpecController extends Controller
{
    protected $spec;
    
    public function __construct(SpecInterface $spec)
    {
        $this->spec = $spec;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    { 
        $search = $request->all();
        $data['spec_info'] = $this->spec->findAll($limit= 50,$search);  
        return view('spec::spec.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $data['is_edit'] = false;
        return view('spec::spec.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        
         try{
            $this->spec->save($data);
            toastr()->success('Spec Created Successfully');
        }catch(\Throwable $e){
            toastr($e->getMessage())->error();
        }
        
        return redirect(route('spec.index'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('spec::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $data['is_edit'] = true;
        $data['spec_info'] = $this->spec->find($id);
        return view('spec::spec.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
       $data = $request->all();
        
        try{

            $this->spec->update($id,$data);
             toastr()->success('Spec Updated Successfully');
        }catch(\Throwable $e){
           toastr($e->getMessage())->error();
        }
        
        return redirect(route('spec.index'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        try{
            $this->spec->delete($id);
             toastr()->success('Spec Deleted Successfully');
        }catch(\Throwable $e){
            toastr($e->getMessage())->error();
        }
      return redirect(route('spec.index'));
    }
}
