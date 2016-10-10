@extends('layouts.default')

@section('title', 'Weather Forecasts &amp; Reports')

@section('content')
    <div class="ui container">
        <div class="ui grid">
            <div class="sixteen wide column">
                <h2 class="ui dividing header">
                    {{ $locationName }}
                </h2>
            </div>
        </div>
        <div class="ui grid">
            <div class="eight wide column">
                <img src="{{ $radarImage }}">
            </div>
            <div class="two wide column"></div>
            <div class="six wide column">
                <div class="ui one statistics">
                    <div class="statistic">
                        <div class="value">
                            <img src="{{ $currentObserIcon }}" alt=""> {{ $temperature }}&deg;F
                        </div>
                        <div class="label">
                            {{ $currentObserWeather }} - Feels like {{ $feelsLike }}&deg;F
                        </div>
                    </div>
                    <div class="statistic">
                        <div class="value" style="font-size: 2rem !important;">
                            Next hour
                        </div>
                        <div class="label">
                            Overcast for hour.
                        </div>
                    </div>
                    <div class="statistic">
                        <div class="value" style="font-size: 2rem !important;">
                            Next 24 hours
                        </div>
                        <div class="label">
                            Mostly cloudy throughout the day.
                        </div>
                    </div>
                    <div class="statistic">
                        <div class="value" style="font-size: 2rem !important;">
                            Next 7 hours
                        </div>
                        <div class="label">
                            Mostly cloudy throughout the day.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ui grid">
            <div class="sixteen wide column">
                <table class="ui celled padded table" style="border: none;">
                    <tbody>
                    @foreach($forecasts as $forecast)
                        <tr>
                            <td><h2 class="ui center aligned header">{{ $forecast['title'] }}</h2></td>
                            <td class="single line" style="border-left: none"><img src="{{ $forecast['icon_url'] }}" alt="{{ $forecast['icon'] }}"></td>
                            <td class="left aligned" style="border-left: none">{{ $forecast['fcttext'] }}</td>
                            <td style="border-left: none">{{ $forecast['fcttext_metric'] }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
