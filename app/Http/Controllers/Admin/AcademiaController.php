<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AcademiaRequest;
use App\Models\Academia;
use App\Models\AcademiaGb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AcademiaController extends Controller
{
    public function index()
    {
        $academias = Academia::orderBy('status', 'ASC')
                ->orderBy('created_at', 'DESC')
                ->paginate(25);
        return view('admin.academias.index', [
            'academias' => $academias
        ]);
    }

    public function edit($id)
    {
        $academia = Academia::where('id', $id)->first();    
        return view('admin.academias.edit', [
            'academia' => $academia
        ]);
    }

    public function update(AcademiaRequest $request, $id)
    {     
        $academia = Academia::where('id', $id)->first();        

        if(!empty($request->hasFile('logomarca'))){
            Storage::delete($academia->logomarca);
            $academia->logomarca = null;
        }

        if(!empty($request->file('metaimg'))){
            Storage::delete($academia->metaimg);
            $academia->metaimg = null;
        }

        $academia->fill($request->all());

        if(!empty($request->hasFile('logomarca'))){
            $academia->logomarca = $request->file('logomarca')->storeAs(env('AWS_PASTA') . 'academias/' . $academia->id, 
            Str::slug($request->name)  . '-' . str_replace('.',
             '', microtime(true)) . '.' . $request->file('logomarca')->extension());
        }

        if(!empty($request->hasFile('metaimg'))){
            $academia->metaimg = $request->file('metaimg')->storeAs(env('AWS_PASTA') . 'academias/' . $academia->id, 
            Str::slug($request->name)  . '-' . str_replace('.',
             '', microtime(true)) . '.' . $request->file('metaimg')->extension());
        }

        $academia->save();
        $academia->setSlug();

        $validator = Validator::make($request->only('files'), ['files.*' => 'image']);

        if ($validator->fails() === true) {
            return redirect()->back()->withInput()->with([
                'color' => 'orange',
                'message' => 'Todas as imagens devem ser do tipo jpg, jpeg ou png.',
            ]);
        }

        if (isset($request->allFiles()['files']) && $request->allFiles()) {
            foreach ($request->allFiles()['files'] as $image) {
                $academiaImage = new AcademiaGb();
                $academiaImage->academia = $academia->id;
                $academiaImage->path = $image->storeAs(env('AWS_PASTA') . 'academias/' . $academia->id, Str::slug($request->name) . '-' . str_replace('.', '', microtime(true)) . '.' . $image->extension());
                $academiaImage->save();
                unset($academiaImage);
            }
        }

        return redirect()->route('academia.edit', [
            'id' => $academia->id,
        ])->with(['color' => 'success', 'message' => 'Academia atualizada com sucesso!']);
    }

    public function setStatus(Request $request)
    {        
        $academia = Academia::find($request->id);
        $academia->status = $request->status;
        $academia->save();
        return response()->json(['success' => true]);
    }

    public function imageRemove(Request $request)
    {
        $imageDelete = AcademiaGb::where('id', $request->image)->first();
        Storage::delete($imageDelete->path);
        $imageDelete->delete();
        $json = [
            'success' => true,
        ];
        return response()->json($json);
    }

    public function imageSetCover(Request $request)
    {
        $imageSetCover = AcademiaGb::where('id', $request->image)->first();
        $allImage = AcademiaGb::where('academia', $imageSetCover->academia)->get();
        foreach ($allImage as $image) {
            $image->cover = null;
            $image->save();
        }
        $imageSetCover->cover = true;
        $imageSetCover->save();
        $json = [
            'success' => true,
        ];
        return response()->json($json);
    }
}
