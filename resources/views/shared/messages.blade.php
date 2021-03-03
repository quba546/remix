@if ($message = Session::get('success'))
    <div class="alert alert-success alert-block text-center mt-3 mb-3 ml-5 mr-5">
        <i class="fas fa-check mr-5 font-message-icon"></i>
        <button type="button" class="close" data-dismiss="alert">✕</button>
        <strong>{{ $message }}</strong>
    </div>
@endif

@if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block text-center mt-3 mb-3 ml-5 mr-5">
        <i class="fas fa-times mr-5 font-message-icon"></i>
        <button type="button" class="close" data-dismiss="alert">✕</button>
        <strong>{{ $message }}</strong>
    </div>
@endif

@if ($message = Session::get('warning'))
    <div class="alert alert-warning alert-block text-center mt-3 mb-3 ml-5 mr-5">
        <i class="fas fa-exclamation mr-5 font-message-icon"></i>
        <button type="button" class="close" data-dismiss="alert">✕</button>
        <strong>{{ $message }}</strong>
    </div>
@endif

@if ($message = Session::get('info'))
    <div class="alert alert-info alert-block text-center mt-3 mb-3 ml-5 mr-5">
        <i class="fas fa-info mr-5 font-message-icon"></i>
        <button type="button" class="close" data-dismiss="alert">✕</button>
        <strong>{{ $message }}</strong>
    </div>
@endif
