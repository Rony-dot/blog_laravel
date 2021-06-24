<div>
    <!-- It is quality rather than quantity that matters. - Lucius Annaeus Seneca -->
    @if(session()->has('msg'))
        <div class="alert alert-success">
            <p>{{ session()->get('msg') }}</p>
        </div>
    @elseif(session()->has('error'))
        <div class="alert alert-danger">
            <p>{{session()->get('msg')}}</p>
        </div>
    @endif

    @if($errors ->any())

        @foreach($errors->all() as $error)
            <div class="alert alert-danger"> {{ $error }}</div>
        @endforeach
    @endif
</div>
