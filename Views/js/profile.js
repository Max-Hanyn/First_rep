$(document).ready(function(){

    $('#photoAddForm').submit(function (e) {
        e.preventDefault();


        $.ajax({
            url: "/profile/photo/add",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success: function(response)
            {
                console.log(response);
                $('img').attr('src',response);
            }
        });

    });

    $('#changeProfileForm').submit(function (e) {
        e.preventDefault();

        var data = $("#changeProfileForm").serializeArray();

        $.ajax({
            url: window.location.href +"/change",
            type: "POST",
            data:data,
            success: function () {

               $('#first-name').text(data[0].value);
               $('#second-name').text(data[1].value);
               $('#adress').text(data[2].value);
               $('#number').text(data[3].value);

                $('#massage').append('<div class="alert alert-success alert-block">' +
                    ' <button type="button" class="close" data-dismiss="alert">×</button>' +
                    ' <strong>Info changed</strong> </div>');

            }
        });

    })
});