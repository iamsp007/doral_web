// Number Validation Start Here
function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
// Number Validation End Here
// SSN Number Verification Start Here
function SSNumber(param) {
    var patt = new RegExp("\d{3}[\-]\d{2}[\-]\d{4}");
    var x = document.getElementById(param);
    var res = patt.test(x.value);
    if (!res) {
        x.value = x.value
            .match(/\d*/g).join('')
            .match(/(\d{0,3})(\d{0,2})(\d{0,4})/).slice(1).join('-')
            .replace(/-*$/g, '');
    }
}
// SSN Number Verification End Here
