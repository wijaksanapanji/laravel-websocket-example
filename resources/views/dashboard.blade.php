@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Post List</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User</th>
                                <th>Title</th>
                                <th>Body</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $post->user->name }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->body }}</td>
                                <td>
                                    <span
                                        class="badge {{ $post->status == 'accepted' ? 'badge-success' : ($post->status == 'rejected' ? 'badge-danger' : 'badge-warning') }}">{{ $post->status }}</span>
                                </td>
                                <td>
                                    <a href="/posts/{{ $post->id }}/accepted" class="btn btn-sm btn-success">Accept</a>
                                    <a href="/posts/{{ $post->id }}/rejected" class="btn btn-sm btn-danger">Reject</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection