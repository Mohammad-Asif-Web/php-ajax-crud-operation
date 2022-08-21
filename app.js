$(document).ready(function(){
    $("#upStd").hide();
    $("#id").hide()
    showData()

    $('#addStd').click(function(){
        addData()
        return false;
    })

    $('#upStd').click(function(){
        updateData();
        $("#upStd").hide();
        $("#id").hide()
        $("#addStd").show()
        return false;
    })
})

function addData(){
    var amount = $('#amount').val()
    var buyer = $('#buyer').val()
    var items = $('#items').val()
    var buyerEmail = $('#buyer_email').val()
    var note = $('#note').val()
    var city = $('#city').val()
    var phone = $('#phone').val()
   $.ajax({
    'url' : 'process.php',
    'type' : 'POST',
    'data' : {
        'amount' : amount,
        'buyer' : buyer,
        'items' : items, 
        'buyer_email' : buyerEmail,
        'note' : note,
        'city' : city,
        'phone' : phone,
        'checker' : 'insert'
    },
    'success' : function(data){
        $('#msg').html(data).fadeOut(3000);
        $('#amount').val("");
        $('#buyer').val("");
        $('#items').val("");
        $('#buyer_email').val("");
        $('#note').val("");
        $('#city').val("");
        $('#phone').val("");
    }
   })
}

// show list to website
 function showData(){
    $.ajax({
        'url' : 'process.php',
        'type' : 'POST',
        'data' : {
            'checker' : 'show'
        },
        'success' : function(data){
            $('#show').html(data)
        }
    })
}

// Edit Specific Data
    function editData(id){
        $("#upStd").show();
        $("#id").show();
        $("#addStd").hide();
        $.ajax({
            'url' : 'process.php',
            'type' : 'POST',
            'dataType' : 'JSON',
            'data' : {
                'id' : id,
                'checker' : 'editData'
            },
            'success': function(data){
                $('#amount').val(data.amount);
                $('#buyer').val(data.buyer);
                $('#items').val(data.items);
                $('#buyer_email').val(data.buyer_email);
                $('#note').val(data.note);
                $('#city').val(data.city);
                $('#phone').val(data.phone);
                $('#id').val(data.id);
            }
        })
    }

    function updateData(){
        var id = $("#id").val();
        var amount = $('#amount').val()
        var buyer = $('#buyer').val()
        var items = $('#items').val()
        var buyer_email = $('#buyer_email').val()
        var note = $('#note').val()
        var city = $('#city').val()
        var phone = $('#phone').val()
        $.ajax({
            'url' : 'process.php',
            'method' : 'POST',
            'data' : {
                'id' : id,
                'amount' : amount,
                'buyer' : buyer,
                'items' : items,
                'buyer_email' : buyer_email,
                'note' : note,
                'city' : city,
                'phone' : phone,
                'checker' : 'updateData'
            },
            'success' : function(data){
                $('#msg').html(data).fadeOut(3000)
                showData()
                $('#amount').val("");
                $('#buyer').val("");
                $('#items').val("");
                $('#buyer_email').val("");
                $('#note').val("");
                $('#city').val("");
                $('#phone').val("");

            }
        })
    }

    // Delete Student data
function deleteData(id){
    if(confirm(`warning id ${id} will be delete!`)){
        $.ajax({
            'url' : 'process.php',
            'type' : 'POST',
            'data' : {
                'id' : id,
                'checker' : 'delete'
            },
            'success' : function(data){
                $('#msg').html(data).fadeOut(1000)
                showData()
            }
        })
    }
    else{
        var msg = '<div class="alert alert-danger">Delete Unsuccessful</div>'
        $('#msg').html(msg).fadeOut(1000)
    }
}




// live search
$('#search').keyup(function(){
    var query = $('#search').val();
    var action = "Search";
    if(query != ''){
     $.ajax({
      'url':'process.php',
      'type':'POST',
      'data':{
        'queryId':query, 
        'action':action,
        'checker':'searchData'
    },
      'success':function(data){
        $('#show').html(data)
      }
     });
    } else {
        showData()
    }
});
