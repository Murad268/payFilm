@extends('admin.back')
@section('page_title', 'actors')
@section('content')

<div class="">
    <section class="content mt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <a href="{{route('admin.actors.create')}}" class="btn btn-primary">yeni aktyor əlavə et</a>
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
                                        <th>Actor Name</th>
                                        <th>Actor Slug</th>
                                        <th>Actor Status</th>
                                        <th>Controlls</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($actors as $actor)
                                    <tr>
                                        <td>{{ $actor->id }}</td>
                                        <td>{{ $actor->getTranslation('name', app()->getLocale()) }}</td>
                                        <td>{{ $actor->getTranslation('slug', app()->getLocale()) }}</td>
                                        <td>{{ $actor->status }}</td>
                                        <td>
                                            <a href="{{route('admin.actors.edit', $actor->id)}}" class="btn btn-warning text-light">Kategoriyanı dəyiş</a>
                                            <form onsubmit="return deleteConfirmation(event)" class="mt-2" method="post" action="{{route('admin.actors.destroy', $actor->id)}}">
                                                @csrf
                                                @method("delete")
                                                <input class="btn btn-danger" value="delete" type="submit">
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
