@extends('layouts')

@section('content')

<form >
    <div class="form-group">
      <label >seller:</label>
     <select name="seller_id" class="form-control">
         @foreach ($sellers as $seller )
         <option value="{{ $seller->id }}">{{ $seller->name }}</option>
         @endforeach
     </select>
    </div>

    <div class="form-group">
        <label >product:</label>
       <select name="product_id" class="form-control">
           @foreach ($products as $product )
           <option value="{{ $product->id }}">{{ $product->name }}</option>
           @endforeach
       </select>
      </div>
      <div>
        <label>discount:</label>
        <input type="number" name="discount" class="form-control" >
      </div>
      <div>
        <label>availability:</label>
        <input type="number" name="availability" class="form-control" >
      </div>

    <button id="save_product" type="submit" class="btn btn-default">Submit</button>
  </form>

  @endsection


  {{-- AjaxCode --}}
  @section('ajax')
<script>
    $document.on('click','#save_product',function(){
        e.preventDefault();
    $.ajax({
        type:'post',
        url : "{{ route('sellerProduct.store') }}",
        data :{
                '_token':{{ csrf_token() }},
                'seller_id': $("select[name='seller_id']").val(),
                'product_id': $("select[name='product_id']").val(),
                'discount': $("input[name='discount']").val(),
                'availability': $("input[name='discount']").val(),
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

