<?php

namespace App\Http\Controllers;

use App\Models\LegalDocument;
use App\Models\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LegalDocumentController extends Controller
{
    //
    public function getDocuments()
    {
        $user = User::with(["profile"])->where("id", Auth::id())->first();
        $documents = $user->profile->documents()->get();
        return response()->json([
            'documents' => $documents,
        ]);
    }

    public function store(Request $request)
    {
        $images = [];
        if ($request->hasFile('new_files')) {
            $files = $request->file('new_files');
            foreach ($files as $key => $file) {
                $extension =  $file->extension();
                $file->storeAs('/public', $file->getClientOriginalName().".".$extension);
                $url = Storage::url( $file->getClientOriginalName().".".$extension);
                array_push($images, $url);
            }
        }
//        $document = (object)[];
        $document = json_decode($request->document, false);
        $document->document_images = $images;
        $legal_document = LegalDocument::create([
            'type' => $request->type,
            'document' => $document,
            'is_approved' => $request->is_approved,
            'profile_id' =>  $request->profile_id,
        ]);
//        todo: make request for approving to admin here
        $profile = Profile::with(['documents', 'verifications', 'vehicles'])->find($request->profile_id);
        return response()->json([
            'document' => $legal_document,
            'profile' => $profile
        ]);
    }
    public function update(Request $request)
    {
        $edit_document = json_decode($request->document, false);
//        todo: make request for approving to admin here

        $images = $edit_document->document_images;
        if ($request->hasFile('new_files')) {
            $files = $request->file('new_files');
            foreach ($files as $key => $file) {
                $extension =  $file->extension();
                $file->storeAs('/public', $file->getClientOriginalName().".".$extension);
                $url = Storage::url( $file->getClientOriginalName().".".$extension);
                array_push($images, $url);
            }
        }
        $deleted_files = json_decode($request->deleted_files, true);
        if(!empty($deleted_files))
        {
            foreach ($deleted_files as $file) {
//                $rest = substr($file['path'], 8);
//                Storage::delete($rest);
            }
        }
        $edit_document->document_images = $images;

        $legal_document = LegalDocument::find($request->id);
        $legal_document->type = $request->type;
        $legal_document->document = $edit_document;
        $legal_document->profile_id = $request->profile_id;
        $legal_document->is_approved = $request->is_approved;
//        $legal_document->document->document_images = $images;
        $legal_document->save();
        $profile = Profile::with(['documents', 'verifications', 'vehicles'])->find($request->profile_id);
        return response()->json([
            'document' => $legal_document,
            'profile' => $profile,
            'images' => $images
        ]);
    }

    public function restore(Request $request, $id)
    {
        $document = LegalDocument::withTrashed()->find($id);
        $document->restore();

        return response()->noContent();
    }

    public function delete(Request $request, $id)
    {
        $document = LegalDocument::find($id);
        $document->delete();

        return response()->noContent();
    }

    public function destroy(Request $request, $id)
    {
        LegalDocument::withTrashed()->find($id)->forceDelete();

        return response()->noContent();
    }
}
