<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Diskon;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $title = 'Product';
    protected $page = 'product';
    protected  $form = ['name'=>'text','stok'=>'number','price'=>'number','deskripsi'=>'textarea','foto'=>'file','kategori'=>'select-kategori','Diskon'=>'select-diskon'];
    protected $edit = ['name','stok','price','deskripsi','foto','kategori','id_diskon'];
    protected $field = ['nama_produk','stok_produk','harga_produk','deskripsi','foto','id_kategori','id_diskon','permalink'];
    protected $heads = ['Product','Stock'];
    protected $key = 'id';
    protected $tr = ['nama_produk','stok_produk'];


    public function __construct()
    {
        $this->middleware('isAdmin');
    }
    public function data_json(){
        
    }

    public function index()
    {
        //
        $data = Product::all();
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
        $dataselect = Category::all();
        $diskons = Diskon::all();

        return view('admin/page/create',compact('form','title','page','dataselect','diskons'));
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

        $class = new Product;
        $edit = $this->edit;

        

        $class->nama_produk = $request->name;
        $class->stok_produk = $request->stok;
        $class->harga_produk = $request->price;
        $class->permalink = str_replace(' ', '-', strtolower($request->name));
        $class->deskripsi = $request->deskripsi;
        $class->id_kategori = $request->kategori;
        $class->id_diskon = $request->Diskon;

        if ($request->foto !==null) {
        $photoName = time().'.'.$request->foto->getClientOriginalExtension();
        $request->foto->move(public_path('img'),$photoName);
        $class->foto        = $photoName;
        }
        $class->save();
        
        // foreach ($this->field as $field =>$val) {
        //     $name = $edit[$field];

        //     if ($name == 'foto') {
        //         $class->$val = $photoName;
        //     }

        //     else{
        //     if ($val=='permalink') {
        //     $class->permalink = str_replace(' ', '-', strtolower($request->name));
        //     }
        //     else{
        //         $class->$val = $request->$name;
        //     }
        //     }

        // }

        $class->save();

        return redirect('admin/product')->with('info','Success');

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
        $data = Product::find($id);

        $form = $this->form;
        $edit = $this->edit;
        $field = $this->field;
        $page = $this->page;
        $id = $id;
        $title = $this->title;
        $dataselect = Category::all();

        return view('admin/page/product/edit',compact('data','dataselect','title','page','id'));
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
        $class = Product::find($id);
        $edit = $this->edit;

        if ($request->foto != null) {
        $photoName = time().'.'.$request->foto->getClientOriginalExtension();
        $request->foto->move(public_path('img'),$photoName);

        }
         foreach ($this->field as $field =>$val) {
            $name = $edit[$field];


            if ($name == 'foto') {
                
                if ($request->foto != null) {
                $class->$val = $photoName;
                }
            }

            else{
            $class->$val = $request->$name;
            }

// echo $val;
        }

        $class->save();

        return redirect('admin/product')->with('info','Success');


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
        $class = Product::find($id);
        $class->delete();
        return redirect('admin/category')->with('info','Success');

    }
}
