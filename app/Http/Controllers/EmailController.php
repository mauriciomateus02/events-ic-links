<?php

namespace App\Http\Controllers;

use App\Mail\MeuEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function enviarEmail(Request $request)
    {
        $dados = [
            'titulo' => 'Inscrição no Evento: '.$request->nome_evento,
            'mensagem' => 'Sua inscrição foi realizada com sucesso.\n a data do evento é: '.$request->data_evento
        ];

        // Enviar o email para o destinatário
        Mail::to($request->input($request->email_usuario))->send(new MeuEmail($dados));

        return redirect()->back()->with('success', 'Reserva realizada com sucesso!');
    }
}
