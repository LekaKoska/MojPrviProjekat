@extends("layout")

@section("pageTittle")
    Contact
@endsection

@section("pageSection")
    <form>
        <div class="form-group col-3">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">

        </div>
        <div class="form-group col-3">
            <label for="exampleInputPassword1">Subject</label>
            <input type="text" name="subject" class="form-control" placeholder="Subject">
        </div>
        <div class="form-group col-3">
            <label for="exampleFormControlTextarea1">Message</label>
            <textarea class="form-control" id="exampleFormControlTextarea1"  name="message" placeholder="Enter a message.." rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary m-1">Submit</button>
    </form>
    <div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2808.330876521123!2d19.84951465211486!3d45.26132189614664!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475b106d15e30eeb%3A0xfb421c57473907c3!2sIT%20ENGINE%20doo!5e0!3m2!1ssr!2srs!4v1734174880368!5m2!1ssr!2srs" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

@endsection
