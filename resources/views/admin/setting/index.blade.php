@extends('admin.admin_layouts')

@section('admin_content')

  <div class="sl-mainpanel">
      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Product Setting Table</h5>
        </div>

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Product Setting List </h6>
         
          <br>


          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">Id</th>
                  <th class="wd-15p">Vat</th>
                  <th class="wd-15p">Shipping ch:</th>
                  <th class="wd-15p">Shop Name</th>
                  <th class="wd-15p">Shop Logo</th>
                 <!--  <th class="wd-15p">Email</th> -->
                  <th class="wd-15p">Phone</th>
                  <th class="wd-15p">Address</th>
                  <th class="wd-20p">Action</th>
              
                </tr>
              </thead>
              <tbody>
                @foreach($setting as $row)
                <tr>
                  <td>{{ $row->id}}</td>
                  <td>{{ $row->vat}}</td>
                  <td>{{ $row->shipping_charge}}</td> 
                  <td>{{ $row->shopname}}</td>
                  <td><img src="{{ URL::to($row->logo)}}" width="50px;" height="50px;"></td>
                  <!-- <td>{{ $row->email}}</td> -->
                  <td>{{ $row->phone}}</td>
                <!--   <td>{{ $row->email}}</td> -->
                  <td>{{ $row->address}}</td>
              
                   <td>
                    <a href="{{ URL::to('edit/product/'.$row->id)}}" class="btn btn-sm btn-info" title=""><i class="fa fa-edit"></i></a>
                    <a href="{{ URL::to('view/setting/'.$row->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-eye"></i></a>
                    <a href="{{ URL::to('delete/setting/'.$row->id)}}" class="btn btn-sm btn-warning" id="delete"><i class="fa fa-trash"></i></a>  
                  </td>
                </tr>
                @endforeach
             
              </tbody>
            </table>
          </div>
        </div>
      </div>
</div>
 
@endsection