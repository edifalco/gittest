<?php

namespace App\Http\Controllers\Admin;

use App\Gittest3;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreGittest3sRequest;
use App\Http\Requests\Admin\UpdateGittest3sRequest;

class Gittest3sController extends Controller
{
    /**
     * Display a listing of Gittest3.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('gittest3_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('gittest3_delete')) {
                return abort(401);
            }
            $gittest3s = Gittest3::onlyTrashed()->get();
        } else {
            $gittest3s = Gittest3::all();
        }

        return view('admin.gittest3s.index', compact('gittest3s'));
    }

    /**
     * Show the form for creating new Gittest3.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('gittest3_create')) {
            return abort(401);
        }
        return view('admin.gittest3s.create');
    }

    /**
     * Store a newly created Gittest3 in storage.
     *
     * @param  \App\Http\Requests\StoreGittest3sRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGittest3sRequest $request)
    {
        if (! Gate::allows('gittest3_create')) {
            return abort(401);
        }
        $gittest3 = Gittest3::create($request->all());



        return redirect()->route('admin.gittest3s.index');
    }


    /**
     * Show the form for editing Gittest3.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('gittest3_edit')) {
            return abort(401);
        }
        $gittest3 = Gittest3::findOrFail($id);

        return view('admin.gittest3s.edit', compact('gittest3'));
    }

    /**
     * Update Gittest3 in storage.
     *
     * @param  \App\Http\Requests\UpdateGittest3sRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGittest3sRequest $request, $id)
    {
        if (! Gate::allows('gittest3_edit')) {
            return abort(401);
        }
        $gittest3 = Gittest3::findOrFail($id);
        $gittest3->update($request->all());



        return redirect()->route('admin.gittest3s.index');
    }


    /**
     * Display Gittest3.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('gittest3_view')) {
            return abort(401);
        }
        $gittest3 = Gittest3::findOrFail($id);

        return view('admin.gittest3s.show', compact('gittest3'));
    }


    /**
     * Remove Gittest3 from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('gittest3_delete')) {
            return abort(401);
        }
        $gittest3 = Gittest3::findOrFail($id);
        $gittest3->delete();

        return redirect()->route('admin.gittest3s.index');
    }

    /**
     * Delete all selected Gittest3 at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('gittest3_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Gittest3::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Gittest3 from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('gittest3_delete')) {
            return abort(401);
        }
        $gittest3 = Gittest3::onlyTrashed()->findOrFail($id);
        $gittest3->restore();

        return redirect()->route('admin.gittest3s.index');
    }

    /**
     * Permanently delete Gittest3 from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('gittest3_delete')) {
            return abort(401);
        }
        $gittest3 = Gittest3::onlyTrashed()->findOrFail($id);
        $gittest3->forceDelete();

        return redirect()->route('admin.gittest3s.index');
    }
}
