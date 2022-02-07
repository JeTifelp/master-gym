@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                <a class="nav-link" href=""><font color='blue' size=4 face="font-family:courier,arial,helvética;">B I E N V E N I D O S</font><span class="sr-only" >(current)</span></a>
                </div>
                {{-- <div class="card-header" face="Comic Sans MS,arial" >{{ __('B I E N V E N I D O S') }}</div> --}}

                <div class="card-body bg-dark" face="Comic Sans MS,arial">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <br>
                    
                    <div class="card-header" face="Comic Sans MS,arial" >
                        
                        <a class="nav-link" href=""><font color='red' size=20 face="impact">G I M N A S I O  <br>  M A S T E R   -    G Y M</font><span class="sr-only" >(current)</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
