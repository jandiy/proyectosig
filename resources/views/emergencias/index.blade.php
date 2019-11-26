@extends('layouts.admin')

@section('content')
<div class="container-fluid" style="max-width:1100px;margin:0 auto;padding:10px;background-color:white;">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1>Emergencias</h1>
            </div>
            <div class="pull-right">

                
               
            </div>
        </div>
    </div>
     
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="col-xs-12 col-sm-12 col-md-12">
            <div id="map" style="width:100%;height:400px;"></div>
            </div>
            <?php


                $map="'map'";

                echo '<script>
                    var map;';

                echo  'var m={lat:'.$cart->latitud.', lng: '.$cart->longitud.'};
                    function initMap() {
                        map = new google.maps.Map(document.getElementById( ';
                echo $map;
                echo '), {
                        center: m,

                        zoom: 14
                        });';

                echo 'var marker = new google.maps.Marker({position: m, map: map});}';
                                echo "</script>";

            ?>
				<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAofod0Bp0frLcLHVLxuacn0QBXqVyJ7lc&callback=initMap"></script>


</div>
@endsection
