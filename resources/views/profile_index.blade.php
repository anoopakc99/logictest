<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<nav class="navbar navbar-light bg-dark">
  <a class="navbar-brand" href="#">
  <button class="btn btn-outline-success" type="button"> <a href="{{ route('logout') }}">Logout</a></button>
  </a>
</nav>
<br>
<div class="container">
@if ($activeProfile)
    <div>
        <img src="{{ $activeProfile->profile_photo }}" width="100px;" alt="{{ $activeProfile->user_name }}">
        <p>Active Profile: {{ $activeProfile->user_name }}</p>
    </div>
@endif

<ul>
    @foreach($profiles as $profile)
        <li>
            <img src="{{ $profile->profile_photo }}" width="100px;" alt="{{ $profile->user_name }}">
            {{ $profile->user_name }}
            @if ($profile->is_active)
                (Active)
            @else
                <a href="{{ route('profile.setActive', $profile) }}" >Set Active</a>
            @endif
        </li>
    @endforeach
</ul>

<a href="{{ route('profile.create') }}">Add More Profiles</a>

</div>