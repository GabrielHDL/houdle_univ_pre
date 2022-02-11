<div class="mt-8">
    <div class="container grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2">
            <div class="embed-responsive">
                {!!$current->iframe!!}
            </div>
            <h1 class="text-3xl text-gray-600 font-bold mt-4">{{$current->name}}</h1>
            @if ($current->description)
                <div class="text-gray-600">
                    {{$current->description->name}}
                </div>                
            @endif
            <div class="flex items-center mt-4 cursor-pointer" wire:click="completed">
                @if ($current->completed)
                    <i class="fas fa-toggle-on text-2xl text-amber-600"></i>
                @else
                    <i class="fas fa-toggle-off text-2xl text-gray-600"></i>
                @endif
                <p class="text-sm ml-2">Marcar esta unidad como culminada</p>
            </div>

            <div class="card mt-2">
                <div class="card-body flex text-gray-500 font-bold">
                    @if ($this->previous)
                        <a wire:click="changeLesson({{$this->previous}})" class="cursor-pointer">Tema anterior</a>
                    @endif
                    @if ($this->next)
                        <a wire:click="changeLesson({{$this->next}})" class="ml-auto cursor-pointer">Tema siguiente</a>
                    @endif
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h1 class="text-2xl leading-8 text-center mb-4">{{$course->title}}</h1>
                <div class="flex items-center">
                    <figure>
                        <img class="w-12 h-12 object-cover object-center rounded-full shadow-lg mr-4" src="{{$course->teacher->profile_photo_url}}" alt="">
                    </figure>
                    <div>
                        <p>{{$course->teacher->name}}</p>
                        <a class="font-bold text-blue-500 text-sm" href="">{{'@' . Str::slug($course->teacher->name, '')}}</a>
                    </div>
                </div>

                <div class="relative pt-1 my-4" >
                    <div class="flex mb-2 items-center justify-between">
                      <div>
                        <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-amber-600 bg-amber-200">
                          Progreso del curso
                        </span>
                      </div>
                      <div class="text-right">
                        <span class="text-xs font-semibold inline-block text-amber-600">
                          {{$this->advance . '%'}}
                        </span>
                      </div>
                    </div>
                    <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-amber-200">
                      <div style="width:{{$this->advance . '%'}}" class="transition-all duration-500 ease-in-out shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-amber-500"></div>
                    </div>
                  </div>

                <ul>
                     @foreach ($course->sections as $section)
                         <li class="text-gray-600 mb-4">
                             <a class="inline-block font-bold text-base mb-2" href="">{{$section->name}}</a>
                             <ul>
                                @foreach($section->lessons as $lesson)
                                    <li class="flex">
                                        <div>
                                            @if ($lesson->completed)
                                                @if ($current->id == $lesson->id)
                                                    <span class="inline-block h-4 w-4 border-2 border-amber-400 rounded-full mr-2 mt-1"></span>
                                                @else
                                                    <span class="inline-block h-4 w-4 bg-amber-400 rounded-full mr-2 mt-1"></span>
                                                @endif
                                            @else
                                                @if ($current->id == $lesson->id)
                                                    <span class="inline-block h-4 w-4 border-2 border-gray-600 rounded-full mr-2 mt-1"></span>
                                                @else
                                                    <span class="inline-block h-4 w-4 bg-gray-500 rounded-full mr-2 mt-1"></span>
                                                @endif
                                            @endif
                                        </div>
                                        <a class="cursor-pointer" wire:click="changeLesson({{$lesson}})">{{$lesson->name}}</a>
                                    </li>
                                @endforeach
                             </ul>
                         </li>
                     @endforeach   
                </ul>
            </div>
        </div>
    </div> 
</div>
