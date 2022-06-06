@extends('layouts')

@section('content')

<table class="table">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">sellerName</th>
        <th scope="col">productName</th>
        <th scope="col">price</th>
        <th scope="col">discount</th>
        <th scope="col">availability</th>

        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($records as $record)
      <tr class="data_row">
          <td>{{ $record->id }}</td>
          <td>{{ $record->seller->name }}</td>
          <td>{{ $record->product->name }}</td>
          <td>{{ $record->price }}</td>
          <td>{{ $record->discount }}</td>
          <td>{{ $record->availability }}</td>

          <td>
             <a href="javascript:void(0)" class="btn btn-primary edit" data-id="{{ $record->id }}">Edit</a>
            <a class="delete" class="btn btn-danger delete" data-id="{{ $record->id }}">Delete</a>
          </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection

  {{-- AjaxCode --}}
  @section('ajax')
<script>
    $document.on('click','.delete',function(){
        e.preventDefault();
       var id =  $(this).attr('data-id');
    $.ajax({
        type:'post',
        url : "{{ route('sellerProduct.delete') }}",
        data :{
            '_token':"{{ csrf_token() }}",
            'id':id,

        },
        success: function($data) {
            console.log('success');
        },
        error: function($reject) {
            console.log('faild');
        }
    });
});

</script>
@endsection
