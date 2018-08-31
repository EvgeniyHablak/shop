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
                class: 'form-control',
                placeholder: 'Enter ' + member.title
            });
            var searchLabel = $('<label>').text("Participates in the search?");
            var searchInput = $('<input>').attr({
                type: 'checkbox',
                name: 'inSearch[' + member.name + ']',
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

$('#add-product-prop').on('click', function () {
    var propInputs = [
        {
            name: 'propertyName',
            title: 'Name'
        },
        {
            name: 'propertyTitle',
            title: 'Title'
        },
        {
            name: 'propertyValue',
            title: 'Value'
        },
    ];
    $.each(propInputs, function (i, member) {
        var input = $('<input>').attr({
            type: 'text',
            name: member.name + '[]',
            class: 'form-control new-property',
            placeholder: 'Enter ' + member.title + ' of new prop'
        });
        if (member.name === 'propertyName') {
            var searchLabel = $('<label>').text("Participates in the search?");
            var searchInput = $('<input>').attr({
                type: 'checkbox',
                name: 'inSearch[]',
            });
            var searchBlock = $('<div>').attr({
                class: "pull-right search-participating-block"
            }).append(searchInput).append(searchLabel);
        }
        $('<div>').attr({
            class: "form-group"
        }).append('<label>' + member.title + ' of new prop').append(searchBlock).append(input).appendTo('#new-property');
    });
});

$(document).on('keyup', "input[name='propertyName[]']", function (e) {
    console.log(e.target.value);
    var name = 'inSearch[' + e.target.value + ']';
    $(e.target).prev().children().first().attr('name', name);
});
//END CREATE PRODUCT PAGE
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