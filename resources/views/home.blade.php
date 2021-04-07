@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Create Post</div>
                <div class="card-body">
                    <form action="" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="body">Body</label>
                            <textarea name="body" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                Post List
                <div class="float-right">
                    <input type="checkbox" name="notification-checkbox" id="notification-checkbox">
                    Allow notification?
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Body</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->body }}</td>
                                <td>
                                    <span data-post-status="{{ $post->id }}"
                                        class="badge {{ $post->status == 'accepted' ? 'badge-success' : ($post->status == 'rejected' ? 'badge-danger' : 'badge-warning') }}">{{ $post->status }}</span>
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
<audio src="" muted id="notification" class="d-none"></audio>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('#notification-checkbox').change(function() {
            const audio = document.querySelector('#notification');
            if($(this).prop('checked')) {
                audio.src = "{!! asset('audio/notification.mp3') !!}";
                audio.muted = false;
                return;
            }
            audio.muted = true;
        });

        function playNotificationSound() {
            const audio = document.querySelector('#notification');
            audio.play();
        }

        function updateStatus(post) {
            const span = $(`span[data-post-status="${post.id}"]`);
            span.text(post.status);
            span.removeClass();
            if(post.status == 'accepted') {
                span.addClass('badge badge-success');
                iziToast.success({
                    title: 'Post Accepted',
                    message: 'Your post has been accepted!'
                });
            }

            if(post.status == 'rejected') {
                span.addClass('badge badge-danger');
                iziToast.error({
                    title: 'Post Rejected',
                    message: 'Your post has been rejected!'
                });
            }

            playNotificationSound();
        }

        Echo.private('post-status.{{ auth()->user()->id }}') 
            .listen('PostStatusUpdated', (e) => {
                updateStatus(e.post);
            });

    });
</script>
@endsection