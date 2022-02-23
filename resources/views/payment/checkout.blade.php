<x-app-layout>
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 py-12">
        <h1 class="text-gray-500 text-3xl font-bold mb-6">Detalle del pedido</h1>

        <div class="card text-gray-600">
            <div class="card-body">
                <article class="flex items-center">
                    <img class="h-12 w-12 object-cover object-center" src="{{Storage::url($course->image->url)}}" alt="">
                    <h1 class="text-lg ml-2">{{$course->title}}</h1>
                    <p class="text-xl font-bold ml-auto">${{$course->price->value}} USD</p>
                </article>
                <div class="flex justify-end mt-2 mb-4">
                    <a href="{{route('payment.pay', $course)}}" class="btn btn-primary">Comprar</a>
                </div>
                <hr>       
                <p class="text-sm mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos, sit nobis? Provident minus repellat iste, laudantium facilis dicta accusamus excepturi dolor quidem aperiam magni dignissimos illo eveniet iusto iure quas! <a class="text-red-500 font-bold" href="">Términos y Condiciones</a>.</p>         
            </div>
        </div>
    </div>
</x-app-layout>