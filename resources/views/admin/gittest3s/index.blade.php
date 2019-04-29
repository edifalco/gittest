@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.gittest3.title')</h3>
    @can('gittest3_create')
    <p>
        <a href="{{ route('admin.gittest3s.create') }}" class="btn btn-success">@lang('global.app_add_new')</a>
        
    </p>
    @endcan

    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.gittest3s.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('global.app_all')</a></li> |
            <li><a href="{{ route('admin.gittest3s.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('global.app_trash')</a></li>
        </ul>
    </p>
    

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($gittest3s) > 0 ? 'datatable' : '' }} @can('gittest3_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('gittest3_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

                        <th>@lang('global.gittest3.fields.name')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($gittest3s) > 0)
                        @foreach ($gittest3s as $gittest3)
                            <tr data-entry-id="{{ $gittest3->id }}">
                                @can('gittest3_delete')
                                    @if ( request('show_deleted') != 1 )<td></td>@endif
                                @endcan

                                <td field-key='name'>{{ $gittest3->name }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.gittest3s.restore', $gittest3->id])) !!}
                                    {!! Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.gittest3s.perma_del', $gittest3->id])) !!}
                                    {!! Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>
                                    @can('gittest3_view')
                                    <a href="{{ route('admin.gittest3s.show',[$gittest3->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('gittest3_edit')
                                    <a href="{{ route('admin.gittest3s.edit',[$gittest3->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('gittest3_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.gittest3s.destroy', $gittest3->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">@lang('global.app_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('gittest3_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.gittest3s.mass_destroy') }}'; @endif
        @endcan

    </script>
@endsection