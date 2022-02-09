<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all()->toArray();
        return array_reverse($products);
    }


    public function add(Request $request){
        $pdname = $request->input('pdname');
        $pcname = $request->input('pcname');
        $pscname = $request->input('pscname');
        $pintro = $request->input('pintro');
        $pdescription = $request->input('pdescription');
        $pcomimage = $request->file('pcomimage')->store('pdf');
        $pimage = $request->file('pimage')->store('upload');

        $products = new Product([
            'pdname'=>$pdname,
            'pcname'=>$pcname,
            'pscname'=>$pscname,
            'pintro'=>$pintro,
            'pdescription'=>$pdescription,
            'pcomimage'=>$pcomimage,
            'pimage'=>$pimage,
        ]);
        $products->save();

        return response()->json('product save successfully');

    }

    public function store(){
        
    }

    public function delete($id){
        $products = Product::find($id);
        $products->delete();

        return response()->json('selected row are delete successfully');
    }

    public function antibiotic(){
        $products = Product::where(['pcname' => 'poultry', 'pscname' => 'antibiotic'])->get();
        // return array_reverse($products);
        return response()->json($products, 200);
    }

    public function harbal(){
        $products = Product::where(['pcname' => 'poultry', 'pscname' => 'harbal'])->get();
        // return array_reverse($products);
        return response()->json($products, 200);
    }

    public function probiotics(){
        $products = Product::where(['pcname' => 'poultry', 'pscname' => 'probiotics'])->get();
        // return array_reverse($products);
        return response()->json($products, 200);
    }

    public function anticoccidial(){
        $products = Product::where(['pcname' => 'poultry', 'pscname' => 'anticoccidial'])->get();
        // return array_reverse($products);
        return response()->json($products, 200);
    }

    public function penathaone(){
        $products = Product::where(['pcname' => 'dairy', 'pscname' => 'penathaone'])->get();
        // return array_reverse($products);
        return response()->json($products, 200);
    }

    public function antibiotics(){
        $products = Product::where(['pcname' => 'dairy', 'pscname' => 'antibiotic'])->get();
        // return array_reverse($products);
        return response()->json($products, 200);
    }

    public function nutritional(){
        $products = Product::where(['pcname' => 'poultry', 'pscname' => 'nutritional'])->get();
        // return array_reverse($products);
        return response()->json($products, 200);
    }

    public function others(){
        $products = Product::where(['pcname' => 'poultry', 'pscname' => 'others'])->get();
        // return array_reverse($products);
        return response()->json($products, 200);
    }

    public function productsid($id){
        
        $products = Product::find($id);
        return response()->json($products);
    }
}
