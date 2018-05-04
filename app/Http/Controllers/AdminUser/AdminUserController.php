<?php

namespace App\Http\Controllers\AdminUser;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Detail\DetailRequest;
use App\Models\Store;
use App\Models\Detail;
use App\Models\Ticket;
use App\User;
use Auth;
use Illuminate\Support\Facades\Input;

class AdminUserController extends Controller
{
	private $Detail;
    private $Ticket;

    public function __construct(Detail $details, Ticket $ticket)
    {
        $this->middleware('auth');
        $this->Detail = $details;
        $this->Ticket = $ticket;
    }

    // mostra a loja
    public function Store()
    {
        $stores = Auth::user()->Store()->get();
        $title = 'Lojas';
        return view('AdminStore.home.store', compact('stores', 'title')); 
    }

    // mostra os detalhes
    public function show($id)
    {
    	$key = "{$id}";
        $stores = Store::where('id', 'LIKE', "%{$key}%")->get();
       
        foreach($stores as $store){
          
        }
        $details = $store->Detail;

        $title = 'Promoção';

        return view('AdminStore.home.showDetail', compact('details', 'title'));
    }
    // mostra os dados preenchido no formulário
    public function edit($id)
    {
    	$key = "{$id}";
        $stores = Store::where('id', 'LIKE', "%{$key}%")->get();
       
        foreach($stores as $store){
          
        }
        $details = $store->Detail;

    	return view('AdminStore.home.edit', compact('details'));
    }

    // update dos detalhes
    public function update(DetailRequest $request, $id)
    {

        $nameFile = null;
        /* upload da imagem */
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $name = uniqid(date('HisYmd'));
            $extension = $request->image->extension();
            $nameFile = "{$name}.{$extension}";
            $upload = $request->image->storeAs('promocao', $nameFile);
            if(! $upload)
                return redirect()->back()->with('error', 'Falha ao fazer o upload')->withInput();
        }


    	// os dados atuais
    	$data = $request->all();
    	// os dados a ser substituidos
    	$details = $this->Detail->find($id);
        
        $data['image'] = $nameFile;

    	$update = $details->update($data);

    	if($update){
            return redirect()->route('Store')->with('message', 'Promoção atualizada com Sucesso!');
    	}else{
    		return redirect()->route()->with('error', 'Falha ao atualizar a promoção');
    	}

    }


    //++++++++++++++   password ++++++++++++++++++++//
    // mostra o formulário
    public function password()
    {
        return view('AdminStore.home.password');
    }

    // update password
    public function updatePassword(Request $request, User $user)
    {
        // METODO DE VALIDAÇÃO.
        $this->validate($request, $user->rulesPassword());

        $update = auth()->user()->updatePassword($request->password);

        if($update)
            return redirect()->route('password')->with('message', 'Senha atualizada com Sucesso!');

        return redirect()->back()->with('error', 'Falha ao atualizar senha'); 
    }

    // verifica o search
    public function search()
    {
        $q = Input::get('code');
        if($q != ''){
            $code = Ticket::where('codigo', 'LIKE', "%{$q}%")->get();
            if(count($code) > 0){
                 return view('AdminStore.home.index')->withDetails($code)->withQuery($q);
            }else{
                 return view('AdminStore.home.index')->withMessage('Código invalido!');
            }
        }else{
            $message;
            return view('AdminStore.home.index', compact('message'));
        }
        
    }
}

