$(document).ready(function() {
    // Ap dung ajax vao laravel
    $(".num-order").change(function(e){
    var id=$(this).attr('data-id');
    var qty=$(this).val();
        //  console.log(id, qty);
    var data={id:id,qty:qty};
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            // 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
        $.ajax({
           url: "updateajax", //action ben controller //CartController@updateajax
           method : 'POST',
           data :{
                 id: '{{csrf_token()}}',
                 qty: '{{csrf_token()}}',
                //  Phai khai bao ro rang the nay
                //  Su dung ten truong du lieu kem theo '{{csrf_token()}}' de ket noi
                // _token: "{{ csrf_token() }}",
                 id,
                qty},
           dataType:'json',
           success : function(data){
            //    alert("Da ket noi ngon roi");
            //    alert(data);
            $("#sub-total-"+id).text(data.sub_total);
            $("#total-price strong").text(data.total);
            $("#num").text(data.count_cart);
            // $("span#num").text(data.totol_count);
               console.log(data);
            },
           error:function(xhr,ajaxOptions,thrownError){
               alert(xhr.status);
               alert(thrownError);
           }
       });
   });

// Cua phan admin cua unitop
    $('.nav-link.active .sub-menu').slideDown();
    // $("p").slideUp();

    $('#sidebar-menu .arrow').click(function() {
        $(this).parents('li').children('.sub-menu').slideToggle();
        $(this).toggleClass('fa-angle-right fa-angle-down');
    });

    $("input[name='checkall']").click(function() {
        var checked = $(this).is(':checked');
        $('.table-checkall tbody tr td input:checkbox').prop('checked', checked);
    });
});
