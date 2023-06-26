@extends('layout.admin.master')

@section('title', 'Danh sách user')

@section('title-heading', 'Danh sách user')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session()->has('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div>
            @endif
            @if (Auth::user()->role != 0)
            <a href="{{ route('users.add') }}" class="btn btn-primary mr-2 mb-3">Thêm thêm user</a>   
            @endif
            <!--begin::table-->
            <div class="card card-custom gutter-b">
                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                    <div class="card-title">
                        <h3 class="card-label">Danh sách bài viết
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <div class="datatable datatable-default datatable-bordered datatable-loaded">
                        <table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
                            <thead class="datatable-head">
                                <tr class="datatable-row" style="left: 0px;">
                                    <th class="datatable-cell" style="width: 15%"><span>Ảnh</span></th>
                                    <th class="datatable-cell" style="flex-grow:1"><span>Name</span></th>
                                    <th class="datatable-cell" style="width: 20%"><span>Role</span></th>
                                    <th class="datatable-cell" style="width: 20%"><span>Email</span></th>
                                    @if (Auth::user()->role != 0 )
                                    <th class="datatable-cell text-right" style="width: 15%"><span>Tùy chọn</span></th>   
                                    @endif
                                </tr>
                            </thead>
                            <tbody class="datatable-body">
                                @foreach ($users as $user)
                                    <tr class="datatable-row" style="left: 0px;">
                                        <td class="datatable-cell" style="width: 15%"><span><img
                                                    src="{{ $user->avatar != 0 ? asset('/images/users/' . $user->avatar) : 'https://media.istockphoto.com/id/1300845620/vector/user-icon-flat-isolated-on-white-background-user-symbol-vector-illustration.jpg?s=612x612&w=0&k=20&c=yBeyba0hUkh14_jgv1OKqIH0CCSWU_4ckRkAoy2p73o=' }}"
                                                    style="width:90%;object-fit:cover;display:block;margin:0 auto;aspect-ratio:1/1"></span>
                                        </td>
                                        <td class="datatable-cell" style="flex-grow:1"><span>{{ $user->name }}</span></td>
                                        <td class="datatable-cell" style="width: 20%">
                                            <span>
                                                @if ($user->role == 0)
                                                    user
                                                @elseif($user->role == 1)
                                                    manage
                                                @else
                                                    admin
                                                @endif
                                            </span>

                                        </td>
                                        <td class="datatable-cell" style="width: 20%"><span>{{ $user->email }}</span></td>
                                        @if ( Auth::user()->role == 3 || Auth::user()->role == 1)
                                            @if ($user->role == 3)
                                                @continue;
                                            @else
                                                <td class="datatable-cell text-right" style="width: 15%">
                                                    <a href="{{ route('user.edit', $user->id) }}"
                                                        class="btn btn-icon btn-success btn-sm mr-2"><i
                                                            class="fas fa-edit"></i></a>
                                                    <a href="{{ route('user.delete', $user->id) }}"
                                                        class="btn btn-icon btn-danger btn-sm mr-2"><i
                                                            class="far fa-trash-alt"></i></a>
                                                </td>
                                            @endif
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--end::table-->
            {{ $users->links()}} 
        </div>
    </div>
@endsection
