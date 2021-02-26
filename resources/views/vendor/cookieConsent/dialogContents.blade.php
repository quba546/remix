<div id="cookie-window" class="js-cookie-consent cookie-consent text-center pt-2 pb-2 bg-warning">
    <div class="row">
        <div class="col-12 col-md-5 d-md-flex justify-content-end">
            <span class="cookie-consent__message">
                {!! trans('cookieConsent::texts.message') !!}
            </span>
        </div>
        <div class="col-12 col-md-5 d-md-flex justify-content-start">
            <button class="js-cookie-consent-agree cookie-consent__agree ml-5 btn btn-outline-dark mr-5 mt-3 mb-3 mt-md-0 mb-md-0">
                {{ trans('cookieConsent::texts.agree') }}
            </button>
        </div>
        <div class="col-12 col-md-2 d-md-flex justify-content-end">
            <a href="{{ route('page', 'privacy-policy') }}" class="btn btn-outline-dark mt-3 mb-3 mt-md-0 mb-md-0 mr-md-5">Polityka prywatności</a>
        </div>
    </div>
</div>
