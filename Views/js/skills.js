$(document).ready(function () {
    $('#profileForm').submit(function (e) {
        e.preventDefault();
        var empty = false;
        var inputs = $("#profileForm").find('input[type="text"]');
        var data = $("#profileForm").serializeArray();

        inputs.each(function () {
            if (!$(this).val()) {
                $(this).attr('id', 'error');
                empty = true;
            } else {

                $(this).attr('id', '');
            }


        })
        if (!empty) {

            $.ajax({
                url: window.location.href + "/add",
                dataType: 'json',
                type: "POST",
                data: data,

                success: function (response) {

                    var last = response.lastInsertId;

                    $('#profileTable tbody').append('<tr id="skill' + last + '"><td>' + data[0].value + '</td><td>' + data[1].value + '</td><td>' + data[2].value + '</td>' +
                        '<td><div>' +
                        '<button type="button" class="edit btn btn-info" data-toggle="modal" value="' + last + '" ><i class="material-icons">&#xE254;</i></button>' +
                        '<button type="button" class="delete btn btn-danger" data-toggle="modal" value="' + last + '"  ><i class="material-icons">&#xE872;</i></button>' +
                        '</div></td>' +
                        '</tr>');
                    $('#profileModal').modal('toggle');
                    $('#profileForm')[0].reset();

                }
            });
        }

    })

    $(document).on("click", ".edit", function () {
        var data = [];
        var id = $(this).val();

        $(this).parents("tr").find("td:not(:last-child)").each(function () {

            data.push($(this).text());
        });


        $(".name1").attr('value', data[0]);
        $(".name1").attr('id', '');
        $(".level1").val(data[1]);
        $(".level1").attr('id', '');
        $(".language1").val(data[2]);
        $(".language1").attr('id', '');
        $("#hiddenId").val(id);
        $("#profileEditModal").modal("toggle");


    });

    $(document).on("click", ".delete", function () {

        var id = $(this).val();
        $.ajax({
            url: window.location.href + "/delete",
            type: "POST",
            data: {
                idToDelete: id
            },

            success: function () {
                $('#skill' + id).remove();
            }
        });

    });


    $('#profileEditForm').submit(function (e) {
        e.preventDefault();


        var empty = false;
        var id = $("#hiddenId").val();
        var inputs = $("#profileEditForm").find('input[type="text"]');
        var data = $("#profileEditForm").serializeArray();


        inputs.each(function () {

            if (!$(this).val()) {
                $(this).attr('id', 'error');
                empty = true;
            } else {

                $(this).attr('id', '');
            }
        });

        if (!empty) {

            $.ajax({
                url: window.location.href + "/edit",
                type: "POST",
                dataType: 'json',
                data: data,

                success: function (response) {

                    $('#skill' + id + ' td:nth-child(1)').text(response.name);
                    $('#skill' + id + ' td:nth-child(2)').text(response.level);
                    $('#skill' + id + ' td:nth-child(3)').text(response.language);
                    $('#profileEditModal').modal('toggle');
                    $('#profileEditForm')[0].reset();

                }
            });
        }

    });
});