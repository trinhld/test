@if(session('success'))
    <div class="profile-notification notify-success mb-5 mt-4">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="profile-notification notify-success mb-5 mt-4">
        {{ session('error') }}
    </div>
@endif

@if(session('warning'))
    <div class="profile-notification notify-success mb-5 mt-4">
        {{ session('warning') }}
    </div>
@endif

@if ($errors->any())
    <div class="profile-notification notify-success mb-5 mt-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
