@extends('layouts.admin')

@section('content')
    <div class="sl-mainpanel">
        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Coupon Table</h5>
            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Coupon List
                    <a href="#" class="btn btn-sm btn-warning" style="float: right;" data-toggle="modal"
                        data-target="#addNewCoupon">Add New</a>
                </h6>

                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                            <tr>
                                <th class="wd-15p">ID</th>
                                <th class="wd-15p">Coupon Code</th>
                                <th class="wd-15p">Coupon Percentage</th>
                                <th class="wd-20p">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($coupons as $coupon)
                                <tr>
                                    <td>{{ $coupon->id }}</td>
                                    <td>{{ $coupon->coupon }}</td>
                                    <td>{{ $coupon->discount }}</td>
                                    <td>
                                        <div class="row">
                                            <div>
                                                <a href="{{ route('coupon.edit', [$coupon->id]) }}"
                                                    class="btn btn-sm btn-info">
                                                    Edit </a>
                                            </div>
                                            <div style="margin-left: 10px;">
                                                <form method="POST"
                                                    action="{{ route('coupon.destroy', [$coupon->id]) }}">
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


    <div id="addNewCoupon" class="modal fade">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
                <div class="modal-header pd-x-20">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add Sub Category</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="post" action="{{ route('coupon.store') }}">
                    @csrf

                    <div class="modal-body pd-20">

                        <div class="mb-3">
                            <label for="inputCoupon" class="form-label">Coupon Code</label>
                            <input type="text" class="form-control {{ $errors->has('coupon') ? 'error' : '' }}"
                                id="inputCoupon" placeholder="Coupon" name="coupon">

                            <!-- Error -->
                            @if ($errors->has('coupon'))
                                <div class="error" style="color: red;">
                                    {{ $errors->first('coupon') }}
                                </div>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="inputDiscount" class="form-label">Coupon Percentage (%)</label>
                            <input type="text" class="form-control {{ $errors->has('discount') ? 'error' : '' }}"
                                id="inputDiscount" placeholder="Discount" name="discount">

                            <!-- Error -->
                            @if ($errors->has('discount'))
                                <div class="error" style="color: red;">
                                    {{ $errors->first('discount') }}
                                </div>
                            @endif
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
