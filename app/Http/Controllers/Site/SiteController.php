<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Store;
use App\Models\Detail;
use App\Models\Contact;
use App\Models\Ticket;
use App\Http\Requests\Contato\ContatoRequest;
use App\Http\Requests\Ticket\TicketRequest;

class SiteController extends Controller
{
    private $City;
    private $Contact;
    private $Ticket;

    public function __construct(City $city, Contact $contato, Ticket $ticket)
    {
        $this->City = $city;
        $this->Contact = $contato;
        $this->Ticket = $ticket;
    }

    /* página principal do site */
    public function index()
    {
        $cities = $this->City->all();
        return view('Site.home.index', compact('cities'));
    }

    /* mostra a página sobre nos */
    public function SobreNos()
    {
        $title = 'Sobre Nós';
        return view('Site.home.sobrenos', compact('title'));
    }
    
    /* mostra o formulário de cadastro do cartão */
    public function cartao()
    {
        $title = 'Cadastre seu cartão';
        return view('Site.home.FormCart', compact('title'));
    }

    /* contato */
    public function contato()
    {
        $title = 'Contato';
        return view('Site.home.contato', compact('title'));
    }

    /* Lojas da cidade */
    public function stores($id)
    {
        // pega o id da cidade e estrai a loja
        $key = "{$id}";
        $Cities = City::where('referencia', 'LIKE', "%{$key}%")->get();
        // pega a cidade pelo ID
        foreach($Cities as $city){
          
        }
        $stores = $city->Stores;

        return view('Site.home.stores', compact('stores'));
    }

    /* detalhes da loja */
    public function details($id)
    {
        $key = "{$id}";
        $stores = Store::where('referencia', 'LIKE', "%{$key}%")->get();

        foreach ($stores as $store) {
             $store->logo;
        }

        $details = $store->Detail;

        return view('Site.home.detail', compact('details', 'store'));
    } 

    // cadastro o contato do usuario
    public function createcontato(ContatoRequest $request)
    {
        
        $data = $request->except('_token');

        $insert = $this->Contact->create($data);

        if($insert){
            return redirect()->back()->with('message', 'Seu contato foi enviado com sucesso!');
        }else{
           return redirect()->back()->with('error', 'Falha ao enviar os dados tente novamente'); 
        }
 
    }

    // cadastro o código
    public function ticket(TicketRequest $request)
    {

        $data = $request->except('_token');
        
        $data['active'] = (isset($data['active']) == '') ? 0 : 1;
        // faz a pesqui no banco e compara os códigos.
        $codigo = "{$data['codigo']}";

        $tickets = Ticket::where('codigo', 'LIKE', "%{$codigo}%")->get();
        foreach ($tickets as $tiker) {
            $code = $tiker->codigo;
            if($code == $data['codigo'])
                return redirect()->back()->with('error', 'Esse código já foi cadastrado, guarde seu cartão e entre em contato com a equipe do Clude do Desconto');
        }

        $insert = $this->Ticket->create($data);

        if($insert){
            return redirect()->back()->with('message', 'Seu código foi inserido com sucesso!'); 
        }else{
           return redirect()->back()->with('error', 'Falha ao enviar os dados tente novamente'); 
        }
    }

}
