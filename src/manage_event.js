$("input[name=btn1]").on("click", function() {
    $("#web_input").toggle(1000);
    $("#tel_input").hide();
    $("#text_input").hide();
    $("#mail_input").hide();
    $("#sms_input").hide();
    $("#qr").hide();
    $('#error').hide();
});
$("input[name=btn2").on("click", function() {
    $("#tel_input").toggle(1000);
    $("#text_input").hide();
    $("#mail_input").hide();
    $("#sms_input").hide();
    $("#web_input").hide();
    $("#qr").hide();
    $('#error').hide();
});
$("input[name=btn3").on("click", function() {
    $("#text_input").toggle(1000);
    $("#tel_input").hide();
    $("#mail_input").hide();
    $("#sms_input").hide();
    $("#web_input").hide();
    $("#qr").hide();
    $('#error').hide();
});
$("input[name=btn4").on("click", function() {
    $("#mail_input").toggle(1000);
    $("#text_input").hide();
    $("#tel_input").hide();
    $("#sms_input").hide();
    $("#web_input").hide();
    $("#qr").hide();
    $('#error').hide();
});
$("input[name=btn5").on("click", function() {
    $("#sms_input").toggle(1000);
    $("#mail_input").hide();
    $("#text_input").hide();
    $("#tel_input").hide();
    $("#web_input").hide();
    $("#qr").hide();
    $('#error').hide();
});