var myModal = new bootstrap.Modal(document.getElementById("myModal"), {});

$(document).ready(function () {
  var table = $('#example').DataTable({
    scrollY: "50vh",
    scrollX: true,
    scrollCollapse: true,
    paging: false,
    fixedColumns: true,
  });

  $(document).on('click', '.show-modal', function () {

    $('.myModal').on('shown.bs.modal', function () {
      table.columns.adjust()
      table.fixedColumns().relayout();
    })
    myModal.show();

  });

});

$(document).ready(function () {
  $.ajax({
    url: "fetchinvoice.php",
    method: "POST",
    success: function (data) {
      $('#fetchstruk').html(data);
    }
  });

  var sum = 0;

  $('.hrg').each(function () {
    sum += parseFloat($(this).text());
    $('#totalhrg').text(sum);
    $('#total').val(sum);
  });
});

$("#pay-total").on('keyup', function () {
  let total = $("#pay-total").val();
  $("#pay").text(total);
});


function getXMLHTTPRequest() {
  if (window.XMLHttpRequest) {
    return new XMLHttpRequest();
  } else {
    return new ActiveXObject("Microsoft.XMLHTTP");
  }
}

function kekeranjang(id) {
  $('#hiddenuid').val(id);

  $.ajax({
    url: "data.php",
    type: "post",
    data: {
      id: id
    },
    success: function (data) {
      let user = JSON.parse(data);
      $('#item_name').val(user.nama);
      $('#hiddenuid').val(user.id);
    }
  })

}

function pay(value) {
  totalharga = parseInt($('#total').val());
  totalbayar = parseInt(value);

  if (totalbayar < totalharga) {
    alert("Total bayar kurang");
  } else {
    $.ajax({
      type: "get",
      data: "pay.php?totalharga=" + totalharga + "&totalbayar=" + totalbayar,
      success: function (data) {
        window.location.href = "pay.php?totalharga=" + totalharga + "&totalbayar=" + totalbayar;
      }
    })
  }


}

function invoice(id) {
  let uid = id;
  let unit = $('#unit').val();
  $.ajax({
    url: "invoice.php",
    type: "post",
    data: {
      uid: uid,
      unit: unit
    },
    success: function (data) {
      $('#price').val(data);
    }
  })
}



document.querySelector(".inputnumber").addEventListener("keypress", function (evt) {
  if (evt.which != 8 && evt.which != 0 && evt.which < 48 || evt.which > 57) {
    evt.preventDefault();
  }
  var value = $(this).val();
  value = value.replace(/^(0*)/, "");
  $(this).val(value);
});

var kembali = 0;
let bayar = 0

$(document).keyup(function () {
  var bayar = $("#pay-total").val();

  var totalhrg = $("#totalhrg").map(function () {
    return $(this).text();
  }).get();

  if (parseFloat(bayar) < parseFloat(totalhrg)) {
    $('#return').text("Invalid");
  } else {
    kembali = parseFloat(bayar) - parseFloat(totalhrg);
    $('#return').text("Rp. " + kembali);
  }
});


$("#myTable").on('click', '.btnHapus', function () {
  let currentRow = $(this).closest("tr");
  let jml = currentRow.find(".jml").html();
  let nama = currentRow.find(".namavoice").html();

  $.ajax({
    url: "unitinvoice.php",
    type: "post",
    data: {
      jml: jml,
      nama: nama
    },
    success: function (data) {
      $.ajax({
        url: "fetchinvoice.php",
        method: "POST",
        success: function (data) {
          if (data) {
            $('#fetchstruk').html(data);
            $('#price').val(data);
          }
        }
      })
        , window.location.href = "kasir.php";
      ;
    }
  })
});