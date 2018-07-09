@extends('layout')
@section('content')
    <section id="form"><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-3 col-sm-offset-1">
                    <p class="label-danger"><?php
                        if (Session::get('message')) {
                            echo Session::get('message');
                            Session::put('message', null);
                        }
                        ?>
                    </p>

                    <div class="login-form"><!--login form-->
                        <h2>Login to your account</h2>
                        <form action="{{route('customer_login')}}" method="post">
                            {{csrf_field()}}
                            <input type="email" placeholder="Email Address" name="email"/>
                            <input type="password" placeholder="Password" name="password"/>
                            <button type="submit" class="btn btn-default">Login</button>
                        </form>
                    </div><!--/login form-->
                </div>
                <div class="col-sm-1">
                    <h2 class="or">OR</h2>
                </div>
                <div class="col-sm-4">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                                <?php Session::put('errors', null);
                                ?>
                            </ul>
                        </div>
                    @endif
                    <div class="signup-form"><!--sign up form-->
                        <h2>New User Signup!</h2>
                        <form action="{{route('register_customer')}}" method="post">
                            {{csrf_field()}}
                            <input type="text" placeholder="Full Name" name="name"/>
                            <input type="email" placeholder="Email Address" name="email"/>
                            <input type="password" placeholder="Password" name="password"/>
                            <input type="text" placeholder="Mobile Number" name="mobile_number"/>
                            <button type="submit" class="btn btn-default">Signup</button>
                        </form>
                    </div><!--/sign up form-->
                </div>
            </div>
        </div>
    </section><!--/form-->
@endsection