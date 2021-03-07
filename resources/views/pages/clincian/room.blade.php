@extends('pages.layouts.app')

@section('title','Welcome to Doral')
@section('pageTitleSection')
    OpenTok Getting Started
@endsection

@section('content')
    <div class="container bump-me">

        <div class="body-content">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Host</h3>
                </div>
                <div class="panel-body">
                    <div id="subscribers"><div id="publisher"></div></div>
                </div>
                <div class="panel-footer">
                    <form class="archive-options">
                        <fieldset class="archive-options-fields">
                            <div class="form-group">
                                <p class="help-block">Archive Options:</p>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="hasAudio" checked> Audio
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="hasVideo" checked> Video
                                </label>
                            </div>

                            <div class="form-group">
                                <p class="help-block">Output Mode:</p>
                                <label class="radio-inline">
                                    <input type="radio" name="outputMode" value="composed" checked> Composed
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="outputMode" value="individual"> Individual
                                </label>
                            </div>
                        </fieldset>
                    </form>
                    <button class="btn btn-danger start">Start archiving</button>
                    <button class="btn btn-success stop">Stop archiving</button>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Instructions</h3>
            </div>
            <div class="panel-body">
                <p>
                    Click <strong>Start archiving</strong> to begin archiving this session.
                    All publishers in the session will be included, and all publishers that
                    join the session will be included as well.
                </p>
                <p>
                    Click <strong>Stop archiving</strong> to end archiving this session.
                    You can then go to <a href="/history">past archives</a> to
                    view your archive (once its status changes to available).
                </p>
                <table class="table">
                    <thead>
                    <tr>
                        <th>When</th>
                        <th>You will see</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td style="vertical-align: middle;">Archiving is started</td>
                        <td><img src="img/archiving-on-message.png"></td>
                    </tr>
                    <tr>
                        <td style="vertical-align: middle;">Archiving remains on</td>
                        <td><img src="img/archiving-on-idle.png"></td>
                    </tr>
                    <tr>
                        <td style="vertical-align: middle;">Archiving is stopped</td>
                        <td><img src="img/archiving-off.png"></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@push('styles')
    <style>
        #videos {
            position: relative;
            width: 10%;
            height: 10%;
            margin-left: auto;
            margin-right: auto;
        }

        #subscriber {
            position: absolute;
            left: 0;
            top: 0;
            width: 50%;
            height: 50%;
            z-index: 10;
        }

        #publisher {
            position: absolute;
            width: 100px;
            height: 100px;
            bottom: 10px;
            left: 10px;
            z-index: 100;
            border: 3px solid white;
            border-radius: 3px;
        }

    </style>
@endpush
@push('scripts')
    <script src="https://static.opentok.com/v2/js/opentok.min.js"></script>
    <script>
        var sessionId = "{{ $sessionId }}";
        var apiKey = "{{ env('VONAGE_API_KEY') }}";
        var token = "{{ $token }}";
    </script>
    <script src="{{ asset('js/clincian/host.js') }}"></script>
@endpush
