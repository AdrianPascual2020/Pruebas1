@extends('layouts.app')

@section('titlePage', trans('task.tasks'))

@section('content')
    <div class="grid grid-flow-row auto-rows-max space-y-4 py-20 divide-y-4 divide-black">
        <h2 class="font-bold text-3xl">@lang('common.manager') @lang('common.of') @lang('task.tasks')</h2>
        <div class="space-y-2">

            <form class="form-create-task grid gap-4 grid-flow-col auto-cols-max my-4" method="PUT" action="{{ route('store') }}">
                @csrf

                <input type="text" name="name"
                    placeholder="@lang('task.fields.name')"
                    class="p-2 rounded border text-gray-400 placeholder-gray-400" />

                @foreach($params['categories'] as $category)
                    <label class="flex items-center space-x-3">
                        <input type="checkbox" name="category[]" value="{{ $category->id }}">
                        <span class="text-gray-600">{{ $category->name }}</span>
                    </label>
                @endforeach

                <button onclick="createTask($(this))" class="border-blue-500 bg-blue-400 text-white py-2 px-4 rounded" type="button">@lang('common.add')</button>
            </form>

            <table id="tableTask" class="mx-auto w-full text-center" data-get="{{ route('get') }}">
                <thead class="bg-blue-400 text-white">
                    <tr>
                        <th>@lang('task.fields.id')</th>
                        <th>@lang('task.fields.name')</th>
                        <th>@lang('task.fields.categories')</th>
                        <th>@lang('common.actions')</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@push('extraStyles')
    <link href="//cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" rel="stylesheet">
@endpush

@push('extraScripts')
    <script type="text/javascript" src="//cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="{{ mix('js/task.js') }}"></script>
@endpush
