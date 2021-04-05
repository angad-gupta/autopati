<?php

namespace App\Modules\Subscription\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use App\Modules\Subscription\Repositories\SubscriptionInterface;

class SubscriptionController extends Controller
{

    protected $subscription;
    
    public function __construct(SubscriptionInterface $subscription) 
    {
        $this->subscription = $subscription;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */

     
    public function index()
    {
        $data['subscriptions'] = $this->subscription->findAll($limit= 50);  
        return view('subscription::subscription.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('subscription::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('subscription::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('subscription::edit');
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
            $this->subscription->delete($id);
             toastr()->success('Subscription Deleted Successfully');
        }catch(\Throwable $e){
            toastr()->error($e->getMessage());
        }
      return redirect(route('subscription.index'));
    
    }
}
