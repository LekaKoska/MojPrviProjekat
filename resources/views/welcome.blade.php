@extends("layout")

@section("pageTittle")
    Home
@endsection

@section("pageSection")

    @if($time >= 0 && $time <=12)

        <p>Dobro jutro!</p>
    @else
        <p>Dobar dan!</p>
    @endif



    <p>Trenutno casova je:  {{ $time }}h</p>
    <p>Detaljno vreme je:  {{ $timeMinutesSec }}</p>
@endsection
