<?php

namespace App\Http\Controllers\Admin;

use App\Gittest2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreGittest2sRequest;
use App\Http\Requests\Admin\UpdateGittest2sRequest;

class Gittest2sController extends Controller
{
    /**
     * Display a listing of Gittest2.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('gittest2_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('gittest2_delete')) {
                return abort(401);
            }
            $gittest2s = Gittest2::onlyTrashed()->get();
        } else {
            $gittest2s = Gittest2::all();
        }

        return view('admin.gittest2s.index', compact('gittest2s'));
    }

    /**
     * Show the form for creating new Gittest2.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('gittest2_create')) {
            return abort(401);
        }
        return view('admin.gittest2s.create');
    }

    /**
     * Store a newly created Gittest2 in storage.
     *
     * @param  \App\Http\Requests\StoreGittest2sRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGittest2sRequest $request)
    {
        if (! Gate::allows('gittest2_create')) {
            return abort(401);
        }
        $gittest2 = Gittest2::create($request->all());



        return redirect()->route('admin.gittest2s.index');
    }


    /**
     * Show the form for editing Gittest2.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('gittest2_edit')) {
            return abort(401);
        }
        $gittest2 = Gittest2::findOrFail($id);

        return view('admin.gittest2s.edit', compact('gittest2'));
    }

    /**
     * Update Gittest2 in storage.
     *
     * @param  \App\Http\Requests\UpdateGittest2sRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGittest2sRequest $request, $id)
    {
        if (! Gate::allows('gittest2_edit')) {
            return abort(401);
        }
        $gittest2 = Gittest2::findOrFail($id);
        $gittest2->update($request->all());



        return redirect()->route('admin.gittest2s.index');
    }


    /**
     * Display Gittest2.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('gittest2_view')) {
            return abort(401);
        }
        $gittest2 = Gittest2::findOrFail($id);

        return view('admin.gittest2s.show', compact('gittest2'));
    }


    /**
     * Remove Gittest2 from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('gittest2_delete')) {
            return abort(401);
        }
        $gittest2 = Gittest2::findOrFail($id);
        $gittest2->delete();

        return redirect()->route('admin.gittest2s.index');
    }

    /**
     * Delete all selected Gittest2 at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('gittest2_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Gittest2::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Gittest2 from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('gittest2_delete')) {
            return abort(401);
        }
        $gittest2 = Gittest2::onlyTrashed()->findOrFail($id);
        $gittest2->restore();

        return redirect()->route('admin.gittest2s.index');
    }

    /**
     * Permanently delete Gittest2 from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('gittest2_delete')) {
            return abort(401);
        }
        $gittest2 = Gittest2::onlyTrashed()->findOrFail($id);
        $gittest2->forceDelete();

        return redirect()->route('admin.gittest2s.index');
    }
}
