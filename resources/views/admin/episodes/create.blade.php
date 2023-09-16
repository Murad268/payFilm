@extends('admin.back')
@section('page_title', 'season add')
@section('content')
<div class="">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form method="post" action="{{route('admin.seasons.episodes.store',  ['id' => $id,'serie_id' => $serie_id])}}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Epizodun nömrəsi</label>
                                <input name="episode_order" value="{{ old('episode_order') }}" type="text" class="form-control" placeholder="Epizodun nömrəsini adını daxil edin">
                            </div>
                            @error("episode_order")
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            @foreach(LaravelLocalization::getSupportedLanguagesKeys() as $lang)
                            <div class="form-group">
                                <label for="exampleInputPassword1">Epizodun adı {{$lang}} dilində</label>
                                <input name="episode_name[{{ $lang }}]" value="{{ old('episode_name.' . $lang) }}" type="text" class="form-control" placeholder="Epizodun adını daxil edin">
                            </div>
                            @endforeach
                            @error("episode_name.$lang")
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            @foreach(LaravelLocalization::getSupportedLanguagesKeys() as $lang)
                            <div class="form-group">
                                <label for="exampleInputPassword1">Epizodun slug {{$lang}} dilində</label>
                                <input name='slug[{{$lang}}]' value="{{ old('slug.' . $lang) }}" type="text" class="form-control" placeholder="Epizodun slug daxil edin">
                            </div>
                            @error("slug.$lang")
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            @endforeach

                            <div class="form-group">
                                <label for="exampleInputPassword1">Epizodun linki:</label>
                                <input name="link" value="{{ old('link') }}" type="text" class="form-control" placeholder="Epizodun linkini daxil edin">
                            </div>
                            @error("link")
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Epizodu əlavə et</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
