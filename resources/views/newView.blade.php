<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <title>Test</title>

    </head>
    <body>
 
        <form method="post" action="{{ route('store-itern') }}" accept-charset="UTF-8">
            @csrf
            <label>name : </label> 
            <input type="text" name="name">
            <input type="submit"> 
        </form>


        @foreach($datas as $data )
          <p>{{ $data->name }}</p>  
        @endforeach

        
        
    </body>
</html>
