<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $title = 'Category';
    protected $page = 'category';
    protected  $form = ['name'=>'text'];
    protected $edit = ['name'];
    protected $field = ['nama_kategori'];
    protected $heads = ['Category'];
    protected $key = 'id';
    protected $tr = ['nama_kategori'];

    public function data_json(){
        
    }

    public function index()
    {
        //
        $data = Category::all();
        $heads = $this->heads;
        $fields = $this->field;
        $key = $this->key;
        $page = $this->page;
        $title = $this->title;
                $tr = $this->tr;
        return view('admin/page/view',compact('heads','data','fields','key','page','title','tr'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $form = $this->form;
        $title =$this->title;
        $page = $this->page;
        return view('admin/page/create',compact('form','title','page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $class = new Category;
        $edit = $this->edit;
        foreach ($this->field as $field =>$val) {
            $name = $edit[$field];

            $class->$val = $request->$name;

// echo $val;
        }

        $class->save();

        return redirect('admin/category')->with('info','Success');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = Category::find($id);

        $form = $this->form;
        $edit = $this->edit;
        $field = $this->field;
        $page = $this->page;
        $id = $id;
        $title = $this->title;
        return view('admin/page/'.$this->page.'/edit',compact('form','edit','data','field','page','id','title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $class = Category::find($id);
        $edit = $this->edit;
         foreach ($this->field as $field =>$val) {
            $name = $edit[$field];

            $class->$val = $request->$name;

// echo $val;
        }

        $class->save();

        return redirect('admin/category')->with('info','Success');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $class = Category::find($id);
        $class->delete();
        return redirect('admin/category')->with('info','Success');

    }
}
