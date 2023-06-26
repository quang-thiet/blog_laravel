@extends('layout.admin.master')

@section('title', 'add user')

@section('title-heading', 'add user')

@section('content')
<form id="add-user" method="POST" action="{{ route('user.process.update',['id'=>$user->id]) }}" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-8">
            <div class="card card-custom">
                <div class="card-header">
                    <h3 class="card-title">Thông tin tài khoản</h3>
                </div>
                <!--begin::Form-->
                <div class="card-body">
                    <div class="form-group">
                        <label>Name
                            <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" value="{{$user->name}}" name="name" placeholder="Nhập name user">
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Email
                            <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" value="{{$user->email}}" name="email" placeholder="Nhập email">
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>password
                            <a href="http://127.0.0.1:8000/admin/user/5/edit#2" class="text-danger">thay đổi password</a></label>
                            
                    </div>

                    <div class="form-group">
                        <label>vai trò</label>
                        <div class="radio-inline">
                            @if (Auth::user()->role ==1|| Auth::user()->role==3)
                            <label class="radio radio-rounded">
                                <input type="radio" value="1" name="role" @checked($user->role==1)>
                                <span></span>manage</label>  
                            @endif
                            <label class="radio radio-rounded">
                            <input type="radio" value="0" name="role" @checked($user->role==0)>
                            <span></span>user</label>
                        </div>
                    </div>
                </div>
                <div id="2" class="card-footer">
                    <button type="submit" class="btn btn-primary mr-2">Cập nhật</button>
                    <a href="{{ route('user.list') }}#2"><button type="button" class="btn btn-success mr-2">Danh sách bài viết</button></a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <div class="card-title">
                        <span class="card-icon">
                            <i class="far fa-image text-primary"></i>
                        </span>
                        <h3 class="card-label">Ảnh đại diện</h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="custom-file">
                        <input type="file" id="preview-image" name="thumbnail" accept=".png, .jpg, .jpeg, .jfif" class="custom-file-input">
                        <label class="custom-file-label" style="overflow:hidden" for="customFile">Choose file</label>
                    </div>
                    <div class="form-group preview-image" style="margin-top: 10px;"></div>
                    <div class="form-group preview-image2" style="margin-top: 10px;">
                        <img src='{{asset('images/users/'.$user->avatar )}}'style='display:block;margin:10px auto;width: auto;height: 150px;object-fit:cover;border:1px solid #3699ff;border-radius:5px;'>
                    </div>
                    @error('thumbnail')
                            <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@section('custom-js-tag')
<script>
    $(document).ready(function(){
        $("#preview-image").on('change', function(){
            $this = $(this)
            if(this.files[0] && this.files[0].size != 0){
                $('.preview-image2').hide()
            } else {
                $('.preview-image2').show()
            }
        })

    })
</script>
@endsection     