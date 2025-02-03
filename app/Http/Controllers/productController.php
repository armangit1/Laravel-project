<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Pest\Laravel\get;

class ProductController extends Controller
{
    function showproduct(){
        $products =  DB::table('products')->get();
       

        return view('welcome',['product'=>$products]);
    }
    public function insertproduct(Request $request):RedirectResponse
    {
        $request->validate([
            'productname' => 'required|max:100',
            'productprice' => 'required|numeric|max:90000',
            'imagefile' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'productcolor' => 'max:200'
        ]);

        // Image Upload (Optional)
        $imagePath = null;
        if ($request->hasFile('imagefile')) {
            $imagePath = $request->file('imagefile')->store('products', 'public');
        }

        // Insert Data into Database
        $iteme =  DB::table('products')->insert([
            'name' => $request->productname,
            'price' => $request->productprice,
            'image' => $imagePath,
            'color' => $request->productcolor,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        if (!$iteme) {
            return view('errorpage', ['message' => 'Something is wrong']);
        }
        return redirect()->to('/');
        

       

    }

    public function updateproduct(Request $request,$id):RedirectResponse
    {
        $request->validate([
            'productname' => 'required|max:100',
            'productprice' => 'required|numeric|max:90000',
            'imagefile' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'productcolor' => 'max:200'
        ]);

        // Image Upload (Optional)
        $imagePath = null;
        if ($request->hasFile('imagefile')) {
            $imagePath = $request->file('imagefile')->store('products', 'public');
        }

        // Insert Data into Database
        $iteme =  DB::table('products')->where('id',$id)->update([
            'name' => $request->productname,
            'price' => $request->productprice,
            'image' => $imagePath,
            'color' => $request->productcolor,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        if (!$iteme) {
            return view('errorpage', ['message' => 'Something is wrong']);
        }
        return redirect()->to('/');
        

       

    }


    
    public function deleteitem($id): RedirectResponse
    {
        DB::table('products')->where('id', $id)->delete(); // Fix delete query
    
        return redirect()->to('/'); // Redirect to the products list or any valid route
    }

    public function updateopen($id)
    {
      $datas =  DB::table('products')->where('id', $id)->first(); // Fix delete query
    
        return view('update',['data'=>$datas]); // Redirect to the products list or any valid route
    }
    public function viewitem($id)
    {
        $item = DB::table('products')->where('id', $id)->first(); // Optimized query
    
        if (!$item) {
            abort(404); // Return a 404 error if the item is not found
        }
    
        return view('oneitem', ['item' => $item]);
    }
}
