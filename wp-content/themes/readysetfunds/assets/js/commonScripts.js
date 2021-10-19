var format = function(a) {
    var b = a.toString().replace("$", ""),
        c = !1,
        d = [],
        e = 1,
        f = null;
    b.indexOf(".") > 0 && (c = b.split("."), b = c[0]), b = b.split("").reverse();
    for (var g = 0, h = b.length; g < h; g++) "," != b[g] && (d.push(b[g]), e % 3 == 0 && g < h - 1 && d.push(","), e++);
    return f = d.reverse().join(""), "$" + f + (c ? "." + c[1].substr(0, 2) : "")
};

$(".currency").keyup(function(a) {
    $(this).val(format($(this).val()))
})
$(".currency").keypress(function(a) {
    var b = a.which ? a.which : event.keyCode;
    return !(b > 31 && (b < 48 || b > 57))
})

$(".phone").on('keyup', function () {
    var oldVal = $(this).val();

    var newVal = oldVal.replace(/\D/g, '');
    var valLen = newVal.length;
    if (valLen >= 1)
        newVal = '(' + newVal.substring(0);
    if (valLen >= 3)
        newVal = newVal.substring(0, 4) + ') ' + newVal.substring(4);
    if (valLen >= 6) {

        newVal = newVal.substring(0, 9) + '-' + newVal.substring(9);
    }
    if (newVal != oldVal && event.keyCode != 8) {
      $(this).focus().val('').val(newVal);
    }
});