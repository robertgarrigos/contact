<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css">
    <title>{{ __('contact.contact_us') }}</title>
</head>

<body>
    <div class="section">
        <div class="container">
            <div class="columns">
                <div class="column"></div>
                <div class="column">
                    @if(session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="card content">
                        <div class="card-header">
                            <h3 class="card-header-title">{{ __('contact.contact_us') }}</h3>
                        </div>
                        <div class="card-content">
                            <form action="{{route('contact')}}" method="POST">
                                @csrf
                                <div class="field">
                                    <label class="label">{{ __('contact.name') }}</label>
                                    <div class="control">
                                        <input type="text" class="input {{ $errors->has('name') ? 'is-danger' : '' }}"
                                            name="name" id="name" placeholder="{{ __('contact.name_placeholder') }}" required
                                            value="{{ old('name') }}">
                                    </div>
                                    @if ($errors->has('name'))
                                    <p class="help is-danger">{{ $errors->first('name') }}</p>
                                    @endif
                                </div>
                                <div class="field">
                                    <label class="label">{{ __('contact.email') }}</label>
                                    <div class="control">
                                        <input type="email" class="input {{ $errors->has('email') ? 'is-danger' : '' }}"
                                            name="email" id="email" placeholder="{{ __('contact.email_placeholder') }}" required
                                            value="{{ old('email') }}">
                                    </div>
                                    @if ($errors->has('email'))
                                    <p class="help is-danger">{{ $errors->first('email') }}</p>
                                    @endif
                                </div>

                                <div class="field">
                                    <label class="label">{{ __('contact.enter_your_message') }}</label>
                                    <div class="control">
                                        <textarea class="textarea {{ $errors->has('message') ? 'is-danger' : '' }}"
                                            name="message" rows="3" required>{{ old('message') }}</textarea>
                                    </div>
                                    @if ($errors->has('message'))
                                    <p class="help is-danger">{{ $errors->first('message') }}</p>
                                    @endif
                                </div>
                                <div class="field">
                                    <label class="label is-large">{{ __('contact.captcha') }}</label>
                                    <div class="control">
                                        {{ captcha_img('flat') }}
                                        <input type="text"
                                            class="input {{ $errors->has('captcha') ? 'is-danger' : '' }}"
                                            name="captcha">
                                    </div>
                                    @if ($errors->has('captcha'))
                                    <p class="help is-danger">{{ $errors->first('captcha') }}</p>
                                    @endif
                                </div>
                                <div class="field">
                                    <div class="control">
                                        <button type="submit" class="button is-link">{{ __('contact.submit') }}</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>

                    @if(Session::has('message'))
                    <div class="notification is-success">
                        {{Session::get("message")}}
                    </div>
                    @endif
                </div>
                <div class="column"></div>

            </div>

        </div>
    </div>

</body>

</html>
