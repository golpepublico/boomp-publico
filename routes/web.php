<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.index');
});

// Route::get('/plans', function () {
//     return view('plans.index');
// });


Route::get('/planos', 'PlansController@index')->name('plans.index');

//rota para checkout com slug da loja e produto
Route::group(['prefix' => 'checkout'], function () {
    Route::get("/status/{idpay}", "CheckoutController@status")->name('checkout.status');
    Route::get("/{store}/{produto}", "CheckoutController@produto")->name('checkout.produto');
    Route::get("/{store}/{produto}/{uuid}", "CheckoutController@produtouuid")->name('checkout.produtouuid');
    Route::post('/payment', 'CheckoutController@payment')->name('checkout.payment');
    Route::post('/precart', 'CheckoutController@precart')->name('checkout.precart');
});

Route::group(['prefix' => 'coupon'], function () {
    Route::get('/coupon', 'CouponController@coupon')->name('coupon.coupon');
});

Route::group(['prefix' => 'app', 'middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home.index');
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');
    Route::get('/conta', 'HomeController@index')->name('conta.index');
    Route::get('/produtos', 'HomeController@index')->name('produtos.index');
  

    Route::group(['prefix' => 'wallet'], function () {
        Route::get('/wallet', 'WalletController@index')->name('wallet.index');
        Route::get('/payment', 'WalletController@payment')->name('wallet.payment');
        Route::get('/withdraw', 'WalletController@withdraw')->name('wallet.withdraw');
        Route::post('/', 'WalletController@createBankAccount')->name('wallet.create-bank-account');
        Route::post('/withdraw', 'WalletController@createTransfer')->name('wallet.create-transfer');
        Route::post('/prewithdraw', 'WalletController@prewithdraw')->name('wallet.prewithdraw');
        Route::get('/withdraw/export', 'WalletController@exportWithdraw')->name('withdraw.export-withdraw');
        Route::get('/wallet/export', 'WalletController@exportWalletTransaction')->name('withdraw.export-wallet-transaction');
    });

    //pixel
    Route::group(['prefix' => 'pixel'], function () {
        Route::get('/', 'PixelController@index')->name('pixel.index');
        Route::get('/config', 'PixelController@create')->name('pixel.create');
        Route::post('/store', 'PixelController@store')->name('pixel.store');
        Route::put('/update', 'PixelController@update')->name('pixel.update');
    });

    Route::get('/pixel/edit', 'PixelController@edit')->name('pixel.edit');
    Route::delete('/pixel/{id}', 'PixelController@destroy');

    Route::group(['prefix' => 'pedidos'], function () {
        Route::get('/', 'OrderController@index')->name('pedidos.index');
        Route::get('/precart', 'OrderController@preCart')->name('pedidos.precart');
    });

    Route::get('/marketing', 'HomeController@index')->name('marketing.index');
    Route::get('/growth_cov', 'HomeController@index')->name('growth_cov.index');

    Route::group(['prefix' => 'loja'], function () {
        Route::post('/', 'StoreController@update')->name('store.update');
        Route::get('/', 'StoreController@edit')->name('store.edit');
    });

    Route::group(['prefix' => 'configuracao'], function () {
        Route::put('/user', 'UsuarioController@update')->name('configuracao.updateUser');
        Route::put('/endereco', 'UsuarioController@updateAddresses')->name('configuracao.updateAddress');
        Route::get('/', 'UsuarioController@edit')->name('configuracao.edit');
    });

    Route::resource('categorias', 'CategoryController');
    Route::resource('produtos', 'ProductController');

    Route::group(['prefix' => 'integrations'], function () {
        Route::get('/', 'IntegrationsController@index')->name('integrations.index');
        Route::get('/{id}', 'IntegrationsController@edit')->name('integrations.edit');
        Route::post('/{id}', 'IntegrationsController@store')->name('integrations.store');
        Route::delete('/{id}', 'IntegrationsController@destroy')->name('integrations.destroy');
    });
});



require __DIR__ . '/auth.php';
