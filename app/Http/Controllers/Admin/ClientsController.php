<?php

namespace App\Http\Controllers\Admin;

use App\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = \App\Client::all();

        return view(
            'admin.clients.index',
            compact('clients')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $clientType = Client::getClientType($request->get('client_type'));

        return view(
            'admin.clients.create',
            [
                'client' => new Client(),
                'clientType' => $clientType
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // validações
        $data = $this->_validate($request);

        // Adicionando um a um
        # $client = new Client();
        # $client->name = $request->get('name');
        # $client->save();

        // modelo de mass assignment
        $data['defaulter'] = $request->has('defaulter');
        $data['client_type'] = Client::getClientType($request->get('client_type'));
        Client::create($data);

        return redirect()->route('clients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return view('admin.clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        // removido devido parametro ter mesmo nome da ação
        #$client = Client::findOrFail($client);

        $clientType = $client->client_type;

        return View(
            'admin.clients.edit',
            compact('client', 'clientType')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $data = $this->_validate($request);

        $data['defaulter'] = $request->has('defaulter');

        $client->fill($data);
        $client->save();

        return redirect()->route('clients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('clients.index');
    }

    /**
     * Validações de formularios
     */
    protected function _validate($request)
    {

        $client = $request->route('client');
        $clientId = $client instanceof Client ? $client->id : null;

        $rules = [
            'name' => 'required|max:255',
            'document_number' => "required|unique:clients,document_number,$clientId",
            'email' => 'required|email',
            'phone' => 'required',
        ];

        $marital_status = implode( ',', array_keys(Client::MARITAL_STATUS) );
        $rulesIndividual = [
            'date_birth' => 'required|date',
            'marital_status' => "required|in:$marital_status",
            'sex' => 'required|in:m,f',
            'physical_disability' => 'max:255'
        ];

        $rulesLegal = [
            'company_name' => 'required|max:255'
        ];

        $clientType = Client::getClientType($request->get('client_type'));
        if ($clientType == Client::TYPE_INDIVIDUAL){
            $clientType = $rules + $rulesIndividual;
        } else {
            $clientType = $rules + $rulesLegal;
        }

        return $this->validate($request, $clientType);
    }
}
