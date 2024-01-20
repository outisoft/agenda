<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Unique;

class AgendaController extends Controller
{
    public function index()
    {
        $agenda = Agenda::all();
        return view('index', compact('agenda'));
    }

    public function search(Request $request)
    {
        $query = $request->get('query');
        $agenda = Agenda::where('name', 'like', '%' . $query . '%')
            ->orWhere('job', 'like', '%' . $query . '%')
            ->orWhere('departament', 'like', '%' . $query . '%')
            ->orWhere('hotel', 'like', '%' . $query . '%')
            ->orWhere('extension', 'like', '%' . $query . '%')
            ->orWhere('email', 'like', '%' . $query . '%')
            ->get();

        return view('agenda._agenda_list', compact('agenda'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('agenda.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'job' => 'required',
            'departament' => 'required',
            'hotel' => 'required',
            'extension' => 'required', 'unique', 'interger',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . Agenda::class],
        ]);
        //dd($data);

        $registro = Agenda::create($data);

        /*toastr()
            ->timeOut(3000) // 3 second
            ->addSuccess("Empleado {$registro->name} creado.");*/

        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Agenda $agenda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Agenda $agenda)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Agenda $agenda)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agenda $agenda)
    {
        //
    }
}
