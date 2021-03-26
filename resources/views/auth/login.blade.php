@extends('layouts.app')

@section('content')
   <div class="flex justify-center pt-6">
      <div class="bg-white w-4/12 p-6 rounded-lg">
        <h1 class="text-yellow-600 text-lg text-center">Login</h1>
        <form action="{{route('login')}}" method="POST" class="pt-6">
            @csrf

            @if(session('status'))
                <p class="text-red-500 text-sm mb-2">{{session('status')}}</p>
            @endif

            @if ($errors->any())
                <div class="mb-2">
                    <ul class="text-red-500 text-sm">
                        @foreach ($errors->all() as $error)
                            <li>. {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <input type="email" name="email" placeholder="Email" class="bg-gray-200 w-full p-3 border mb-4 rounded-lg focus:outline-none focus:border-yellow-600 @error('name') border-red-500 @enderror" value="{{old('email')}}"><br>

            <input type="password" name="password" placeholder="Password" class="bg-gray-200 w-full p-3 border mb-4 rounded-lg focus:outline-none focus:border-yellow-600 @error('name') border-red-500 @enderror"><br>

            <button class="w-full p-3 bg-yellow-600 text-white rounded-lg">Submit</button>
        </form>
      </div>
    
    </div>
@endsection