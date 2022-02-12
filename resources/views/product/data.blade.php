@extends('main')

@section('title', 'Product')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <div class="pull-left">
                            <h1 class="card-title">Data Product</h1>
                        </div>
                        <div class="pull-right">
                            <a href="{{ url('product/add') }}" class="btn btn-success btn-sm">
                                <i class="fa fa-plus"></i> Create
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Product Name</th>
                                    <th>Prize</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($product as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->price}}</td>
                                    <td>{{$item->image}}</td>
                                    <td class="text-center">
                                        <a href="{{ url('product/edit/'.$item->id) }}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-pen"></i>
                                        </a>
                                        <form action="{{ url('product/'.$item->id) }}" method="post" class="d-inline" onsubmit="return confirm('Anda Akan Menghapus Data ?')">
                                            @method('delete')
                                            @csrf
                                            <button class="btn-danger btn-sm">
                                                <i class="fa fa-trash"></i>
                                            </button>
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
@endsection()