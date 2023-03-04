@extends('layout.main')

@section('content')
    <h3>Data Students</h3>
    <div class="card">
        <div class="card-header">
            <a href="/students/add" class="btn btn-sm btn-primary">
                <i class="fas fa-plus-circle"></i> Add new data
            </a>
            
        </div>
        <div class="card-body">
            @if (session('msg'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil</strong> {{ session('msg') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form  method="GET">
                <div class="row mb-3">
                <label for="search" class="col-sm-2 col-form-label">Cari Data</label>
                <div class="col-sm-10">
                    <input type="text" name="search" class="form-control form-control-sm" placeholder="Please input key for search data" id="search" value="{{ $search }}" autofocus>
                </div>
                </div>
            </form>
            <table class="table table-sm table-bordered tabled striped">
                <thead>
                    <tr>
                    <th>#</th>
                    <th>Id Students</th>
                    <th>Full Name</th>
                    <th>Genre</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                     $nomor = 1 + (($students->currentPage() - 1) * $students->perPage())   
                    @endphp
                    @foreach($students as $row)
                        <tr>
                            {{-- <td>{{ $loop->iteration }}</td> --}}
                            <td>{{ $nomor++ }}</td>
                            <td>{{ $row->idstudents }}</td>
                            <td>{{ $row->fullname }}</td>
                            <td>{{ $row->gender == 'M' ? 'Male' : 'Female' }}</td>
                            <td>{{ $row->address }}</td>
                            <td>{{ $row->email }}</td>
                            <td>{{ $row->phone }}</td>
                            <td>
                                <button onclick="window.location='{{ url('students/'.$row->idstudents) }}'" type="button" class="btn btn-sm btn-info" title="Edit data">
                                    <i class="fas fa-edit"></i>
                                </button>   
                               
                                <form onsubmit="return deleteData({{ $row->fullname }})" style="display:inline"
                                    method="POST" action="{{ url('students/'.$row->idstudents) }}">
                                     @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>                        
                            </td>
                               
                    @endforeach
                </tbody>
            </table>
            {{-- {{ $students->links() }} --}}
            {!! $students->appends(Request::except('page'))->render() !!}
        </div>
    </div>
    <script>
        function deleteData(name)
        {
            pesan = confirm( `Yakin data student dengan nama ${name} ingin dihapus`);
            pesan = true ?? false;
        }
    </script>
@endsection