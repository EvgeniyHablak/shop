//CREATE PRODUCT PAGE
$('#select-category').on('change', function () {
    let url = $('#select-category').data('categories'),
        categoryId = $("#select-category option:selected").val();
    $.ajax({
        url: url,
        data: { categoryId: categoryId },
        method: 'POST'
    }).done(function (responce) {
        $('#properties').empty();
        $.each(responce, function (i, member) {
            var input = $('<input>').attr({
                type: 'text',
                name: member.name,
                "data-title": member.title,
                class: 'form-control property',
                placeholder: 'Enter ' + member.title
            });
            var searchLabel = $('<label>').text("Participates in the search?");
            var searchInput = $('<input>').attr({
                type: 'checkbox',
                name: member.name,
            });
            var searchBlock = $('<div>').attr({
                class: "pull-right search-participating-block"
            }).append(searchInput).append(searchLabel);

            $('<div>').attr({
                class: "form-group"
            }).append('<label>' + member.title).append(searchBlock).append(input).appendTo('#properties');

        });
    }).fail(function (error) {

    });
});
$('#create-product-prop').on('click', function () {
    var propertyName = $('#property-name').val();
    var propertyTitle = $('#property-title').val();

    var input = $('<input>').attr({
        type: 'text',
        name: propertyName,
        "data-title": propertyTitle,
        class: 'form-control new-property',
        placeholder: 'Enter ' + propertyTitle
    });

    var searchLabel = $('<label>').text(" Participates in the search?");
    var searchInput = $('<input>').attr({
        type: 'checkbox',
        name: propertyName,
    });
    var searchBlock = $('<div>').attr({
        class: "pull-right search-participating-block"
    }).append(searchInput).append(searchLabel);

    $('<div>').attr({
        class: "form-group"
    }).append('<label>' + propertyTitle).append(searchBlock).append(input).appendTo('#new-properties');

    $("#close-product-prop").trigger("click");
});

$(document).on('keyup', "input[name='propertyName[]']", function (e) {
    var name = 'inSearch[' + e.target.value + ']';
    $(e.target).prev().children().first().attr('name', name);
});
function collectProductData() {
    var inSearch = [];
    $('input:checked').each(function (key, value) {
        inSearch.push(
            $(value).attr('name')
        );
    });

    var properties = [];
    $("#properties :input.property").each(function (key, input) {
        var name = $(input).attr('name'),
            title = $(input).data('title'),
            value = $(input).val();
        var property = {
            name: name,
            title: title,
            value: value
        }
        properties.push(property);

    });
    $("#new-properties :input.new-property").each(function (key, input) {
        var name = $(input).attr('name'),
            title = $(input).data('title'),
            value = $(input).val();
        var property = {
            name: name,
            title: title,
            value: value
        }
        properties.push(property);
    });
    var data = {
        name: $("#product-name").val(),
        title: $("#product-title").val(),
        description: $("#product-description").val(),
        price: $("#product-price").val(),
        category: $("#select-category").val(),
        inSearch: inSearch,
        properties: properties
    };
    return data;
}
function saveProduct(url, data) {
    $.ajax({
        url: url,
        method: "POST",
        data: data,
        dataType: 'json',
        success: function (responce) {
            if (responce.success) {
                window.location.href = responce.redirectUrl;
            } else {
                console.log('fail', responce);
            }
        }
    });
}
$(document).on('click', '.create-product-btn', function (e) {
    e.preventDefault();
    var data = collectProductData();
    saveProduct($('form#new-product-form').attr('action'), data);
});
$('.edit-product-btn').on('click', function (e) {
    e.preventDefault();
    var data = collectProductData();
    saveProduct($('form#edit-product-form').attr('action') + '?_method=put', data);
});
$('#preview-button').on('click', function () {
    $('.preview-wrapper').empty();
    $(".preview-wrapper").append(_.template(Templates.newPropTmpl)({ product: collectProductData() }));
});
//END CREATE PRODUCT PAGE
//UPLOAD PRODUCT IMAGE
$('#upload-product-image-form').on('change', function (e) {
    var $that = $(this),
        formData = new FormData($that.get(0));
    $.ajax({
        url: $that.attr('action'),
        type: $that.attr('method'),
        contentType: false,
        processData: false,
        data: formData,
        dataType: 'json',
        success: function (json) {
            if (json.success) {
                var img = $('<img>').attr({
                    class: "product-media",
                    src: json.url,
                });
                var setMain = $('<a>').attr({
                    href:json.setMainUrl,
                    class:"btn btn-success"
                }).text('Set main');
                var deleteBtn = $('<a>').attr({
                    href:json.deleteUrl,
                    class:"btn btn-danger"
                }).text('Delete');
                var wrapp = $('<div>').attr({
                    class: "col-lg-4 col-md-4"
                }).append(img).append(setMain).append(deleteBtn).appendTo('.products-images .row');
            }
        }
    });
});
//END UPLOAD PRODUCT IMAGE
//CREATE Category PAGE
$('#add-category-property').on('click', function () {
    var propInputs = [
        {
            name: 'propertyName',
            title: 'Name'
        },
        {
            name: 'propertyTitle',
            title: 'Title'
        }
    ];
    $.each(propInputs, function (i, member) {
        var input = $('<input>').attr({
            type: 'text',
            name: member.name + '[]',
            class: 'form-control',
            placeholder: 'Enter ' + member.title + ' of new prop'
        });
        $('<div>').attr({
            class: "form-group"
        }).append('<label>' + member.title + ' of new prop').append(input).appendTo('#properties');
    });
    $('<hr>').appendTo('#properties');
});
//END CREATE Category PAGE

//SEARCH SCRIPT
$("#search-input").on('keyup paste', function (e) {
    let url = $(this).data('search-url'),
        name = $(this).val();
    $(".search-list").empty();
    $.ajax({
        url: url,
        data: { name: name },
        method: 'POST'
    }).done(function (responce) {
        $(".search-list").css('display', 'block');
        $.each(JSON.parse(responce), function (i, member) {
            $('<a>').attr({
                href: "/products/" + member.id
            }).append('<li>').attr({
                class: 'list-group-item'
            }).text(member.title)
                .appendTo('.search-list');
        });
    }).fail(function (error) {

    });
});
$(".search-input").blur(function () {
    $(".search-list").css('display', 'none');
});
$("#search-input").on('click', function () {
    $("#search-input").trigger('keyup');
});
//END SEARCH SCRIPT