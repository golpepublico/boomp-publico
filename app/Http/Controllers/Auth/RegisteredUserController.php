<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use App\Models\Store;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'      => ['required', 'string', 'max:255'],
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'  => ['required', 'confirmed', Rules\Password::defaults()],
            'store'     => ['required', 'string', 'max:255', 'unique:stores'],
            'slug'      => ['string', 'max:255', 'unique:stores'],
            'url'       => ['string', 'max:255', 'unique:stores'],
        ]);

        $user = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
        ])->assignRole('loja');

        event(new Registered($user));

        $slug = str_replace(' ', '-',  strtolower($request->store));
        $domain = 'https://boomp.com.br/checkout/';

       $store = $user->store()->create([
            'store'          => $request->store,
            'slug'           => $slug,
            'email'          => $request->email,
            'url'            => $domain . $slug,
            'dominioshopify' => $slug . '-store.com',
        ]);

        //create default categoria ask by customer

        Category::create([
            'name'          => 'Infoproduto',
            'store_id'      => $store->id,
        ]);

        Category::create([
            'name'          => 'Produto Físico',
            'store_id'      => $store->id,
        ]);

        Category::create([
            'name'          => 'Prestação de Serviço',
            'store_id'      => $store->id,
        ]);


        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
