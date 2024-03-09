<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TenantRequest;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class TenantController extends Controller
{
    public function index()
    {
        $tenants = Tenant::orderBy('status', 'ASC')
                ->orderBy('created_at', 'DESC')
                ->where('subdomain', '!=', 'master')
                ->paginate(25);
        return view('admin.academias.index', [
            'academias' => $tenants
        ]);
    }

    public function edit($id)
    {
        $tenant = Tenant::where('id', $id)->first();    
        return view('admin.academias.edit', [
            'academia' => $tenant
        ]);
    }

    public function update(TenantRequest $request, $id)
    {     
        $tenant = Tenant::where('id', $id)->first();        

        if(!empty($request->hasFile('logo'))){
            Storage::delete($tenant->logo);
            $tenant->logo = null;
        }

        if(!empty($request->file('logo_admin'))){
            Storage::delete($tenant->logo_admin);
            $tenant->logo_admin = null;
        }

        if(!empty($request->file('logo_footer'))){
            Storage::delete($tenant->logo_footer);
            $tenant->logo_footer = null;
        }

        if(!empty($request->file('favicon'))){
            Storage::delete($tenant->favicon);
            $tenant->favicon = null;
        }

        if(!empty($request->file('metaimg'))){
            Storage::delete($tenant->metaimg);
            $tenant->metaimg = null;
        }

        if(!empty($request->file('imgheader'))){
            Storage::delete($tenant->imgheader);
            $tenant->imgheader = null;
        }

        if(!empty($request->file('watermark'))){
            Storage::delete($tenant->watermark);
            $tenant->watermark = null;
        }

        $tenant->fill($request->all());

        if(!empty($request->hasFile('logo'))){
            $tenant->logo = $request->file('logo')->storeAs(env('AWS_PASTA') . 'academias/' . $tenant->uuid, 
            Str::slug($request->name)  . '-' . str_replace('.',
             '', microtime(true)) . '.' . $request->file('logo')->extension());
        }

        if(!empty($request->hasFile('logo_admin'))){
            $tenant->logo_admin = $request->file('logo_admin')->storeAs(env('AWS_PASTA') . 'academias/' . $tenant->uuid, 
            Str::slug($request->name)  . '-' . str_replace('.',
             '', microtime(true)) . '.' . $request->file('logo_admin')->extension());
        }

        if(!empty($request->hasFile('logo_footer'))){
            $tenant->logo_footer = $request->file('logo_footer')->storeAs(env('AWS_PASTA') . 'academias/' . $tenant->uuid, 
            Str::slug($request->name)  . '-' . str_replace('.',
             '', microtime(true)) . '.' . $request->file('logo_footer')->extension());
        }

        if(!empty($request->hasFile('favicon'))){
            $tenant->favicon = $request->file('favicon')->storeAs(env('AWS_PASTA') . 'academias/' . $tenant->uuid, 
            Str::slug($request->name)  . '-' . str_replace('.',
             '', microtime(true)) . '.' . $request->file('favicon')->extension());
        }

        if(!empty($request->hasFile('metaimg'))){
            $tenant->metaimg = $request->file('metaimg')->storeAs(env('AWS_PASTA') . 'academias/' . $tenant->uuid, 
            Str::slug($request->name)  . '-' . str_replace('.',
             '', microtime(true)) . '.' . $request->file('metaimg')->extension());
        }

        if(!empty($request->hasFile('imgheader'))){
            $tenant->imgheader = $request->file('imgheader')->storeAs(env('AWS_PASTA') . 'academias/' . $tenant->uuid, 
            Str::slug($request->name)  . '-' . str_replace('.',
             '', microtime(true)) . '.' . $request->file('imgheader')->extension());
        }

        if(!empty($request->hasFile('watermark'))){
            $tenant->watermark = $request->file('watermark')->storeAs(env('AWS_PASTA') . 'academias/' . $tenant->uuid, 
            Str::slug($request->name)  . '-' . str_replace('.',
             '', microtime(true)) . '.' . $request->file('watermark')->extension());
        }

        $tenant->save();
        $tenant->setSlug();

        $validator = Validator::make($request->only('files'), ['files.*' => 'image']);

        if ($validator->fails() === true) {
            return redirect()->back()->withInput()->with([
                'color' => 'orange',
                'message' => 'Todas as imagens devem ser do tipo jpg, jpeg ou png.',
            ]);
        }

        return redirect()->route('tenant.edit', [
            'id' => $tenant->id,
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
