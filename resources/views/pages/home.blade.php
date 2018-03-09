@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>

                @foreach($posts as $post)
                    <div class="col-md-6">
                        <p>Title : {{ $post['title'] }}</p>
                        <p>Body : {{ $post['body'] }}</p>
                        <p>Likes :  <span class="liked">{{ $post['like'] }}</span> </p>
                        @if(Auth::check())
                            <form class="post-id-like" method="post" btn-type="like">
                                {{ csrf_field() }}
                                <input type="submit" name="id" post-id="{{ $post['id'] }}" class="btn btn-info like" value="Like">
                            </form>
                        @endif
                        <p>Dislike : <span class="disliked">{{ $post['dislike'] }}</span></p>
                        @if(Auth::check())
                            <form class="post-id-dislike" method="post"  btn-type="dislike">
                                {{ csrf_field() }}
                                <input type="submit" name="id" post-id="{{ $post['id'] }}" class="btn btn-info dislike" value="Dislike">
                            </form>
                        @endif
                        <p>Author : {{ $post['author'] }}</p>
                    </div>
                    <hr>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        $(document).ready(function(){
            /* Like */
            $('.post-id-like').on('submit', function(e){
                e.preventDefault();
                var self = $(this);
                // Form type
                var form = $('.post-id-like').attr('btn-type');
                // post id
                var id = $(this).find('.like').attr('post-id');
                // token
                var token = $('input[name="_token"]').val();

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    url: '/',
                    data: {
                        form : form,
                        id : id,
                        token : token
                    },
                    success: function(response){
                        $(self).prev().find('span.liked').text(response[0]);
                    }
                });
            });

            /* Dislike */
            $('.post-id-dislike').on('submit', function(e){
                e.preventDefault();
                var self = $(this);
                // Form type
                var form = $('.post-id-dislike').attr('btn-type');
                // post id
                var id = $(this).find('.dislike').attr('post-id');
                // token
                var token = $('input[name="_token"]').val();

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    url: '/',
                    data: {
                        form : form,
                        id : id,
                        token : token
                    },
                    success: function(response){
                        $(self).prev().find('span.disliked').text(response[0]);
                    }
                });
            });
        });
    </script>
@stop
