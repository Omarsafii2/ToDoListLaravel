<x-layout>
<div class="container">
    <h1 class="text-center card bg-secondary mt-2 mb-2 p-3 text-light" >all categories</h1>






           <div class="row">
               @foreach ($categories as $category)
                            <div class="col-sm-6">
                                <a href="/tasks/index/{{$category->id}}" class="text-decoration-none">
                                    <div class="card mb-2" >
                                        <div class="card-body ">
                                            <h5 class="card-title">{{ $category->name }}</h5>
                                        
                                        </div>
                                    </div>
                                </a>
                            </div>
                        
               
                @endforeach
            </div>

</div>
</x-layout>