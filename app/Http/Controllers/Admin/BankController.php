<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Bank;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $title = 'Bank';
    protected $page = 'bank';
    protected  $form = ['bank'=>'text','name'=>'text','rekening'=>'number'];
    protected $edit = ['bank','rekening','name'];
    protected $field = ['bank_name','rekening','name'];
    protected $heads = ['Bank','Atas Nama','rekening'];
    protected $key = 'id';
    protected $tr = ['bank_name','name','rekening'];
    
    public function __construct()
    {
        $this->middleware('isAdmin');
    }
    public function data_json(){
        
    }

    public function index()
    {
        //
        $data = Bank::all();
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

        $class = new Bank;
        $edit = $this->edit;
        foreach ($this->field as $field =>$val) {
            $name = $edit[$field];

            $class->$val = $request->$name;

// echo $val;
        }

        $class->save();

        return redirect('admin/bank')->with('info','Success');

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
        $data = Bank::find($id);

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
        $class = Bank::find($id);
        $edit = $this->edit;
         foreach ($this->field as $field =>$val) {
            $name = $edit[$field];

            $class->$val = $request->$name;

// echo $val;
        }

        $class->save();

        return redirect('admin/bank')->with('info','Success');


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
        $class = Bank::find($id);
        $class->delete();
        return redirect('admin/bank')->with('info','Success');

    }
}
