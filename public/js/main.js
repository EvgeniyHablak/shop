//CREATE PRODUCT PAGE
$('#select-category').on('change', function () {
    console.log('create product page');
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
            $('<div>').attr({
                class: "form-group"
            }).append('<label>' + member.title).append(input).appendTo('#properties');

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
            class: 'form-control',
            placeholder: 'Enter ' + member.title + ' of new prop'
        });
        $('<div>').attr({
            class: "form-group"
        }).append('<label>' + member.title + ' of new prop').append(input).appendTo('#new-property');
    });
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
