var checkbox = document.getElementById('account_check');
var account_form = document.getElementById('account_form');

checkbox.addEventListener('click', function(){
    if(!checkbox.classList.contains('on')){
        account_form.classList.remove('d-none');
        checkbox.classList.add('on');
    } else {
        account_form.classList.add('d-none');
        checkbox.classList.remove('on');
    }
});