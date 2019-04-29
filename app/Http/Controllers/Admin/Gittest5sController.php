<?php

namespace App\Http\Controllers\Admin;

use App\Gittest5;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreGittest5sRequest;
use App\Http\Requests\Admin\UpdateGittest5sRequest;

class Gittest5sController extends Controller
{
    /**
     * Display a listing of Gittest5.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('gittest_5_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('gittest_5_delete')) {
                return abort(401);
            }
            $gittest_5s = Gittest5::onlyTrashed()->get();
        } else {
            $gittest_5s = Gittest5::all();
        }

        return view('admin.gittest_5s.index', compact('gittest_5s'));
    }

    /**
     * Show the form for creating new Gittest5.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('gittest_5_create')) {
            return abort(401);
        }
        return view('admin.gittest_5s.create');
    }

    /**
     * Store a newly created Gittest5 in storage.
     *
     * @param  \App\Http\Requests\StoreGittest5sRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGittest5sRequest $request)
    {
        if (! Gate::allows('gittest_5_create')) {
            return abort(401);
        }
        $gittest_5 = Gittest5::create($request->all());



        return redirect()->route('admin.gittest_5s.index');
    }


    /**
     * Show the form for editing Gittest5.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('gittest_5_edit')) {
            return abort(401);
        }
        $gittest_5 = Gittest5::findOrFail($id);

        return view('admin.gittest_5s.edit', compact('gittest_5'));
    }

    /**
     * Update Gittest5 in storage.
     *
     * @param  \App\Http\Requests\UpdateGittest5sRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGittest5sRequest $request, $id)
    {
        if (! Gate::allows('gittest_5_edit')) {
            return abort(401);
        }
        $gittest_5 = Gittest5::findOrFail($id);
        $gittest_5->update($request->all());



        return redirect()->route('admin.gittest_5s.index');
    }


    /**
     * Display Gittest5.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('gittest_5_view')) {
            return abort(401);
        }
        $gittest_5 = Gittest5::findOrFail($id);

        return view('admin.gittest_5s.show', compact('gittest_5'));
    }


    /**
     * Remove Gittest5 from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('gittest_5_delete')) {
            return abort(401);
        }
        $gittest_5 = Gittest5::findOrFail($id);
        $gittest_5->delete();

        return redirect()->route('admin.gittest_5s.index');
    }

    /**
     * Delete all selected Gittest5 at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('gittest_5_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Gittest5::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Gittest5 from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('gittest_5_delete')) {
            return abort(401);
        }
        $gittest_5 = Gittest5::onlyTrashed()->findOrFail($id);
        $gittest_5->restore();

        return redirect()->route('admin.gittest_5s.index');
    }

    /**
     * Permanently delete Gittest5 from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('gittest_5_delete')) {
            return abort(401);
        }
        $gittest_5 = Gittest5::onlyTrashed()->findOrFail($id);
        $gittest_5->forceDelete();

        return redirect()->route('admin.gittest_5s.index');
    }
}
