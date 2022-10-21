@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Your token</div>

                    <div class="col-6 m-auto">
                        <form action="{{route('edit.token')}}" method="post">
                            @csrf
                            {{method_field('PUT')}}
                            <input class="form-control mt-3 mb-3" name="token" type="text" value="{{$user->token}}" readonly>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-success ">Save</button>
                                <button type="button" class="btn btn-primary" onclick="generateToken()">Generate new token</button>
                            </div>


                        </form>
                    </div>

            </div>
        </div>
    </div>
</div>
@endsection
<script defer>
    function generateToken()
    {
        let input = document.querySelector('input[name="token"]');
        let rand = Math.random().toString(36).substr(2);
        input.value = rand+rand+rand;
    }
</script>
