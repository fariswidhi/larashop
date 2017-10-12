<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Voucher;

class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $title = 'Voucher';
    protected $page = 'voucher';
    protected  $form = ['kelipatan'=>'number','persen'=>'number','aktif'=>'select-aktif'];
    protected $edit = ['kelipatan','persen','aktif'];
    protected $field = ['banyak_transaksi','persen','aktif'];
    protected $heads = ['Kelipatan Tranaksi','Potongan (%)'];
    protected $key = 'id_voucher';
    protected $tr = ['banyak_transaksi','persen'];

    public function __construct()
    {
        $this->middleware('isAdmin');
    }
    

    public function data_json(){
            
    }

    public function index()
    {
        //
        $data = Voucher::all();
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

        $class = new Voucher;
        $edit = $this->edit;
        foreach ($this->field as $field =>$val) {
            $name = $edit[$field];

            $class->$val = $request->$name;

// echo $val;
        }

        $class->save();

        return redirect('admin/voucher')->with('info','Success');

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
        $data = Voucher::find($id);

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
        $class = Voucher::find($id);
        $edit = $this->edit;
         foreach ($this->field as $field =>$val) {
            $name = $edit[$field];

            $class->$val = $request->$name;
        }

        $class->save();

        return redirect('admin/voucher')->with('info','Success');


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
        $class = Voucher::find($id);
        $class->delete();
        return redirect('admin/voucher')->with('info','Success');

    }
}
