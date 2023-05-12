@extends('adminlte::page')

@section('title', 'Editar Pedido')

@section('content_header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1><i class="fas fa-search mr-2"></i>Editar Pedido</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Painel de Controle</a></li>
            <li class="breadcrumb-item"><a href="{{route('pedidos.index')}}">Pedidos</a></li>
            <li class="breadcrumb-item active">Editar Pedido</li>
        </ol>
    </div>
</div> 
@stop

@section('content')
<div class="row">
    <div class="col-12">
        @if($errors->all())
            @foreach($errors->all() as $error)
                @message(['color' => 'danger'])
                {{ $error }}
                @endmessage
            @endforeach
        @endif 
        
        @if(session()->exists('message'))
            @message(['color' => session()->get('color')])
            {{ session()->get('message') }}
            @endmessage
        @endif         
    </div>            
</div>   
                    
            
<form action="{{ route('pedidos.store') }}" method="post">
    @csrf          
    <div class="row">            
        <div class="col-12">
            <div class="card card-teal card-outline card-outline-tabs">                            
                <div class="card-header p-0 border-bottom-0">
                    <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Informações</a>
                        </li>
                    </ul>
                </div>

                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-four-tabContent">
                        <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                        
                            <div class="row mb-2"> 
                                <div class="col-12 col-md-6 col-lg-5"> 
                                    <div class="form-group">
                                        <label class="labelforms text-muted"><b>*Aluno</b> </label>
                                        <select class="form-control" id="setPlan" name="user">
                                            <option value="">Selecione o Aluno</option>
                                            @foreach($alunos as $aluno)
                                                <option value="{{ $aluno->id }}" {{ (old('user') == $aluno->id ? 'selected' : ($pedido->user == $aluno->id ? 'selected' : '')) }}>{{ $aluno->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> 
                                <div class="col-12 col-md-6 col-lg-5"> 
                                    <div class="form-group">
                                        <label class="labelforms text-muted"><b>*Plano</b> </label>
                                        <input type="hidden" id="getPlanId" name="plano" value="{{ old('plano') ?? $pedido->plano}}">                                        
                                        <input type="text" class="form-control" id="getPlan" name="plan" value="{{ old('plan') ?? $pedido->planoObject->name}}">                                        
                                    </div>
                                </div> 
                                <div class="col-12 col-sm-4 col-md-4 col-lg-2">
                                    <div class="form-group">
                                        <label class="labelforms text-muted"><b>Período:</b></label>
                                        <select name="periodo" class="form-control">
                                            <option value="1" {{ (old('periodo') == '1' ? 'selected' : ($pedido->periodo == 1 ? 'selected' : '')) }}>Mensal</option>
                                            <option value="3" {{ (old('periodo') == '3' ? 'selected' : ($pedido->periodo == 3 ? 'selected' : '')) }}>Trimestral</option>
                                            <option value="6" {{ (old('periodo') == '6' ? 'selected' : ($pedido->periodo == 4 ? 'selected' : '')) }}>Semestral</option>
                                            <option value="12" {{ (old('periodo') == '12' ? 'selected' : ($pedido->periodo == 12 ? 'selected' : '')) }}>Anual</option>
                                        </select>
                                    </div>
                                </div>                 
                            </div>

                            <div class="row mb-2">
                                <div class="col-12 col-md-6 col-lg-3"> 
                                    <div class="form-group">
                                        <label class="labelforms text-muted"><b>*Dia de Vencimento</b></label>
                                        <input type="text" class="form-control" name="vencimento" value="{{ old('vencimento') ?? $pedido->vencimento}}">
                                    </div>                                                    
                                </div>   
                                @if (!$pedido->countfaturas() > 0)
                                    <div class="col-12 col-sm-6 col-md-4 col-lg-2">                                        
                                        <div class="form-group p-3 mb-1">
                                            <label class="labelforms text-muted"><b> </b></label>
                                            <div class="form-check mb-2">
                                                <input id="gerarfatura" class="form-check-input" type="checkbox" name="gerarfatura" {{ (old('gerarfatura') == 'on' || old('gerarfatura') == true ? 'checked' : '') }}>
                                                <label for="gerarfatura" class="form-check-label text-muted">Gerar Fatura?</label>
                                            </div>                                            
                                        </div>
                                    </div>
                                @endif                                                             
                                <div class="col-12 col-sm-6 col-md-4 col-lg-2">                                        
                                    <div class="form-group p-3 mb-1">
                                        <label class="labelforms text-muted"><b> </b></label>
                                        <div class="form-check mb-2">
                                            <input id="gerarcontrato" class="form-check-input" type="checkbox" name="gerarcontrato" {{ (old('gerarcontrato') == 'on' || old('gerarcontrato') == true ? 'checked' : '') }}>
                                            <label for="gerarcontrato" class="form-check-label text-muted">Gerar Contrato?</label>
                                        </div>                                            
                                    </div>
                                </div>                             
                            </div> 
                        </div>
                    </div>
                    <div class="row text-right">
                        <div class="col-12 my-3">
                            <button type="submit" class="btn btn-lg btn-success"><i class="nav-icon fas fa-check mr-2"></i> Atualizar Agora</button>
                        </div>
                    </div> 
                </div>  
            </div> 
        </div> 
    </div>                    
</form>                 
            
@stop

@section('css')

@stop

@section('js')
    <script src="{{url(asset('backend/assets/js/jquery.mask.js'))}}"></script>
    <script>
        $(document).ready(function () { 
        var $money = $(".mask-money");
        $money.mask('R$ 000.000.000.000.000,00', {reverse: true, placeholder: "R$ 0,00"});
        });
    </script>

    <script>
        $(function () {    
            
            $.ajaxSetup({
                headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            }); 

            $('#setPlan').on('change', function () {
                var idAluno = this.value;
                $("#getPlan").html('');
                $.ajax({
                    url: "{{route('pedidos.fetchPlan')}}",
                    type: "POST",
                    data: {
                        aluno_id: idAluno,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (res) {
                        if(res.plano[0].name){
                            $("#getPlanId").val(res.plano[0].id);
                            $("#getPlan").val(res.plano[0].name);
                        }else{
                            $("#getPlan").val('Selecione primeiro um plano para o Aluno');
                        }
                    }
                });
            });

        });
    </script>
@stop