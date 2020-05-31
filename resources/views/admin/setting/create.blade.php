@extends('admin.admin_layouts')

@section('admin_content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" crossorigin="anonymous">

    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="#">Starlight</a>
        <span class="breadcrumb-item active">Setting Section</span>
      </nav>
      <div class="sl-pagebody">
           <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">New Product Add <a href="#" class="btn btn-success btn-sm pull-right">All Product</a></h6>
          <p class="mg-b-20 mg-sm-b-30">Setting product add form</p>
          <form action="{{ route('store.setting')}}" method="post" enctype="multipart/form-data">
            @csrf
          
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Vat: <span class="tx-danger"></span></label>
                  <input class="form-control" type="number" name="vat"  >
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Shipping Charge: <span class="tx-danger"></span></label>
                  <input class="form-control" type="number" name="shipping_charge">
                </div>
              </div><!-- col-4 -->
              
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Shop Name: <span class="tx-danger"></span></label>
             	<input class="form-control" type="text" name="shopname">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Email : <span class="tx-danger"></span></label>
                  <input class="form-control" type="email" name="email">
                </div>
              </div>

               <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Phone : <span class="tx-danger"></span></label>
                  <input class="form-control" type="number" name="phone">
                </div>
              </div>

               <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Address : <span class="tx-danger"></span></label>
                 <input class="form-control" type="text" name="address">
                </div>
              </div>


         
            
          
              <div class="col-lg-4">
                <lebel>Logo<span class="tx-danger">*</span></lebel>
                <label class="custom-file">
                <input type="file" id="file" class="custom-file-input" name="logo" onchange="readURL(this);" required="" accept="image">
                <span class="custom-file-control"></span>
                <img src="#" id="one" >
              </label>
              </div>
           
            </div><!-- row -->
            <br><hr>
            <br><br><hr>
            <div class="form-layout-footer">
              <button class="btn btn-info mg-r-5" type="submit">Submit </button>
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
          </form>
        </div><!-- card -->
       
      </div><!-- sl-pagebody --> 
    </div><!-- sl-mainpanel -->
@endsection

