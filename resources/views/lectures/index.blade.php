@extends('layouts.app')
@section('content')
<h2 style="text-align: center;">Lectures</h2>
<div class="card-body">
    <table class="table">
    @if($errors->any())
  <div class="alert alert-danger">
    <p><b>{{$errors->first()}}</b></p>
  </div>
  @endif

  @if (session('status_success'))
  <div class="alert alert-success">
    <p style="color: green"><b>{{ session('status_success') }}</b></p>
  </div>
  @elseif(session('status_error'))
  <div class="alert alert-danger">
    <p style="color: red"><b>{{ session('status_error') }}</b></p>
  </div>
  @endif

        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
        @foreach ($lectures as $lecture)
        <tr>
            <td>{{ $lecture->name }}</td>
            <td>{!! $lecture->description !!}</td>
            <td>
                <form action={{ route('lectures.destroy', $lecture->id) }} method="POST">
                    <a class="btn btn-outline-success" href={{ route('lectures.edit', $lecture->id) }}>Edit</a>
                    @csrf @method('delete')
                    <input type="submit" class="btn btn-outline-danger" value="Delete"/>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <div>
        <a href="{{ route('lectures.create') }}" class="btn btn-outline-success">Create</a>
    </div>
</div>
@endsection
