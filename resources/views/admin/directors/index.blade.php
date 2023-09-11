@extends('admin.back')
@section('page_title', 'directors')
@section('content')

<div class="">
    <section class="content mt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <a href="{{route('admin.directors.create')}}" class="btn btn-primary">yeni rejissor əlavə et</a>
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
                                        <th>Category Name</th>
                                        <th>Category Slug</th>
                                        <th>Category Status</th>
                                        <th>Controlls</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($directors as $director)
                                    <tr>
                                        <td>{{ $director->id }}</td>
                                        <td>{{ $director->getTranslation('name', app()->getLocale()) }}</td>
                                        <td>{{ $director->getTranslation('slug', app()->getLocale()) }}</td>
                                        <td>{{ $director->status }}</td>
                                        <td>
                                            <a href="{{route('admin.directors.edit', $director->id)}}" class="btn btn-warning text-light">Rejissoru dəyiş</a>
                                            <form onsubmit="return deleteConfirmation(event)" class="mt-2" method="post" action="{{route('admin.directors.destroy', $director->id)}}">
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
                                {{ $directors->links() }}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
