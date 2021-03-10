<?php

namespace App\Modules\News\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use App\Modules\News\Repositories\NewsInterface;

class NewsController extends Controller
{
    protected $news;
    
    public function __construct(NewsInterface $news)
    {
        $this->news = $news;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    { 
        $search = $request->all();
        $data['news_info'] = $this->news->findAll($limit= 50,$search);  
        return view('news::news.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $data['is_edit'] = false;
        return view('news::news.create',$data);
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
            if ($request->hasFile('news_image')) {
                $data['news_image'] = $this->news->upload($data['news_image']);
            }
            $data['date'] = date('Y-m-d');
            $this->news->save($data);
            toastr()->success('News Created Successfully');
        }catch(\Throwable $e){
            toastr($e->getMessage())->error();
        }
        
        return redirect(route('news.index'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('news::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $data['is_edit'] = true;
        $data['news_info'] = $this->news->find($id);
        return view('news::news.edit',$data);
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

            if ($request->hasFile('news_image')) {
                $data['news_image'] = $this->news->upload($data['news_image']);
            }

            $this->news->update($id,$data);
             toastr()->success('News Updated Successfully');
        }catch(\Throwable $e){
           toastr($e->getMessage())->error();
        }
        
        return redirect(route('news.index'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        try{
            $this->news->delete($id);
             toastr()->success('News Deleted Successfully');
        }catch(\Throwable $e){
            toastr($e->getMessage())->error();
        }
      return redirect(route('news.index'));
    }

}
