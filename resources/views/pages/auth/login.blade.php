@extends('layouts.login')
@section('content')
    <div class="grid lg:grid-cols-2 grow">
        <div
            class="lg:rounded-xl lg:border lg:border-gray-200 lg:m-5 order-1 lg:order-1 bg-top xxl:bg-center xl:bg-cover bg-no-repeat branded-bg bg-custom hidden lg:block">
            <div class="flex flex-col p-8 lg:p-16 gap-4">



                <div class="flex flex-col gap-3 text-center " style="color: white">
                    <h3 class="text-2xl font-semibold !text-white">
                        Welcome to EASY SCHOOL-TEST 
                    </h3>
                    {{-- <img class="h-[50px] max-w-none" src="{{asset('assets/media/images/verp/verp_logo_light.svg')}}" /> --}}
                    <div class="text-base font-medium">
                        Smart ERP for School Management – Powered by DriveinTech Pvt Ltd.
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-center items-center p-8 lg:p-10 order-2 lg:order-2">
            <div class="card max-w-[370px] w-full border-0 shadow-none">
                <form action="{{ route('login') }}" class="card-body flex flex-col gap-5 p-10" id="sign_in_form"
                    method="POST">
                    @csrf
                    <img class="mx-auto" style="width:128px" src="{{ asset('assets/media/images/verp/easy_school2.png') }}" />
                    <div class="text-center">
                        <h3 class="text-lg font-medium text-gray-900 leading-none mb-2">
                            Staff Login
                        </h3>

                    </div>

                    <div class="flex flex-col gap-1">
                        <label class="form-label font-normal text-gray-900">
                            Email
                        </label>
                        <input class="input" placeholder="email@email.com" type="text" value="" name="email"
                            id="email" />

                    </div>
                    <div class="flex flex-col gap-1">
                        <div class="flex items-center justify-between gap-1">
                            <label class="form-label font-normal text-gray-900">
                                Password
                            </label>
                            <a class="text-2sm link shrink-0"
                                href="#">
                                Forgot Password?
                            </a>
                        </div>
                        <div class="input" data-toggle-password="true">
                            <input name="password" placeholder="Enter Password" type="password" value="" />
                            <button class="btn btn-icon" data-toggle-password-trigger="true" type="button">
                                <i class="ki-filled ki-eye text-gray-500 toggle-password-active:hidden">
                                </i>
                                <i class="ki-filled ki-eye-slash text-gray-500 hidden toggle-password-active:block">
                                </i>
                            </button>
                        </div>
                    </div>
                    <label class="checkbox-group">
                        <input class="checkbox checkbox-sm" name="check" type="checkbox" value="1" />
                        <span class="checkbox-label text-2sm">
                            By logging in you are agree to our <a class="text-2sm link shrink-0"
                            href="#">Terms & Conditions </a>and <a class="text-2sm link shrink-0"
                            href="#">Privacy Policy</a>
                        </span>
                    </label>
                    <button type="submit" class="btn btn-primary flex justify-center grow">
                        Log In
                    </button>

                    @error('email')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror

                </form>
            </div>
        </div>

    </div>
@endsection
