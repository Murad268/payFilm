@extends('admin.back')
@section('page_title', 'director edit')
@section('content')
<div class="">

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form method="post" action="{{route('admin.directors.update', $director->id)}}">
                        @csrf
                        @method('put')
                        <div class="card-body">
                            @foreach(LaravelLocalization::getSupportedLanguagesKeys() as $lang)
                            <div class="form-group">
                                <label for="exampleInputPassword1">Kategoriyanın adı {{$lang}} dilində</label>
                                <input name="name[{{ $lang }}]" value="{{ old('name.' . $lang, $director->getTranslation('name', $lang)) }}" type="text" class="form-control" placeholder="Rejissorun adını daxil edin">
                            </div>
                            @endforeach

                            @error("name.$lang")
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            @foreach(LaravelLocalization::getSupportedLanguagesKeys() as $lang)
                            <div class="form-group">
                                <label for="exampleInputPassword1">Kategoriya slug {{$lang}} dilində</label>
                                <input name='slug[{{$lang}}]' value="{{ old('slug.' . $lang, $director->getTranslation('slug', $lang)) }}" type="text" class="form-control" placeholder="Rejissor slug daxil edin">
                            </div>
                            @error("slug.$lang")
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            @endforeach
                            <div class="form-check">
                                <input name='status' type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">rejissor statusu</label>
                            </div>
                            @error('status')
                            <div class="alert alert-danger mt-2" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Rejissoru yenilə</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
