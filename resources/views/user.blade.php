@foreach($users as $user)
<p>{{ $user->id }}</p>
<p>{{ $user->fio }}</p>
@endforeach