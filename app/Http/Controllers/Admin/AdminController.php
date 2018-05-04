<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\City\CityRequest;
use App\Http\Requests\Store\StoreRequest;
use App\Http\Requests\Detail\DetailRequest;
use App\Models\Store;
use App\Models\City;
use App\Models\Detail;
use App\Models\Ticket;
use App\Models\Contact;
use Auth;
use App\User;
use App\Admin;
use Illuminate\Support\Facades\Input;

class AdminController extends Controller
{
	private $Store;
	private $Detail;
    private $Contact;

    public function __construct(Store $Store, Detail $detail, Ticket $ticket, Contact $contato)
    {
        $this->middleware('auth:admin');
        $this->Store = $Store;
        $this->Detail = $detail;
        $this->Ticket = $ticket;
        $this->Contact = $contato;
    }

    // mostra as cidades
    public function Cities()
    {
       $Cities = Auth::user()->City()->get();
       return view('Admin.City.cities', compact('Cities')); 
    }

	/**
	 * Mostra os formulário para criar cidade.
	*/
    public function FormCity()
    {
        return view('Admin.City.form');
    }

    // cadastra as cidades
    public function CreateCity(CityRequest $request)
    {
        // recebe os dados
        $data = $request->all();
        // pega o id atual
        $userID = Auth::user()->id;
        // joga o id na model admin
        $insert = Admin::find($userID);
        // grava a cidade com o ID do admin e os dados.
        $ok = $insert->City()->create($data);
        if($ok){
            return redirect()->route('cities')->with('message', 'Cidade cadastrada com sucesso!');
        }else{
            return redirect()->back();
        }
    }


   //==================== lojas ========================//

    // create user, cria o usuário e loja na conta.
    public function createUser()
    {
        $title = 'Cadastrar Usuário';
        return view('Admin.Stores.CreateUser',compact('title'));
    }

    // mostra as lojas
     public function showStore($id)
    {
        $key = "{$id}";
        $Cities = City::where('id', 'LIKE', "%{$key}%")->get();
        // pega a cidade pelo ID
        foreach($Cities as $city){
          
        }
        $stores = $city->Stores;
        return view('Admin.Stores.stores', compact('stores'));
    }
  

    // formulário de cadastro de lojas
    public function FormStore($id)
    {
       $key = "{$id}";
       $Cities = City::where('id', 'LIKE', "%{$key}%")->get()->first();	
       return view('Admin.Stores.form', compact('Cities'));	
    }

    // cadastra a loja
    public function CreateStore(StoreRequest $request)
    {
    	$nameFile = null;
        /* upload da imagem */
        if($request->hasFile('logo') && $request->file('logo')->isValid()){
            $name = uniqid(date('HisYmd'));
            $extension = $request->logo->extension();
            $nameFile = "{$name}.{$extension}";
            $upload = $request->logo->storeAs('Logomarca', $nameFile);
            if(! $upload)
                return redirect()->back()->with('error', 'Falha ao fazer o upload')->withInput();
        }
        // pega todos os dados
        $data = $request->all();
        // troco o nome da imagem original por $nameFile.
        $data['logo'] = $nameFile;
        $insert = Store::create($data);
        if($insert){
            return redirect()->route('cities')->with('message', 'Loja cadastrada com sucesso!');
        }else{
            return redirect()->back()->with('error', 'Falha ao cadastrada loja!');
        }
    }

    // rota de deletar um loja
    public function delete($id)
    {
    	$data = $this->Store->find($id);
    	
    	$delete = $data->delete();

    	if($delete){
    		return redirect()->route('cities')->with('message', 'Loja deletada com sucesso!');
    	}else{
    		return redirect()->route()->with('error', 'Falha ao deletar loja');
    	}
    }


 	//==================== detalhes lojas ========================//

    // exibe detalhes da loja
    public function FormDetail($id)
    {
       $key = "{$id}";
       $stores = Store::where('id', 'LIKE', "%{$key}%")->get()->first();	

       return view('Admin.detail.form', compact('stores'));	
    }

    // cadastra os detalhes da loja
    public function createDetail(DetailRequest $request)
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
        // pega todos os dados
        $data = $request->all();
        // troco o nome da imagem original por $nameFile.
        $data['image'] = $nameFile;
        $insert = Detail::create($data);
        if($insert){
            return redirect()->route('cities')->with('message', 'A Promoção foi cadastrada com sucesso!');
        }else{
            return redirect()->back();
        }

    }

    // mostra os detalhes da loja
  	public function showDetail($id)
	{
	    $key = "{$id}";
	    $stores = Store::where('id', 'LIKE', "%{$key}%")->get();
	    foreach ($stores as $store) {
	    	
	    }

	    $details = $store->Detail;

	    return view('Admin.detail.detail', compact('details'));
	}

	// update dos detalhes da loja
	public function updateDetail(DetailRequest $request, $id)
	{
		$data = $request->all();
		$details = $this->Detail->find($id);

		$update = $details->update($data);

		if($update){
			return redirect()->route('cities')->with('message', 'A Promoção foi atualizada com sucesso!');
		}else{
			return redirect()->back();
		}

	}

    // lista todos os clientes
    public function list()
    {
        $data = $this->Ticket->paginate(30);
        return view('Admin.tickets.ticket', compact('data'));
    }

    // deleta os dados do cliente
    public function deleteCode($id)
    {
        $data = $this->Ticket->find($id);
        
        $delete = $data->delete();

        if($delete){
            return redirect()->back()->with('message', 'Ticket deleta com sucesso!');
        }else{
            return redirect()->back();
        }
    }

    // verifica o search
    public function searchData()
    {
        $q = Input::get('code');
        if($q != ''){
            $code = Ticket::where('codigo', 'LIKE', "%{$q}%")->orWhere('name', 'LIKE', "%{$q}%")->get();
            if(count($code) > 0){
                 return view('Admin.home.index')->withDetails($code)->withQuery($q);
            }else{
                 return view('Admin.home.index')->withMessage('Código invalido!');
            }
        }else{
            $message;
            return view('Admin.home.index', compact('message'));
        }
    }


    // email
    public function email()
    {
        $emails = $this->Contact->paginate();
        $title = "E-mail";
        return view('Admin.emailbox.email', compact('emails','title'));
    } 

    // ver detalhes do email
    public function readMail($id)
    {
        $email = $this->Contact->find($id);
        return view('Admin.emailbox.readEmail', compact('email'));
    }

    // delete email
    public function deleteMail($id)
    {
        $email = $this->Contact->find($id);
        
        $delete = $email->delete();

        if($delete){
            return redirect()->back()->with('message', 'E-mail deletado com sucesso!');
        }
    }



}
