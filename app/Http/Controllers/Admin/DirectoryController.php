<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use App\Models\Admin\Directory;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class DirectoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.contents.directory.index');
    }
    
    public function json(){
        $directory = Directory::all();
        return datatables()->of($directory)
        ->addIndexColumn()
        ->addColumn('action', function($directory){
            return ' <div class="d-flex">   
                    <a href="directory/'.$directory->id.'/edit" class="btn  btn-warning" style="width:80px;">Edit</a>
                    <a href="directory/'.$directory->id.'" class="btn  mx-3 btn-primary">Preview</a>
                    <form action="directory/'.$directory->id.'" method="POST">
                        '.csrf_field().'
                        '.method_field("DELETE").'
                        <input type="hidden" value="'.$directory->image.'">
                        <button class="btn  btn-danger" onclick="javascript: return confirm(\'delete '.$directory->title.' post ?\')">Delete</button>
                    </form>
                    </div>';
        })
        ->addColumn('created_at', function($directory){
            return $directory['created_at'];
        })
        ->addColumn('updated_at', function($directory){
            return $directory['updated_at'];
        })
        ->addColumn('category', function($directory){
            return $directory->category->name;
        })
        ->rawColumns(['action','created_at','updated_at','category'])
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = DB::table('category')->get();
        // dd($category);
        return view('admin.contents.directory.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate([
        'category' => 'required',
        'title' => 'required',
        'description' => 'required',
        'image' => 'image'
       ]);
        $image = $request->file('image')->store('directory');

        Directory::create([
            'category_id' => $request->category,
            'slug' => Str::kebab($request->title),
            'title' => $request->title,
            'description' => $request->description,
            'image' => $image
        ]);

        return redirect(route('directory.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $directory = Directory::find($id);
        
       return view('admin.contents.directory.show', compact('directory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $directory = Directory::find($id);
        $category = Category::all();
        // dd($directory);
        return view('admin.contents.directory.edit',compact('directory','category'));
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
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'description' => 'required'
        ]);

        if ($request->file('image')) {
            Directory::where('id',$id)->update([
                'category_id' => $request->category,
                'title' => $request->title,
                'slug' => Str::kebab($request->title),
                'description' => $request->description,
                'image' => $request->file('image')->store('directory')
            ]);

            Storage::delete($request->oldImage);

            return redirect(route('directory.index'));
        } else {
            Directory::where('id',$id)->update([
                'category_id' => $request->category,
                'title' => $request->title,
                'slug' => Str::kebab($request->title),
                'description' => $request->description,
            ]);

            return redirect(route('directory.index'));
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Directory::where('id',$id)->delete();
        Storage::delete($request->image);
        return redirect(route('directory.index'));
    }

    // API CONTROLLER

    public function directory(){
        $directory = Directory::all();
        return response()->json($directory)->setStatusCode(200);
    }

    public function detailDirectory($slug){
        $directory = DB::table('category')->join('directory', 'category.id','=','directory.category_id')->get();
        if ($directory) {
            return response()->json($directory)->setStatusCode(200);
        } else {
            return response()->json([
                'messages' => 'Data not found!'
            ])->setStatusCode(404);
        }
        
    }
}
