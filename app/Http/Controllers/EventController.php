<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\MeuEmail;
use Illuminate\Support\Facades\Mail;

class EventController extends Controller
{


    public function index($id){
        $event = Event::findOrFail($id);
        $user = User::findOrFail($event->user_id);

        return view('events.detail',['event'=>$event,'user'=>$user]);
    }


    public function show(){

        $filter = request('filtro_eventos');

        if(empty($filter)!= TRUE){
            $events = [];
            $events_filter = Event::all();

            foreach($events_filter as $event){
                if(in_array($filter,$event->items)){
                    array_push($events,$event);
                }
            }
        }
        else{
            $events = Event::all();
        }

        return view('event',['events'=>$events,'filter'=>$filter ]);
    }


    public function home(){

        $search = request('search');

        $today = \Carbon\Carbon::today();

        if(empty($search)!= TRUE){

            $events = Event::where('name','LIKE',"%$search%")
            ->get();
        }
        else{
            $events = Event::orderBy('created_at','desc')->take(10)->get();
        }

        $events_toDay = Event::where('date',$today)->get();

        return view('home',['events'=>$events,'search'=>$search,'events_today'=> $events_toDay]);


    }



    public function create(){
        return view('events.create');
    }


    public function store(Request $request){

        $event =  new Event;
        $event->name =  $request->name;
        $event->city =  $request->city;
        $event->price = $request->price;
        $event->max_capacity =  $request->max_capacity;
        $event->date =  $request->date;
        $event->description =  $request->description;
        $event->items = $request->items;

        //---- pegando o usuário ------//

        $user = auth()->user();

        $event->user_id =  $user->id;

        //---- tratamento da imagem -----//

        if($request->hasFile('image') && $request->file('image')->isValid()){
            $requestImage =  $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")).".". $extension;

            $requestImage->move(public_path('images/events'), $imageName);

            $event->image_path = "images/events/".$imageName;
        }


        $event->save();

        return redirect('/')->with('msg','Evento criado com sucesso!');

    }


    public function board(){

        $user_logged =  auth()->user();

        $events = Event::where('user_id',$user_logged->id)->get();

        $user = User::findOrFail($user_logged->id);

        $eventsUser = $user->eventsAsParticipant;

        return view('dashboard',['events'=>$events,'eventsUser'=>$eventsUser]);
    }

    public function destroy($id){

        Event::findOrFail($id)->delete();

        return redirect('/dashboard')->with('msg','Excluido com sucesso!');
    }


    public function edit($id){
        $event = Event::findOrFail($id);
        $user_logged =  auth()->user();

        if($event->user_id != $user_logged->id){
            return redirect('/')->with('err', 'você não tem permissão de editar o evento');
        }

        return view('events.update',['event'=>$event]);
    }


    public function update(Request $request){

        $data = $request->all();

        if($request->hasFile('image') && $request->file('image')->isValid()){
            $requestImage =  $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")).".". $extension;

            $requestImage->move(public_path('images/events'), $imageName);

            $data['image_path'] = "images/events/".$imageName;
        }

        Event::findOrFail($request->id)->update($data);

        return redirect('/dashboard')->with('msg', $request->name.', atualizado(a) com sucesso!');
    }

    public function buyEvent($id){

        $user_logged =  auth()->user();

        $user = User::findOrFail($user_logged->id);
        $event = Event::findOrFail($id);

        if($event->users->contains($user)){
            return redirect('/')->with('err','Você já realizou uma reserva em: '.$event->name);
        }

        else if($event->user_id == $user_logged->id){
            return redirect('/')->with('err','Não é possivel realizar a reserva de vaga, você é o proprietário desse evento');
        }
        $user->eventsAsParticipant()->attach($id);


        $this->enviarEmail($user_logged->email,$event);

        return redirect('/dashboard')->with('msg','Reserva realizado em: '.$event->name);
    }


    public function leaveEvent($id){
        $user_logged = auth()->user();

        $event = Event::findOrFail($id);
        $user = User::findOrFail($user_logged->id);

        if($event->users->contains($user_logged->id)){
            $user->eventsAsParticipant()->detach($id);

            return redirect('/dashboard')->with('msg','Reserva'.'do evento: '.$event->name.' foi cancelada!');
        }

        return redirect('/dashboard')->with('err','Você não possui reserva nesse evento.');

    }


    public function enviarEmail($email_usuario,$event)
    {
        $dados = [
            'titulo' => 'Inscrição no Evento: '.$event->name,
            'mensagem' => 'Sua inscrição foi realizada com sucesso. a data do evento é: '.\Carbon\Carbon::parse($event->date)->format('d/m/Y')
        ];

        Mail::to($email_usuario)->send(new MeuEmail($dados));
    }


}

