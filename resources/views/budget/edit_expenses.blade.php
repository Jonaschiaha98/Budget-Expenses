@include('budget.header')
    
    <!-- section -->
    <div class="section layout_padding pb-0">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="heading_main text_align_center">
                            <h2><span class="theme_color text-center"></span>Expenses</h2>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end section -->
@isset($expenses)
    

    <!-- contact_form -->
    <div class="section contact_form pt-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-12 offset-lg-3">
                    <div class="full">
                        <form class="contact_form_inner" action="{{ route('expenses.update', $expenses->id) }}" method="POST">
                          @method('PATCH')
                          @csrf
                            <fieldset>
                                <div class="field">
                                    <input type="text" required name="description" placeholder="Description" value="{{ $expenses->description }}" class="text-center" />
                                </div>
                                <div class="field">
                                    <input type="number" required name="amount" placeholder="Amount" value="{{ $expenses->amount }}" class="text-center" />
                                </div>
                                <div class="field center">
                                    <button type="submit">Edit Expenses</button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end contact_form -->
    @endisset
@include('budget.footer')