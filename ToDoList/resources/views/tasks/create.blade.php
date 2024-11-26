<x-layout>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @if ($errors->any())
   <script >swal ( "Oops" ,  "please fill all faields" ,  "error" )</script>
  
    @endif
    <div class="container">
    <h1 class="text-center card bg-secondary mt-2 mb-2 p-3 text-light" >Add New Task</h1>

    <div class="row  p-3">
        <form action="/tasks/store" method="post" >
                @csrf
                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select name="category_id" id="category_id" class="form-control">
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>

                    
                </div>
                <div class="form-group ">
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title"  name="title">
                </div>
    

                <div class="form-group ">
                    <label for="description">description</label>
                    <input type="text" class="form-control" id="description" name="description" >
                </div>

                <div class="form-group">
                    <label for="due_date">due date</label>
                    <input type="date" class="form-control" id="due_date" name="due_date">
                </div>
                
                <button type="submit" class="btn btn-primary mt-2 w-100">Submit</button>
        </form>
    </div>
</div>


     




</x-layout>