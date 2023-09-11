@extends('admin.back')
@section('page_title', 'scriptwriters')
@section('content')

<div class="">
    <section class="content mt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <a href="{{route('admin.scriptwriters.create')}}" class="btn btn-primary">yeni ssenarist əlavə et</a>
                            </h3>

                        </div>
                        <div class="card-body">
                            @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                            @endif
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Scriptwriter Name</th>
                                        <th>Scriptwriter Slug</th>
                                        <th>Scriptwriter Status</th>
                                        <th>Controlls</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($scriptwriters as $scriptwriter)
                                    <tr>
                                        <td>{{ $scriptwriter->id }}</td>
                                        <td>{{ $scriptwriter->getTranslation('name', app()->getLocale()) }}</td>
                                        <td>{{ $scriptwriter->getTranslation('slug', app()->getLocale()) }}</td>
                                        <td>{{ $scriptwriter->status }}</td>
                                        <td>
                                            <a href="{{route('admin.scriptwriters.edit', $scriptwriter->id)}}" class="btn btn-warning text-light">Ssenaristi dəyiş</a>
                                            <form onsubmit="return deleteConfirmation(event)" class="mt-2" method="post" action="{{route('admin.scriptwriters.destroy', $scriptwriter->id)}}">
                                                @csrf
                                                @method("delete")
                                                <input class="btn btn-danger" value="delete" type="submit">
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <div style="margin: 0 auto; width: max-content" class="pagination mt-2">
                                {{ $scriptwriters->links() }}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
