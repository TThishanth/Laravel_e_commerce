@extends('layouts.admin')

@section('content')
    <div class="sl-mainpanel">
        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Brand Update</h5>
            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Brand Update
                </h6>

                <div class="table-wrapper">
                    <form method="post" action="{{ route('brand.update', [$brand->id]) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="modal-body pd-20">

                            <div class="mb-3">
                                <label for="inputBrand" class="form-label">Brand Name</label>
                                <input type="text" class="form-control {{ $errors->has('brand_name') ? 'error' : '' }}"
                                    id="inputBrand" placeholder="Category" value="{{ $brand->brand_name }}"
                                    name="brand_name">

                                <!-- Error -->
                                @if ($errors->has('brand_name'))
                                    <div class="error" style="color: red;">
                                        {{ $errors->first('brand_name') }}
                                    </div>
                                @endif
                            </div>

                            <div class="mb-3">
                                <label for="inputBrandLogo" class="form-label">New Brand Logo</label>
                                <input type="file" class="form-control" id="inputBrandLogo" placeholder="Brand Logo"
                                    name="brand_logo">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Existing Brand Logo</label><br>
                                <img width="70" src="{{ asset($brand->brand_logo) }}"
                                            alt="{{ $brand->brand_name }}">
                                <input type="hidden" name="existing_logo" value="{{ $brand->brand_logo }}">
                            </div>

                        </div><!-- modal-body -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-info pd-x-20">Update</button>
                        </div>
                    </form>
                </div><!-- table-wrapper -->
            </div><!-- card -->
        </div><!-- sl-pagebody -->
    </div>

@endsection
