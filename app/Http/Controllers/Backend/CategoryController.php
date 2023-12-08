<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {  
        $data['categories'] = Category::all();

        return view('admin.pages.category.view-category',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.category.create-category');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories|max:255',
            'image' => 'required',
        ]);
        $category = new Category();
        $category->name = $request->name;
        $category->slug = Str::slug($category->name);
        if($request->hasFile('image')){
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $newImage=time().'.'.$extension;
            $file->move('images/category/',$newImage);
            $category->image=$newImage;
        }else{
            return $request;
            $category->image='';
        }
        $category->save();
        Session::flash('success','Category Created Successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categoryId = Category::find($id);
        return view('admin.pages.category.edit-category', compact('categoryId'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'image' => 'required',
        ]);
        $category=Category::find($id);
        $category->name=$request->name;
        $category->slug = Str::slug($category->name);
        if($request->hasFile('image')){
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $newImage=time().'.'.$extension;
            $file->move('images/category/',$newImage);
            $category->image=$newImage;
        }else{
            return $request;
            $category->image='';
        }
        $category->update();
        Session::flash('success','Category Updated successfully');
         return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category,$id)
    {
        $deleteData=Category::find($id);
        if(file_exists('images/category/'.$deleteData->image)AND ! empty($deleteData->image))
        {
         unlink('images/category/'.$deleteData->image);
        }
        $deleteData->delete();
       return redirect()->route('view.category');
    }
}
