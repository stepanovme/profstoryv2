function changeRole(newRoleId, userId) {
    // Отправляем AJAX-запрос на сервер
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "/function/change_role.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("userId=" + userId + "&newRoleId=" + newRoleId);
}