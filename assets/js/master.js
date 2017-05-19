/**
 * Created by buwan on 5/19/2017.
 */
var NAME_REGX = /^([a-zA-Z]|\s)*$/;
var OFFICER_ID_REGX = /^[0-9]{5}$/;
var NIC_REGX = /^[0-9]{9}(V){1}$/;
var TELEPHONE_REGX = /^[0-9]{10}$/;
var EMAIL_REGX = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

function validateOfficerForm() {
    var name = $('#name').val();
    var officer_id = $('#officer_id').val();
    var nic = $('#nic').val();
    var telephone = $('#telephone').val();
    var email = $('#email').val();

    if (!NAME_REGX.test(name) || !OFFICER_ID_REGX.test(officer_id) || !NIC_REGX.test(nic) || !TELEPHONE_REGX.test(telephone) || !EMAIL_REGX.test(email)) {

        if (!NAME_REGX.test(name)) {
            showWarn('name');
        }
        if (!OFFICER_ID_REGX.test(officer_id)) {
            showWarn('officer_id');
        }
        if (!NIC_REGX.test(nic)) {
            showWarn('nic');
        }
        if (!TELEPHONE_REGX.test(telephone)) {
            showWarn('telephone');
        }
        if (!EMAIL_REGX.test(email)) {
            showWarn('email');
        }

        console.log("error");
        return false;
    } else {
        console.log("ok");
        return false;
    }
}

function showWarn(tag) {
    $('.warn_' + tag).addClass('warn_input');
}

function clearWarn(tag) {
    $('.' + tag).removeClass('warn_input');
}