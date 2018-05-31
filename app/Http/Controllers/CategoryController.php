<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
class CategoryController extends Controller
{
    
    public function index()
    {	
    	$categories = Category::all();
    	return view('admin.category.index',['categories'=>$categories]);
    }

    public function store(Request $request)
    {
    	$report = Validator::make($request->all(),[
            'cat_title'=>'required|string|max:250',
            'cat_status'=>'required|boolean',
        ]);

    	if($report->passes()){

    		$cat = new Category;
    		$cat->cat_title = $request->cat_title;
    		$cat->cat_status = $request->cat_status;
    		$cat->save();

    		Session::flash('success', 'Categoty store successfully..!');
    		return redirect()->back();

    	}

    	return redirect()->back()->withErrors($report);
    }

    public function update(Request $request)
    {
    	$report = Validator::make($request->all(),[
            'cat_title'=>'required|string|max:250',
            'cat_status'=>'required|boolean',
        ]);

    	if($report->passes()){

    		$cat = Category::find($request->cat_id);
    		$cat->cat_title = $request->cat_title;
    		$cat->cat_status = $request->cat_status;
    		$cat->save();

    		Session::flash('success', 'Categoty update successfully..!');
    		return redirect()->back();

    	}

    	return redirect()->back()->withErrors($report);
    }

    public function destroy($id)
    {
    	Category::where('id', $id)->delete();
    	Session::flash('success', 'Categoty Delete Successfully..!');
		return redirect()->back();
    }
}
