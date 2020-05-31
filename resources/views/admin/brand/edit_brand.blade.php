@extends('admin.admin_layouts')

@section('admin_content')

  <div class="sl-mainpanel">
      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Brand Table</h5>
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
        <form action="{{ url('update/brand/'.$brand->id)}}" method="post" enctype="multipart/form-data">
             @csrf
              <div class="modal-body pd-20">
          <div class="form-group">
            <label for="exampleInputEmail1">Brand Name</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Category" value="{{ $brand->brand_name}}" name="brand_name">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Brand logo</label>
            <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" 
             value="{{ URL::to($brand->brand_logo)}}" name="brand_logo">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Old Logo</label>
            <img src="{{ URL::to($brand->brand_logo)}}" height="60px;">
            <input type="hidden" name="old_logo" value="{{ $brand->brand_logo}}">
          </div>
          
          <!-- modal-body -->
              <div class="modal-footer">
                <button type="submit" class="btn btn-info pd-x-20">Update</button>
              </div>
              </form>
      </div><!-- sl-pagebody -->

</div>
          



@endsection