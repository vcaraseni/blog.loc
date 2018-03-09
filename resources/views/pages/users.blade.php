@extends('layouts.app')

{{--{{ dd($users) }}--}}

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @if(Auth::check())
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">№</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $count = 1;
                    @endphp
                    @foreach($users as $user)
                        <tr class="table-active">
                            <td>{{ $count++ }}</td>
                            <td>{{ $user['name'] }}</td>
                            <td>{{ $user['email'] }}</td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            @endif
        </div>
    </div>


@stop

@section('js')
@stop