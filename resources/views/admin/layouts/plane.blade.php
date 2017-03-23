<!DOCTYPE html>
<!--[if IE 8]>
<html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<head>
    <meta charset="utf-8"/>
    <title>{{ config('app.admin', 'Laravel') }}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>

    <link rel="shortcut icon" href="{{ elixir('img/favicon.ico') }}">
    <link rel="stylesheet" href="{{ elixir('css/admin_app.css') }}"/>
    <link rel="stylesheet" href="{{ asset("assets/stylesheets/styles.css") }}"/>
    <link rel="stylesheet" href="{{ asset("assets/css/sb-admin-2.css") }}"/>
    <link rel="stylesheet" href="{{ asset("assets/css/metisMenu.css") }}"/>
    <link rel="stylesheet" href="{{ asset("assets/css/timeline.css") }}"/>
    <link rel="stylesheet" href="{{ asset("assets/css/font-awesome.css") }}"/>
</head>
<body>
@yield('body')
<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
<script src="http://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js"></script>
<script src="http://cdn.jsdelivr.net/jquery.validation/1.15.0/additional-methods.min.js"></script>

<script>
    $('#title').on('change', function () {
        categoryKeyFix();
    })
    $('#brand_id').on('change', function () {
        categoryKeyFix();
    })

    function categoryKeyFix() {
        if(!$('#title').val()=='' && !$('#brand_id').val()=='')
            $('#category_key').val($('#title').val()+"_"+$('#brand_id').val());
    }

    $("#vat_apply").on('change', function () {
        if($(this).val() == "on"){
            $("#vat").val('15');
        } else {
            $("#vat").val('');
        }
    });
    $("#client").on('change', function () {
        var status = $('#postatus').val();
        $.ajax(
                {
                    type: 'get',
                    url: '/admin/manage-clients/completed-purchase-orders/' + this.value + '/' + status,
                    success: function (response) {
                        console.log(response);
                        var model = $('.tbody-completed');
                        model.empty();
                        $.each(response, function (index, elem) {
                            model.append("<tr>");
                            model.append("<td>" + elem.id + "</td>");
                            model.append("<td>" + elem.created_at + "</td>");
                            model.append("<td>" + elem.updated_at + "</td>");
                            model.append("<td>" + elem.del_cp + "</td>");
                            model.append("<td>" + elem.del_branch + "</td>");
                            model.append("<td>" + elem.del_tp + "</td>");
                            model.append("</tr>");
                        });
                    }
                }
        );
    });

    $("#postatus").on('change', function () {
        var client = $('#client').val();
//        alert(client);
        $.ajax(
                {
                    type: 'get',
                    url: '/admin/manage-clients/completed-purchase-orders/' + client + '/' + this.value,
                    success: function (response) {
                        console.log(response);
                        var model = $('.tbody-completed');
                        model.empty();
                        $.each(response, function (index, elem) {
                            model.append("<tr>");
                            model.append("<td>" + elem.id + "</td>");

                            model.append("<td>" + elem.created_at + "</td>");
                            model.append("<td>" + elem.updated_at + "</td>");
                            model.append("<td>" + elem.del_cp + "</td>");
                            model.append("<td>" + elem.del_branch + "</td>");
                            model.append("<td>" + elem.del_tp + "</td>");
                            model.append("</tr>");
                        });
                    }
                }
        );
    });

    $("#P_client").on('change', function () {
        $.ajax(
                {
                    type: 'get',
                    url: '/admin/manage-clients/pc-purchase-orders/' + this.value,
                    success: function (response) {
                        console.log(response);
                        var model = $('.tbody-completed');
                        model.empty();
                        $.each(response, function (index, elem) {
//                        model.append("<option value='" + elem.id + "'>" + elem.part_no + "</option>")
                            model.append("<tr>");
                            model.append("<td>" + elem.id + "</td>");
                            model.append("<td>" + elem.created_at + "</td>");
                            model.append("<td>" + elem.del_cp + "</td>");
                            model.append("<td>" + elem.del_branch + "</td>");
                            model.append("<td>" + elem.del_tp + "</td>");
                            model.append("<td>" + elem.status + "</td>");
                            model.append("</tr>");
                        });
                    }
                }
        );
    });

    $('#designation_id').on('change', function () {
        var selectedVal = $("#designation_id option:selected").text();
        if ((selectedVal.toLowerCase() != 'client') && (selectedVal != 'Super Admin')) {
//            $('#section_head_id').remove();
            $('.shead').show();
        } else {
            $('.shead').hide();
            $('#section_head_id').remove();
            $('<input>').attr({
                type: 'hidden',
                id: 'section_head_id',
                name: 'section_head_id',
                value: ''
            }).appendTo('#userCreate')
        }
    });

    $(".postatus").on('change', function () {
        var poid = this.id;
//        alert(this.id);
//        alert(this.value);
        $.ajax({
            type: 'get',
            url: '/admin/manage-clients/po-details/change_status/' + poid + '/' + this.value,
            success: function (response) {
//                $('.msg').show();
//                $('.msg').addClass(' alert-success');
            }
        });
    });

    $("#product_id").on('change', function () {
        $.ajax(
                {
                    type: 'get',
                    url: '/admin/manage-product-list/product/details/' + this.value,
                    success: function (response) {
                        $('#list_price').val(response.default_price);
                        $('#list_price').prop('readonly', true);
                        $('#vat').val(response.vat);
                    }
                }
        );
    });

    $("#category_id").on('change', function () {
        $.ajax(
                {
                    type: 'get',
                    url: '/admin/manage-product-list/product/' + this.value,
                    success: function (response) {
                        var model = $('#product_id');
                        model.empty();
                        model.append("<option selected>Select Products</option>")
                        $.each(response, function (index, elem) {
                            model.append("<option value='" + elem.id + "'>" + elem.part_no + "</option>")
                        });
                    }
                }
        );
    });

    $("#brand_id").on('change', function () {
        $.ajax(
                {
                    type: 'get',
                    url: '/admin/manage-product-list/category/' + this.value,
                    success: function (response) {
                        var model = $('#category_id');
                        model.empty();
                        model.append("<option selected>Select Category</option>")
                        $.each(response, function (index, elem) {
                            model.append("<option value='" + elem.id + "'>" + elem.title + "</option>")
                        });
                    }
                }
        );
    });

    $("#asignProduct").validate({
        rules: {
            brand_id: "required",
            category_id: "required",
            product_id: "required",
            list_price: "required",
            special_price: "required",
        }
    });

    $("#products").validate({
        rules: {
            title: "required",
            category_id: "required",
            image: "required"
        }
    });
    $("#categories").validate({
        rules: {
            title: "required",
            brand_id: "required",
            image: "required"
        }
    });

    $("#brands").validate({
        rules: {
            title: "required",
            image: "required"
        }
    });
    $("#clientProfile").validate({
        rules: {
            name: "required",
            email: {
                required: true,
                email: true
            },
            address: {
                required: true
            },
            telephone: {
                required: true
            },
            logo: {
                required: true
            },
            color: {
                required: true
            },
            cp_name: {
                required: true
            },
            cp_designation: {
                required: true
            },
            cp_branch: {
                required: true
            },
            cp_telephone: {
                required: true
            },
            cp_email: {
                required: true
            }
        }
    });
    $("#userCreate").validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 6,
                maxlength: 12
            },
            cpassword: {
                equalTo: "#password"
            },
            name: "required",
            designation: {
                required: true,
            },
            nic_pass: {
                required: true,
                maxlength: 12,
                minlength: 7
            },
        }
    });
</script>

<script src="http://demo.startlaravel.com/sb-admin-laravel/assets/scripts/frontend.js" type="text/javascript"></script>

<script type="text/javascript" src="{{ elixir('js/app.js') }}"></script>

</body>
</html>