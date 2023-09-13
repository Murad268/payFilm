@extends('admin.back')
@section('page_title', 'movie add')
@section('content')
<div class="">

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form method="post" action="{{route('admin.movies.store')}}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <select style="width: 100%;" class="js-example-basic-multiple" name="countries[]" multiple="multiple" data-url="{{ route('admin.get-more-options') }}">
                                </select>
                            </div>
                            <div class="form-group">
                                <select style="width: 100%;" class="js-example-basic-multiple" name="directors[]" multiple="multiple" data-url="{{ route('admin.get-more-directors') }}">
                                </select>
                            </div>
                            <div class="form-group">
                                <select style="width: 100%;" class="js-example-basic-multiple" name="countries[]" multiple="scriptwriters" data-url="{{ route('admin.get-more-scriptwriters') }}">
                                </select>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Kateqoriyanı əlavə et</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
