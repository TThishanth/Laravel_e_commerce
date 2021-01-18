@extends('layouts.admin')

@section('content')
    <div class="sl-mainpanel">
        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Brand Table</h5>
            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Brand List
                    <a href="#" class="btn btn-sm btn-warning" style="float: right;" data-toggle="modal"
                        data-target="#addNewBrand">Add New</a>
                </h6>

                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                            <tr>
                                <th class="wd-15p">ID</th>
                                <th class="wd-15p">Brand name</th>
                                <th class="wd-15p">Brand Logo</th>
                                <th class="wd-20p">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($brands as $brand)
                                <tr>
                                    <td>{{ $brand->id }}</td>
                                    <td>{{ $brand->brand_name }}</td>
                                    <td><img width="70" src="{{ asset($brand->brand_logo) }}"
                                            alt="{{ $brand->brand_name }}"> </td>
                                    <td>
                                        <div class="row">
                                            <div>
                                                <a href="{{ route('brand.edit', [$brand->id]) }}"
                                                    class="btn btn-sm btn-info">
                                                    Edit </a>
                                            </div>
                                            <div style="margin-left: 10px">
                                                <form method="POST" action="{{ route('brand.destroy', [$brand->id]) }}">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    
                                                    <a href="#" onclick="event.preventDefault();"
                                                        class="btn btn-sm btn-danger" id="delete">Delete</a>
                                                </form>
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


    <div id="addNewBrand" class="modal fade">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
                <div class="modal-header pd-x-20">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add Category</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="post" action="{{ route('brand.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="modal-body pd-20">

                        <div class="mb-3">
                            <label for="inputBrand" class="form-label">Brand Name</label>
                            <input type="text" class="form-control {{ $errors->has('brand_name') ? 'error' : '' }}"
                                id="inputBrand" placeholder="Brand" name="brand_name">

                            <!-- Error -->
                            @if ($errors->has('brand_name'))
                                <div class="error" style="color: red;">
                                    {{ $errors->first('brand_name') }}
                                </div>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="inputBrandLogo" class="form-label">Brand Logo</label>
                            <input type="file" class="form-control" id="inputBrandLogo" placeholder="Brand Logo"
                                name="brand_logo">
                        </div>

                    </div><!-- modal-body -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info pd-x-20">Create</button>
                        <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div><!-- modal-dialog -->
    </div>
@endsection
