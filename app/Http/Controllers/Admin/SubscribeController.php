<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySubscribeRequest;
use App\Http\Requests\StoreSubscribeRequest;
use App\Http\Requests\UpdateSubscribeRequest;
use App\Models\Subscribe;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SubscribeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('subscribe_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subscribes = Subscribe::all();

        return view('admin.subscribes.index', compact('subscribes'));
    }

    public function create()
    {
        abort_if(Gate::denies('subscribe_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.subscribes.create');
    }

    public function store(StoreSubscribeRequest $request)
    {
        $subscribe = Subscribe::create($request->all());

        return redirect()->route('admin.subscribes.index');
    }

    public function edit(Subscribe $subscribe)
    {
        abort_if(Gate::denies('subscribe_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.subscribes.edit', compact('subscribe'));
    }

    public function update(UpdateSubscribeRequest $request, Subscribe $subscribe)
    {
        $subscribe->update($request->all());

        return redirect()->route('admin.subscribes.index');
    }

    public function show(Subscribe $subscribe)
    {
        abort_if(Gate::denies('subscribe_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.subscribes.show', compact('subscribe'));
    }

    public function destroy(Subscribe $subscribe)
    {
        abort_if(Gate::denies('subscribe_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subscribe->delete();

        return back();
    }

    public function massDestroy(MassDestroySubscribeRequest $request)
    {
        $subscribes = Subscribe::find(request('ids'));

        foreach ($subscribes as $subscribe) {
            $subscribe->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
