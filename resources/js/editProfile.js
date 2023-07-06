import './bootstrap';

var cardContainer = document.getElementById('cardContainer');
var card = document.getElementById('cookieCard');
var description = document.getElementById('cookieDescription');
window.updateInfo = function() {
    axios.post('/updateInfo', {
        firstname: firstname.value,
        lastname: lastname.value,
        username: username.value,
        email: email.value,
        country: country.value,
        language: language.value,
        timezone: timezone.value
    })
    .then(function (response) {
        console.log(response);
        cardContainer.style.visibility = 'visible';
        card.style.visibility = 'visible';
    })
    .catch(function (error) {

    });
}
window.updatePassword = function() {
    if (newpass.value == confirmpass.value) {
        axios.post('/updatePassword', {
            oldpass: oldpass.value,
            newpass: newpass.value
        })
        .then(function (response) {
            console.log(response);
            description.innerHTML = "Password updated sucessfully.";
            cardContainer.style.visibility = 'visible';
            card.style.visibility = 'visible';
        })
        .catch(function (error) {
            console.log(error);
        });
    }
}
window.refresh = function() {
    location.reload();
}
