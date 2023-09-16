@extends('admin.back')
@section('page_title', 'directors')
@section('content')
<style>
    .card-body {
        overflow-x: scroll;
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
                            @if($series->count())
                            @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                            @endif
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Movie Name</th>
                                        <th>Movie Slug</th>
                                        <th>Movie Poster</th>
                                        <th>Movie Banner</th>
                                        <th>Movie Length</th>
                                        <th>Movie Link</th>
                                        <th>Movie Youtube Trailer</th>
                                        <th>Movie Quality</th>
                                        <th>Movie Actors</th>
                                        <th>Movie Scriptwriters</th>
                                        <th>Movie Directors</th>
                                        <th>Movie Countries</th>
                                        <th>Movie Category</th>
                                        <th>Movie Home Category</th>
                                        <th>Movie Release Date</th>
                                        <th>Movie Description</th>
                                        <th>Season Count</th>
                                        <th>Movie Status</th>
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
                                        <td>
                                            <div>{{$serie->serie_seasons()->count()}}</div>
                                            <a href="{{route('admin.seasons.index', $serie->id)}}" style="width: max-content" class="mt-2 btn btn-primary">see seasons</a>
                                        </td>
                                        <td>
                                            @if($serie->status)
                                            <div class="btn btn-danger swalDefaultError">active</div>
                                            @else
                                            <div class="btn btn-danger swalDefaultError">passive</div>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('admin.series.edit', $serie->id)}}" class="btn btn-warning text-light">Serialı dəyiş</a>
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
                            @else
                            <div class="not-found">Data Not Found</div>
                            @endif
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
