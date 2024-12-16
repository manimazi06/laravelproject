<h1>{{$title}}</h1>


<!-- if Statement -->
@if($user==1) 

User allowed

@else

Not allowed


@endif

<!-- For loop -->


@for($user=0;$user<=5;$user++)
The no {{$user}}<br>
@endfor


<!-- ForEach -->

@foreach($array as $key=>$value)

The Author is {{$key}} <br>

@endforeach
