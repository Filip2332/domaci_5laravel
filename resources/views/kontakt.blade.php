@extends("layout")

@section("naslovStranice")
    Contact
@endsection

@section("sadrzajStranice")
    <div style="display: flex; justify-content: center; align-items: center; min-height: 80vh; flex-direction: column;">

        <h1 style="margin-bottom: 20px; font-size: 2rem; color: #333; text-align: center;">
            Contact Us!
        </h1>

        <form style="background: #f9f9f9; padding: 30px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); width: 350px; display: flex; flex-direction: column; gap: 15px;">

            <input type="email" placeholder="Email"
                   style="padding: 10px; border: 1px solid #ccc; border-radius: 5px;">

            <input type="text" placeholder="Title"
                   style="padding: 10px; border: 1px solid #ccc; border-radius: 5px;">

            <textarea placeholder="Message" rows="4"
                      style="padding: 10px; border: 1px solid #ccc; border-radius: 5px; resize: none;"></textarea>

            <button type="submit"
                    style="padding: 10px; background: #4CAF50; color: white; border: none; border-radius: 5px; font-weight: bold; cursor: pointer; transition: 0.3s;">
                Send
            </button>
        </form>
    </div>
@endsection

