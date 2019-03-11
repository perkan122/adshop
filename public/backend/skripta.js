
$(document).ready(function() {
    $('#orders_table').DataTable( {
        "language": {
            "lengthMenu": "Prikaži _MENU_ zapisa po strani",
            "search": "Pretraga:",
            "info": "Strana _PAGE_ od _PAGES_",
            "infoEmpty": "Nema odgovarajućih zapisa",
            "infoFiltered": "(ukupno _MAX_ total zapisa)",
        	"paginate": {
     			"previous": "Prethodna",
     			"next": "Sledeća",
    		}
        },
        "order": [[ 0, "desc" ]]
    } );
    $('#order_details_table').DataTable( {
        "language": {
            "lengthMenu": "Прикажи _MENU_ записа по страни",
            "search": "Претрага:",
            "info": "Страна _PAGE_ од _PAGES_",
            "infoEmpty": "Нема одговарајућих записа",
            "infoFiltered": "(укупно _MAX_ total записа)",
            "paginate": {
                "previous": "Претходна",
                "next": "Следећа",
            }
        },
        "paging": false,
        "searching": false,
        "info":     false
    } );
    $('#products_table').DataTable( {
        "language": {
            "lengthMenu": "Прикажи _MENU_ записа по страни",
            "search": "Претрага:",
            "info": "Страна _PAGE_ од _PAGES_",
            "infoEmpty": "Нема одговарајућих записа",
            "infoFiltered": "(укупно _MAX_ total записа)",
            "paginate": {
                "previous": "Претходна",
                "next": "Следећа",
            }
        }
    } );
    $('#pages_table').DataTable( {
        "language": {
            "lengthMenu": "Прикажи _MENU_ записа по страни",
            "search": "Претрага:",
            "info": "Страна _PAGE_ од _PAGES_",
            "infoEmpty": "Нема одговарајућих записа",
            "infoFiltered": "(укупно _MAX_ total записа)",
        	"paginate": {
     			"previous": "Претходна",
     			"next": "Следећа",
    		}
        }
    } );
    $('#collections_table').DataTable( {
        "language": {
            "lengthMenu": "Прикажи _MENU_ записа по страни",
            "search": "Претрага:",
            "info": "Страна _PAGE_ од _PAGES_",
            "infoEmpty": "Нема одговарајућих записа",
            "infoFiltered": "(укупно _MAX_ total записа)",
          "paginate": {
          "previous": "Претходна",
          "next": "Следећа",
        }
        }
    } );

    var update = $("#hidden_updatepicture").val();
    var id_photo0 = $("#id_photo0").val();
    var id_photo1 = $("#id_photo1").val();
    var object_id = $("#id").val();

    $('#gallery-photo-add0').simpleUpload({
        fields: {
            id : id_photo0,
            id_object : object_id,
            _token: "{{ csrf_token() }}"
        },
        url: update,
        trigger: '#picture0',
        success: function(data){
            alert('Успешно замењена слика');
            location.reload();
        }
    });

    $('#gallery-photo-add1').simpleUpload({
        fields: {
            id : id_photo1,
            id_object : object_id,
            _token: "{{ csrf_token() }}"
        },
        url: update,
        trigger: '#picture1',
        success: function(data){
            alert('Успешно замењена слика');
            location.reload();

        }
    });
});

$(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {

        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    $($.parseHTML('<img width="100px" height="100px" style="margin-right:5px;margin-bottom:5px;">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }
    };

    $('#gallery-photo-add').on('change', function() {
        imagesPreview(this, 'div.gallery');

    });

    $('#gallery-photo-add0').on('change', function() {
        imagesPreview(this, 'div.gallery');

    });
    $('#gallery-photo-add1').on('change', function() {
        imagesPreview(this, 'div.gallery');

    });
});

function display_images0(elem){
		document.getElementById("images_preview0").style.display = 'block';
};

function display_images1(elem){
		document.getElementById("images_preview1").style.display = 'block';
};

function display_images(elem){
		document.getElementById("images_preview").style.display = 'block';
};

function delete_photo(id){
    var conf = confirm("Да ли желите обрисати одабрану слику?");
    if(conf){
        var url_delete_photo = $("#url_delete_photo").val();
        $.ajax({
            url: url_delete_photo,
            type:"GET",
            data: {"id":id},
            success: function(response){
                alert(response);
                location.reload();
            }
        });
    }
    else{
        return false;
    }
}

function set_primary_photo(id){
    var conf = confirm("Да ли желите да промените примарну фотографију?");
    if(conf){
        var url_set_primary_photo = $("#url_set_primary_photo").val();

        $.ajax({
            url: url_set_primary_photo,
            type:"GET",
            data: {"id":id,_token: "{{ csrf_token() }}"},
            success: function(response){
                alert(response);
                location.reload();
            }
        });
    }
    else{
        return false;
    }
}

function changeposition(id){
    var conf = confirm("Да ли желите променити редослед?");
    if(conf){
        var change_url = $("#hidden_position").val();

        $.ajax({
            url: change_url,
            type:"GET",
            data: {"id":id,},
            success: function(response){
                alert(response);
                location.reload();
            }
        });
    }
    else{
        return false;
    }
}

$(function(){
    $("#txtConfirmPassword").keyup(function() {
        var password = $("#txtNewPassword").val();
        $("#divCheckPasswordMatch").html(password == $(this).val() ? "Lozinke se poklapaju" : "Lozinke se ne poklapaju");
    });
});

$('.icon1').hover(function (){
    $('.password1').attr('type', 'text');
}, function () {
    $('.password1').attr('type', 'password');
});

$('.icon2').hover(function (){
    $('.password2').attr('type', 'text');
}, function () {
    $('.password2').attr('type', 'password');
});
