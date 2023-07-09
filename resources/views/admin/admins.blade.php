@extends('admin.layout.template')
@section('content')
<div class="breadcrumbs">
  <div class="col-sm-4">
    <div class="page-header float-left">
      <div class="page-title">
        <h1>Manajemen Pengguna</h1>
      </div>
    </div>
  </div>
  <div class="col-sm-8">
    <div class="page-header float-right">
      <div class="page-title">
        <ol class="breadcrumb text-right">
          <li><a href="{{route('a.dashboard')}}}">Dashboard</a></li>
          <li class="active">Kelola Admin</li>
        </ol>
      </div>
    </div>
  </div>
</div>

<div class="content mt-3">
  <div class="animated fadeIn">
    <div class="row">
      @if(session('status'))
      <div class="col-sm-12">
        <div class="alert  alert-success alert-dismissible fade show" role="alert">
          <span class="badge badge-pill badge-success">Success</span> {{session('status')}}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
      @endif

      <div class="col-md-12">
        <div class="card">
          <div class="card-header justify-content-between">
            <strong class="card-title">Daftar Administrator</strong> ({{$total}})
          </div>
          <div class="card-body">
            <a href="{{route('a.create_admin')}}" class="btn btn-success"><i class="fa fa-plus-circle">&nbsp;Tambahkan Admin Baru</i></a>
            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Nama Admin</th>
                  <th>Email</th>
                  <th>Alamat</th>
                  <th>No. HP</th>
                  <th colspan="2">Tindakan</th>
                </tr>
              </thead>
              <tbody>
                @foreach($admins as $admin)
                <tr>
                  <td>{{$admin->name}}</td>
                  <td>{{$admin->email}}</td>
                  <td>
                    @if($admin->address != null) {{$admin->address}}
                    @else <i>Belum diatur</i>
                    @endif
                  </td>
                  <td>
                    @if($admin->phone_number != null) {{$admin->phone_number}}
                    @else <i>Belum diatur</i>
                    @endif
                  </td>
                  <td>
                    <a href="{{route('a.admin', ['id'=> $admin->id])}}" class="btn btn-warning btn-sm"><i class="menu-icon fa fa-pencil"></i> &nbsp;Edit</a>
                  <td>
                    <form action="{{route('a.delete_admin', ['id'=> $admin->id])}}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus admin ini?')"><i class="menu-icon fa fa-trash"></i> &nbsp;Hapus</button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12 text-right">
        <nav aria-label="Page navigation example">
          <ul class="pagination justify-content-end">
            <li class="page-item">
              <a class="page-link" style="color: black;" href="{{ $admins->previousPageUrl() }}" aria-label="Previous">
                Previous
              </a>
            </li>
            @foreach ($admins->getUrlRange(1, $admins->lastPage()) as $page => $url)
            <li class="page-item{{ $admins->currentPage() == $page ? ' active' : '' }}">
              <a class="page-link" style="color: black;" href="{{ $url }}">{{ $page }}</a>
            </li>
            @endforeach
            <li class="page-item">
              <a class="page-link" style="color: black;" href="{{ $admins->nextPageUrl() }}" aria-label="Next">
                Next
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </div><!-- .animated -->
</div> <!-- .content -->
@endsection