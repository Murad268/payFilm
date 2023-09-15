@extends('admin.back')
@section('page_title', 'directors')
@section('content')
<style>
    .content-wrapper {
        max-width: max-content;
        width: 100%;
    }
</style>
<div class="">
    <section class="content mt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <a href="{{route('admin.series.create')}}" class="btn btn-primary">yeni serial əlavə et</a>
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
                                        <th>Director Name</th>
                                        <th>Director Slug</th>
                                        <th>Director Status</th>
                                        <th>Controlls</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($series as $serie)
                                    <tr>
                                        <td>{{$serie->id}}</td>
                                        <td>{{ $serie->getTranslation('name', app()->getLocale()) }}</td>
                                        <td>{{ $serie->getTranslation('slug', app()->getLocale()) }}</td>
                                        <td> <a target="_blank" href="{{asset('assets/front/images/'.$serie->poster)}}"><img style="width: 60px; height: 80px" src="{{asset('assets/front/images/'.$serie->poster)}}" alt=""></a>
                                        </td>
                                        <td> <a target="_blank" href="{{asset('assets/front/images/'.$serie->banner)}}"><img style="width: 90px; height: 50px" src="{{asset('assets/front/images/'.$serie->banner)}}" alt=""></a>
                                        </td>
                                        <td>{{ $serie->length}}</td>
                                        <td>{{ $serie->link }}</td>
                                        <td>{{$serie->ytrailer}}</td>
                                        <td>{{$serie->quality}}</td>
                                        <td>{{ $serie->getTranslation('actors', app()->getLocale()) }}</td>
                                        <td>{{ $serie->getTranslation('scriptwriters', app()->getLocale()) }}</td>
                                        <td>{{ $serie->getTranslation('directors', app()->getLocale()) }}</td>
                                        <td>{{ $serie->getTranslation('countries', app()->getLocale()) }}</td>


                                        <td>{{ $serie->movie_categories->name }}</td>
                                        <td>{{ $serie->movie_home_categories->cat_name }}</td>

                                        <td>{{$serie->release}}</td>
                                        <td>{!! $serie->getTranslation('desc', app()->getLocale()) !!}</td>

                                        <td>{{$serie->status}}</td>
                                        <td>
                                            <a href="{{route('admin.series.edit', $serie->id)}}" class="btn btn-warning text-light">Rejissoru dəyiş</a>
                                            <form onsubmit="return deleteConfirmation(event)" class="mt-2" method="post" action="{{route('admin.series.destroy', $serie->id)}}">
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
                                {{ $series->links() }}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
