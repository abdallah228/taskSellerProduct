<?php

namespace App\Http\Controllers;

use App\Http\Requests\SellerProductRequest;
use App\Models\Product;
use App\Models\Seller;
use App\Models\SellerProduct as Model;
use App\Models\SellerProduct;
use App\Traits\jsonResponse;
use Exception;
use Illuminate\Http\Request;

class SellerProductsController extends Controller
{
    use jsonResponse;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $records = SellerProduct::all();
        return view('SellerProducts.index',compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $sellers = Seller::all();
        $products = Product::all();
        return view('SellerProducts.create',compact('sellers','products'));
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
        try{
            Model::create($request->all());
            return $this->jsonResponse('success','', 200);
        } catch (Exception $e) {
            // dd($e);
            return $this->jsonResponse('Failed to save data!', $e, 404);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SellerProduct  $sellerProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        try{
            $records = Model::find($request->id);
            if(!$records)
                return redirect()->back();
            $records->delete();
            return $this->jsonResponse('success', $request->id , 200);

        }catch(Exception $e) {
            return $this->jsonResponse('Failed to save data!', $e, 404);
        }
    }
}
