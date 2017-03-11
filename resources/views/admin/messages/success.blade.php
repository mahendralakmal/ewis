@if(\Illuminate\Support\Facades\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li> {{ \Illuminate\Support\Facades\Session::get('success') }} </li>
        </ul>
    </div>
@endif