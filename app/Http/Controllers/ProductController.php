<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Repositories\ProductRepository;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProductController extends Controller
{

    protected $productRepository, $categoryRepository;

    public function __construct(ProductRepository $productRepository, CategoryRepository $categoryRepository)
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
    }

    // get all products
    public function getAllProducts()
    {
        // $products = Product::all();
        $perPage = request('perPage', 5);
        $products = Product::where('name', 'like', '%' . request()->get('search') . '%')
            ->orderBy('id', 'desc')
            ->paginate($perPage);

        return response($products, 200);
    }

    public function index()
    {
        $perPage = request('perPage', 5);
        $products = Product::where('store_id', Auth::user()->store->id)
            ->where('name', 'like', '%' . request()->get('search') . '%')
            ->orderBy('id', 'desc')
            ->paginate($perPage);
        return view('pages.produtos.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categoryRepository->findBy(['store_id' =>  Auth::user()->store->id]);
        return view('pages.produtos.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'store_id'      => 'integer|exists:stores,id',
            'category_id'   => 'integer|exists:categories,id',
            'image'         => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'name'          => 'required|string|min:2|max:255',
            'slug'          => 'string|min:2|max:255',
            'description'   => 'required|string|min:2|max:1000',
            'price'         => 'required|string',
            'url'           => 'required|url',
            'variation'     => 'boolean',
            'weight'        => 'numeric|min:1|nullable',
            'height'        => 'numeric|min:2|nullable',
            'width'         => 'numeric|min:11|nullable',
            'length'        => 'numeric|min:16|nullable',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('produtos.create')
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->all();

        $price =  str_replace(['R$', '.'], '', $data['price']);
        $price =  str_replace([','], '.', $price);

        $data['price'] = $price;
        $data['store_id']   = Auth::user()->store->id;
        $data['slug']       = Str::slug($request->name, '-');

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image');
            $imageName = date('YmdHis') . '.' . $imagePath->getClientOriginalExtension();
            $request->file('image')->storeAs('images/product', $imageName, 'public');
            $data['image'] = $imageName;
        };

        $products = $this->productRepository->findById(Auth::user()->id);
        $products->create($data);

        return redirect()
            ->route('produtos.index')
            ->withSuccess('Produto cadastrado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $validator = Validator::make($request->all(), [
        //     'store_id'      => 'integer|exists:stores,id',
        //     'category_id'   => 'integer|exists:categories,id',
        //     'image'         => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        //     'name'          => 'required|string|min:2|max:255',
        //     'description'   => 'required|string|min:2|max:1000',
        //     'price'         => 'required|numeric|min:0',
        //     'url'           => 'required|url',
        //     'variation'     => 'boolean',
        //     'weight'        => 'numeric|min:0|nullable',
        //     'height'        => 'numeric|min:0|nullable',
        //     'width'         => 'numeric|min:0|nullable',
        //     'length'        => 'numeric|min:0|nullable',
        // ]);

        // if ($validator->fails()) {
        //     return redirect()
        //         ->route('produtos.create')
        //         ->withErrors($validator)
        //         ->withInput();
        // }

        // $data = $request->all();
        // $data['store_id'] = Auth::user()->store->id;

        // if ($request->hasFile('image')) {
        //     $imagePath = $request->file('image');
        //     $imageName = date('YmdHis') . '.' . $imagePath->getClientOriginalExtension();
        //     $request->file('image')->storeAs('images/product', $imageName, 'public');
        //     $data['image'] = $imageName;
        // } else {
        //         unset($data['image']);
        // }

        // $products = $this->productRepository->findById(Auth::user()->id);
        // $products->create($data);

        // return redirect()
        //     ->route('produtos.index')
        //     ->withSuccess('Produto atualizado com sucesso');

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
