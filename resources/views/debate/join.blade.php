@extends('layouts.app')
 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Watch a Debate') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('goforwatch') }}">
                        @csrf
                        <div class="form-group">
                            <div class = "offset-md-1"> <strong> {{ __('Watch a Debate') }} </strong> </div>
                            <div class="form-group row">
                                <label for="watchDebateId" class="col-md-4 offset-md-1 col-form-label text-md-right">{{ __('Debate #:') }}</label>
                                <div class="col-md-6">
                                    <input id="watchDebateId" type="text" placeholder = "{{ __('Your answer') }}" class="form-control{{ $errors->has('watchDebateId') ? ' is-invalid' : '' }}" name="watchDebateId" >
                                    @if ($errors->has('watchDebateId'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('watchDebateId') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="watchPassword" class="col-md-4 offset-md-1 col-form-label text-md-right">{{ __('Password:') }}</label>
                                <div class="col-md-6">
                                    <input id="watchPassword" type="password" placeholder = "{{ __('Your answer') }}" class="form-control{{ $errors->has('watchPassword') ? ' is-invalid' : '' }}" name="watchPassword" >

                                    @if ($errors->has('watchPassword'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('watchPassword') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class = "form-group row">
                            <div class = "col-md-10 offset-md-1">
                                <div> <strong>{{ __('Last Debate you watched:') }}</strong> </div>
                                <div> Debate: {{ $watchId }} </div>
                                <div class = "mb-30"> Topic: {{ $watchTopic }} </div>

                                <div> <strong>{{ __('Trending Debate Topics:') }}</strong> </div>
                                @foreach ($trendingDebate as $debate)
                                <div> - {{ $debate->topic }} </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-3 text-md-center">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('SUBMIT') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Join a Debate') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('goforjoin') }}">
                        @csrf
                        <div class = "offset-md-1"> <strong> {{ __('Join a Debate') }} </strong> </div>
                        <div class="form-group row">
                            <label for="joinDebateId" class="col-md-4 offset-md-1 col-form-label text-md-right">{{ __('Debate #:') }}</label>
                            <div class="col-md-6">
                                <input id="joinDebateId" type="text" placeholder = "{{ __('Your answer') }}" class="form-control{{ $errors->has('joinDebateId') ? ' is-invalid' : '' }}" name="joinDebateId" >
                                @if ($errors->has('joinDebateId'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('joinDebateId') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="joinPassword" class="col-md-4 offset-md-1 col-form-label text-md-right">{{ __('Password:') }}</label>
                            <div class="col-md-6">
                                <input id="joinPassword" type="password" placeholder = "{{ __('Your answer') }}" class="form-control{{ $errors->has('joinPassword') ? ' is-invalid' : '' }}" name="joinPassword" >
                                @if ($errors->has('joinPassword'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('joinPassword') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class = "form-group row">
                            <div class = "col-md-10 offset-md-1">
                                <div> <strong>{{ __('Last Debate you joined:') }}</strong> </div>
                                <div> Debate: {{ $joinId }} </div>
                                <div class = "mb-30"> Topic: {{ $joinTopic }} </div>

                                <div> <strong>{{ __('Most Popular Debate:') }}</strong> </div>
                                <div> Debate: {{ $topId }} </div>
                                <div class = "mb-30"> Topic: {{ $topTopic }} </div>

                                <div> <strong>{{ __('Fastest Growing Debate:') }}</strong> </div>
                                <div> Debate: {{ $growId }}  </div>
                                <div > Topic: {{ $growTopic }} </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-3 text-md-center">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('SUBMIT') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/6.4.0/adapter.min.js" ></script>
<script type="text/javascript" src="{{ asset('js/janus.js') }}" ></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.7.2/jquery.min.js" ></script>

@if (isset($_GET['alertType']) && $_GET['alertType'] == 1)
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.3/toastr.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.3/toastr.css"/>
<script>
    $(document).ready(function() {
        toastr.warning('Please input correct Debate ID.');
    });
    window.history.pushState('Join', 'DebateFace', '/join');
</script>
@endif

<script>

var server = null;
if(window.location.protocol === 'http:')
    server = "http://" + window.location.hostname + ":8088/janus";
else
    server = "https://" + window.location.hostname + ":8089/janus";

var janus = null;
var sfutest = null;
var opaqueId = "listrequest-" + Janus.randomString(12);

$(document).ready(function() { 
    Janus.init({debug: "all", callback: function() { 
        janus = new Janus({
            server: server,
            success: function() {
                janus.attach({
                    plugin: "janus.plugin.videoroom",
                    opaqueId: opaqueId,
                    success: function(pluginHandle) {
                        sfutest = pluginHandle;
                        
                        var listCmd = { request: "list" };
                    
                        sfutest.send({"message": listCmd});
                        console.log(sfutest);
                    },
                    onmessage: function(msg, jsep) { 
                        console.log(msg);
                    }
                });
            },
            error: function(error) {
                console.log(error);
            },
            destroyed: function() {
                window.location.reload();
            }
        });
    }
    });
});
</script>

@endsection