@extends('layout.main')

@section('content')
    <h3>Form Edit Data students</h3>  
    <div class="card">
        <div class="card-header">
            <a href="{{ url('students') }}  " class="btn btn-sm btn-warning ">
                back
            </a>
        </div>
        <div class="card-body">
            <form action="{{ url('students/'.$txtId) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <label for="txtId" class="col-sm-2 col-form-label">Id Student</label>
                <div class="col-sm-4">
                <input type="text" class="form-control-plaintext" id="txtId" name="txtId" value="{{ $txtId }}">
                </div>
            </div>
            <div class="row mb-3">
                <label for="txtFullName" class="col-sm-2 col-form-label">Full Name</label>
                <div class="col-sm-10">
                <input type="text" class="form-control form-control-sm @error('txtFullName') is-invalid @enderror" id="txtFullName" name="txtFullName" value="{{ $txtFullName}}">
                @error('txtFullName')
                    <div class="invalid-feedback">
                    {{ $message }}
                    </div>
                @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="txtGender" class="col-sm-2 col-form-label">Gender</label>
                <div class="col-sm-4">
                    <select name="txtGender" id="txtGender"  class="form-control form-control-sm @error('txtGender') is-invalid @enderror" >
                        <option value="" selected>--Pilih--</option>
                        <option value="M" {{ $txtGender == 'M' ? 'selected' : ''}}>Male</option>
                        <option value="F" {{ $txtGender == 'F' ? 'selected' : ''}}>Female</option>
                    </select>
                    @error('txtGender')
                    <div class="invalid-feedback">
                    {{ $message }}
                    </div>
                @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="txtAddress" class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-10">
                    <textarea  class="form-control form-control-sm @error('txtAddress') is-invalid @enderror" name="txtAddress" id="txtAddress" cols="30" rows="10" name="txtArea"> {{ $txtAddress }}</textarea>
                    @error('txtAddress')
                    <div class="invalid-feedback">
                    {{ $message }}
                    </div>
                @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="txtEmail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-6">
                <input type="text" class="form-control form-control-sm @error('txtEmail') is-invalid @enderror" id="txtEmail" name="txtEmail" value="{{ $txtEmail }}">
                @error('txtEmail')
                    <div class="invalid-feedback">
                    {{ $message }}
                    </div>
                @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="txtPhone" class="col-sm-2 col-form-label">Phone</label>
                <div class="col-sm-4">
                <input type="text" class="form-control form-control-sm @error('txtPhone') is-invalid @enderror" id="txtPhone" name="txtPhone" value="{{ $txtPhone }}">
                @error('txtPhone')
                    <div class="invalid-feedback">
                    {{ $message }}
                    </div>
                @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-4">
                    <button type="submit" class="btn btn-sm btn-success">Save</button>
                </div>
            </div>  
            </form>
        </div>
    </div>
@endsection