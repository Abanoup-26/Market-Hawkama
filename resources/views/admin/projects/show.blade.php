@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-md-3">
        <div class="card">
            <div class="card-header">
                {{ trans('global.show') }} {{ trans('cruds.project.title') }}
            </div>
        
            <div class="card-body">
                <div class="form-group">
                    <div class="form-group">
                        <a class="btn btn-default" href="{{ route('admin.projects.index') }}">
                            {{ trans('global.back_to_list') }}
                        </a>
                    </div>
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <th>
                                    {{ trans('cruds.project.fields.id') }}
                                </th>
                                <td>
                                    {{ $project->id }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.project.fields.title') }}
                                </th>
                                <td>
                                    {{ $project->title }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.project.fields.date') }}
                                </th>
                                <td>
                                    {{ $project->date }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.project.fields.collected') }}
                                </th>
                                <td>
                                    {{ $project->collected }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.project.fields.goal') }}
                                </th>
                                <td>
                                    {{ $project->goal }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.project.fields.image') }}
                                </th>
                                <td>
                                    @foreach($project->image as $key => $media)
                                        <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                            <img src="{{ $media->getUrl('thumb') }}">
                                        </a>
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.project.fields.file') }}
                                </th>
                                <td>
                                    @if($project->file)
                                        <a href="{{ $project->file->getUrl() }}" target="_blank">
                                            {{ trans('global.view_file') }}
                                        </a>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.project.fields.short_description') }}
                                </th>
                                <td>
                                    {{ $project->short_description }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.project.fields.description') }}
                                </th>
                                <td>
                                    {!! $project->description !!}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.project.fields.published') }}
                                </th>
                                <td>
                                    <input type="checkbox" disabled="disabled" {{ $project->published ? 'checked' : '' }}>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="form-group">
                        <a class="btn btn-default" href="{{ route('admin.projects.index') }}">
                            {{ trans('global.back_to_list') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">
                {{ trans('global.relatedData') }}
            </div>
            <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
                <li class="nav-item active">
                    <a class="nav-link" href="#project_payments" role="tab" data-toggle="tab">
                        {{ trans('cruds.payment.title') }}
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" role="tabpanel" id="project_payments">
                    @includeIf('admin.projects.relationships.projectPayments', ['payments' => $project->projectPayments])
                </div>
            </div>
        </div>
    </div>
</div>


@endsection