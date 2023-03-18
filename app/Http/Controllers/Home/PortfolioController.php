<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio;
use Image;
use Illuminate\Support\Carbon;

class PortfolioController extends Controller
{
    public function AllPortfolio(){
        $portfolio = Portfolio::latest()->get();
        return view('admin.portfolio.portfolio_all', compact('portfolio'));

    }//End Method


    public function AddPortfolio(){
        return view('admin.portfolio.portfolio_add');
    }//End Method




    public function StorePortfolio(Request $request){

        //validation of portfolio insert field with custom message
        $request->validate([
            'portfolio_name' => 'required',
            'portfolio_title' => 'required',
            'portfolio_image' => 'required',
        ],[
            'portfolio_name.required' => 'Portfolio Name Is Required',
            'portfolio_title.required' => 'Portfolio Title Is Required',
        ]);

        //images insert to portfolio function
        $image = $request->file('portfolio_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(1020,519)->save('upload/portfolio/'.$name_gen);
        $save_url = 'upload/portfolio/'.$name_gen;

        //database table portfolio insert data
        Portfolio::insert([
           'portfolio_name' => $request->portfolio_name,
           'portfolio_title' => $request->portfolio_title,
           'portfolio_description' => $request->portfolio_description,
           'portfolio_image' => $save_url,
           'created_at' => Carbon::now(),
        ]);

        //when data inserted successfully to portfolio table this message will show
        $notification    = array(
           'message'    => 'Portfolio Inserted Successfully',
           'alert-type' => 'success'
       );
       return redirect()->route('all.portfolio')->with($notification);


    }//End Method


    //edit portfolio for update
    public function EditPortfolio($id){
        $portfolio = Portfolio::FindOrFail($id);
        return view('admin.portfolio.portfolio_edit', compact('portfolio'));

    }//End Method






    //update portfolio methods
    public function UpdatePortfolio(Request $request){

        $portfolio_id = $request->id; 
  
  
        if ($request->file('portfolio_image')) {
           $image = $request->file('portfolio_image');
           $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
           Image::make($image)->resize(1020,519)->save('upload/portfolio/'.$name_gen);
           $save_url = 'upload/portfolio/'.$name_gen;
  
  
           Portfolio::findOrFail($portfolio_id)->update([
                'portfolio_name' => $request->portfolio_name,
                'portfolio_title' => $request->portfolio_title,
                'portfolio_description' => $request->portfolio_description,
                'portfolio_image' => $save_url,
           ]);
  
           $notification    = array(
              'message'    => 'Portfolio Updated With Image Successfully',
              'alert-type' => 'success'
          );
          return redirect()->route('all.portfolio')->with($notification);
  
  
        }else{

            Portfolio::findOrFail($portfolio_id)->update([
                'portfolio_name' => $request->portfolio_name,
                'portfolio_title' => $request->portfolio_title,
                'portfolio_description' => $request->portfolio_description,
           ]);
  
           $notification    = array(
              'message'    => 'Portfolio Updated Without Image Successfully',
              'alert-type' => 'success'
          );
          return redirect()->route('all.portfolio')->with($notification);
  
  
        }//end else
  
  
     } //end Method




    //Delete method for portfolio  
    public function DeletePortfolio($id){
        $portfolio = Portfolio::findOrFail($id);
        $img = $portfolio->portfolio_image;
        unlink($img);
    
        Portfolio::findOrFail($id)->delete();
    
        //notification of delete portfolio
        $notification    = array(
        'message'    => 'Portfolio Deleted Successfully',
        'alert-type' => 'success'
    );
    return redirect()->back()->with($notification);
    
    }//end method



     //portfolio details page methods
     public function PortfolioDetails($id){
        $portfolio = Portfolio::FindOrFail($id);
        return view('frontend.portfolio_details', compact('portfolio'));

    }//End Method





    public function HomePortfolio(){

        $portfolio = Portfolio::latest()->get();
        return view('frontend.portfolio', compact('portfolio'));

    } //end method





    


}
