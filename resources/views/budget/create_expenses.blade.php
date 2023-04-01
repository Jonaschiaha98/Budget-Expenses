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

    <!-- contact_form -->
    <div class="section contact_form pt-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-12 offset-lg-3">
                    <div class="full">
                        <form class="contact_form_inner" action="{{ route('expenses.store', $budget->id) }}" method="POST">@csrf
                            <fieldset>
                                <div class="field">
                                    <input type="text" required name="description" placeholder="Description" class="text-center" />
                                </div>
                                <div class="field">
                                    <input type="number" required name="amount" placeholder="Amount" class="text-center" />
                                </div>
                                <div class="field center">
                                    <button type="submit">Add Expenses</button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end contact_form -->
   
@include('budget.footer')