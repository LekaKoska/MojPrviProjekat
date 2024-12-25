@extends("layout")

@section("pageTittle")
    Home
@endsection

@section("pageSection")

    @foreach($products as $product)
        <p>{{$product->name}}</p>
    @endforeach

    <form method="POST" action="/send-contact">
        @if($errors->any())
            {{$errors->first()}}
        @endif

        @csrf
        <div class="form-group col-3">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group col-3">
            <label class="exampleInputText" for="exampleCheck1">Subject</label>
            <input type="text" class="form-control" id="exampleInputText" placeholder="Enter a subject" name="subject">
        </div>


            <div class="form-group col-3">
                <label for="exampleFormControlTextarea1">Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1"  name="description" placeholder="Description.." rows="3"></textarea>
            </div>



        <button type="submit" class="btn btn-primary">Submit</button>
    </form>



@endsection
