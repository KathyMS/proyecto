/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(".link_change").click(function (event) {
    event.preventDefault();
    $("#change").load($(this).attr('href'));
    $.getScript("http://localhost/Proyecto/MakingDreams/web/resourses/js/my.script.js");
});

$(".all_package").click(function (event) {
    event.preventDefault();
    $("#nameSearch").val("");
    $("#change").load($(this).attr('href'));
});

$("#button").click(function (event) {
    event.preventDefault();
    $.ajax({
        url: "{{ path('packages_search') }}",
        type: 'POST',
        data: $("#search").serialize(),
        success: function (response) {
            $("#change").html(response);
        }
    });
});

$(".order").change(function () {
    var option = $(".order option:selected").val();
    $.ajax({
        url: "{{ path('packages_search') }}",
        type: 'POST',
        data: {'option': option},
        success: function (response) {
            $("#change").html(response);
        }
    });
});

