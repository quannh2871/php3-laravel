@extends('client.layouts.index')

@section('content')
<div class="main_title_wrapper category_title_section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 main_title_col">
                <div class="jl_cat_mid_title">
                    <h3 class="categories-title title">My account</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<section id="content_main" class="clearfix">
    <div class="container">
        <div class="row main_content">
            <!-- begin content -->
            <div class="page-full col-md-12 post-3938 page type-page status-publish hentry" id="content">
                <div class="content_single_page post-3938 page type-page stuuatus-publish hentry">
                    <div class="content_page_padding">
                        <div class="woocommerce">
                            <div class="woocommerce-notices-wrapper"></div>
                            <h2>Login</h2>

                            @if (count($errors) >0)
                            <ul>
                                @foreach($errors->all() as $error)
                                <li class="text-danger"> {{ $error }}</li>
                                @endforeach
                            </ul>
                            @endif

                            @if (session('status'))
                            <ul>
                                <li class="text-danger"> {{ session('status') }}</li>
                            </ul>
                            @endif

                            <form class="woocommerce-form woocommerce-form-login login" method="POST" action="{{ route('auth.post_login') }}">
                                @csrf
                                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                    <label for="email">Email address&nbsp;<span class="required">*</span>
                                    </label>
                                    <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="email" />
                                </p>
                                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                    <label for="password">Password&nbsp;<span class="required">*</span>
                                    </label>
                                    <input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" />
                                </p>
                                <p class="form-row">
                                    <label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
                                        <input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span>Remember me</span>
                                    </label>
                                    <button type="submit" class="woocommerce-button button woocommerce-form-login__submit" name="login" value="Log in">Log in</button>
                                </p>
                                <p class="woocommerce-LostPassword lost_password"> <a href="#">Lost your password?</a>
                                </p>

                            </form>
                        </div>
                    </div>
                    <div class="brack_space"></div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
