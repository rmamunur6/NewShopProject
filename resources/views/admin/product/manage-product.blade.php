@extends('admin.master')
@section('title')
    Manage Product
@endsection
@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="text-center text-success">Manage Product</h4>
                    </div>
                    <div class="panel-body">
                        <h4 class="text-success text-center" id="message">{{ Session::get('message') }}</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr class="bg-primary">
                                    <th>Sl No</th>
                                    <th>Category Name</th>
                                    <th>Brand Name</th>
                                    <th>Product Name</th>
                                    <th>Product Image</th>
                                    <th>Product Price</th>
                                    <th>Product Quantity</th>
                                    <th>Publication Status</th>
                                    <th>Action</th>
                                </tr>
                                @php($i=1)
                                @foreach($products as $product)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $product->category_name }}</td>
                                    <td>{{ $product->brand_name }}</td>
                                    <td>{{ $product->product_name }}</td>
                                    <td>
                                        <img src="{{ asset( $product->product_image ) }}" alt="" height="100" width="100"/>
                                    </td>
                                    <td>{{ $product->product_price }}</td>
                                    <td>{{ $product->product_quantity }}</td>
                                    <td>{{ $product->publication_status ==1 ? 'Published' : 'Unpublished' }}</td>
                                    <td>
                                        <a href="" class="btn btn-info btn-xs" title="view Details">
                                            <span class="glyphicon glyphicon-zoom-in"></span>
                                        </a>
                                        <a href="" class="btn btn-primary btn-xs" title="Published">
                                            <span class="glyphicon glyphicon-arrow-up"></span>
                                        </a>
                                        <a href="{{ route('edit-product',['id'=>$product->id]) }}" class="btn btn-success btn-xs" title="Edit">
                                            <span class="glyphicon glyphicon-edit"></span>
                                        </a>
                                        <a href="" class="btn btn-danger btn-xs" title="Delete">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                    </td>
                                </tr>
                                    @endforeach

                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection