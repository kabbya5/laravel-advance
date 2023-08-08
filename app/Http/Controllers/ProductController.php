<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator;

class ProductController extends Controller
{
    public function create(){
        return view('product.create');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'title' => 'required',
            'body' => 'required',
            'price' => 'required',
        ]);
        if($validator->fails()){
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }else{
            $data =  $this->requestHandel($request);
            $data['seller_id'] = rand(1,3);
            Product::create($data);
            return response()->json(['status' => 'success']);
        }

        
        
    }

    private function requestHandel($request){
        $data = $request->except('img');
        if($request->hasFile('img')){
            $img = $request->file('img');
            $name = time().'.'.$img->getClientOriginalExtension();
            
            $img->storeAs('public/images/product',$name);

            $data['img'] = '/storage/images/product/' .$name; 
        }

        return $data;
    }
}
