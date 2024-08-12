<?php

namespace App\Http\Controllers\sys;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateEvent;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventsController extends Controller
{

    private $storageFolder = 'eventos';

    public function index()
    {
        $events = Event::latest()->paginate();
        return view("sys.events.event_index", compact("events"));
    }

    public function create()
    {
        $fieldForm = array(
            'first_name' => array('title' => 'Nome', 'required' => true, 'default' => "disabled", "checked" => "checked", "type" => "text"),
            'last_name' => array('title' => 'Sobrenome', 'required' => true, 'default' => "disabled", "checked" => "checked", "type" => "text"),
            'alias' => array('title' => 'Nome no Crachá', 'required' => true, 'default' => "", "checked" => "", "type" => "text"),
            'cpf' => array('title' => 'CPF', 'required' => true, 'default' => "", "checked" => "", "type" => "text"),
            'email' => array('title' => 'E-mail', 'required' => true, 'default' => "disabled", "checked" => "checked", "type" => "email"),
            'celphone' => array('title' => 'Celular', 'required' => true, 'default' => "", "checked" => "", "type" => "text"),
            'phone' => array('title' => 'Telefone', 'required' => true, 'default' => "", "checked" => "", "type" => "text"),
            'birth_date' => array('title' => 'Data de Aniversário', 'required' => true, 'default' => "", "checked" => "", "type" => "text"),
            'company' => array('title' => "Empresa", 'required' => true, 'default' => "", "checked" => "", "type" => "text"),
            'institution' => array('title' => "Instituição de Ensino", 'required' => true, 'default' => "", "checked" => "", "type" => "text"),
            'address' => array('title' => "Endereço", 'required' => true, 'default' => "", "checked" => "", "type" => "text"),
            'city' => array('title' => "Cidade", 'required' => true, 'default' => "", "checked" => "", "type" => "text"),
            'state' => array('title' => "Estado", 'required' => true, 'default' => "", "checked" => "", "type" => "text")
        );
        return view("sys.events.event_create", compact("fieldForm"));
    }

    public function store(StoreUpdateEvent $request)
    {

        dd($request->all());


        $measure = array("w" => 1024, "h" => 400);
        $path = $this->storageFolder;

        if (!Storage::exists($path)) {
            Storage::makeDirectory($path, 0777, true);
        }

        try {
            Event::create([
                'title' => $request->title,
                'thumbnail' => Helper::uploadImage($request, 'thumbnail', null, $this->storageFolder . "/", null, $measure),
                'phone' => $request->phone,
                'mail' => $request->mail,
                'description' => $request->description,
                'datetime_begin' => $request->datetime_begin,
                'datetime_end' => $request->datetime_end,
                'country_address' => $request->country_address,
            ]);
        } catch (\Exception $e) {
            return back()->withErrors(['message' => 'Erro ao criar o evento: ' . $e->getMessage()]);
        }

        return redirect()
            ->route('events.index')
            ->with('message', 'Evento criado com sucesso!!');
    }

    public function show($id)
    {
        if (!$event = Event::find($id)) {
            return redirect()->route('events.index');
        }
        return view('sys.events.event_show', compact('event'));
    }

    public function destroy($id)
    {
        if (!$event = Event::find($id))
            return redirect()->route('events.index');

        $event->delete();

        return redirect()
            ->route('events.index')
            ->with('message', 'Post deletado com sucesso!');
    }


    public function edit($id)
    {

        $event = Event::findOrFail($id);

        return view('sys.events.event_edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        if (!$event = Event::find($id)) {
            return redirect()->back();
        }

        $event->update($request->all());

        return redirect()
            ->route('events.index')
            ->with('message', 'Evento atualizado com sucesso!');
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');
        $events = Event::where('title', 'LIKE', "%{$request->search}%")
            ->orWhere('description', 'LIKE', "%{$request->search}%")
            ->paginate(1);
        return view('sys.events.event_edit', compact('posts', 'filters'));
    }
}
