<?php



Auth::routes();




/* ROTA DO SITE,SE FIZER O LOGOUT MUDA DE ROTA PARA USER OU PARA ADMIN */
Route::prefix('/')->group(function(){
    Route::get('/', "Site\SiteController@index")->name('index');
    Route::get('/sobrenos', 'Site\SiteController@SobreNos')->name('sobrenos');
    Route::get('/cartao', 'Site\SiteController@cartao')->name('cartao');
    Route::get('/contato', 'Site\SiteController@contato')->name('contato');
    // Renderiza as lojas da cidade escolhida.
    Route::get('/city/{id}', "Site\SiteController@stores")->name('stores');
    // Renderiza os detalhes da loja escolhida.
    Route::get('/details/{id}', "Site\SiteController@details")->name('details');

    // contato
    Route::get('/createcontato', 'Site\SiteController@createContato')->name('createcontato');
    // ticket 
    Route::get('/ticket', 'Site\SiteController@ticket')->name('ticket');
});






/* ROTA DA AREA USER */
Route::group(['middleware' => 'web'], function(){
	// página a ser apresentada depois do login
	Route::get('/home', 'HomeController@index')->name('home');
	// para fazer o logout
	Route::get('/users/logout', 'Auth\LoginController@userlogout')->name('user.logout');


    // lista a loja
    $this->get('/stores', 'AdminUser\AdminUserController@Store')->name('Store'); 
    // lista o detalhes
    $this->get('/showdetail/{id}', 'AdminUser\AdminUserController@show')->name('show');
    // edita os detlahes
    $this->get('/edit/{id}', 'AdminUser\AdminUserController@edit')->name('edit');
     // edita os detlahes
    $this->post('/update/{id}', 'AdminUser\AdminUserController@update')->name('update');

    // roda de atualiza senha
    $this->get('/password', 'AdminUser\AdminUserController@password')->name('password');
    // update da senha
    $this->post('/updatepassword', 'AdminUser\AdminUserController@updatePassword')->name('updatePassword');


    /*==== VERIFICA O TICKET  ===*/
    $this->post('/search', 'AdminUser\AdminUserController@search')->name('search');

});






/* ROTAS DA AREA ADMIN */
Route::prefix('admin')->group(function(){
	// mostra formulário de login
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    // faz o submit do formulário de login
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    // rota principál do painel de controle
    Route::get('/', 'AdminController@index')->name('admin.painel');

    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

    // lista as cidades
    $this->get('/cities', 'Admin\AdminController@Cities')->name('cities');
    // formulário para criar cidades
    $this->get('/formcity', 'Admin\AdminController@FormCity')->name('FormCity');
    // cadastra as cidade
    $this->post('/createcity', 'Admin\AdminController@CreateCity')->name('CreateCity');


    // cadastrar um usuario.
    $this->get('/createuser', 'Admin\AdminController@createUser')->name('createUser');
    // lista as lojas
    $this->get('/showstore/{id}', 'Admin\AdminController@showStore')->name('showStore');
    // formulário para cadastra a loja
    $this->get('/formstore/{id}', 'Admin\AdminController@FormStore')->name('FormStore');
    // cadastra de lojas
    $this->post('/createstore', 'Admin\AdminController@CreateStore')->name('CreateStore');
    // rota para deletar um loja
    $this->get('/delete/{id}', 'Admin\AdminController@delete')->name('delete');


    // lista os detalhes
    $this->get('/showdetail/{id}', 'Admin\AdminController@showDetail')->name('showDetail');
    // lista o formulá de cadastro de detalhes da loja
    $this->get('/formdetail/{id}', 'Admin\AdminController@FormDetail')->name('FormDetail');
    // cadastra os detalhes da loja
    $this->post('/createdetail', 'Admin\AdminController@createDetail')->name('createDetail');
    // update dos detalhes
    $this->post('/update/{id}', 'Admin\AdminController@updateDetail')->name('updateDetail');


    // lista todos os clientes
    $this->get('/list', 'Admin\AdminController@list')->name('list');
    // deleta os código do cliente
    $this->get('/deleteCode/{id}', 'Admin\AdminController@deleteCode')->name('deleteCode');

    /*==== VERIFICA O TICKET  ===*/
    $this->post('/searchs', 'Admin\AdminController@searchData')->name('searchs');


    // email
    $this->get('/email', 'Admin\AdminController@email')->name('email');
    $this->get('/deletemail/{id}', 'Admin\AdminController@deleteMail')->name('deleteMail');
    $this->get('/readmail/{id}', 'Admin\AdminController@readMail')->name('readMail');



});

//== CONFIGURAÇÕES DE ADMIN NA CONFIG/AUTH.PHP ==//
//== Alterações na vendor/laravel/Illuminate\Foundation\Exceptions ==//
/*
 Depois que criaei o make:auth
 também criei na pasta auth o adminLoginController
 também criei na view auth o admin-login.blade, para mostrar o formalário de login admin
 também dupliquei o User.php fazendo um Admin.php
*/