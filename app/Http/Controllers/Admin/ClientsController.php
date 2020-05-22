<?php

namespace App\Http\Controllers\Admin;

use App\Client;
use App\Http\Controllers\Controller;
use Facade\FlareClient\View;
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
    public function create()
    {
        return view('admin.clients.create');
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
        $this->_validate($request);

        // Adicionando um a um
        # $client = new Client();
        # $client->name = $request->get('name');
        # $client->save();

        // modelo de mass assignment
        $data = $request->all();
        $data['defaulter'] = $request->has('defaulter');
        Client::create($data);

        return redirect()->route('clients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::findOrFail($id);

        return View('admin.clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // carrega cliente pelo ID
        $client = Client::findOrFail($id);

        // validações
        $this->_validate($request);

        // modelo de mass assignment
        $data = $request->all();
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
    public function destroy($id)
    {
        //
    }

    protected function _validate($request)
    {
        // validações
        $marital_status = implode( ',', array_keys(Client::MARITAL_STATUS) );

        $this->validate($request,[
            'name' => 'required|max:255',
            'document_number' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'date_birth' => 'required|date',
            'marital_status' => "required|in:$marital_status",
            'sex' => 'required|in:m,f',
            'physical_disability' => 'max:255'
        ]);

    }
}
