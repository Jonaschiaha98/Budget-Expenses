@include('budget.header')
    <!-- Start Banner -->
    <div class="section inner_page_banner">
      <div class="container ">
          <div class="row">
              <div class="col-md-12">
                  <div class="banner_title">
                      <h3 class="text-center">@isset($message)
                          {{ $message }}
                      @endisset</h3>
                      <h3 class="text-center">Anaysis Of My Budget</h3>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- End Banner -->
  <!-- contact_form -->
    <div class="section contact_form pt-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-12 offset-lg-3">
                    <div class="full">
                        <table>
                            @isset($budget)
                            <tr>
                                <th>{{ $budget->duration }}</th>
                                <th>{{ $budget->description }}</th>
                                <th>{{ $budget->amount }}</th>
                                <th><a href="{{ route('budget.edit', $budget->id) }}" class="bbb">edit</a></th>
                                <th><a href="{{ route('expenses.create', $budget->id) }}" class="bbb">Add Expenses</a></th>
                                <th><a class="bbb"><form action="{{ route('budget.delete', $budget->id) }}" method="post">@method('DELETE')@csrf <input type="submit" value="Delete"></form</a></th>
                            </tr>
                            @endisset
                            @isset($expenses)
                            @foreach ($expenses as $expense)
                            <tr>
                                <td>{{ $expense->created_at->format('D/M/Y') }}</td>
                                <td>{{ $expense->description }}</td>
                                <td>{{ $expense->amount }}</td>
                                <td><a href="{{ route('expenses.edit', $expense->id) }}" class="bbb">edit</a></td>
                                <td rowspan="1"></td>
                                <td><a class="bbb"><form action="{{ route('expenses.delete', $expense->id) }}" method="post">@method('DELETE')@csrf <input type="submit" value="Delete"></form></a></td>
                                
                            </tr>
                            @endforeach
                            @endisset
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end contact_form -->
@include('budget.footer')
