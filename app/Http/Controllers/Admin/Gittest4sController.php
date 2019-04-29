<?php

namespace App\Http\Controllers\Admin;

use App\Gittest4;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreGittest4sRequest;
use App\Http\Requests\Admin\UpdateGittest4sRequest;

class Gittest4sController extends Controller
{
    /**
     * Display a listing of Gittest4.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('gittest_4_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('gittest_4_delete')) {
                return abort(401);
            }
            $gittest_4s = Gittest4::onlyTrashed()->get();
        } else {
            $gittest_4s = Gittest4::all();
        }

        return view('admin.gittest_4s.index', compact('gittest_4s'));
    }

    /**
     * Show the form for creating new Gittest4.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('gittest_4_create')) {
            return abort(401);
        }
        return view('admin.gittest_4s.create');
    }

    /**
     * Store a newly created Gittest4 in storage.
     *
     * @param  \App\Http\Requests\StoreGittest4sRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGittest4sRequest $request)
    {
        if (! Gate::allows('gittest_4_create')) {
            return abort(401);
        }
        $gittest_4 = Gittest4::create($request->all());



        return redirect()->route('admin.gittest_4s.index');
    }


    /**
     * Show the form for editing Gittest4.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('gittest_4_edit')) {
            return abort(401);
        }
        $gittest_4 = Gittest4::findOrFail($id);

        return view('admin.gittest_4s.edit', compact('gittest_4'));
    }

    /**
     * Update Gittest4 in storage.
     *
     * @param  \App\Http\Requests\UpdateGittest4sRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGittest4sRequest $request, $id)
    {
        if (! Gate::allows('gittest_4_edit')) {
            return abort(401);
        }
        $gittest_4 = Gittest4::findOrFail($id);
        $gittest_4->update($request->all());



        return redirect()->route('admin.gittest_4s.index');
    }


    /**
     * Display Gittest4.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('gittest_4_view')) {
            return abort(401);
        }
        $gittest_4 = Gittest4::findOrFail($id);

        return view('admin.gittest_4s.show', compact('gittest_4'));
    }


    /**
     * Remove Gittest4 from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('gittest_4_delete')) {
            return abort(401);
        }
        $gittest_4 = Gittest4::findOrFail($id);
        $gittest_4->delete();

        return redirect()->route('admin.gittest_4s.index');
    }

    /**
     * Delete all selected Gittest4 at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('gittest_4_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Gittest4::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Gittest4 from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('gittest_4_delete')) {
            return abort(401);
        }
        $gittest_4 = Gittest4::onlyTrashed()->findOrFail($id);
        $gittest_4->restore();

        return redirect()->route('admin.gittest_4s.index');
    }

    /**
     * Permanently delete Gittest4 from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('gittest_4_delete')) {
            return abort(401);
        }
        $gittest_4 = Gittest4::onlyTrashed()->findOrFail($id);
        $gittest_4->forceDelete();

        return redirect()->route('admin.gittest_4s.index');
    }
}
