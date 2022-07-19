$(document).ready(function(){
    showStudent()
    $('#addStd').click(function(){
        addStudent()
        
        return false;
    })

    $('#upStd').click(function(){
        updateStudent()

        return false;
    })

    
})


// If we click addStudent, then the add student function will be call. a variable name 'checker' it has value insert, if it becomes sucess then the data will be added to msg section
function addStudent(){
    var myName = $('#myName').val()
    var fatherName = $('#fName').val()
    var motherName = $('#mName').val()
    var email = $('#email').val()
    var dist = $('#dist').val()
    var dept = $('#dept').val()
   $.ajax({
    'url' : 'process.php',
    'type' : 'POST',
    'data' : {
        'name' : myName,
        'fName' : fatherName,
        'mName' : motherName,
        'email' : email, 
        'dist' : dist,
        'dept' : dept,
        // this 'checker' value will be connect in php variable $checker. that's how php and ajax communicate
        'checker' : 'insert'
    },
    // when we has set a url to 'process.php', if it becomes success, all the data will be store to functon(data)
    'success' : function(data){
        $('#msg').html(data).fadeOut(1000)
    }
   })
}

// show list to website
 function showStudent(){
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

// edit students data from list

 function updateStudent(){
    $.ajax({
        'url' : 'process.php',
        'type' : 'POST',
        'data' : {
            'checker' : 'update'
        },
        'success' : function(data){
            $('#msg').html(data).fadeOut(1000)
        }
    })
}

function editData(id){
    $.ajax({
        'url' : 'process.php',
        'type' : 'POST',
        'dataType' : 'JSON',
        'data' : {
            'checker' : 'editData',
            'id' : id
        },
        'success' : function(data){
            $('#myName').val(data.name)
            $('#fName').val(data.fatherName)
            $('#mName').val(data.motherName)
            $('#email').val(data.email)
            $('#dist').val(data.district)
            $('#dept').val(data.department)
        }
    })
}




