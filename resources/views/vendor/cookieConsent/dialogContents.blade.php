<div id="cookie-window" class="js-cookie-consent cookie-consent text-center pt-2 pb-2 bg-warning">

    <span class="cookie-consent__message">
        {!! trans('cookieConsent::texts.message') !!}
    </span>

    <button class="js-cookie-consent-agree cookie-consent__agree ml-5 btn btn-outline-dark mr-5 mt-3 mb-3 mt-md-0 mb-md-0">
        {{ trans('cookieConsent::texts.agree') }}
    </button>

    <a href="{{ route('page', 'privacy-policy') }}" class="btn btn-outline-dark mt-3 mb-3 mt-md-0 mb-md-0">Polityka prywatności</a>

</div>
