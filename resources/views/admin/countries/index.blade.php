@extends('admin.back')
@section('page_title', 'countries')
@section('content')

<div class="">
    <section class="content mt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <a href="{{route('admin.countries.create')}}" class="btn btn-primary">yeni ölkə əlavə et</a>
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
                                        <th>Country Name</th>
                                        <th>Country Slug</th>
                                        <th>Country Status</th>
                                        <th>Controlls</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($countries as $country)
                                    <tr>
                                        <td>{{ $country->id }}</td>
                                        <td>{{ $country->getTranslation('name', app()->getLocale()) }}</td>
                                        <td>{{ $country->getTranslation('slug', app()->getLocale()) }}</td>
                                        <td>{{ $country->status }}</td>
                                        <td>
                                            <a href="{{route('admin.countries.edit', $country->id)}}" class="btn btn-warning text-light">Rejissoru dəyiş</a>
                                            <form onsubmit="return deleteConfirmation(event)" class="mt-2" method="post" action="{{route('admin.countries.destroy', $country->id)}}">
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
                                {{ $countries->links() }}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
