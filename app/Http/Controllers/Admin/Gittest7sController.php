<?php

namespace App\Http\Controllers\Admin;

use App\Gittest7;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreGittest7sRequest;
use App\Http\Requests\Admin\UpdateGittest7sRequest;

class Gittest7sController extends Controller
{
    /**
     * Display a listing of Gittest7.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('gittest_7_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('gittest_7_delete')) {
                return abort(401);
            }
            $gittest_7s = Gittest7::onlyTrashed()->get();
        } else {
            $gittest_7s = Gittest7::all();
        }

        return view('admin.gittest_7s.index', compact('gittest_7s'));
    }

    /**
     * Show the form for creating new Gittest7.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('gittest_7_create')) {
            return abort(401);
        }
        return view('admin.gittest_7s.create');
    }

    /**
     * Store a newly created Gittest7 in storage.
     *
     * @param  \App\Http\Requests\StoreGittest7sRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGittest7sRequest $request)
    {
        if (! Gate::allows('gittest_7_create')) {
            return abort(401);
        }
        $gittest_7 = Gittest7::create($request->all());



        return redirect()->route('admin.gittest_7s.index');
    }


    /**
     * Show the form for editing Gittest7.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('gittest_7_edit')) {
            return abort(401);
        }
        $gittest_7 = Gittest7::findOrFail($id);

        return view('admin.gittest_7s.edit', compact('gittest_7'));
    }

    /**
     * Update Gittest7 in storage.
     *
     * @param  \App\Http\Requests\UpdateGittest7sRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGittest7sRequest $request, $id)
    {
        if (! Gate::allows('gittest_7_edit')) {
            return abort(401);
        }
        $gittest_7 = Gittest7::findOrFail($id);
        $gittest_7->update($request->all());



        return redirect()->route('admin.gittest_7s.index');
    }


    /**
     * Display Gittest7.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('gittest_7_view')) {
            return abort(401);
        }
        $gittest_7 = Gittest7::findOrFail($id);

        return view('admin.gittest_7s.show', compact('gittest_7'));
    }


    /**
     * Remove Gittest7 from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('gittest_7_delete')) {
            return abort(401);
        }
        $gittest_7 = Gittest7::findOrFail($id);
        $gittest_7->delete();

        return redirect()->route('admin.gittest_7s.index');
    }

    /**
     * Delete all selected Gittest7 at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('gittest_7_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Gittest7::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Gittest7 from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('gittest_7_delete')) {
            return abort(401);
        }
        $gittest_7 = Gittest7::onlyTrashed()->findOrFail($id);
        $gittest_7->restore();

        return redirect()->route('admin.gittest_7s.index');
    }

    /**
     * Permanently delete Gittest7 from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('gittest_7_delete')) {
            return abort(401);
        }
        $gittest_7 = Gittest7::onlyTrashed()->findOrFail($id);
        $gittest_7->forceDelete();

        return redirect()->route('admin.gittest_7s.index');
    }
}
