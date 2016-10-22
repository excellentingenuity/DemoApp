@extends('dashboard.layouts.dashboard')

@section('content')
    <section class="row expos-page">
        <div class="col-md-5 scheduled-expos-list-container">
            <h3>Scheduled Expos</h3>
            <div class="scheduled-expos-list">
                <div class="col-md-12 expo-card" v-for="expo in scheduledExpos">
                    <a @click="loadExpoToForm(expo.id, expo.name, expo.description)" class="expo-card-link">
                    <h5>@{{ expo.name }}</h5>
                    <p>@{{ expo.start_date | transformDate }}</p>
                    <p>@{{ expo.description }}</p>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <h3>Add/Edit Expo</h3>
            <form action="submit">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="expoName">Expo Name</label>
                    <input type="text" class="form-control" id="expoName" v-model="expo.name">
                </div>
                <div class="form-group">
                    <label for="expoDescription">Description</label>
                    <textarea class="form-control" id="expoDescription" rows="5" v-model="expo.description"></textarea>
                </div>
                <div class="form-group">
                    <label for="expoStartDate">Start Date</label>
                    <flatpickr name="expoStartDate" class="form-control" data-default-date="" data-enable-time=true :message='start_date' @update='updateStart' ></flatpickr>
                </div>
                <div class="form-group">
                    <label for="expoEndDate">End Date</label>
                    <flatpickr name="expoEndDate" class="form-control" data-default-date="" data-enable-time=true :message='end_date' @update='updateEnd' ></flatpickr>
                </div>
                <button type="submit" class="btn btn-default btn-primary pull-right" v-on:click.prevent="saveExpo">Save</button>
            </form>
        </div>
    </section>
@endsection