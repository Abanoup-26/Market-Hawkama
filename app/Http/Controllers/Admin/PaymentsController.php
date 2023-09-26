<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPaymentRequest;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Models\Payment;
use App\Models\Project;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PaymentsController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('payment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Payment::with(['user', 'projects'])->select(sprintf('%s.*', (new Payment)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'payment_show';
                $crudRoutePart = 'payments';

                return view('partials.paymentActions', compact(
                    'viewGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->addColumn('user_name', function ($row) {
                return $row->user ? $row->user->name : '';
            });

            $table->editColumn('payment_orderid', function ($row) {
                return $row->payment_orderid ? $row->payment_orderid : '';
            });
            $table->editColumn('donation_num', function ($row) {
                return $row->donation_num ? $row->donation_num : '';
            });
            $table->editColumn('donation', function ($row) {
                return $row->donation ? $row->donation : '';
            });
            $table->editColumn('payment_status', function ($row) {
                return $row->payment_status ? Payment::PAYMENT_STATUS_RADIO[$row->payment_status] : '';
            });
            $table->editColumn('payment_type', function ($row) {
                return $row->payment_type ? Payment::PAYMENT_TYPE_SELECT[$row->payment_type] : '';
            });
            $table->editColumn('project', function ($row) {
                $labels = [];
                foreach ($row->projects as $project) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $project->title);
                }

                return implode(' ', $labels);
            });

            $table->rawColumns(['actions', 'placeholder', 'user', 'project']);

            return $table->make(true);
        }

        return view('admin.payments.index');
    }

    public function create()
    {
        abort_if(Gate::denies('payment_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $projects = Project::pluck('title', 'id');

        return view('admin.payments.create', compact('projects', 'users'));
    }

    // public function store(StorePaymentRequest $request)
    // {
    //     $payment = Payment::create($request->all());
    //     $payment->projects()->sync($request->input('projects', []));

    //     return redirect()->route('admin.payments.index');
    // }

    // public function edit(Payment $payment)
    // {
    //     abort_if(Gate::denies('payment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    //     $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

    //     $projects = Project::pluck('title', 'id');

    //     $payment->load('user', 'projects');

    //     return view('admin.payments.edit', compact('payment', 'projects', 'users'));
    // }

    // public function update(UpdatePaymentRequest $request, Payment $payment)
    // {
    //     $payment->update($request->all());
    //     $payment->projects()->sync($request->input('projects', []));

    //     return redirect()->route('admin.payments.index');
    // }

    public function show(Payment $payment)
    {
        abort_if(Gate::denies('payment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $payment->load('user', 'projects');

        return view('admin.payments.show', compact('payment'));
    }

    // public function destroy(Payment $payment)
    // {
    //     abort_if(Gate::denies('payment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    //     $payment->delete();

    //     return back();
    // }

    // public function massDestroy(MassDestroyPaymentRequest $request)
    // {
    //     $payments = Payment::find(request('ids'));

    //     foreach ($payments as $payment) {
    //         $payment->delete();
    //     }

    //     return response(null, Response::HTTP_NO_CONTENT);
    // }
}