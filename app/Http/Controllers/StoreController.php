<?php

namespace App\Http\Controllers;

use App\Enums\StatusType;
use App\Repositories\StoreRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class StoreController extends Controller
{
    protected $storeRepository;

    public function __construct(StoreRepository $storeRepository)
    {
        $this->storeRepository = $storeRepository;
    }

    public function edit()
    {
        $store = Auth::user()->store;
        return view('pages.store.data', compact('store'));
    }

    public function update(Request $request)
    {
        $store = Auth::user()->store;

        $validator = Validator::make($request->all(),
            [
                'store' => 'required|string|min:2|max:20|unique:stores,store,'.$store->id,
                'dominioshopify' => 'required|string|max:100',
                'apikeyapp' => 'required|string|max:100',
                'passwordapp' => 'required|string|max:100',
                'email' => 'required|string|max:100',
                'logo' => 'nullable|image|max:1024',
            ],
            [
                'store.min' => 'O nome da loja deve ter no mínimo 2 caracteres',
                'store.max' => 'O nome da loja deve ter no máximo 20 caracteres',
                'store.unique' => 'Nome da loja não disponível'
            ]
        );

        if ($validator->fails()) {
             return redirect()
                    ->route('store.edit')
                    ->withErrors($validator)
                    ->withInput();
        }

        $data = $request->all();
        $data['checkoutshopify'] = isset($data['checkoutshopify']) ? StatusType::ATIVO : StatusType::INATIVO;
        $data['pulacarrinhoshopify'] = isset($data['pulacarrinhoshopify']) ? StatusType::ATIVO : StatusType::INATIVO;
        $data['permiteenvio'] = isset($data['permiteenvio']) ? StatusType::ATIVO : StatusType::INATIVO;
        $data['mostralogocheckout'] = isset($data['mostralogocheckout']) ? StatusType::ATIVO : StatusType::INATIVO;

        if ($request->logo) {
            if ($store->logo && Storage::exists($store->logo)) {
                Storage::delete($store->logo);
            }

            $imageExtension = $request->logo->getClientOriginalExtension();
            $imageName = date('YmdHis') . ".{$imageExtension}";
            $request->logo->storeAs('images/store', $imageName);
            $data['logo'] = $imageName;
        }
        $store->update($data);

        return redirect()
                ->route('store.edit')
                ->withSuccess('Loja atualizada com sucesso');
    }
}
