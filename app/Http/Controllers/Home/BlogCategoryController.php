<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;

class BlogCategoryController extends Controller
{
    //all blog category method
    public function AllBlogCategory(){

        $blogcategory = BlogCategory::latest()->get();
        return view('admin.blog_category.blog_category_all', compact('blogcategory'));


    }//end methods 


    // add blog category method 
    public function AddBlogCategory(){
        return view('admin.blog_category.blog_category_add');

    }//end method




    //insert blog category method
    public function StoreBlogCategory(Request $request){

        //validation of portfolio insert field with custom message
        // $request->validate([
        //     'blog_category' => 'required',
        // ],
        // [
        //     'blog_category.required' => 'Blog Category Name Is Required',
        // ]);


        //database table portfolio insert data
        BlogCategory::insert([
           'blog_category' => $request->blog_category,
        ]);

        //when data inserted successfully to portfolio table this message will show
        $notification    = array(
           'message'    => 'Blog Category Inserted Successfully',
           'alert-type' => 'success'
       );
       return redirect()->route('all.blog.category')->with($notification);

    }// End method



    //edit blog category method
    public function EditBlogCategory($id){

        $blogcategory = BlogCategory::FindOrFail($id);
        return view('admin.blog_category.blog_category_edit', compact('blogcategory'));

    }//End method


    //update blog category 
    public function UpdateBlogCategory(Request $request,$id){

          BlogCategory::findOrFail($id)->update([
            'blog_category' => $request->blog_category,
         ]);
 
         //when data inserted successfully to portfolio table this message will show
         $notification    = array(
            'message'    => 'Blog Category Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.blog.category')->with($notification);

    }// End method



    //Delete blog category method
    public function DeleteBlogCategory($id){
       
        BlogCategory::findOrFail($id)->delete();
    
        //notification of delete portfolio
        $notification    = array(
        'message'    => 'Blog Category Deleted Successfully',
        'alert-type' => 'success'
    );
    return redirect()->back()->with($notification);

    }// end method



    


}
