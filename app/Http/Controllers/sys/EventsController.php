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

    public function store(StoreUpdateEvent $request)
    {

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
    $path = $this->storageFolder;

    // Verificar se uma nova imagem foi enviada
    if ($request->hasFile('thumbnail') && $request->file('thumbnail')->isValid()) {
        // Deletar a imagem antiga
        $oldImage = $event->thumbnail;
        if ($oldImage && Storage::exists($path . '/' . $oldImage)) {
            Storage::delete($path . '/' . $oldImage);
        }

        // Fazer upload da nova imagem
        $newImage = Helper::uploadImage($request, 'thumbnail', null, $this->storageFolder . "/", null);

        // Atualizar o campo 'thumbnail' com a nova imagem
        $event->thumbnail = $newImage;
    }

    $event->title = $request->title;
    $event->phone = $request->phone;
    $event->mail = $request->mail;
    $event->description = $request->description;
    $event->datetime_begin = $request->datetime_begin;
    $event->datetime_end = $request->datetime_end;
    $event->country_address = $request->country_address;

    $event->save();
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
