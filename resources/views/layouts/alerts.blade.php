@if(auth()->user()->hasRole('Admin') || auth()->user()->hasRole('Super Admin'))


    <div class="hd-message-info">
        @foreach($alerts as $alert)
            <a href="{{route("work_requests.show", ["work_request"=>$alert])}}">
                <div class="hd-message-sn">
                    <div class="hd-mg-ctn">
                        <h3>{{$alert->user->name}}</h3>
                        <p>Equipement : {{$alert->equipment->name}} - {{$alert->equipment->code}}</p>
                    </div>
                </div>
            </a>
        @endforeach

    </div>
    <div class="hd-mg-va">
        <a href="{{route("work_requests.index")}}">Voir tout</a>
    </div>

@elseif(auth()->user()->hasRole('Maintenance Technician'))

    <div class="hd-message-info">
        @foreach($alerts as $alert)
            <a href="{{route("work_orders.show", ["work_order"=>$alert])}}">
                <div class="hd-message-sn">
                    <div class="hd-mg-ctn">
                        <h3>Priorité : {{$alert->workRequest->priority}}</h3>
                        <p>Equipement : {{$alert->workRequest->equipment->name}} - {{$alert->workRequest->equipment->code}}</p>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
    <div class="hd-mg-va">
        <a href="#"
           onclick="event.preventDefault(); document.getElementById('work-order-index-form').submit();">Voir tout</a>
        <form id="work-order-index-form" action="{{ route('work_orders.index') }}"
              method="GET" class="d-none">

            <input type="hidden" value="only" name="filter">
        </form>
    </div>

@endif

