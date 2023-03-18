<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogCategory;
use Image;
use Illuminate\Support\Carbon;




class BlogController extends Controller
{
    //all blog method
    public function AllBlog(){

        $blogs = Blog::latest()->get();
        return view('admin.blogs.blogs_all', compact('blogs'));

    }//end method



    //add blog method
    public function AddBlog(){

        $categories = BlogCategory::orderBy('blog_category','ASC')->get();
        return view('admin.blogs.blogs_add',compact('categories'));

    }//end method



    public function StoreBlog(Request $request){

        //images insert function
        $image = $request->file('blog_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(430,327)->save('upload/blogs/'.$name_gen);
        $save_url = 'upload/blogs/'.$name_gen;

        //database table portfolio insert data
        Blog::insert([
           'blog_category_id' => $request->blog_category_id,
           'blog_title' => $request->blog_title,
           'blog_tags' => $request->blog_tags,
           'blog_description' => $request->blog_description,
           'blog_image' => $save_url,
           'created_at' => Carbon::now(),
        ]);

        //when data inserted successfully to portfolio table this message will show
        $notification    = array(
           'message'    => 'Blog Inserted Successfully',
           'alert-type' => 'success'
       );
       return redirect()->route('all.blog')->with($notification);

    } // End methods



    //edit blog method
    public function EditBlog($id){

        $blogs = Blog::findOrFail($id);
        $categories = BlogCategory::orderBy('blog_category','ASC')->get();
        return view('admin.blogs.blogs_edit', compact('blogs', 'categories'));

    }//end method




    //update blog method
    public function UpdateBlog(Request $request){

        $blog_id = $request->id; 
  
  
        if ($request->file('blog_image')) {
           $image = $request->file('blog_image');
           $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
           Image::make($image)->resize(430,327)->save('upload/blogs/'.$name_gen);
           $save_url = 'upload/blogs/'.$name_gen;
  
  
           Blog::findOrFail($blog_id)->update([
                'blog_category_id' => $request->blog_category_id,
                'blog_title' => $request->blog_title,
                'blog_tags' => $request->blog_tags,
                'blog_description' => $request->blog_description,
                'blog_image' => $save_url,
           ]);
  
           $notification    = array(
              'message'    => 'Blog Updated With Image Successfully',
              'alert-type' => 'success'
          );
          return redirect()->route('all.blog')->with($notification);
  
  
        }else{

            Blog::findOrFail($blog_id)->update([
                'blog_category_id' => $request->blog_category_id,
                'blog_title' => $request->blog_title,
                'blog_tags' => $request->blog_tags,
                'blog_description' => $request->blog_description,
           ]);
  
           $notification    = array(
              'message'    => 'Blog Updated Without Image Successfully',
              'alert-type' => 'success'
          );
          return redirect()->route('all.blog')->with($notification);

        }//end else

    }//end method



    //delete blog method 
    public function DeleteBlog($id){

        $blogs = Blog::findOrFail($id);
        $img = $blogs->blog_image;
        unlink($img);
    
        Blog::findOrFail($id)->delete();
    
        //notification of delete portfolio
        $notification    = array(
        'message'    => 'Blog Deleted Successfully',
        'alert-type' => 'success'
    );
    return redirect()->back()->with($notification);

    }//end method



    public function BlogDetails($id){

        $allblogs = Blog::latest()->limit(5)->get();
        $blogs = Blog::findOrFail($id);
        $categories = BlogCategory::orderBy('blog_category','ASC')->get();
        return view('frontend.blog_details', compact('blogs', 'allblogs', 'categories'));


    }//End method



    //category details post
    public function CategoryBlog($id){

        $blogpost = Blog::where('blog_category_id', $id)->orderBy('id', 'DESC')->get();
        $allblogs = Blog::latest()->limit(5)->get();
        $categories = BlogCategory::orderBy('blog_category','ASC')->get();
        $categoryName = BlogCategory::findOrFail($id);
        return view('frontend.cat_blog_details', compact('blogpost', 'allblogs', 'categories', 'categoryName'));

    }//ENd methods



    public function HomeBlog(){

        $categories = BlogCategory::orderBy('blog_category','ASC')->get();
        $allblogs = Blog::latest()->paginate(3);
        return view('frontend.blog', compact('allblogs', 'categories'));

    }//End methods












}
