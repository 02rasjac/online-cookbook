@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">{{ __('Dashboard') }}</div>

          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif
            @if (session('updated'))
              <div class="alert alert-success" role="alert">
                {{ session('updated') }}
              </div>
            @endif
            @if ($errors->any())
              @foreach ($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                  {{ $error }}
                </div>
              @endforeach
            @endif

            <form action="{{ route('upload.profile-image') }}" method="post" enctype="multipart/form-data">
              @csrf
              <label for="profile-picture">Profilbild:</label>
              <input type="file" name="image" id="profile-picture">
              <input type="submit" value="Upload">
            </form>
          </div>
        </div>
        <div class="card">
          <div class="card-header">Mina Recept</div>

          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif
            @if (session('updated'))
              <div class="alert alert-success" role="alert">
                {{ session('updated') }}
              </div>
            @endif
            @if ($errors->any())
              @foreach ($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                  {{ $error }}
                </div>
              @endforeach
            @endif

            @if ($recipies)
              <ul>
                @foreach ($recipies as $recipie)
                  <li>{{ $recipie->title }}</li>
                @endforeach
              </ul>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
