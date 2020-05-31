@extends('admin.admin_layouts')

@section('admin_content')

  <div class="sl-mainpanel">
      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Coupon Table</h5>
        </div><!-- sl-page-title -->

      @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
        <form action="{{ url('update/coupon/'.$coupon->id)}}" method="post">
             @csrf
              <div class="modal-body pd-20">
          <div class="form-group">
            <label for="exampleInputEmail1">Coupon Name</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Coupon Name" value="{{ $coupon->coupon}}" name="coupon">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Coupon Discount</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Coupon Discount" value="{{ $coupon->discount}}" name="discount">
          </div>
          
          <!-- modal-body -->
              <div class="modal-footer">
                <button type="submit" class="btn btn-info pd-x-20">Update</button>
              </div>
              </form>
      </div><!-- sl-pagebody -->

</div>
          



@endsection