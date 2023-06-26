@extends('layout.admin.master')

@section('title', 'Danh sách bài viết')

@section('title-heading', 'Danh sách bài viết')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session()->has('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div>
            @endif
            <a href="{{ route('post.add') }}" class="btn btn-primary mr-2 mb-3">Thêm bài viết</a>
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
                                    <th class="datatable-cell" style="flex-grow:1"><span>Tiêu đề</span></th>
                                    <th class="datatable-cell" style="width: 20%"><span>Tác giả</span></th>
                                    <th class="datatable-cell" style="width: 15%"><span>Trạng thái</span></th>
                                    <th class="datatable-cell text-right" style="width: 15%"><span>Tùy chọn</span></th>
                                </tr>
                            </thead>
                            <tbody class="datatable-body">
                                @foreach ($posts as $post)
                                    @if (Auth::user()->role == 3 || Auth::user()->role == 1)
                                        <tr class="datatable-row" style="left: 0px;">
                                            <td class="datatable-cell" style="width: 15%"><span><img
                                                        src="{{ asset('/images/posts/' . $post->thumbnail) }}"
                                                        style="width:90%;object-fit:cover;display:block;margin:0 auto;aspect-ratio:1/1"></span>
                                            </td>
                                            <td class="datatable-cell" style="flex-grow:1"><span>{{ $post->title }}</span>
                                            </td>
                                            <td class="datatable-cell" style="width: 20%">
                                                <span>{{ $post->author->name }}</span></td>

                                            <th class="datatable-cell" style="width: 20%">
                                                <span
                                                    class="label font-weight-bold label-lg {{ $post->published == 1 ? 'label-success' : 'label-warning' }} label-rounded label-inline">
                                                    @if ($post->published == 1)
                                                        {{'đã xuất bản'}}
                                                    @elseif($post->published == 2)
                                                        {{'bản nháp'}}
                                                    @else 
                                                        {{'đang chờ phê duyệt'}}
                                                    @endif
                                                </span>
                                            </th>

                                            <td class="datatable-cell text-right" style="width: 15%">
                                                <a href="{{ route('post.edit', $post->id) }}"
                                                    class="btn btn-icon btn-success btn-sm mr-2"><i
                                                        class="fas fa-edit"></i></a>
                                                <a href="{{ route('post.delete', $post->id) }}"
                                                    class="btn btn-icon btn-danger btn-sm mr-2"><i
                                                        class="far fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                    @endif
                                    @if (Auth::user()->role == 0)
                                        @if ($post->author->id == Auth::id() )
                                        <tr class="datatable-row" style="left: 0px;">
                                            <td class="datatable-cell" style="width: 15%"><span><img
                                                        src="{{ asset('/images/posts/' . $post->thumbnail) }}"
                                                        style="width:90%;object-fit:cover;display:block;margin:0 auto;aspect-ratio:1/1"></span>
                                            </td>
                                            <td class="datatable-cell" style="flex-grow:1"><span>{{ $post->title }}</span>
                                            </td>
                                            <td class="datatable-cell" style="width: 20%">
                                                <span>{{ $post->author->name }}</span></td>

                                            <th class="datatable-cell" style="width: 20%;">
                                                <span
                                                    class="label font-weight-bold label-lg {{ $post->published == 1 ? 'label-success' : 'label-warning' }} label-rounded label-inline">
                                                    @if ($post->published == 1)
                                                        {{'đã xuất bản'}}
                                                    @elseif($post->published == 2)
                                                        {{'bản nháp'}}
                                                    @else 
                                                        {{'yêu cầu phê duyệt'}}
                                                    @endif
                                                </span>
                                            </th>

                                            <td class="datatable-cell text-right" style="width: 15%">
                                                <a href="{{ route('post.edit', $post->id) }}"
                                                    class="btn btn-icon btn-success btn-sm mr-2"><i
                                                        class="fas fa-edit"></i></a>
                                                <a href="{{ route('post.delete', $post->id) }}"
                                                    class="btn btn-icon btn-danger btn-sm mr-2"><i
                                                        class="far fa-trash-alt"></i></a>
                                            </td>   
                                        @endif()
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                        {{ $posts->links(); }} 
                    </div>
                </div>
            </div>
            <!--end::table-->
        </div>
    </div>
@endsection
