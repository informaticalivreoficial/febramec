<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PedidoRequest;
use App\Models\Fatura;
use App\Models\Pedido;
use App\Models\Plano;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PedidoController extends Controller
{
    public function index()
    {
        $pedidos = Pedido::orderBy('created_at', 'DESC')->paginate(25);
        return view('admin.pedidos.index', [
            'pedidos' => $pedidos
        ]);
    }

    public function create()
    {
        $alunos = User::orderBy('created_at', 'DESC')->available()->where('client', '=', '1')->get();
        return view('admin.pedidos.create', [
            'alunos' => $alunos
        ]);
    }

    public function store(PedidoRequest $request)
    {
        //Cria Pedido
        $data = [
            'plano' => $request->plano,
            'user' =>  $request->user,
            'periodo' => $request->periodo,
            'vencimento' => $request->vencimento,
            'status' => 1
        ];

        $criarPedido = Pedido::create($data);
        $criarPedido->save();

        //Cria Fatura
        if($request->gerarfatura === 'on'){
            $plano = Plano::where('id', $request->plano)->first();
            $dataFatura = [
                'pedido' => $criarPedido->id,
                'vencimento' => date('Y-m-d', strtotime("+{$request->vencimento} days")),
                'user' => $request->user,
                'valor' => ($request->periodo == 1 ? $plano->valor_mensal : ''),
                'status' => 'pending'
            ];
            $criarFatura = Fatura::create($dataFatura);
            $criarFatura->save();
        }
                      
        return Redirect::route('pedidos.edit', [
            'id' => $criarPedido->id,
        ])->with(['color' => 'success', 'message' => 'Pedido cadastrado com sucesso!']);
    }

    public function edit($id)
    {
        $alunos = User::orderBy('created_at', 'DESC')->available()->where('client', '=', '1')->get();
        $pedido = Pedido::where('id', $id)->first();        
        return view('admin.pedidos.edit', [
            'pedido' => $pedido,
            'alunos' => $alunos
        ]);
    }

    public function fetchPlan(Request $request)
    {
        $aluno = User::where('id', $request->aluno_id)->first();
        $data['plano'] = Plano::where("id", $aluno->plano)->get(["name", "id"]);
        return response()->json($data);
    }
}
