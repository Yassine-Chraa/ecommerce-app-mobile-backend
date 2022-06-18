<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index($categorie)
  {
    if ($categorie != null) {
      $products = Product::where('categorie' == $categorie);
      if ($products) {
        return response()->json($products);
      } else {
        $response = ["message" => 'No product exist'];
        return response($response, 422);
      }
    }else{
      $products = Product::all();
      return response()->json($products);
    }
  }
  public function paginate()
  {
    $products = Product::paginate(2);
    return response()->json($products);
  }
  public function getRecentAdded()
  {
    $products = Product::latest()->paginate(4);
    return response()->json($products);
  }
  public function getProductsNbr()
  {
    $count = Product::count();
    return response()->json($count);
  }
  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
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
      'name' => 'required|max:255',
      'price' => 'required',
      'quantity' => 'required',
      'categorie' => 'required',
    ]);

    $newProduct = new Product([
      'name' => $request->get('name'),
      'description' => $request->get('description') ? $request->get('description') : '',
      'price' => $request->get('price'),
      'quantity' => $request->get('quantity'),
      'categorie' => $request->get('categorie'),
    ]);

    $newProduct->save();

    return response()->json($newProduct);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $product = Product::findOrFail($id);
    return response()->json($product);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //
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
    $product = Product::findOrFail($id);

    $request->validate([
      'name' => 'required|max:255',
      'price' => 'required',
      'quantity' => 'required',
      'categorie' => 'required',
    ]);

    $product->name = $request->get('name');
    if ($request->get('description')) $product->description = $request->get('description');
    $product->price = $request->get('price');
    $product->quantity = $request->get('quantity');
    $product->categorie = $request->get('categorie');

    $product->save();

    return response()->json($product);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $product = Product::findOrFail($id);
    $product->delete();

    return response()->json(Product::all());
  }
}
