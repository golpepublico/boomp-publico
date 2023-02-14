<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Repositories\CategoryRepository;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $perPage = request('perPage', 5);
        $categories = Category::where('store_id', Auth::user()->store->id)
                ->where('name', 'like', '%' . request()->get('search') . '%')
                ->orderBy('id', 'desc')
                ->paginate($perPage);

        return view('pages.categorias.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $store_id = Auth::user()->store->id;

        $validator = Validator::make($request->all(), [
            'store_id'  => 'numeric|exists:stores,id',
            'name'      => 'required|string|min:2|max:255|unique:categories,name,{$store_id},store_id',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('categorias.create')
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->all();
        $data['store_id'] = $store_id;

        $categories = $this->categoryRepository->findById(Auth::user()->id);
        $categories->create($data);

        return redirect()
            ->route('categorias.create')
            ->withSuccess('Categoria cadastrada com sucesso');

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
