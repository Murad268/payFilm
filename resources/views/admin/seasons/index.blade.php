@extends('admin.back')
@section('page_title', 'seasons')
@section('content')

<div class="">
    <section class="content mt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <a href="{{route('admin.categories.create')}}" class="btn btn-primary">yeni sezon əlavə et</a>
                            </h3>
                        </div>
                        <div class="card-body">
                            @if($seasons->count() > 0)
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

                                </tbody>
                            </table>

                            <div style="margin: 0 auto; width: max-content" class="pagination mt-2">
                                {{ $seasons->links() }}
                            </div>
                            @else
                            <div class="not-found">Data Not Found</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
