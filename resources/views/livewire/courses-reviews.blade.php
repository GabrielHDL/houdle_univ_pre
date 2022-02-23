<section class="mt-6 mb-4">
    <h1 class="font-bold text-3xl text-gray-800 mb-2">Reseñas</h1>

    @can('enrolled', $course)
        <article class="mb-4">
            @can('valued', $course)
                <textarea wire:model="comment" class="form-input w-full" rows="3" placeholder="Aa"></textarea>

                <div class="flex mt-2 items-center">
                    <button class="btn btn-primary mr-4" wire:click="store">Guardar</button>

                    <ul class="flex gap-1">
                        <li class="cursor-pointer" wire:click="$set('rating', 1)">
                            <i class="fas fa-star text-{{$rating >= 1 ? 'amber' : 'gray'}}-400"></i>
                        </li>
                        <li class="cursor-pointer" wire:click="$set('rating', 2)">
                            <i class="fas fa-star text-{{$rating >= 2 ? 'amber' : 'gray'}}-400"></i>
                        </li>
                        <li class="cursor-pointer" wire:click="$set('rating', 3)">
                            <i class="fas fa-star text-{{$rating >= 3 ? 'amber' : 'gray'}}-400"></i>
                        </li>
                        <li class="cursor-pointer" wire:click="$set('rating', 4)">
                            <i class="fas fa-star text-{{$rating >= 4 ? 'amber' : 'gray'}}-400"></i>
                        </li>
                        <li class="cursor-pointer" wire:click="$set('rating', 5)">
                            <i class="fas fa-star text-{{$rating >= 5 ? 'amber' : 'gray'}}-400"></i>
                        </li>
                    </ul>
                </div>

            @else
                <div class="bg-green-900 text-center py-4 lg:px-4 duration-800 transition-all ease-in-out shadow-green-800 shadow-md">
                    <div class="p-2 bg-green-800 items-center text-green-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
                    <span class="flex justify-center items-center rounded-full bg-green-500 uppercase p-2 h-8 w-8 text-xs font-bold mr-3"><i class="fas fa-star"></i></span>
                    <span class="font-semibold mr-2 text-left flex-auto">Ya valoraste este curso! 😊</span>
                    </div>
                </div>
            @endcan
        </article>
    @endcan
    <div class="card">
        <div class="card-body">
            <p class="text-gray-800 text-xl mb-4">{{$course->reviews->count()}} Valoraciones</p>
            @foreach ($course->reviews as $review)
                <article class="flex mb-4 text-gray-800">
                    <figure class="mr-4">
                        <img class="h-12 w-12 object-cover object-center rounded-full shadow-lg" src="{{$review->user->profile_photo_url}}" alt="{{$review->user->name}}">
                    </figure>
                    <div class="card flex-1">
                        <div class="card-body bg-gray-100">
                            <p><b>{{$review->user->name}}</b> <i class="fas fa-star text-amber-300"></i> {{$review->rating}}</p>
                            {{$review->comment}}
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
