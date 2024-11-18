<x-wrapper>
<main class="container mf-pages mx-auto py-6 px-3">
        <h1 class="text-4xl text-gray-900 font-bold mb-6">{{$data['title']}}</h1>
        <div class="relative">
            <img src="{{ asset('images/equity-funds.png') }}" alt="{{$data->title}}" class="w-full mt-6 mb-6 rounded-lg shadow-md">
            <div class="text-lg leading-relaxed">
            {!! $data->description !!}  
          </div>
        </div>
    </main>
</x-wrapper>