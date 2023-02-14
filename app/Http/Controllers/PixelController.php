<?php

namespace App\Http\Controllers;

use App\Enums\StatusType;
use App\Models\Pixel;
use App\Repositories\PixelRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PixelController extends Controller
{
    protected $pixelRepository;

    public function __construct(PixelRepository $pixelRepository)
    {
        $this->pixelRepository = $pixelRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perPage = request('perPage', 25);
        $pixels = Pixel::where('store_id', Auth::user()->store->id)
            ->orderBy('id', 'desc')
            ->paginate($perPage);

        return view('pages.pixel.index', compact('pixels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.pixel.create');
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
            'descricao'  => 'required|string|min:2|max:255',
            'pixel_key'  => 'required|string|min:2|max:255',
        ]);
        if ($validator->fails()) {
            return redirect()
                ->route('pixel.create')
                ->withErrors($validator)
                ->withInput();
        }

        $data = [
            'store_id' => Auth::user()->store->id,
            'descricao' => $request->descricao,
            'pixel_key' =>  $request->pixel_key,
            'fl_pixel_cred' => isset($request->fl_pixel_cred) ? StatusType::ATIVO : StatusType::INATIVO,
            'fl_pixel_pix' => isset($request->fl_pixel_pix) ? StatusType::ATIVO : StatusType::INATIVO,
        ];


        $pixel = Pixel::create($data);

        return redirect()
            ->route('pixel.index')
            ->withSuccess('Produto cadastrado com sucesso');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $filter = [
            'id' => $request->id,
            'store_id' => Auth::user()->store->id,
        ];
        $pixel = $this->pixelRepository->findBy($filter)->first();

        return view('pages.pixel.update', compact('pixel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'descricao'  => 'required|string|min:2|max:255',
            'pixel_key'  => 'required|string|min:2|max:255',
        ]);
        if ($validator->fails()) {
            return redirect()
                ->route('pixel.edit', ['id' => $request->id])
                ->withErrors($validator)
                ->withInput();
        }

        $filter = [
            'id' => $request->id,
            'store_id' => Auth::user()->store->id,
        ];
        $pixel = $this->pixelRepository->findBy($filter)->first();

        $data = [
            'descricao' => $request->descricao,
            'pixel_key' =>  $request->pixel_key,
            'fl_pixel_cred' => isset($request->fl_pixel_cred) ? StatusType::ATIVO : StatusType::INATIVO,
            'fl_pixel_pix' => isset($request->fl_pixel_pix) ? StatusType::ATIVO : StatusType::INATIVO,
            'fl_pixel_boleto' => isset($request->fl_pixel_boleto) ? StatusType::ATIVO : StatusType::INATIVO,
        ];
        $pixel->update($data);
        return redirect()
            ->route('pixel.edit', ['id' => $request->id])
            ->withSuccess('Pixel alterado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pixel::where('id', $id)->delete();
        return redirect('/app/pixel')->with('success', 'Data Deleted');
    }
}
