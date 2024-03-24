<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PlanRequest;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PlanController extends Controller
{
    public function index()
    {
        $plans = Plan::orderBy('created_at', 'DESC')->orderBy('status', 'ASC')->paginate(25);
        return view('admin.planos.index', [
            'planos' => $plans,
        ]);
    }

    public function create()
    {        
        return view('admin.planos.create');
    }
    
    public function store(PlanRequest $request)
    {
        $createPlan = Plan::create($request->all());
        $createPlan->fill($request->all());              
        return Redirect::route('planos.edit', [
            'id' => $createPlan->id,
        ])->with(['color' => 'success', 'message' => 'Plano cadastrado com sucesso!']);
    }

    public function edit($id)
    {
        $plan = Plan::where('id', $id)->first();        
        return view('admin.planos.edit', [
            'plano' => $plan
        ]);
    }

    public function update(PlanRequest $request, $id)
    {
        $planEdit = Plan::where('id', $id)->first();
        $planEdit->fill($request->all());        
        $planEdit->save();
        
        return Redirect::route('plan.edit', [
            'id' => $planEdit->id,
        ])->with(['color' => 'success', 'message' => 'Plano atualizado com sucesso!']);
    }
}
