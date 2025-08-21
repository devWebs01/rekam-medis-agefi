@extends("layouts.app")

@section("content")
    <div class="login-background">
        <div class="container" id="log">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    @if (session("notif"))
                        <div class="alert alert-success" role="alert">
                            {{ session("notif") }}
                        </div>
                    @endif
                    <div class="card shadow-lg border-0 rounded-lg">
                        {{-- logo --}}
                        <div style="margin-top: 10px" align="center">
                            <img id="profile-img" height="100" width="120" class="profile-img-card"
                                src="{{ asset("backend/assets/img/logo.png") }}" />
                            <p class="mt-2"><strong>Klinik Agefi Dental Care</strong></p>
                        </div>
                        {{-- end logo --}}
                        <div class="card-body">

                            <form method="POST" action="{{ route("login") }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="username" class="col-md-4 col-form-label text-md-right">Username</label>
                                    <div class="col-md-8">
                                        <input type="text"
                                            class="form-control {{ $errors->has("username") || $errors->has("email") ? "is-invalid" : "" }}"
                                            name="login" value="{{ old("username") ? old("username") : old("email") }}"
                                            placeholder="Username" />
                                        @if ($errors->has("username") || $errors->has("email"))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first("username") ? $errors->first("username") : $errors->first("email") }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label for="password"
                                        class="col-md-4 col-form-label text-md-right">{{ __("Password") }}</label>
                                    <div class="col-md-8">
                                        <input id="password" type="password"
                                            class="form-control @error("password") is-invalid @enderror" name="password"
                                            required autocomplete="current-password">
                                        @error("password")
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-0 mt-3">
                                    <div class="col-md-8 offset-md-4 d-grid">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __("Login") }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        body {
            background-color: #f8f9fa;
            /* Ensure body background is not interfering */
        }

        .login-background {
            background-image: url('https://images.unsplash.com/photo-1585320806297-9794b3e4b8d6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1920&q=80');
            /* Dental Clinic Image */
            background-size: cover;
            background-position: center;
            height: 100vh;
            /* Full viewport height */
            display: flex;
            align-items: center;
            /* Center content vertically */
            justify-content: center;
            /* Center content horizontally */
        }

        #log {
            /* Adjust container styles if needed to fit within the background */
            max-width: 900px;
            /* Example: make container slightly wider */
        }

        .card {
            background-color: rgba(255, 255, 255, 0.9);
            /* Slightly transparent white background for the card */
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        }
    </style>
@endsection
