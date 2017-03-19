$(document).ready(function(){
  var url = "/ders";


  $('.frm_sil').click(function(e){
    var ders_id = $(this).parent().attr('id').split('_')[1];
    var that = $(this);
    console.log(ders_id);
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }
    })
    e.preventDefault(); 



    $.ajax({
      type: "DELETE",
      url: url + '/' + ders_id,
      success: function (data) {
        that.parent().parent().remove();
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
      derskodu: $('#frm_derskodu').val(),
      dersadi: $('#frm_dersadi').val(),
      derssaati: $('#frm_derssaati').val(),
      ogretmen: $('#frm_ogretmen').val(),
      sinif: $('#frm_sinif').val()
    }
    console.log(formData);
    $.ajax({

      type: "POST",
      url: url,
      data: formData,
      dataType: 'json',
      success: function (data) {
        var ders = '\
        <div class="tablosatiri"> \
          <div class="tablohucresi">' + data.derskodu + '</div> \
          <div class="tablohucresi">' + data.dersadi + '</div> \
          <div class="tablohucresi">' + data.ogretmen + '</div> \
          <div class="tablohucresi">' + data.derssaati + '</div> \
          <div class="tablohucresi">' + data.program + '</div> \
          <div class="tablohucresi">' + data.sinif + '</div> \
          <div class="tablohucresi">' + data.ogretim + '</div> \
          <div class="tablohucresi"><input type="button" id="frm_sil" value="SİL" /></div> \
        </div>';
        $('#tumdersler').append(ders);
      },
      error: function (data) {
        console.log('Error:', data);
      }
    });
  });
});
