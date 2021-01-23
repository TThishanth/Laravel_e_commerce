@extends('layouts.admin')

@section('content')
    <div class="sl-mainpanel">
        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Product Table</h5>
            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Product List</h6>

                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                            <tr>
                                <th class="wd-15p">Product Code</th>
                                <th class="wd-15p">Product name</th>
                                <th class="wd-15p">Image</th>
                                <th class="wd-20p">Category</th>
                                <th class="wd-20p">Brand</th>
                                <th class="wd-20p">Quantity</th>
                                <th class="wd-20p">Status</th>
                                <th class="wd-20p">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->product_code }}</td>
                                    <td>{{ $product->product_name }}</td>
                                    <td><img width="50" src="{{ asset('storage/'.$product->image_one) }}"
                                            alt="{{ $product->product_name }}"> </td>
                                    <td>{{ $product->category_name }}</td>
                                    <td>{{ $product->brand_name }}</td>
                                    <td>{{ $product->product_quantity }}</td>
                                    <td>
                                        @if ($product->status == 1)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="row">
                                            <div class="col-3">
                                                <a href="{{ route('product.edit', [$product->id]) }}"
                                                    class="btn btn-sm btn-info" title="Edit">
                                                    <i class="fa fa-edit"></i> </a>
                                            </div>
                                            <div class="col-3">
                                                <form method="POST" action="{{ route('product.destroy', [$product->id]) }}">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}

                                                    <a href="#" onclick="event.preventDefault();"
                                                        class="btn btn-sm btn-danger" id="delete" title="Delete"><i class="fa fa-trash"></i></a>
                                                </form>
                                            </div>
                                            <div class="col-3">
                                                <a href="{{ route('product.showproduct', [$product->id]) }}"
                                                    class="btn btn-sm btn-warning" title="View">
                                                    <i class="fa fa-eye"></i> </a>
                                            </div>
                                            <div class="col-3">
                                                @if ($product->status == 1)
                                                <a href="{{ route('product.inactive', [$product->id]) }}"
                                                    class="btn btn-sm btn-danger" title="Inactivate">
                                                    <i class="fa fa-thumbs-down"></i> </a>
                                                @else
                                                <a href="{{ route('product.active', [$product->id]) }}"
                                                    class="btn btn-sm btn-info" title="Activate">
                                                    <i class="fa fa-thumbs-up"></i> </a>
                                                @endif                                                
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div><!-- table-wrapper -->
            </div><!-- card -->
        </div><!-- sl-pagebody -->
    </div>
@endsection
