@extends('layouts.admin')

@section('content')
    <div class="sl-mainpanel">
        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Coupon Update</h5>
            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Coupon Update
                </h6>

                <div class="table-wrapper">
                    <form method="post" action="{{ route('coupon.update', [$coupon->id]) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="modal-body pd-20">

                            <div class="mb-3">
                                <label for="inputCoupon" class="form-label">Coupon Code</label>
                                <input type="text" class="form-control {{ $errors->has('coupon') ? 'error' : '' }}"
                                    id="inputCoupon" placeholder="Coupon" value="{{ $coupon->coupon }}" name="coupon">
    
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
                                    id="inputDiscount" placeholder="Discount" value="{{ $coupon->discount }}" name="discount">
    
                                <!-- Error -->
                                @if ($errors->has('discount'))
                                    <div class="error" style="color: red;">
                                        {{ $errors->first('discount') }}
                                    </div>
                                @endif
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
