@extends('admin.admin_layouts')

@section('admin_content')

  <div class="sl-mainpanel">
      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Post Category Table</h5>
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
        <form action="{{ url('update/post_category/'.$post_category->id)}}" method="post">
             @csrf
              <div class="modal-body pd-20">
          <div class="form-group">
            <label for="exampleInputEmail1">Post Category EN</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Category Name En" value="{{ $post_category->category_name_en}}" name="category_name_en">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Post Category BN</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Category Name Bn" value="{{ $post_category->category_name_bn}}" name="category_name_bn">
          </div>
          
          <!-- modal-body -->
              <div class="modal-footer">
                <button type="submit" class="btn btn-info pd-x-20">Update</button>
              </div>
              </form>
      </div><!-- sl-pagebody -->

</div>
          



@endsection