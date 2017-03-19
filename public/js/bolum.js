$(document).ready(function(){
  var url = "/bolum";


  $('#lst_bolumler li a').click(function(e){
    var bolum_id = $(this).parent().attr('id');
    var that = $(this);
    console.log(bolum_id);
  $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }
    })
    e.preventDefault(); 



    $.ajax({
      type: "DELETE",
      url: url + '/' + bolum_id,
      success: function (data) {
        that.parent().remove();
      },
      error: function (data) {
        console.log('Error:', data);
      }
    });
  });




  //create new task / update existing task
  $("#frm_ekle").click(function (e) {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }
    })
    e.preventDefault(); 

    var formData = {
      bolum: $('#frm_bolum').val()
    }
    $.ajax({

      type: "POST",
      url: url,
      data: formData,
      dataType: 'json',
      success: function (data) {
        var bolum = '<li id="' + data.id + '">' + data.bolum + '<a href="#">SİL</a></li>';
        $('#lst_bolumler').append(bolum);
      },
      error: function (data) {
        console.log('Error:', data);
      }
    });
  });
});
