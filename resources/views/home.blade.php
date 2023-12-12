

<h1>Welcome, {{ $user->name }}!</h1>
<p>Active Profile: {{ $user->activeProfile->user_name }}</p>

@foreach ($profiles as $profile)
    <div>
        <img src="{{ $profile->profile_photo }}" alt="{{ $profile->user_name }}">
        <p>{{ $profile->user_name }}</p>
        <form method="POST" action="{{ route('profiles.setActive', $profile->id) }}">
            @csrf
            <button type="submit">Set as Active</button>
        </form>
    </div>
@endforeach

<a href="{{ route('profiles.create', $user->id) }}">Add More Profiles</a>


