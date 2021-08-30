@if(isset($errors))
    <div class="alert alert-danger text-left" role="alert">
        @foreach($errors as $error)
            <p class="m-0 p-0">{{ $error }}</p>
        @endforeach
    </div>
@endif
@if(isset($_SESSION['errors']))
    <div class="alert alert-danger text-left" role="alert">
        @foreach($_SESSION['errors'] as $error)
            <p class="m-0 p-0">{{ $error }}</p>
        @endforeach
    </div>
    @php $_SESSION['errors'] = null; @endphp
@endif

@if(isset($message))
    <div class="alert alert-success text-left" role="alert">
        <p class="m-0 p-0">{{ $message }}</p>
    </div>
@endif

@if(isset($_SESSION['message']))
    <div class="alert alert-success text-left" role="alert">
        <p class="m-0 p-0">{{ $_SESSION['message'] }}</p>
    </div>
    @php $_SESSION['message'] = null; @endphp
@endif