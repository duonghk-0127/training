<!-- resources/views/auth/login.blade.php -->

@if (!empty(session('err')))
    <h4>{{session('err')}}</h4>    
@endif

<form method="POST" action="{{route('sign-up')}}">
    {!! csrf_field() !!}

    <div>
        Email
        <input type="email" name="email" value="">
        @if ($errors->has('email'))
          <p class="help is-danger">{{ $errors->first('email') }}</p>
       @endif
    </div>

    <div>
        Password
        <input type="password" name="password" id="password">
        @if ($errors->has('password'))
            <p class="help is-danger">{{ $errors->first('password') }}</p>
        @endif
    </div>


    <div>
        <button type="submit">Sign Up</button>
    </div>
</form>