<?php

namespace App\Http\Controllers;

use App\Helpers\FormatString;
use App\Repositories\UsuarioRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UsuarioController extends Controller
{
    protected $usuarioRepository;

    public function __construct(UsuarioRepository $usuarioRepository)
    {
        $this->usuarioRepository = $usuarioRepository;
    }

    public function edit()
    {
        $user = $this->usuarioRepository->findById(Auth::user()->id);
        $endereco = $user->enderecos()->first();
        return view('pages.configuracoes.edit', compact(['user', 'endereco']));
    }

    public function update(Request $request)
    {
        Session::flash('userUpdate');

        $idUsuario = Auth::user()->id;

        $validator = Validator::make($request->all(), [
            'name' => [
                'required',
                "unique:users,name,{$idUsuario},id",
            ],
            'cpfCnpj'  => 'required|cpf|max:20',
            'mobilePhone' => 'required|celular_com_ddd|max:20',
        ]);

        if ($validator->fails()) {
             return redirect()
                    ->route('configuracao.edit')
                    ->withErrors($validator)
                    ->withInput();
        }

        $data = [
            'name' => $request->name,
            'cpfCnpj' => FormatString::onlyNumbers($request->cpfCnpj),
            'mobilePhone' => FormatString::onlyNumbers($request->mobilePhone)
        ];

        $user = $this->usuarioRepository->findById($idUsuario);
        if ($request->avatar) {
            if ($user->avatar && Storage::exists($user->avatar)) {
                Storage::delete($user->avatar);
            }

            $imageExtension = $request->avatar->getClientOriginalExtension();
            $imageName = date('YmdHis') . ".{$imageExtension}";
            $request->avatar->storeAs('images/avatar', $imageName);
            $data['avatar'] = $imageName;
        }
        $user->update($data);

        return redirect()
                ->route('configuracao.edit')
                ->withSuccess('Usuário atualizado com sucesso');
    }

    public function updateAddresses(Request $request)
    {
        Session::flash('enderecoUpdate');

        $validator = Validator::make($request->all(), [
            'endereco' => 'required|string|max:100',
            'cidade' => 'required|string|max:100',
            'bairro' => 'required|string|max:100',
            'cep' => 'required|formato_cep|string|max:20',
            'numero' => 'required|string|max:10',
            'complemento' => 'required|string|max:50',
            'uf' => 'required|string|exists:ufs,sigla',
            ],
            [
                'uf.string' => 'Selecione o estado do endereço'
            ]
        );

        if ($validator->fails()) {
            return redirect()
                ->route('configuracao.edit')
                ->withErrors($validator)
                ->withInput();
        }

        $user = $this->usuarioRepository->findById(Auth::user()->id);

        $endereco = $user->enderecos()->first();
        if ($endereco) {
            $endereco->update($request->all());
        } else {
            $user->enderecos()->create($request->all());
        }

        return redirect()
            ->route('configuracao.edit')
            ->withSuccess('Endereço atualizado com sucesso');
    }
}
