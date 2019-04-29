<?php

namespace App\Http\Controllers\Admin;

use App\Gittest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreGittestsRequest;
use App\Http\Requests\Admin\UpdateGittestsRequest;

class GittestsController extends Controller
{
    /**
     * Display a listing of Gittest.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('gittest_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('gittest_delete')) {
                return abort(401);
            }
            $gittests = Gittest::onlyTrashed()->get();
        } else {
            $gittests = Gittest::all();
        }

        return view('admin.gittests.index', compact('gittests'));
    }

    /**
     * Show the form for creating new Gittest.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('gittest_create')) {
            return abort(401);
        }
        return view('admin.gittests.create');
    }

    /**
     * Store a newly created Gittest in storage.
     *
     * @param  \App\Http\Requests\StoreGittestsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGittestsRequest $request)
    {
        if (! Gate::allows('gittest_create')) {
            return abort(401);
        }
        $gittest = Gittest::create($request->all());



        return redirect()->route('admin.gittests.index');
    }


    /**
     * Show the form for editing Gittest.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('gittest_edit')) {
            return abort(401);
        }
        $gittest = Gittest::findOrFail($id);

        return view('admin.gittests.edit', compact('gittest'));
    }

    /**
     * Update Gittest in storage.
     *
     * @param  \App\Http\Requests\UpdateGittestsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGittestsRequest $request, $id)
    {
        if (! Gate::allows('gittest_edit')) {
            return abort(401);
        }
        $gittest = Gittest::findOrFail($id);
        $gittest->update($request->all());



        return redirect()->route('admin.gittests.index');
    }


    /**
     * Display Gittest.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('gittest_view')) {
            return abort(401);
        }
        $gittest = Gittest::findOrFail($id);

        return view('admin.gittests.show', compact('gittest'));
    }


    /**
     * Remove Gittest from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('gittest_delete')) {
            return abort(401);
        }
        $gittest = Gittest::findOrFail($id);
        $gittest->delete();

        return redirect()->route('admin.gittests.index');
    }

    /**
     * Delete all selected Gittest at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('gittest_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Gittest::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Gittest from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('gittest_delete')) {
            return abort(401);
        }
        $gittest = Gittest::onlyTrashed()->findOrFail($id);
        $gittest->restore();

        return redirect()->route('admin.gittests.index');
    }

    /**
     * Permanently delete Gittest from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('gittest_delete')) {
            return abort(401);
        }
        $gittest = Gittest::onlyTrashed()->findOrFail($id);
        $gittest->forceDelete();

        return redirect()->route('admin.gittests.index');
    }
}
