@extends('user.layouts.app')

@section('content')
    <!-- ====== Navbar Section Start -->
    @include('user.components.navbar')
    <!-- ====== Navbar Section End -->

    <!-- ====== Home Bar Section Start-->
    @include('user.components.sections.homeBar')
    <!-- ====== Home Bar Section End -->

    <!-- ====== About Section Start -->
    @include('user.components.sections.aboutBar')
    <!-- ====== About Section End -->

    <!-- ====== Pricing Section Start -->
    @include('user.components.sections.pricingBar')
    <!-- ====== Pricing Section End -->

    {{-- Testimonials Section Start --}}
    @include('user.components.sections.testimonialsBar')
    {{-- Testimonials Section End --}}

    {{-- Faq Section Start --}}
    @include('user.components.sections.faqBar')
    {{-- Faq Section End --}}

    <!-- ====== Team Section Start -->
    @include('user.components.sections.teamBar')
    <!-- ====== Team Section End -->

    <!-- ====== Blog Section Start -->
    {{-- @include('user.components.sections.blogBar') --}}
    <!-- ====== Blog Section End -->

    <!-- ====== Contact Start ====== -->
    @include('user.components.sections.contactBar')
    <!-- ====== Contact End ====== -->

    <!-- ====== Footer Section Start -->
    @include('user.components.footer')
    <!-- ====== Footer Section End -->
@endsection
