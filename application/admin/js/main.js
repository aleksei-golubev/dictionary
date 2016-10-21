(function() {
    var AUTH_COOKIE_NAME = 'DICT_AUTH_COOKIE';
    
    function isDefined(v) {
        return typeof v !== 'undefined';
    }
    
    if (isDefined($.cookie(AUTH_COOKIE_NAME))) {
        $.post('/admin/login.php').done(function(url) {
            showAdminPage(url);
        }).fail(showLoginForm);
    } else {
        showLoginForm();
    }

    function login(login, password) {
        $.post(
            '/admin/login.php',
            {
                login: login,
                password: password
            }
        ).done(function(url) {
            showAdminPage(url);
        }).fail(showError);
    }
    
    $("#loginButton").click(function() {
        login($("#login").val(), $("#password").val());
    });
    
    function showLoginForm() {
        $("#authSection").fadeIn();
    }
    
    function showAdminPage(url) {
        if (isDefined($.cookie(AUTH_COOKIE_NAME))) {
            $.get(url).done(function(data) {
                $("#authSection").hide();
                $("#adminSection").html(data);
            });
        }
    }
    
    function showError() {
         Materialize.toast('Authorization error', 3000, 'rounded')
    }
})();