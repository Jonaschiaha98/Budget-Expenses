@include('budget.header')
    
   <!-- section -->
    <div class="section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="heading_main text_align_center">
                           <h2><span class="theme_color"></span>My Budget</h2>    
                        </div>
                    </div>
                </div>
            </div>
            @isset($budgets)
            <div class="row">
                @foreach ($budgets as $budget)
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="full news_blog">
                       <img class="img-responsive" src="{{ asset('images/b1.png') }}" alt="#" />
                       <div class="overlay"><a class="main_bt transparent" href="{{ route('budget.show', $budget->id) }}">View</a></div>
                       <div class="blog_details w">
                         <h3>Budgeted: {{ $budget->amount }}</h3>
                         <p>{{ $budget->description }}</p>
                       </div>
                    </div>
                </div>
                @endforeach
        </div>
        @endisset
    </div>
    <!-- end section -->
    @include('budget.footer')