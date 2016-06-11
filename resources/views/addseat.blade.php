@extends('master')
@section('title')
  Event Manager
@stop

@section('content')
  @include('partial.navbar')
  <header class="beranda teal">

  </header>
  <div class="container">
    <div class="row">
      <div class="col s12">
        <h5 class="white-text">Adding Seat for "{{ $events->name }}"</h5>
        <p class="white-text">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
        <div class="card">
          <table>
            <thead>
              <tr>
                  <th data-field="type">Type</th>
                  <th class="center-align" data-field="seat"><i class="mdi mdi-seat-legroom-normal"></i> Seat</th>
                  <th class="center-align" data-field="price">Available</th>
                  <th class="center-align" data-field="price"><i class="mdi mdi-coin"></i> Price</th>
                  <th class="center-align" data-field="action"></th>
              </tr>
            </thead>
            @foreach($events->type->sortByDesc('price') as $type)
              <tr>
                <td>{{ $type->name }}</td>
                <td class="center-align">{{ ($type->seat == 1) ? "Yes" : "No" }}</td>
                <td class="center-align">{{ $type->limit }}</td>
                <td class="center-align">Rp.{{ $type->price }}</td>
                <td class="right-align">
                  <a href="#edit" data-typeid="{{ $type->id  }}" class="btn waves-effect waves-light edit-btn"><i class="mdi mdi-pencil"></i></a>
                  <a href="#edit" class="btn waves-effect waves-light red lighten-1"><i class="mdi mdi-delete"></i></a>
                </td>
              </tr>
            @endforeach
        </table>
        </div>
        <div class="card" id="edit">
          <div class="card-content">
              <h5><i class="mdi mdi-pencil"></i> Edit Seat Type</h5>
              <form id='formedit' action="#" method="post">
                <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
                <div class="row">
                  <div class="input-field col s12 m3">
                    <input id="typename-edit" name="typename" type="text" class="validate" required>
                    <label for="typename-edit">Type</label>
                  </div>
                  <div class="input-field col s12 m3">
                    <select id="seat-edit" name="seat">
                      <option selected value="1">Yes</option>
                      <option value="0">No</option>
                    </select>
                    <label>Seat Type</label>
                  </div>
                  <div class="input-field col s12 m3">
                    <input id="limit-edit" name="limit" type="number" class="validate" required>
                    <label for="limit-edit">Space Limit</label>
                  </div>
                  <div class="input-field col s12 m3">
                    <input id="price-edit" name="price" type="number" class="validate" required>
                    <label for="price-edit">Price</label>
                  </div>
                  <div class="input-field col s12 m3">
                    <button type="submit" class="waves-effect waves-light btn"><i class="mdi mdi-pencil"></i> Edit</button>
                  </div>
                </div>
              </form>
          </div>
        </div>
        <div class="card">
          <div class="card-content">
            <h5>Add new Seat Type</h5>
            <form class="" action="{{ URL::route('createSeat',['id' => $events->id]) }}" method="post">
              <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
              <div class="row">
                <div class="input-field col s12 m3">
                  <input id="typename" name="typename" type="text" class="validate" required>
                  <label for="typename">Type</label>
                </div>
                <div class="input-field col s12 m3">
                  <select name="seat">
                    <option selected value="1">Yes</option>
                    <option value="0">No</option>
                  </select>
                  <label>Seat Type</label>
                </div>
                <div class="input-field col s12 m3">
                  <input id="limit" name="limit" type="number" class="validate" required>
                  <label for="limit-edit">Space Limit</label>
                </div>
                <div class="input-field col s12 m3">
                  <input id="price" name="price" type="number" class="validate" required>
                  <label for="price">Price</label>
                </div>
                <div class="input-field col s12 m3">
                  <button type="submit" class="waves-effect waves-light btn"><i class="mdi mdi-plus"></i> Add New</button>
                </div>
              </div>
            </form>
        </div>
      </div>
    </div>
  </div>
  @section('scriptjs')
  <script type="text/javascript">
    $(".button-collapse").sideNav();
    $('select').material_select();
    $('#edit').hide();

    $('.edit-btn').click(function() {
      $('#edit').slideUp('500');
      $('#edit').slideDown('500');
      var id = $(this).data('typeid');
      $.ajax({
        url: '{{ URL::route('urltype') }}/'+ id ,
        type: 'GET',
        dataType: 'json',
        success: function(data) {
          $('select').material_select('destroy');
          $('#typename-edit').val(data.name);
          $('#seat-edit').val(data.seat);
          $('#limit-edit').val(data.limit);
          $('#price-edit').val(data.price);
          $('select').material_select();
          $('#formedit').attr('action', '{{ URL::route('posteditform', ['id' => $events->id]) }}/' + id );
        }
      })
      .done(function() {
        // console.log("success");
      })
      .fail(function() {
        // console.log("error");
      })
      .always(function() {
        // console.log("complete");
      });

    });


    @if (isset($success))
        Materialize.toast('{{ $success }}', 4000)
    @endif
  </script>
  @stop
@stop
