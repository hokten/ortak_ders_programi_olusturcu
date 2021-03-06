$(document).ready(function(){
  var abd = "sdgdsf";
function delay() {
  // `delay` returns a promise
  return new Promise(function(resolve, reject) {
    // Only `delay` is able to resolve or reject the promise
    setTimeout(function() {
      resolve(42); // After 3 seconds, resolve the promise with value 42
    }, 3000);
  });
}

  // Dondurme efekti icin gerekli kısım
  //
  function dondurmeyi_aktiflestir(secim) {
    secim.flip({
      speed:1000,
      forceWidth:true,
      forceHeight:true
    }, function(e) {console.log(e);});
    secim.on('flip:done',function(e){
        console.log(e.target);
        });

  }

  function bilgilendirme_mesaji(mesaj, tip) {
    noty({
      layout: 'topRight',
      theme: 'metroui', 
      text: mesaj,
      type: tip,
      timeout: 5000,
      progressBar: true
    });
  }


  function aktivite_sifirla(aktivite_id) {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }
    });

    var srkln_aktvt_blg = {
      'aktiviteid':aktivite_id,
    }
    $.ajax({
      type: "PUT",
      url: path + '/aktivitesifirla/' + aktivite_id,
      success: function (data) {
      },
      error: function (data) {
        console.log('Error:', data);
      }
    });

  }



  function aktivite_denetle_ekle(aktivite_id, gun_id, saat_id, salon_id, callback) {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }
    });

    var srkln_aktvt_blg = {
      'aktiviteid':aktivite_id,
      'gunid':gun_id,
      'saatid':saat_id,
      'salonid':salon_id
    }

    $.ajax({
      type: "POST",
      url: '/aktivitedenetle',
      data: srkln_aktvt_blg,
      dataType: 'json',
      success:callback,
      error: function (data) {
        console.log('Error:', data);
      }
    });
  }


    dondurmeyi_aktiflestir($('.aktivite'));
    dondurmeyi_aktiflestir($('.baskabolum'));


  var hucreler = Array.prototype.slice.call($("li.avt_container").toArray());
  //var dersler = Array.prototype.slice.call($('div[id^="ders_"]').toArray());
  var dersler = Array.prototype.slice.call($('.ders').toArray());
  var hepsi = hucreler.concat(dersler);
  console.log(hepsi);
  var drake = dragula(hepsi, {
    revertOnSpill: true,
     });

  drake
  .on('drag', function (el) {
    console.log("dragging");
  })
  .on('drop', function(dragged, dropped, source) {
    var draganddrop = this;
    var salonselect = dragged.querySelector('select');
    var salon_id = salonselect.options[salonselect.selectedIndex].value;
    console.log(salon_id);
    var dropped_ul = dropped.parentElement;
    var srkln_aktv_id = dragged.id.split('-')[1].split('_')[1];
    if(dropped.className == 'avt_container') {
      if(dropped.children.length>1) {
        drake.cancel();	
        return false;
      }
      if(!dragged.id.startsWith(dropped_ul.id)) {
        console.log("Sürüklenen aktivite bu derse ait değil");
        drake.cancel();
        return false;

      }
      aktivite_sifirla(srkln_aktv_id);
    }
    if(dropped.className == 'ders') {
      if(dropped.children.length>1) {
        drake.cancel();	
        return false;
      }
      dsln_gun_id = dropped.id.split('_')[1];
      dsln_saat_id = dropped.id.split('_')[2];
      aktivite_denetle_ekle(srkln_aktv_id, dsln_gun_id, dsln_saat_id, salon_id, function(data) {
        console.log(dragged);
        console.log(dropped);
        console.log(data);
        if(data.durum == false) {
          $(source).append($(dragged));
          $.each(data.mesajlar, function(index, value) {
            bilgilendirme_mesaji(value, "error");
          });
        }
      });

    }
  });
  $(".salon select").each(function() {
    $(this).hide();
  });


  $(".salon a").click(function(e) {
    e.preventDefault();
    console.log("tiklandi");
    if($(this).parents('.ders').length >0 ) return;
    $(this).parent().children('select').show();
    $(this).hide();
  });



  $(".salon select").change(function(e) {
    $(this).prev('a').html($(this).find("option:selected").text());
    $(this).prev('a').show();
    $(this).hide();
  });
});

