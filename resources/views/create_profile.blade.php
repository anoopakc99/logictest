<!-- create_profile.blade.php -->

<form method="post" action="{{ route('profile.store') }}" enctype="multipart/form-data">
    @csrf
    <input type="text" name="user_name" placeholder="Username" required>
    <input type="file" name="profile_photo" placeholder="Profile Photo ">
    <button type="submit">Create Profile</button>
</form>
