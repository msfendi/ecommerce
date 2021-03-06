@extends('main')

@section('title', 'Product')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="pull-left">
                            <h1 class="card-title">Edit Product</h1>
                        </div>
                        <div class="pull-right">
                            <a href="{{ url('product') }}" class="btn btn-secondary btn-sm">
                                <i class="fa fa-undo"></i> Back
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 offset-md-4">
                                <form action="{{ url('product/'.$product->id) }}" method="post">
                                    {{-- disesuaikan dengan method yang digunakan di routes (patch/put), wajib agar tidak error --}}
                                    @method('patch')
                                    {{-- csrf token, untuk melakukan request post --}}
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Nama Produk</label>
                                        <input type="text" name="nama_produk" class="form-control" value="{{$product->name}}" autofocus required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Price</label>
                                        <input type="text" name="price" class="form-control" value="{{$product->price}}" autofocus required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Image</label>
                                        <input type="text" name="image" class="form-control" value="{{$product->image}}" autofocus required>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection()