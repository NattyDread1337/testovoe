@if($trips->count())
@foreach($trips as $trip)
    <div class="row row-cols-12 row-cols-sm-12 row-cols-md-12 g-3 mb-2">
        <div class="col">
            <div class="card shadow-sm">
                <div class="card-body">
                    <p class="card-text">{{$trip->name}}</p>
                    <p>Номер рейса {{$trip->id}}</p>
                    <p>Время {{$trip->time}}</p>
                    <p>Дата: {{$trip->date}}</p>
                </div>
            </div>
        </div>
    </div>
@endforeach
@else
<h2>Рейсов нету</h2>
@endif
