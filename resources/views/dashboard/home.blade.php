@extends('dashboard.layouts.dashboard')

@section('content')
        <section class="row">
            <div class="col-md-5 col-md-offset-1 metrics">
                <div class="col-md-10 col-md-offset-1 metrics-widget">
                    <h3>Metrics</h3>
                    <ul>
                        <li>Expos: {{ $expos }}</li>
                        <li>Reservations: {{ $reservations }}</li>
                        <li>Locations: {{ $locations }}</li>
                        <li>Companies: {{ $companies }}</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-5 upcoming-expos">
                <div class="col-md-12 upcoming-expos-widget">
                    <h3>Upcoming Expos</h3>
                    <div class="col-md-12 expo-card" v-for="expo in upcomingExpos">
                        <h5>@{{ expo.name }}</h5>
                        <p>@{{ expo.start_date | transformDate }}</p>
                        <p>@{{ expo.description }}</p>
                    </div>

                </div>
            </div>
        </section>
@endsection
