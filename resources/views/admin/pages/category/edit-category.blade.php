@extends('admin.master')
@section('admin')
    <div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <div class="d-flex justify-content-between">
                            <h2 class="page-title">
                                Edit Category
                            </h2>
                            <a href="{{ route('view.category') }}" class="btn btn-success">View Category</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
            <div class="container-xl">
                <div class="card">
                    <div class="card-body">
                        <div id="table-default" class="table-responsive">
                            <form action="{{ route('update.category',$categoryId->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <label class="form-label">Category</label>
                                <fieldset class="form-fieldset">
                                    <div class="mb-3">
                                        <label class="form-label required">Category</label>
                                        <input type="text" name="name" value="{{ $categoryId->name }}"
                                            placeholder="enter category name" class="form-control" autocomplete="off" />
                                        <span class="text-danger">@error('name') is-invalid @enderror</span>
                                    </div>
                                  
                                    <div class="mb-3">
                                        <label class="form-label required">Image</label>
                                        <div>
                                            <img src="{{asset('public/images/category/'.$categoryId->image)}}" alt="" width="60px";height='60px'>
                                        </div>
                                        <input type="file" name='image' class="form-control" autocomplete="off" required />
                                          <span class="text-danger">@error('image') is-invalid @enderror</span>
                                    </div>
                                    <div>
                                        <button class="btn btn-success" type="submit">Update</button>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
